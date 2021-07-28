<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function register()
	{
	    error_reporting(0);
		$user_id = $this->session->userdata('USER_ID');
		if(!empty($user_id))
		{
			redirect('user/profile');
		}
		
		if(isset($_POST['register']))
		{	

			    if(isset($_POST['g-recaptcha-response'])){

		          $captcha=$_POST['g-recaptcha-response'];
		        }
		        if(!$captcha){

		          $this->session->set_flashdata('msg','<div class="alert alert-danger">Please check the the captcha form</div>');
		        }

		        $secretKey = "6LeTVfMUAAAAAHcr1ehfypVchoYiEaPM3z9y1dWA";
		        $ip = $_SERVER['REMOTE_ADDR'];
		        // post request to server
		        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
		        $response = file_get_contents($url);
		        $responseKeys = json_decode($response,true);
		        // should return JSON with success as true
		        $responseKeys["success"] = 1 ; 
		        if($responseKeys["success"]) {

			        	$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
				
						$this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[tbl_users.email]',array(
			                'required'      => 'You have not provided %s.',
			                'is_unique'     => 'Email Address already Exists or his Email has already an account with Smartway.'
			                )  );
						$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
						$this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]');
						$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
						if ($this->form_validation->run() == TRUE)
						{	
						unset($_POST['register']);
						unset($_POST['confirm_password']);
						$token = sha1(time().$_POST['email']);					
						$_POST['password'] = base64_encode($_POST['password']);
						$_POST['status'] = '1';
						$_POST['email_verify'] = '0';
						$_POST['activate_token'] = $token;
						$_POST['create_date'] = date('Y-m-d h:i:s');
						unset($_POST['checkbox']);
						unset($_POST['g-recaptcha-response']);
						$user_id = $this->user_model->insert_user($_POST);
							
						 $this->load->library('email');	
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n");				
						$htmlContent = 'Thanks for signing up!<br>
										Your account has been created, you can login with the following credentials<br>
										<strong>Email: </strong>'.$_POST['email'].'<br><strong>Password: </strong>'.base64_decode($_POST['password']).'<br><br>
										Please click this link to Verify your account email: <a href='.base_url('user/verifyemail/'.$token).'>Click Here</a> or <br> '.base_url('user/verifyemail/'.$token).'<br><br><br>Thanks<br>Smartway Lighting & Team';
						$this->email->to(trim($_POST['email']));
						$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
						$this->email->subject('Smart Way :: Confirm your Account email!');
						$this->email->message($htmlContent);				
						//Send email
						$this->email->send(); 
							
						$this->session->set_flashdata('msg','<div class="alert alert-success">Your Account is created, Please check your email inbox,spam and approve your account</div>');
						redirect('user/login');	
				
						}else{

							$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
						}

		        } else {


		        		$this->session->set_flashdata('msg','<div class="alert alert-danger">You are spammer !  Captcha Validation Required!</div>');
		             
		        }


			
		}
		$this->load->view('front/user/register');
	}
	
	function login()
	{

		$user_id = $this->session->userdata('USER_ID');
		if(!empty($user_id))
		{
			if(count($this->cart->contents()) > 0){ redirect('cart'); }
			redirect('user/profile');
		}
		
		if(isset($_GET['redirect']) && !empty($_GET['redirect']))
		{
			$redirect_url = $_GET['redirect'];
		}else
		{
			$redirect_url = '';
		}
		
		if(isset($_POST['login']))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if(empty($email) || empty($password))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid login credentials</div>');
				redirect('user/login?redirect='.$redirect_url);	
			}
			else
			{
				$rows = $this->user_model->user_login($email,base64_encode($password));
				if(count($rows)>0)
				{
					if($rows[0]->status==1)
					{
						$admin_data = array('USER_ID'=>$rows[0]->id,'USER_NAME'=>$rows[0]->fname.' '.$rows[0]->lname,'USER_EMAIL'=>$rows[0]->email,'USER_ABOUT'=>$rows[0]->about ,'USER_IMAGE' =>$rows[0]->image);
						$this->session->set_userdata($admin_data);						
						if(!empty($redirect_url))
						{
							redirect($redirect_url);
						}
						else
						{
							if(count($this->cart->contents()) > 0){ redirect('cart'); }
							redirect('user/profile');
						}
					}
					else
					{
						$this->session->set_flashdata('msg','<div class="alert alert-warning">this account is inactive.</div>');
						redirect('user/login?redirect='.$redirect_url);	
					}	
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid login credentials</div>');
					redirect('user/login?redirect='.$redirect_url);		
				}			
			}
		}
		
		
		$this->load->view('front/user/login');
	}
	
	function logout()
	{
		$this->session->unset_userdata('USER_ID');
		$this->session->unset_userdata('USER_EMAIL');
		$this->session->unset_userdata('USER_NAME');
		//$this->session->sess_destroy();
		redirect('user/login');
	}
	
	function verifyemail()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$rows = $this->user_model->get_user_by_email_activate_token($args[0]);
			if(count($rows)==1)
			{
				$user_id = $rows[0]->id;
				$upd_data['status'] = '1';
				$upd_data['email_verify'] = '1';				
				$upd_data['activate_token'] = '';
				$this->user_model->update_user($user_id,$upd_data);
				$this->session->set_flashdata('msg','<div class="alert alert-success">your account has been activated successfully.</div>');
				redirect('user/login');
			}else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
				redirect('user/login');
			}	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
			redirect('user/login');
		}	
	}
	
	public function forgot_password()
	{

		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		$user_id = $this->session->userdata('USER_ID');
		if(!empty($user_id))
		{
			redirect('user/profile');
		}
		if(isset($_POST['forgot_password']))
		{
			$email = $this->input->post('email');
			if(empty($email))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Please enter a valid email.</div>');
				redirect('user/forgot_password');
			}
			else
			{
				$user_data = $this->user_model->check_email($email);
				if(count($user_data)==0)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Email does not matched</div>');
					redirect('user/forgot_password');
				}	
				else
				{
					$user_id = $user_data[0]->id;
					$token = sha1($user_id.time().$_POST['email']);
					$upd_data['forgot_token'] = $token;
					$this->user_model->update_user($user_id,$upd_data);
				     
			       $this->load->library('email');
                   $this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");				
					//Email content
					echo $htmlContent = 'Dear '. $user_data[0]->fname.' '.$user_data[0]->lname .',
								<br>Please click bellow link to reset your password. <a href='.base_url('user/reset_password/'.$token).'>Click Here</a> 
								or If you are not able to access the above link, copy & paste the entire url in your browser address bar and press enter.
								<br> '.base_url('user/reset_password/'.$token).'<br><br><br>Thanks<br> Team Smartway';
					$this->email->to(trim($_POST['email']));
					$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
					$this->email->subject('Reset your Account Password!');
					$this->email->message($htmlContent);
				    $sendmail = 	$this->email->send();
				
					if($sendmail){

						echo "string";

						$this->session->set_flashdata('msg','<div class="alert alert-success">Please check your inbox/spam for an email we just sent you with instructions for how to reset your password</div>');
					}else{
						echo "false";
						
					     

						$this->session->set_flashdata('msg','<div class="alert alert-success">Error ,Please Try Again !!! </div>');
					}

			
					
					redirect('user/forgot_password');					
				}
			}	
		}	

		$this->load->view('front/user/forgot-password');
	}
	
	function reset_password()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$rows = $this->user_model->get_user_by_forgot_password_token($args[0]);
			if(count($rows)==1)
			{
				if(isset($_POST['reset_password']))
				{	
					$npwd = $this->input->post('npwd');
					$opwd = $this->input->post('cpwd');
					if(empty($npwd) || empty($opwd))
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">please fill all field.</div>');
						redirect('user/reset_password/'.$args[0]);
					}
					else
					{
						if($npwd!=$npwd)
						{
							$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and Confirm password not matched.</div>');
							redirect('user/reset_password/'.$args[0]);
						}
						else
						{
							$user_id = $rows[0]->id;
							$upd_data['forgot_token'] = '';
							$upd_data['password'] = base64_encode($npwd);
							$this->user_model->update_user($user_id,$upd_data);				
							$this->session->set_flashdata('msg','<div class="alert alert-success">your password has been changed successfully</div>');
							
						
							redirect('user/login');
						}	
						
					}	
				}
				$this->load->view('front/user/reset-password');
			}else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
				redirect('user/login');
			}	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
			redirect('user/login');
		}
	}
	
	public function profile()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$data['order'] = $order = $this->order_model->get_user_course($user_id);
		$this->load->view('front/account/profile',$data);
	}
	function edit_profile()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }		
		
		if(isset($_POST['updateprofile']))
		{
			$post_data = $this->input->post();
			unset($post_data['updateprofile']);
			$this->user_model->update_user($user_id,$post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Your profile has been updated successfully</div>');
			redirect('user/edit_profile');
		}	
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$this->load->view('front/account/edit_profile',$data);
	}
	
	public function change_password()
	{

		
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		
		if(isset($_POST['changepass']))
		{
			$post_data = $this->input->post();
			if(empty($post_data['opwd']) || empty($post_data['npwd']) || empty($post_data['cpwd']))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Please fill all field</div>');
				redirect('user/change_password');
			}
			else
			{
				if($post_data['opwd']==base64_decode($post_data['form_key']))
				{
					if($post_data['npwd']==$post_data['cpwd'])
					{
						unset($post_data['opwd']);
						unset($post_data['cpwd']);
						unset($post_data['form_key']);
						$post_data['password']= base64_encode($post_data['npwd']);
						unset($post_data['changepass']);
						unset($post_data['npwd']);						
						$this->user_model->update_user($user_id,$post_data);
						$this->session->set_flashdata('msg','<div class="alert alert-success">Your password has been changed successfully</div>');
						redirect('user/change_password');
						
					}
                    else
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and Confirm password not matched.</div>');
						redirect('user/change_password');
					}	
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Old password not matched.</div>');
					redirect('user/change_password');
				}				
			}			
		}	
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$this->load->view('front/account/change_password',$data);
	}
	
	public function profile_picture()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		
		$login_user_data = $this->user_model->get_user_by_id($user_id);
		if(isset($_POST['uploadpicture']))
		{


			if(empty($_FILES['picture']['name']))
			{


				$this->session->set_flashdata('msg','<div class="alert alert-danger">please choose valid image.</div>');
				redirect('user/profile_picture');
			}
			else
			{
				//print_R($_FILES);die;
				$allow_ext = array('png','jpg','jpeg','JPEG','gif');
				$file_ext = image_extension($_FILES['picture']['name']);
				if(in_array($file_ext,$allow_ext))
				{
					$file_name = create_image_unique($_FILES['picture']['name']);
					$tmp_name = $_FILES['picture']['tmp_name'];
					$path = 'uploads/profile_pic/'.$file_name;
					move_uploaded_file($tmp_name,$path);
					$upd_data['image'] = $file_name;						
					$this->user_model->update_user($user_id,$upd_data);
					delete_file('uploads/profile_pic/',$login_user_data[0]->image);
					$this->session->set_flashdata('msg','<div class="alert alert-success">Profile image has been change.</div>');
					redirect('user/profile_picture');
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid image format.</div>');
					redirect('user/profile_picture');
				}
			}	
		}
		
		$data['RESULT']  = $login_user_data;
		$this->load->view('front/account/change_avatar',$data);
	}
	
	function my_orders()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$data['ORDER']  = $this->order_model->get_user_order($user_id);
		$this->load->view('front/account/my_orders',$data);
	}
	
	function view_order()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		$args = func_get_args();
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$data['ORDER'] = $this->order_model->get_order_data($args[0]);

		//print_R($data['ORDER']);
		$this->load->view('front/account/view_order',$data);
	}
	
	function my_wishlist()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$data['WISHLIST']  = $this->course_model->get_wishlist_data($user_id);		
		$this->load->view('front/account/my_wishlist',$data);
	}
	
	public function remove_wishlist()
	{
		$args = func_get_args();
		$this->course_model->delete_wishlist($args[0]);
		redirect('user/my_wishlist');
	}
	
	public function test()
	{
		//create_image_unique('NGYRF.png');
		echo check_profile_pic('uploads/user/','3115209376139.png');
	}

	public function your_course($value='')
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		$args = func_get_args();
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$data['order'] = $order = $this->order_model->get_user_course($user_id);
		$this->load->view('front/account/your-course',$data);
	}

	public function chapter($value='')
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		$args = func_get_args();
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$course_data = $this->course_model->get_course_by_urlslug($this->uri->segment(3));
		if(!$course_data){
		    
			redirect('404');
		}

		$check = $this->checkUserCourse($course_data[0]->id) ; 
		if($check == 0 ){
		    
			redirect('404');
		}

		$board_refid = $course_data[0]->board_refid;
		$data['course'] = $course_data;
		$data['course_board'] = $this->course_model->get_course_by_board_id($board_refid, 10); 
	
		$this->load->view('front/account/course-details',$data);

	}
	
	public function chapter_details($value='')
	{
		$user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('user/login'); }
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);

		$course_data = $this->course_model->get_course_chapter_by_unique_id($this->uri->segment(3));
		if(!$course_data){
		    
			redirect('404');
		}
		$check = $this->checkUserCourse($course_data[0]->id) ; 
		if($check == 0 ){
		    
			redirect('404');
		}

		$board_refid = $course_data[0]->board_refid;
		$chapter_data = $this->course_model->get_all_course_chapter_by_course_id($course_data[0]->id);
		$data['course'] = $course_data;
		$data['course_chapter'] = $chapter_data;

		$data['course_board'] = $this->course_model->get_course_by_board_id($board_refid, 10); 
	
		$this->load->view('front/account/course-chapter-details',$data);

	}

	public function checkUserCourse($course_id='')
	{
			$user_id = $this->session->userdata('USER_ID');
			$count = $this->db->get_where('tbl_order_item' , array('user_id' =>$user_id  ,'pro_id' =>$course_id ,'course_status' => 'Active' ))->num_rows() ;

			return $count ;
	}
}
