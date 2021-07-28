<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_board extends CI_Controller 
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
		$this->load->model('Menu_board_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->Menu_board_model->get_all_board(); 
		$this->load->view('admin/menu_board/listing',$data);
	}
	
	public function listing_chart()
	{
		$data['RESULT'] = $this->Menu_board_model->get_all_chart(); 
		$this->load->view('admin/menu_board/listing_chart',$data);
	}
	
	public function add_new_chart()
	{
	if(isset($_POST['submitform']))
	{ 
		$this->form_validation->set_rules('board_refid', 'board', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
		$postdata = $this->input->post();
		unset($postdata['submitform']);
		$postdata['create_date'] = date('Y-m-d h:i:s');
		$this->Menu_board_model->save_chart($postdata);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully saved.</div>');
		redirect('admin/menu_board/listing_chart');
		}
			
	}
		
		$data['board'] = $this->Menu_board_model->get_all_board();
		$this->load->view('admin/menu_board/add_new_chart',$data);
	}
	public function edit_chart()
	{
		$args = func_get_args();
		//$data['cat'] = $this->board_model->get_all_board();
		$data['RESULT'] = $this->Menu_board_model->get_chart_by_id($args[0]);
		$this->form_validation->set_rules('board_refid', 'board', 'trim|required');
		if(isset($_POST['submitform']))
		{
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				unset($postdata['submitform']);
				$this->Menu_board_model->update_chart_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully updated.</div>');
				redirect('admin/menu_board/listing_chart');
			}
		
		}
	$data['board'] = $this->Menu_board_model->get_all_board(); 
	$this->load->view('admin/menu_board/edit_chart',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{	 $this->form_validation->set_rules('title', 'Title', 'trim|required');
	         // $this->form_validation->set_rules('image', 'Image', 'trim|required');
			  $this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required|is_unique[tbl_board.url_slug]');	
			  $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
			  $this->form_validation->set_rules('status', 'Status', 'trim|required');	
			  $this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			  
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
					$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
						$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/board/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['image'] = $file_name;					
					}
				}
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');				
				$this->Menu_board_model->save_board($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully saved.</div>');
				redirect('admin/menu_board/listing');
			}				
		}		
		$data['board'] = $this->Menu_board_model->get_all_board(); 
		$this->load->view('admin/menu_board/add',$data);
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->Menu_board_model->get_board_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$this->form_validation->set_rules('parent_id', 'Parent board', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required');
			$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
					$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
						$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/board/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['image'] = $file_name;	
						delete_file('uploads/board/',$postdata['old_file']);
					}
				}
				else
				{
					$postdata['image'] = $postdata['old_file'];
				}
				
				
				unset($postdata['submitform']);
				unset($postdata['old_file']);
				$this->Menu_board_model->update_board_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully updated.</div>');
				redirect('admin/menu_board/listing');
			}	
		}
		$data['board'] = $this->Menu_board_model->get_all_board(); 
		$this->load->view('admin/menu_board/edit',$data);
	}	
}