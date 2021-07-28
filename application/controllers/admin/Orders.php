<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders  extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id))
		{
			redirect('admin');
		}
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->order_model->get_all_order_data(); 
		$this->load->view('admin/orders/listing',$data);
	}
	
	function view()
	{
		$args = func_get_args();		
		//$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$data['ORDER'] = $this->order_model->get_order_data($args[0]);
		$this->load->view('admin/orders/view',$data);
	}
}