<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class course_detail  extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
 
        $this->load->model('course_detail_model');
		
	}


	/*==============             Mapping  Section start here               =========================================*/

	public function index(){

        $data['type'] = $this->Type_model->get_all_data();
         $data['metal'] = $this->Metal_model->get_all_data();
		$this->load->view('admin/course_detail/add',$data);


	}




}