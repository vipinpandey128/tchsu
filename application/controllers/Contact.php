<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller{
	
	function index()
	{
	    error_reporting(0);
		if(isset($_POST['submit']))
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
		        if($responseKeys["success"]) {
		            
		            
		 
                     $name = $this->input->post('name'); 
            		 $to_email = $this->input->post('email');
            		 $mobile = $this->input->post('mobile');
            		 $messages = $this->input->post('message');
                
                    $postdata = $this->input->post() ; 
                    unset($postdata['submit']);
                    unset($postdata['g-recaptcha-response']);
                    $postdata['create_date']= date('Y-m-d H:i:s') ;
            		 
            		
               
                     //Load email library 
                     $this->load->library('email'); 
               
                     	$this->email->to(trim(INFOMAIL));
            	    $this->email->from(FROM_EMAIL,WEBSITE_TITLE);
            		 $this->email->set_mailtype("html");
                     $this->email->subject('Contact Us'); 
            		 
            		  $message = '<html><body>';
            			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            			$message .= "<tr style='background: #eee;'><td colspan='2'>Contact Us</td></tr>";
            			$message .= "<tr><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
            			$message .= "<tr><td><strong>Email:</strong> </td><td>" . $to_email . "</td></tr>";
            			$message .= "<tr><td><strong>Mobile:</strong> </td><td>" . $mobile . "</td></tr>";
            			$message .= "<tr><td><strong>Message:</strong> </td><td>" . $messages . "</td></tr>";
            			$message .= "</table>";
            			$message .= "</body></html>";
                       $this->email->message($message); 
                      $this->email->send();
                     
                     //Send mail 
                     if( $this->db->insert('tbl_mail_info', $postdata )) 
            		 
            		 $this->session->set_flashdata('msg','<div class="alert alert-success">Email sent successfully.</div>');
                    // $this->session->set_flashdata("email_sent","Email sent successfully."); 
                     else 
                     $this->session->set_flashdata("email_sent","Error in sending Email."); 
                     $this->load->view('front/contact'); 
                     
                     
                     redirect('contact#form');
                     
		        } else {


		        		$this->session->set_flashdata('msg','<div class="alert alert-danger">You are spammer !  Captcha Validation Required!</div>');
		             
		        }
            		
        }
	

	$this->load->view('front/contact');
	
		}


   
}
