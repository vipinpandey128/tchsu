<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Catalogues extends CI_Controller 
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
		$this->load->library('upload');
		 $this->load->library('image_lib');
		$this->load->model('catalogues_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->catalogues_model->get_all_catalogues(); 
		$this->load->view('admin/catalogues/listing',$data);
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
				$upload_files = $this->upload_files();

				if( $upload_files['error']){

					
					$this->session->set_flashdata('msg','<div class="alert alert-success">'. $upload_files['msg'].'</div>');
			
				    
				}else{

					$postdata['image'] =  $upload_files['uploaded_data']['image']['file_name'];
					unset($postdata['submitform']);
					$postdata['create_date'] = date('Y-m-d h:i:s');		
					$this->catalogues_model->save_catalogues($postdata);
					$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				
					redirect('admin/catalogues/listing');

				}
				
			}				
		}		
		$this->load->view('admin/catalogues/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->catalogues_model->get_catalogues_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
					$upload_files = $this->upload_files();

					if( $upload_files['error']){
					    $this->session->set_flashdata('msg','<div class="alert alert-success">'. $upload_files['msg'].'</div>');
					     redirect('admin/catalogues/edit/'.$args[0]);

				    
					}else{
						$postdata['image'] =  $upload_files['uploaded_data']['image']['file_name'];
					}
				
				}
				else
				{
					$postdata['image'] = $postdata['old_file'];
				}
				unset($postdata['submitform']);
				unset($postdata['old_file']);
				$this->catalogues_model->update_catalogues_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/catalogues/listing');
			}	
		}
		$this->load->view('admin/catalogues/edit',$data);
	}
	
	public function delete_catalogues()
	{
		$args = func_get_args();
		$catalogues = $this->catalogues_model->get_catalogues_by_id($args[0]);
		$this->catalogues_model->delete_catalogues_by_id($args[0]);
		delete_file('uploads/catalogues/',$catalogues[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/catalogues/listing');
	}

	public function upload_files() {

	    $post_data = $this->input->post();
	      $arr['error'] = false;
	      $arr['uploaded_data'] = []; 



	      foreach ($_FILES as $key => $value) {
	          if ( ! $value['name']) {
	            continue;
	          }

	          $config['upload_path'] = 'uploads/catalogues/';
	          $config['allowed_types'] = 'jpg|png|jpeg|pdf|PDF|docx|DOCX|xlsx|XLSX';
	          $config['file_name'] = time(). "_" . $value['name'];
	          $config['max_width']            = 2000;
	          $config['max_height']           = 900;
	          $config['image_height']           = 1000;
	          $config['image_width']           = 500;

	          $this->upload->initialize($config);
	         

	          if ($this->upload->do_upload($key)) {

	            $arr['uploaded_data'][$key] = $this->upload->data();
	          

	          } else {

	              return ['error' => true , 'file_name' => $key, 'msg' => $this->upload->display_errors()];
	          	
	           
	          }
	    } 



	    return $arr;

	}
	

    public function create_thumbnail($uploaded_data) {

 		
		    $config['image_library'] = 'gd2';
		    $config['source_image'] = $uploaded_data['full_path'];
		    $config['create_thumb'] = TRUE;
		    $config['maintain_ratio'] = false;
		    $config['width']         = 200;
		    $config['height']         = 300;
		    

		    $this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

		    if ( ! $this->image_lib->resize()) {

		      echo '<pre>'; 
		      print_r($this->image_lib->display_errors()); 
		      die;

		    }

	}
}