<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class School_Course extends CI_Controller{

	function index()
	{
	   $this->load->view('front/course/school_course');
    }
    
}