<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id))
		{
			redirect('admin');
		}
		$this->load->library('form_validation');
		$this->load->model('setting_model');
	}
	public function listing()

	{

		$data['RESULT'] = $this->setting_model->get_all_setting(); 

		$this->load->view('admin/setting/listing',$data);

	}

	

	public function edit()

	{

		$args = func_get_args();

		$data['RESULT'] = $this->setting_model->get_slider_by_id($args[0]); 

		

		if(isset($_POST['submitform']))
		{
			
			

			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required');
			$this->form_validation->set_rules('address_content', 'Address Content', 'trim|required');
			$this->form_validation->set_rules('copyright', 'Copyright', 'trim|required');

			$this->form_validation->set_rules('about_content', 'About Content', 'trim|required');
			$this->form_validation->set_rules('facebook_link', 'facebook link', 'trim|required');
			$this->form_validation->set_rules('twitter_link', 'twitter link', 'trim|required');
			$this->form_validation->set_rules('linkedin_link', 'linkedin link', 'trim|required');
			$this->form_validation->set_rules('google_link', 'google link', 'trim|required');
			$this->form_validation->set_rules('youtube_link', 'youtube link', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty ($_FILES['image']['name']))
				{
				$allow_ext = array('png','jpg','jpeg','JPEG','gif');
				$file_ext = image_extension($_FILES['image']['name']);
				if(in_array($file_ext,$allow_ext))
				{
						$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['logo'] = $file_name;					
				}
					
					
				}
				unset($postdata['submitform']);

				unset($postdata['old_file']);

				$this->setting_model->update_slider_by_id($args[0],$postdata);

				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');

				redirect('admin/setting/listing');

			}	

		}

		$this->load->view('admin/setting/edit',$data);

	}

	

	
	

}