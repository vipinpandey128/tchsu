<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject extends CI_Controller 
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
		
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->subject_model->get_all_subject(); 
		$this->load->view('admin/subject/listing',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{			
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
			
					unset($postdata['submitform']);
						
					$this->subject_model->save_subject($postdata);
					$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				
					redirect('admin/subject/listing');

			}				
		}		
		$this->load->view('admin/subject/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->subject_model->get_subject_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
		
				unset($postdata['submitform']);
			
				$this->subject_model->update_subject_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/subject/listing');
			}	
		}
		$this->load->view('admin/subject/edit',$data);
	}
	
	public function delete_subject()
	{
		$args = func_get_args();
		$subject = $this->subject_model->get_subject_by_id($args[0]);
		$this->subject_model->delete_subject_by_id($args[0]);
	
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/subject/listing');
	}

	
}