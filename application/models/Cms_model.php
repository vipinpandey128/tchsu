<?php 
class Cms_model extends CI_Model
{	
    protected $table1 = 'tbl_school_courses';
    protected $table = 'tbl_cms';
    protected $table2 = 'tbl_board_classes';
    protected $table3 = 'tbl_board_classes_title';
    protected $table4 = 'tbl_subject_menu';
    protected $table5 = 'tbl_learning_report_submenuitem';
    protected $table6 = 'tbl_learning_report_submenu';
	protected $table7 = 'tbl_sub_menu';
    
    ///geting sub menu for learning report
    
    public function get_submenu_learningrp($id)
	{
		return $this->db->get($this->table6)->result();
	}
    
    function get_subject_menu($postData=array())
	{
		$response = array();
		if(isset($postData['sbid'])){
 
			// Select record
			// $this->db->where('SBMID', $postData['sbmid']);
			// $records = $this->db->get($this->table7)->result();
			// $response = $records->result_array();
			  // Select record
			  $this->db->select('*');
			  $this->db->where('SBID', $postData['sbid']);
			  $records = $this->db->get('tbl_sub_menu');
			  $response = $records->result_array();
	   
		  }
		  return $response;
	}

    public function get_all_courses()
	{
		return $this->db->get($this->table1)->result();
	}
	
	public function get_board_class($id)
	{
		$this->db->where('SCID',$id);
		return $this->db->get($this->table2)->result();
	}
	
	public function get_class_subject($id)
	{
		$this->db->where('BCID',$id);
		return $this->db->get($this->table4)->result();
	}
	
	public function get_learning_report($id)
	{
		return $this->db->get($this->table5)->result();
	}
	
	public function get_board_class_title($id)
	{
		$this->db->where('SCID',$id);
		return $this->db->get($this->table3)->result();
	}
	
	
	public function add_deal($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_cms()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_cms_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_cms_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	public function get_all_active_cms()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}	



	/*===========Benefites Report ADMIN=======*/
	public function save_report($data)
	{
		$this->db->insert('tbl_benefits_report',$data);
	}

	public function get_all_report()
	{
		$this->db->where('status',1);
		return $this->db->get('tbl_benefits_report')->result();
	}
	public function get_report_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('tbl_benefits_report')->result();
	}
	public function update_report_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_benefits_report',$data);
	}
     
     /*===========Benefites Report FRONT=======*/
     	public function get_all_active_report()
	{
		$this->db->where('status',1);
		$this->db->where('board',1);
		return $this->db->get('tbl_benefits_report')->result();

	}
	public function get_all_active_report_vastu()
	{
		$this->db->where('status','1');
		$this->db->where('board','2');
		return $this->db->get('tbl_benefits_report')->result();

	}
	public function get_all_active_report_numerology()
	{
		$this->db->where('status',1);
		$this->db->where('board',3);
		return $this->db->get('tbl_benefits_report')->result();

	}
	public function get_all_active_report_sadna()
	{
		$this->db->where('status',1);
		$this->db->where('board',4);
		return $this->db->get('tbl_benefits_report')->result();

	}
     
    

}
