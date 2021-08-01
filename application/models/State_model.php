<?php
class State_model extends CI_Model 
{
	protected $table2 = 'tbl_school_courses';
	protected $table3 = 'tbl_board_classes';

	function saverecords($data)
	{
        $this->db->insert($this->table2,$data);
        return true;
	}

	function saveclass($data)
	{
		$this->db->insert($this->table3,$data);
        return true;
	}


	public function get_AllBoard()
	{
		return $this->db->get($this->table2)->result();
	}

	
}