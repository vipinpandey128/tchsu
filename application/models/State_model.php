<?php
class State_model extends CI_Model
{
	protected $table2 = 'tbl_school_courses';
	protected $table3 = 'tbl_board_classes';

	function saverecords($data)
	{
		$this->db->insert($this->table2, $data);
		return true;
	}

	function saveclass($data)
	{
		$this->db->insert($this->table3, $data);
		return true;
	}


	public function get_AllBoard()
	{
		return $this->db->get($this->table2)->result();
	}

	public function get_Board_Classes($postData = array())
	{
		$response = array();
		if (isset($postData['scid'])) {
			$this->db->select('*');
			$this->db->where('SCID', $postData['scid']);
			$records = $this->db->get($this->table3);
			$response = $records->result_array();
		}
		return $response;
	}
}
