<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Board_Class extends CI_Controller{

	function index()
	{
	   $this->load->view('front/course/board_class');
    }
    
}