<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Board_Class extends CI_Controller{
	public function __construct(){
		parent::__construct();
	
		// Load Model
		$this->load->model('Cms_model');
	
		// Load base_url
		$this->load->helper('url');
	  }
	function index()
	{
	   $this->load->view('front/course/board_class');
    }

	public function subjectMenu(){
		// Get data
		$postData = $this->input->post();
	
		// get data
		$data = $this->Cms_model->get_subject_menu($postData);
	
		echo json_encode($data);
	  }

	  public function subjectItem(){
		// Get data
		$postData = $this->input->post();
	
		// get data
		$data = $this->Cms_model->get_subject_item($postData);
	
		echo json_encode($data);
	  }
    
}