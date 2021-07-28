<?php 
class offers_model extends CI_Model
{	
	protected $table = 'tbl_offers';
	public function add_offers_board($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_offers_board()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_offers_board_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_offers_board_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	
	
	public function delete_offers_board_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}

}
