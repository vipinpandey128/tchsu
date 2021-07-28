<?php 
class School extends CI_Model
{
    protected $table = 'tbl_school_courses';
    
	public function get_all_courses()
	{
		return $this->db->get($this->table)->result();
	}
}