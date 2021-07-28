<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms  extends CI_Controller 
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
		$this->load->model('Cms_model');
	
	}
	

public function add()
	{
		
		if(isset($_POST['submitform']))
		{	
          
			/*$this->form_validation->set_rules('board', 'board', 'trim|required');		
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('image', 'Image', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');*/
		
				$postdata = $this->input->post();

				  //ECHO "pre"; print_R($postdata);die;
				if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
					$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
						$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/slider/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['image'] = $file_name;					
					}
				}
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');				
				$this->Cms_model->save_report($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/cms/listing');
						
		}		
		$this->load->view('admin/cms/add');
	}


	public function listing()
	{
		$data['RESULT'] = $this->cms_model->get_all_report(); 
		$this->load->view('admin/cms/listing',$data);
	}
		
		
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->cms_model->get_report_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{	
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
					$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
						$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/slider/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['image'] = $file_name;	
						//delete_file('uploads/cms/',$postdata['old_file']);
					}
				}
				
				
				unset($postdata['submitform']);
				$this->cms_model->update_report_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/cms/listing');				
			}	
		}
		
		$this->load->view('admin/cms/edit',$data);
	}



		
	
}