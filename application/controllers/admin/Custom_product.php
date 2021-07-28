<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Custom_course extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id)){ redirect('admin'); }
		$this->load->model('custom_courses_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->custom_courses_model->get_all_custom_courses(); 
		$this->load->view('admin/custom_course/listing',$data);
	}
		
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->custom_courses_model->get_custom_courses_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{
				unset($postdata['submitform']);
				if(!empty($_FILES['image']['name']))
				{	
					$image = time().$_FILES['image']['name'];
					$tmp_name = $_FILES['image']['tmp_name'];
					$upload_path= 'uploads/custom_course/'.$image;
					move_uploaded_file($tmp_name,$upload_path);
					$postdata['image'] = $image;
				}
				else
				{
					$postdata['image'] = $_POST['hidden_file'];
				}
				unset($postdata['hidden_file']);
				$this->custom_courses_model->update_custom_courses_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/custom_course/listing');				
			}	
		}
		
		$this->load->view('admin/custom_course/edit',$data);
	}
	
	public function personalize_images()
	{
		if(isset($_POST['submitform']))
		{
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
			{
				$allow_ext = array('png','jpg','jpeg','JPEG','gif');
				foreach($_FILES['image']['name'] as $key => $tmp_file)
				{
					$file_ext = image_extension($_FILES['image']['name'][$key]);
					if(in_array($file_ext,$allow_ext))
					{
						$file_name = create_image_unique($_FILES['image']['name'][$key]);
						$tmp_name = $_FILES['image']['tmp_name'][$key];
						$path = 'uploads/soap/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$img_data['image'] = $file_name;
						$this->custom_courses_model->save_personalize_images($img_data);											
					}
				}
			}
			$this->session->set_flashdata('msg','<div class="alert alert-success">image has been successfully added.</div>');
			redirect('admin/custom_course/personalize_images');
		}
		
		$data['IMAGES'] = $this->custom_courses_model->get_all_personalize_images(); 
		$this->load->view('admin/custom_course/personalize-images',$data);
	}

	function image_delete()
	{
		if(count($_POST) && isset($_POST['id']) && !empty($_POST['id']))
		{
			$this->custom_courses_model->delete_personalize_images($_POST['id']);
			delete_file('uploads/soap/',$_POST['image']);
			echo 1;
		}
		else
		{
			echo 0;
		}	
	}	
}