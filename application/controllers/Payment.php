<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('order_model');
	}
	


	public function index($value='')
    {

           error_reporting(0);
            $user_id = $this->session->userdata('USER_ID');
			$userdata = $this->user_model->get_user_by_id($user_id);
			if(empty($user_id))
			{				
				$this->load->view('front/checkout/user-not-login-onepage');
			}

		    $order_id = $this->uri->segment(3);
		    $ORDER = $this->order_model->get_order_data_by_orderid($order_id);
            $data['item_name'] =  "TeachSu Learning Center Course";    
            $data['item_number'] = $ORDER[0]->id;
            $data['amount'] = $ORDER[0]->final_amount;
            $data['address'] =  $userdata[0]->address	;   
            $data['currency'] =  "INR"; 
            $data['name'] =  $userdata[0]->fname." ".$userdata[0]->lname; ;    
            $data['email'] = $userdata[0]->email;   
            $data['phone'] = $userdata[0]->contact_no ; 
            $data['return_url'] = base_url().'payment/callback';
            $data['surl'] = base_url('success');
            $data['furl'] = base_url('failed');
            $data['currency_code'] = 'INR';
            $this->load->view('payment/razorpay' ,$data) ;  
    }

     // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
       
        return $ch;
    }   
        
    // callback method
    public function callback() {        

        error_reporting(0);    
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
           $_SESSION['Transaction_ID'] =  $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                 //echo "<pre>";print_r($response_array);
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }


	    	if ($success === true) {
	    	     $update_data['payment_status']='success';
	    	     $update_data['status']='success';
	    	}else{
	    	    $update_data['payment_status']='falied';
	    	    $update_data['status']='cancelled';
	    	}
		   
		    $data['ORDER_ID'] = $merchant_order_id;
		    $this->db->where('id',$merchant_order_id);
			$this->db->update('tbl_order', $update_data);

            $this->update_course_item_status($merchant_order_id) ; 


            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                 	$_SESSION['payment_status'] = 'Received' ; 
                	$data['msg'] =  "<br><h3>Thank you for buy Courses </h3>";
					$data['msg2'] =" <br><h5>Your transaction is successful. We will be shipping your order to you soon</h5>";
					$data['msg2'] .="<h4>You can now learn your Courses ,Courses link available in your account dashboard </h5>";
				    $this->order_mail_template($merchant_order_id);				
				    $this->order_mail_template_to_admin($merchant_order_id);
				  
            } else {

              $_SESSION['payment_status'] = 'Failed' ;   
              $data['msg'] =  "<br><h5>Thank you for shopping with us..However,the transaction has been declined</h5>";     
          
            }
        } else {
       
               $_SESSION['payment_status'] = 'Failed' ;   
              $data['msg'] =  "<br><h5>An error occured. Contact site administrator, please!</h5>";     
     

        }

      $_SESSION['success_msg'] = $data ;      
      redirect($this->input->post('merchant_furl_id'));

       
    } 

    function success(){
  
         $data =	$_SESSION['success_msg'];
         $this->load->view('front/checkout/success',$data); 
	 
    } 

    function failed(){
        
         $data =	$_SESSION['success_msg'];
         $this->load->view('front/checkout/failed',$data);
         
	 
    }

    public function update_course_item_status($merchant_order_id)
    {
       
          $orderitem = $this->order_model->get_item_data($merchant_order_id);  
          foreach ($orderitem as $key => $value) {
            $update_data = [] ;

            $course = $this->course_model->get_course_by_id($value->pro_id) ; 
            $charges_type = $course[0]->charges_type ; 
            $update_data['course_start_date'] = date('Y-m-d') ;
            $update_data['course_status'] = 'Active' ;

            if($charges_type == 'Monthly'){

                $update_data['course_expiry_date'] =   date('Y-m-d', strtotime($update_data['course_start_date']. ' + 30 days'));    
               

            }else{

                  $update_data['course_expiry_date'] =   date('Y-m-d', strtotime($update_data['course_start_date']. ' + 360 days'));

            }

            $this->db->where('id',$value->id);
            $this->db->update('tbl_order_item', $update_data);                   
          }

       

    }

	
	function order_mail_template($ord_id)
	{
		$user_id = $this->session->userdata('USER_ID');
		$data['ORDER'] =$order = $this->order_model->get_order_data($ord_id);
		$data['USER'] = $this->user_model->get_user_by_id($order[0]->user_id);
     	$htmlContent = $this->load->view('front/mail/order-template',$data, TRUE);
		$this->load->library('email');
		//SMTP & mail configuration			
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");				
		//Email content
		$this->email->to(trim($data['USER'][0]->email));
		$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
		$this->email->subject('Order Confirm');
		$this->email->message($htmlContent);				
		//Send email
		$this->email->send();	
		//$this->load->view('front/mail/order-template',$data); 
	}
	
    function order_mail_template_to_admin($ord_id)
	{
		$user_id = $this->session->userdata('USER_ID');
		
		$data['ORDER'] =$order = $this->order_model->get_order_data($ord_id);
		$data['USER'] = $this->user_model->get_user_by_id($order[0]->user_id);
  		$htmlContent = $this->load->view('front/mail/order-template',$data, TRUE);
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");				
		$this->email->to('contact@smartwaylighting.com');
		$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
		$this->email->subject('Order Confirm Mail To Admin');
		$this->email->message($htmlContent);				
		$this->email->send();
		
		
		//
		
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");				
		$this->email->to('akashsahu@smartwaylighting.com');
		$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
		$this->email->subject('Order Confirm Mail To Admin');
		$this->email->message($htmlContent);				
		$this->email->send();
		
		//
		
	
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");				
		$this->email->to('deepak@smartwaylighting.com');
		$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
		$this->email->subject('Order Confirm Mail To Admin');
		$this->email->message($htmlContent);				
		$this->email->send();
		
		
	}


	
}
