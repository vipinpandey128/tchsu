<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class board extends CI_Controller 
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
		$data['RESULT'] = $this->board_model->get_all_board(); 
		
		$this->load->view('admin/board/listing',$data);
	}
	
	
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{	 
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
		    $this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required'); 	
			
			$this->form_validation->set_rules('status', 'Status', 'trim|required');	
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			  
			if ($this->form_validation->run() == TRUE)
			{

				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
					$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					$file_name ='';
					if(in_array($file_ext,$allow_ext))
					{

						$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/board/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['image'] = $file_name;					
					}else{

							 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Only jpg jpeg and png format </div>');
							  redirect('admin/board/add_new');
					}

				}

				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');	
         		$this->board_model->save_board($postdata);

     			 $insert_id = $this->db->insert_id();
     			 if($insert_id){
     			 	 $this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully saved.</div>');
					  redirect('admin/board/listing');
				}else{
					 $this->session->set_flashdata('msg','<div class="alert alert-success">Record has been not saved.Please try again</div>');

		        }
			}else{

				$this->session->set_flashdata('msg','<div class="alert alert-danger">'.  validation_errors()  .'</div>');
			}					
		}		
		$data['board'] = $this->board_model->get_all_board(); 
		$this->load->view('admin/board/add',$data);
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->board_model->get_board_by_id($args[0]); 

	
		if(isset($_POST['submitform']))
		{
			$this->form_validation->set_rules('parent_id', 'Parent board', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
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
					    $var=	move_uploaded_file($tmp_name,$path);
						 $_FILES['image']['name'] = $file_name;	
					
					}
				}
				else
				{
					$_FILES['image']['name'] = $_POST['old_file'];
				}

				$postdata['image'] = $_FILES['image']['name'];		
				unset($postdata['submitform']);
				unset($postdata['old_file']);
			    $postdata['create_date'] = date('Y-m-d h:i:s');	
                $this->board_model->update_board_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully updated.</div>');
				redirect('admin/board/listing');
			}	
		}
		 
		$data['board'] = $this->board_model->get_all_board(); 
		$this->load->view('admin/board/edit',$data);
	}	
}