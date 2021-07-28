<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tutor extends CI_Controller 
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
		$this->load->model('tutor_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->tutor_model->get_all_tutor(); 
		$this->load->view('admin/tutor/listing',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{			
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();

				if(isset($_FILES['profile_pic']['name']) && !empty($_FILES['profile_pic']['name']))
				{
						$upload_files = $this->upload_files();

						if( $upload_files['error']){
							$this->session->set_flashdata('msg','<div class="alert alert-success">'. $upload_files['msg'].'</div>');
							redirect('admin/tutor/add_new');
						}else{
							$postdata['profile_pic'] =  $upload_files['uploaded_data']['profile_pic']['file_name'];
						}
				}
			
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d H:i:s');		
				$this->tutor_model->save_tutor($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
			
			    redirect('admin/tutor/listing');

				
			}else{

				$this->session->set_flashdata('msg','<div class="alert alert-danger">'.  validation_errors()  .'</div>');
			}				
		}		
		$this->load->view('admin/tutor/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->tutor_model->get_tutor_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['profile_pic']['name']) && !empty($_FILES['profile_pic']['name']))
				{
						$upload_files = $this->upload_files();

						if( $upload_files['error']){
							$this->session->set_flashdata('msg','<div class="alert alert-success">'. $upload_files['msg'].'</div>');
							 redirect('admin/tutor/edit/'.$args[0]);
						}else{
							$postdata['profile_pic'] =  $upload_files['uploaded_data']['profile_pic']['file_name'];
						}
				}else
				{
					$postdata['profile_pic'] = $postdata['old_file'];
				}

				unset($postdata['submitform']);
				unset($postdata['old_file']);
				
				$this->tutor_model->update_tutor_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/tutor/listing');
			}	
		}
		$this->load->view('admin/tutor/edit',$data);
	}
	
	public function delete_tutor()
	{
		$args = func_get_args();
		$tutor = $this->tutor_model->get_tutor_by_id($args[0]);
		$this->tutor_model->delete_tutor_by_id($args[0]);
		delete_file('uploads/tutor/',$tutor[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/tutor/listing');
	}

	public function upload_files() {

	    $post_data = $this->input->post();
	      $arr['error'] = false;
	      $arr['uploaded_data'] = []; 



	      foreach ($_FILES as $key => $value) {
	          if ( ! $value['name']) {
	            continue;
	          }

	          $config['upload_path'] = 'uploads/tutor/';
	          $config['allowed_types'] = 'jpg|png|jpeg';
	          $config['file_name'] = time(). "_" . $value['name'];
	          $config['max_width']            = 600;
	          $config['max_height']           = 600;
	         
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