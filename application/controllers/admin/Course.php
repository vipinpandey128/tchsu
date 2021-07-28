<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller
{
     function __construct(){

			parent::__construct();

		$admin_id = $this->session->userdata('ADMIN_ID');
	    $this->load->library('upload');
		$this->load->helper('string');
		$this->load->library('image_lib');

		if (empty($admin_id)){redirect('admin');}
		$this->load->library('form_validation');

	}

	public function listing(){

		$data['RESULT'] = $this->course_model->get_all_course();
		$this->load->view('admin/course/listing', $data);

	}

	public function add_new()
	{
		if (isset($_POST['submitform'])){
			$this->form_validation->set_rules('board_refid', 'board', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('tutor_refid', 'Title', 'trim|required');
			$this->form_validation->set_rules('class', 'Class', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			$this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required|is_unique[tbl_courses.url_slug]');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE){

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
							$path = 'uploads/course/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
						}else{
								 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Only jpg jpeg and png format </div>');
								  redirect('admin/course/add_new');
						}

				}

				$subject  = $_POST['subject'] ; 
				$subjectArray = implode(',', $subject) ; 
				$postdata['subject'] = $subjectArray  ; 
				$postdata['qty'] = 100 ; 

				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d H:i:s');

				$this->course_model->save_course($postdata);

				 $insert_id = $this->db->insert_id();
     			if($insert_id){
     			 	 $this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully saved.</div>');
					  redirect('admin/course/listing');
				}else{
					 $this->session->set_flashdata('msg','<div class="alert alert-success">Record has been not saved.Please try again</div>');

		        }


				
			}else{
					  $msg =  "<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>";
					  $this->session->set_flashdata('msg', $msg);

			}
		}
       
		$data['board'] = $this->board_model->get_all_active_board();
		$data['tutor'] = $this->tutor_model->get_all_active_tutor(); 
		$data['subject'] = $this->subject_model->get_all_active_subject(); 
	      
			$this->load->view('admin/course/add', $data);

	}

	public function edit(){
		$args = func_get_args();
		$data['RESULT'] = $this->course_model->get_course_by_id($args[0]);
		if (isset($_POST['submitform']))
			{
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
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
							$path = 'uploads/course/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
						}else{
								 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Only jpg jpeg and png format </div>');
								
						}

					}else{

						$postdata['image'] = $postdata['old_file'];	
					}

					$subject  = $_POST['subject'] ; 
					$subjectArray = implode(',', $subject) ; 
					$postdata['subject'] = $subjectArray  ; 

				
					unset($postdata['submitform']);
					unset($postdata['old_file']);
					$this->course_model->update_course_by_id($args[0], $postdata);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully updated.</div>');
    				redirect('admin/course/listing');
				}
			}

		$data['board'] = $this->board_model->get_all_active_board();
		$data['tutor'] = $this->tutor_model->get_all_active_tutor(); 
			$data['subject'] = $this->subject_model->get_all_active_subject(); 
		$this->load->view('admin/course/edit', $data);

	}

	public function getcourseDetails($value='')
	{
		$courseId = $this->input->post('courseId');
		$data['RESULT'] = $this->course_model->get_course_by_id($courseId);
		$this->load->view('admin/course/view', $data);

	}

	public function editcourseProcess($value='')
	{
		$postdata = $this->input->post();
		$course_id = $postdata['course_id'];
		unset($postdata['submitform']);
		unset($postdata['course_id']);
		$this->course_model->update_course_by_id($course_id, $postdata);
		redirect('admin/course/listing');
	}
	public function add_course_chapter(){

        error_reporting(0) ; 
		$args = func_get_args();
		$data['RESULT'] = $this->course_model->get_course_by_id($args[0]);
		if (isset($_POST['submitform']))
			{
				$postdata = $this->input->post();
			
				$postdata['create_date'] = date('Y-m-d H:i:s');
				unset($postdata['submitform']);	
				$this->course_model->save_course_chapter($postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully Added.</div>');
				redirect('admin/course/add_course_chapter/'.$args[0]);
				
			}
	
		$this->load->view('admin/course/add_course_chapter', $data);

	}

	public function course_chapter($value='')
	{
		   error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_all_course_chapter_by_course_id($args[0]);
		$this->load->view('admin/course/course_chapter', $data);

	}

	public function edit_course_chapter($value=''){
		 error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		if (isset($_POST['submitform']))
			{
				$postdata = $this->input->post();
				
				unset($postdata['submitform']);	
				
				$this->course_model->update_course_chapter_by_id($args[1], $postdata);
			
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully Updated.</div>');
				redirect('admin/course/course_chapter/'.$args[0]);
				
			}
	
		$this->load->view('admin/course/edit_course_chapter', $data);

	}

    public function course_chapter_thumbnail_delete(){

        $id = $_POST['id'];
        $data = $this->course_model->get_course_chapter_by_id($id);
		delete_file('uploads/course/',$data->video);
		$postdata['image'] = '';
		$this->course_model->update_course_chapter_by_id($id, $postdata);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">Image has been successfully deleted.</div>');
		echo 1;
	}

	


	public function image_delete()
	{
	if (count($_POST) && isset($_POST['id']) && !empty($_POST['id']))
		{

		$this->course_model->delete_course_images($_POST['id']);
		delete_file('uploads/course/', $_POST['image']);
		echo 1;
		}
	  else
		{
		echo 0;
		}

	}



	public function test(){

		$this->board_model->get_all_child_board(0);

	}



	public function upload_files() {

	    $post_data = $this->input->post();
	      $arr['error'] = false;
	      $arr['uploaded_data'] = []; 

	         

	        $files = $_FILES;
             $cpt = count($_FILES['image']['name']);
              for($i=0; $i<$cpt; $i++)
			    {           
			        $_FILES['userfile']['name']= time(). "_" .  $files['image']['name'][$i];
			        $_FILES['userfile']['type']= $files['image']['type'][$i];
			        $_FILES['userfile']['tmp_name']= $files['image']['tmp_name'][$i];
			        $_FILES['userfile']['error']= $files['image']['error'][$i];
			        $_FILES['userfile']['size']= $files['image']['size'][$i];   

			      
			        $config['upload_path'] = 'uploads/course/';
		            $config['allowed_types'] = 'jpg|png|jpeg|webp';
			      

			        $this->upload->initialize($config);
			      
			      
			        if ($this->upload->do_upload()) {

				            $arr['uploaded_data'][$i] = $this->upload->data();
				          
				            $this->create_thumbnail($arr['uploaded_data'][$i]);

				          } else {

				              return ['error' => true ,  'msg' => $this->upload->display_errors()];
				          }

			    }

			  

	    return $arr;

	}
	

    public function create_thumbnail($uploaded_data) {

 		
		    $config['image_library'] = 'gd2';
		    $config['source_image'] = $uploaded_data['full_path'];
		    $config['create_thumb'] = TRUE;
		    $config['maintain_ratio'] = false;
		    $config['width']         = 150;
		    $config['height']         = 200;
		    

		    $this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

		    if ( ! $this->image_lib->resize()) {

		      echo '<pre>'; 
		      print_r($this->image_lib->display_errors()); 
		      die;

		    }

	}

	public function prodelete()
	{
		$args = func_get_args();
		$course_data = $this->course_model->get_course_by_id($args[0]);
		$this->course_model->delete_course($args[0]);
	
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/course/listing');
	}

	
	public function add_course_chapter_video($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		if (isset($_POST['submitform']))
		{
				$postdata = $this->input->post();
				$postdata['course_id'] = $args[0];
				$postdata['chapter_id'] = $args[1] ;
				$postdata['type'] = 'Video' ;
				$postdata['unique_id'] = time() ; 
				$postdata['create_date	'] = date('Y-m-d H:i:s');
				unset($postdata['submitform']);	
				$this->db->insert('tbl_courses_file',$postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully Added.</div>');
				redirect('admin/course/add_course_chapter_video/'.$args[0]);
				
		}
	
		$this->load->view('admin/course/add-course-chapter-video', $data);
	}	

	public function all_course_chapter_video($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		$data['course_chapter_video'] = $this->course_model->get_all_course_chapter_session_by_chapter_id($args[1] , 'Video');
	
		$this->load->view('admin/course/course-chapter-video', $data);

	}

	public function edit_course_chapter_video($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		$data['course_chapter_video'] = $this->course_model->get_course_chapter_session_by_id($args[2]);
		if (isset($_POST['submitform']))
		{
				$postdata = $this->input->post();
				; 
				unset($postdata['submitform']);	
				$this->course_model->update_course_chapter_session_by_id($args[2], $postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully Added.</div>');
				redirect('admin/course/all_course_chapter_video/'.$args[0].'/'.$args[0]);
				
		}
		$this->load->view('admin/course/edit-course-chapter-video', $data);
	}


	public function count_course_chapter_video($value='')
	{
		# code...
	}
	

	public function add_course_chapter_documents($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		if (isset($_POST['submitform']))
		{
				$postdata = $this->input->post();
				$postdata['course_id'] = $args[0];
				$postdata['chapter_id'] = $args[1] ;
				$postdata['type'] = 'Documents' ;
				$postdata['unique_id'] = time() ; 
				$postdata['create_date	'] = date('Y-m-d H:i:s');
				 if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
						$allow_ext = array('pdf');
						$file_ext = image_extension($_FILES['image']['name']);
						$file_name ='';
						if(in_array($file_ext,$allow_ext))
						{
							$file_name = create_image_unique($_FILES['image']['name']);
							$tmp_name = $_FILES['image']['tmp_name'];
							$path = 'uploads/course/documents/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['file'] = $file_name;					
						}else{
								 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Only pdf format </div>');
								redirect('admin/course/add_course_chapter_documents/'.$args[0]);
						}

				}


				unset($postdata['submitform']);	
				$this->db->insert('tbl_courses_file',$postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Documents has been successfully Added.</div>');
				redirect('admin/course/course_chapter/'.$args[0]);
				
		}
	
		$this->load->view('admin/course/add-course-chapter-documents', $data);
	}	

	public function all_course_chapter_documents($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		$data['course_chapter_documents'] = $this->course_model->get_all_course_chapter_session_by_chapter_id($args[1] , 'Documents');

	
		$this->load->view('admin/course/course-chapter-documents', $data);

	}

	public function edit_course_chapter_documents($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		$data['course_chapter_documents'] = $this->course_model->get_course_chapter_session_by_id($args[2]);
		if (isset($_POST['submitform']))
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
							$path = 'uploads/course/documents/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['file'] = $file_name;					
						}else{
								 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Pdf format </div>');
								 redirect('admin/course/all_course_chapter_documents/'.$args[0].'/'.$args[0]);
								
						}

					}else{

						$postdata['file'] = $postdata['old_file'];	
						unset($postdata['old_file']);
					}
				unset($postdata['submitform']);	
				$this->course_model->update_course_chapter_session_by_id($args[2], $postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Record has been successfully Updated.</div>');
				redirect('admin/course/all_course_chapter_documents/'.$args[0].'/'.$args[1]);
				
		}
		$this->load->view('admin/course/edit-course-chapter-documents', $data);
	}


	public function count_course_chapter_documents($value='')
	{
		# code...
	}


	public function add_course_chapter_image($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		if (isset($_POST['submitform']))
		{
				$postdata = $this->input->post();
				$postdata['course_id'] = $args[0];
				$postdata['chapter_id'] = $args[1] ;
				$postdata['type'] = 'Image' ;
				$postdata['unique_id'] = time() ; 
				$postdata['create_date	'] = date('Y-m-d H:i:s');
				 if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
				{
						$allow_ext = array('png','jpg','jpeg','JPEG','gif');
						$file_ext = image_extension($_FILES['image']['name']);
						$file_name ='';
						if(in_array($file_ext,$allow_ext))
						{
							$file_name = create_image_unique($_FILES['image']['name']);
							$tmp_name = $_FILES['image']['tmp_name'];
							$path = 'uploads/course/image/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['file'] = $file_name;					
						}else{
								 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Only jpg jpeg and png format </div>');
								redirect('admin/course/add_course_chapter_image/'.$args[0]);
						}

				}


				unset($postdata['submitform']);	
				$this->db->insert('tbl_courses_file',$postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Image has been successfully Added.</div>');
				redirect('admin/course/course_chapter/'.$args[0]);
				
		}
	
		$this->load->view('admin/course/add-course-chapter-image', $data);
	}	

	public function all_course_chapter_image($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		$data['course_chapter_image'] = $this->course_model->get_all_course_chapter_session_by_chapter_id($args[1] , 'Image');
	
		$this->load->view('admin/course/course-chapter-image', $data);

	}

	public function edit_course_chapter_image($value='')
	{
		error_reporting(0) ; 
		$args = func_get_args();
		$data['course'] = $this->course_model->get_course_by_id($args[0]);
		$data['course_chapter'] = $this->course_model->get_course_chapter_by_id($args[1]);
		$data['course_chapter_image'] = $this->course_model->get_course_chapter_session_by_id($args[2]);
		if (isset($_POST['submitform']))
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
							$path = 'uploads/course/image/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['file'] = $file_name;					
						}else{
								 $this->session->set_flashdata('msg','<div class="alert alert-success">Uplaod Image Only jpg jpeg and png format </div>');
								
						}

					}else{

						$postdata['file'] = $postdata['old_file'];	
						unset($postdata['old_file']);
					}
				unset($postdata['submitform']);	
				$this->course_model->update_course_chapter_session_by_id($args[2], $postdata);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Image has been successfully Updated.</div>');
				redirect('admin/course/all_course_chapter_image/'.$args[0].'/'.$args[1]);
				
		}
		$this->load->view('admin/course/edit-course-chapter-image', $data);
	}


	public function count_course_chapter_image($value='')
	{
		# code...
	}

}