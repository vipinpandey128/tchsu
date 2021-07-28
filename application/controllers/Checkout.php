<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller
{

	public function onepage()
	{	 
	    error_reporting(0) ;

		$user_id = $this->session->userdata('USER_ID');
		if(count($this->cart->contents())==0){ redirect('cart'); }
		
		if(empty($user_id))
		{				
			$this->load->view('front/checkout/user-not-login-onepage');
		}
		else
		{
			if(isset($_POST['order_palce']))
			{
				$order_data = $this->get_amount_array();
				$ord_data['user_id'] = $user_id;
				$ord_data['coupon'] = $order_data['coupon_data'];
				
				$couponData =  json_decode($order_data['coupon_data']);	
				if($couponData){
				$ord_data['couponTitle'] = $couponData->title;	
				}
		
				$ord_data['discount_amount'] = $order_data['discount_amount'];
				$ord_data['tax'] = '0';
				$ord_data['shipping_charge'] = '0';
				$ord_data['total_amount'] = $order_data['total_amount'];
				$ord_data['final_amount'] = $order_data['final_amount']; 
				$ord_data['status'] = 'pending';
				$ord_data['order_id'] = time();
				
				$ord_data['create_date'] = date('Y-m-d H:i:s ');
				
				$order_id = $this->order_model->save_order($ord_data);
				$this->save_item_data($order_id, $user_id);
				$this->save_billing_data($order_id, $user_id);
				$this->update_user_data($order_id, $user_id);
				$this->save_shipping_data($order_id, $user_id);
				$this->empty_cart();
				redirect('payment/index/'.$ord_data['order_id']);
			}	
			
			
			$data['RESULT'] =  $this->user_model->get_user_by_id($user_id);
			$data['country'] = $this->db->get("countries")->result() ; 
			$this->load->view('front/checkout/onepage',$data);
		}
	}
	
	
	
	
	function manage_stock($id,$qty)
	{
		$pro = $this->course_model->get_course_by_id($id);
		if($pro[0]->qty>0)
		{	
			$upd_data['qty'] = $pro[0]->qty-$qty;
			$this->course_model->update_course_by_id($pro[0]->id, $upd_data);
		}	
	}
	
	function empty_cart()
	{
		$this->session->unset_userdata('coupon_data'); 				
		$this->cart->destroy();
	}
	
	function save_item_data($order_id, $user_id)
	{
		foreach($this->cart->contents() as $item)
		{
			$item_data['order_id'] = $order_id;
			$item_data['user_id'] = $user_id;
			$item_data['pro_id'] = $item['id'];
			$item_data['item'] = $item['name'];
			$item_data['price'] = $item['price'];
			$item_data['qty'] = $item['qty'];
			$item_data['sub_total'] = $item['subtotal'];
			$item_data['custom_options'] = $this->get_custom_option($item['custom_options']);
			$item_data['options'] = $this->get_custom_option(isset($item['options']));
			$item_data['type'] = $item['type'];
			$this->order_model->save_order_item($item_data);
		
		}
	}
	
	function get_custom_option($op)
	{
		if(is_array($op) && count($op)>0)
		{
			return json_encode($op);
		}
		else
		{
			return '';
		}	
	}
	
	function save_billing_data($order_id, $user_id)
	{
		$bill_data['order_id'] = $order_id;
		$bill_data['user_id'] = $user_id;
		$bill_data['fname'] = $this->input->post('bfname');
		$bill_data['lname'] = $this->input->post('blname');
		$bill_data['phone'] = $this->input->post('bcontact_no');
		$bill_data['address'] = $this->input->post('baddress');
		$bill_data['city'] = $this->input->post('bcity');
		$bill_data['state'] = $this->input->post('bstate');
		$bill_data['country'] = $this->input->post('bcountry');
		$bill_data['pincode'] = $this->input->post('bpincode');

		$this->order_model->save_billing_data($bill_data);	
	}

	function update_user_data($order_id, $user_id)
	{
	
		$bill_data['address'] = $this->input->post('baddress');
		$bill_data['city'] = $this->input->post('bcity');
		$bill_data['state'] = $this->input->post('bstate');
		$bill_data['zip'] = $this->input->post('bpincode');
		$bill_data['landmark'] = $this->input->post('blandmark');
		$bill_data['gst'] = $this->input->post('bgst');
		$this->db->where('id', $user_id);
		$this->db->update('tbl_users', $bill_data);
	}
	
	function save_shipping_data($order_id, $user_id)
	{
		$bill_data['order_id'] = $order_id;
		$bill_data['user_id'] = $user_id;
		$bill_data['fname'] = $this->input->post('bfname');
		$bill_data['lname'] = $this->input->post('blname');
		$bill_data['phone'] = $this->input->post('bcontact_no');
		$bill_data['address'] = $this->input->post('baddress');
		$bill_data['city'] = $this->input->post('bcity');
		$bill_data['state'] = $this->input->post('bstate');
		$bill_data['country'] = $this->input->post('bcountry');
		$bill_data['pincode'] = $this->input->post('bpincode');

		$this->order_model->save_shipping_data($bill_data);	
	}
	
	function get_amount_array()
	{
		$discount_amount = 0;
		$coupon_data = '';
		$total_amount = $this->cart->total();
		$coupon = $this->session->userdata('coupon_data');
		if(!empty($coupon) && is_array($coupon)){
			$discount_amount = ($total_amount*$coupon['discount'])/100;
			$coupon_data = json_encode($coupon);
		}
		$data = array('total_amount'=>$total_amount,'discount_amount'=>$discount_amount,'final_amount'=>($total_amount-$discount_amount),'coupon_data'=>$coupon_data);		
		//print_r($data);
		return $data;
	}
	
	function order_mail_template($ord_id)
	{
		$user_id = $this->session->userdata('USER_ID');
		$data['USER'] = $this->user_model->get_user_by_id($user_id);
		$data['ORDER'] = $this->order_model->get_order_data($ord_id);
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
		$this->load->view('front/mail/order-template',$data); 
	}
	
    function order_mail_template_to_admin($ord_id)
	{
		$user_id = $this->session->userdata('USER_ID');
		$data['USER'] = $this->user_model->get_user_by_id($user_id);
		$data['ORDER'] = $this->order_model->get_order_data($ord_id);
  		$htmlContent = $this->load->view('front/mail/order-template',$data, TRUE);
		$this->load->library('email');
		//SMTP & mail configuration			
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");				
		//Email content
		$this->email->to(trim(INFOMAIL));
		$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
		$this->email->subject('Order Confirm Mail To Admin');
		$this->email->message($htmlContent);				
		//Send email
		$this->email->send();	
		$this->load->view('front/mail/order-template',$data); 
	}
	
	function success()
	{
		$args = func_get_args();
		$data['ORDER_ID'] = $args[0];
		$this->load->view('front/checkout/success',$data); 
	}

	public function applycoupen($value='')
	{
		$coupon = $_POST['coupon'];
		if($coupon == 'SMARTWAY20'){

			$data = [

					'discount'=>10,
					'title'=>'SMARTWAY20',

			];
			$_SESSION['coupon_data'] = $data ;
			$response['msg']= 'Applied Successfully'; 
			$response['error']= 0; 

		}else{

			$response['msg'] = 'Invalid Coupon Code';
			$response['error']=1;
		}

			echo json_encode($response);

         die;
	}
	
	function apply_coupon()
	{ 

		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id))
		{
			$response['error']=1;
			$response['msg'] = 'In order to avail the benefits of this promotional / voucher code, please Login/Sign Up';
		}
		else
		{
			if(isset($_POST) && !empty($_POST['coupon']))
			{
				$coupon = $_POST['coupon'];
				$res =  $this->coupon_model->checkCouponUsedByUser($coupon ,$user_id ) ;
				if($res==0){ // check coupon code used by user

					$couponData	= $this->coupon_model->get_coupon_by_title($coupon); 
					if(count($couponData)>0) // check coupon code in databse
					{

						if($couponData[0]->status != 0 ){  // check coupon status
							$paymentDate=date('Y-m-d');
							$contractDateBegin = date('Y-m-d', strtotime($couponData[0]->enableDate));
							$contractDateEnd = date('Y-m-d', strtotime($couponData[0]->disableDate));
							if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){ // check coupon date period

									
									
									$data = [
											'discount'=>$couponData[0]->amount,
											'title'=>$couponData[0]->title,
											];

									$_SESSION['coupon_data'] = $data ;
									$response['msg']= 'Applied Successfully'; 
									$response['error']= 0;
																	
							}else{
							   
								$response['msg'] = ' Coupon Code Expired';
						     	$response['error']=1;   
							}
						}else{

							$response['msg'] = ' Coupon Code Expired';
						     $response['error']=1;
						}
					}
					else
					{
						$response['msg'] = 'Invalid Coupon Code';
						$response['error']=1;
					}	

				}else{

					    $response['msg'] = 'You Already Use This Coupon Code';
						$response['error']=1;
				} 
			}
			else
			{
				$response['msg'] = 'Invalid Coupon Code';
				$response['error']=1;
			}
		}	


		
		echo json_encode($response);

         die;
	}
	
	
}
