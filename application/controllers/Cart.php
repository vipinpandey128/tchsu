<?php
class Cart extends CI_Controller{
	function __construct(){
	 	parent::__construct();
	    $this->load->model('board_model');
	    $this->load->library('cart');
	   
      }
	
	function index()
	{
	    
			$data['CARTDATA'] = $this->cart->contents();
		    $this->load->view('front/checkout/cart',$data);
		
	}
			
	function add_to_cart()
	{
		if(isset($_POST) && count($_POST)>0 && !empty($_POST['course_id']))
		{
			$pro_id = $_POST['course_id'];
			$course_data = $this->course_model->get_course_by_id($pro_id);
			 $pricedata= $cartdata =null;
			if(count($course_data)>0)
			{
				$price = (!empty($course_data[0]->special_price))?$course_data[0]->special_price:$course_data[0]->price;	
				$insert_data = array(
					'id'      =>$course_data[0]->id,
			        'qty'     => 1,
			        'price'   => $price,
			        'type' => 'course',
			 		'max_course' => $course_data[0]->qty,
			        'name'    => preg_replace("/[^ \w]+/", "", $course_data[0]->title),
			        'options' => array()
				);
				
				$this->cart->insert($insert_data); 
				 $cart_content = $this->cart->contents();
				 echo count($cart_content);
			}
			else
			{
				echo 0;
			}	
		}
		else 
		{
			echo 0;
		}	
	}


	function add_to_cart_pageload()
	{
		if(isset($_POST) && count($_POST)>0 && !empty($_POST['id']))
		{

		    $pro_id = $_POST['id'];
			if (count($this->cart->contents())>0){
			      foreach ($this->cart->contents() as $item){
			       if ($item['id']==$pro_id){
				       
				         redirect('cart');
				     
				    } 
			      }
		    }

	
			$course_data = $this->course_model->get_course_by_id($pro_id);
			$price = (!empty($course_data[0]->special_price))?$course_data[0]->special_price:$course_data[0]->price;
			if(count($course_data)>0)
			{
				$postdata = $this->input->post() ; 
			    $pricedata= $cartdata =null;
			    $insert_data = array(
				        'id'      =>$course_data[0]->id,
				        'qty'     => 1,
				        'price'   => $price,
				        'type' => 'Course',
				 		'max_course' => $course_data[0]->qty,
				        'name'    => preg_replace("/[^ \w]+/", " ", $course_data[0]->url_slug),
				        'options' => array()
				);
				

				$this->cart->insert($insert_data); 
				$data['CARTDATA'] = $this->cart->contents();
				redirect('cart');
					
			}
			else
			{
				redirect();
			}	
		}	
	}

	function add_to_cart_pageload_session()
	{
		
		if(isset($_POST) && count($_POST)>0 && !empty($_POST['course_session_id']))
		{
			$pro_id = $_POST['course_session_id'] ;
			$course_data = $this->course_model->get_course_session_by_id($pro_id);
			
			if (count($this->cart->contents())>0){
			      foreach ($this->cart->contents() as $item){
			      	if ($item['id']==$course_data[0]->unique_id){
				        if ($item['type']=='Course Session'){
								redirect('cart');
				        }
				    } 
			      }
		    }
			
			$price = (!empty($course_data[0]->special_price))?$course_data[0]->special_price:$course_data[0]->price;
			if(count($course_data)>0)
			{
				$postdata = $this->input->post() ; 
			    $pricedata= $cartdata =null;
			    $insert_data = array(
				        'id'      =>$course_data[0]->unique_id,
				        'qty'     => 1,
				        'price'   => $price,
				        'type' => 'Course Session',
				 		'max_course' => 10,
				        'name'    => preg_replace("/[^ \w]+/", "", $course_data[0]->title),
				        'options' => array()
				);
			
				$this->cart->insert($insert_data); 
				$data['CARTDATA'] = $this->cart->contents();
				redirect('cart');
					
			}
			else
			{
				//redirect();
			}	
		}	
	}
	
	function update()
	{
	 
	    
			if(count($_POST['rowid'])>0)
			{
				foreach($_POST['rowid'] as $key => $value)
				{
					if($_POST['qty'][$key]!="0")
					{	
						$data= array('rowid' =>$_POST['rowid'][$key], 'qty' =>$_POST['qty'][$key]);
						$this->cart->update($data);
					}
				}
			}
			redirect('cart/');
		
	}
	
	function get_custom_options($op_data=array())
	{ 	
		$data = array();
		if(count($op_data)>0)
		{
			foreach($op_data as $main =>$child)
			{
				$main_data = $this->course_model->get_custom_options(0,'parent',$main);			
				$child_data = $this->course_model->get_custom_options($main,'child',$child);
				$data[] = array($main_data[0]->title,$child_data[0]->title,$child_data[0]->price);
			}
		}
		return $data;
		/*foreach($data as $val){echo  $val[0].'-title<br>'.$val[1].'--Rs '.$val[2].'<br>';} */
	}
	
	function get_custom_options_price($op_data)
	{ 	
		$price_data = 0;
		if(count($op_data)>0)
		{
			foreach($op_data as $main =>$child)
			{
				$main_data = $this->course_model->get_custom_options(0,'parent',$main);			
				$child_data = $this->course_model->get_custom_options($main,'child',$child);
				$price_data += $child_data[0]->price;
			}
		}
		return $price_data;
	}
	
	function empty_cart()
	{
		$this->session->unset_userdata('coupon_data'); 				
		$this->cart->destroy();
	
		redirect('welcome');
	}
	function remove_cart_item()
	{   
		$args = func_get_args();
        $data = array('rowid'=> $args[0],'qty'=> 0);
        $this->cart->update($data);
         $this->session->unset_userdata('coupon_data'); 
		redirect('cart');
	}
	

	function apply_coupon()
	{ 
		$msg= 0;
		$this->load->model('coupon_model');		
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id))
		{
			$msg= '<span class="parsley-required">In order to avail the benefits of this promotional / voucher code, please Login/Sign Up</span>';
		}
		else
		{
			if(isset($_POST) && !empty($_POST['coupon_code']))
			{
				$coupon = $_POST['coupon_code'];
				$coupon_data = $this->coupon_model->check_coupon_front($coupon);
				if(count($coupon_data)>0)
				{
					$coupon_data = array('title'=> $coupon_data[0]->title,'code'=> $coupon_data[0]->coupon_code,'discount'=> $coupon_data[0]->discount);
					$this->session->set_userdata('coupon_data',$coupon_data);
					$msg = 1;
				}
				else
				{
					$msg= '<span class="parsley-required rm_msg">this coupon has expired!</span>';
				}	
			}
			else
			{
				$msg= '<span class="parsley-required">Please enter valid coupon code!</span>';
			}
		}	
		echo $msg;
	}




	
	
}
