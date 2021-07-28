<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller
{

    function __construct(){
	 	 parent::__construct();
		$this->load->library('upload');
	 	
	}


	public function index($parent = 0)
	{	 
	  
		$data['latest_course'] = $this->course_model->get_all_latest_course_home(9);
	    $data['review'] = $this->review_model->get_all_active_review();
	   	$data['RESULT'] = $this->cms_model->get_cms_by_id(14);
	    $this->load->view('front/home',$data);
	}



	function return_policy()
	{
		$data['RESULT'] = $this->cms_model->get_cms_by_id(12);
		$this->load->view('front/return',$data);

	}

	function privacy_policy()
	{
		$data['RESULT'] = $this->cms_model->get_cms_by_id(3);
		$this->load->view('front/privacy-policy',$data);

	}
	function terms_conditions()
	{
		$data['RESULT'] = $this->cms_model->get_cms_by_id(11);
		$this->load->view('front/terms-conditions',$data);

	}



	public function error404()
    {
        
       
        $this->load->view('404');
       
    }

    public function tutorDetails($value='')
    {
    	 $uri2 = $this->uri->segment(2);
		 $url =     explode('.',$uri2);
		 $data['tutor'] = $this->tutor_model->get_tutor_by_id($url[0]);
		 $this->load->view('front/tutor/tutor-details',$data);
    }

    public function UpdateCourseStatus($value='')
    {
    	$date_time = date('Y-m-d') ; 
    	$array = $this->db->get_where('tbl_order_item' , array('course_expiry_date' => $date_time,'course_status' =>'Active' ))->result() ;
    	foreach ($array as $key => $value) {
    	  
    	  $updateData['course_status'] = 'Expired';
    	  $this->db->where('id' , $value->id ) ; 
    	  $this->db->update('tbl_order_item' , $updateData) ; 
    	}
    
    }

}

