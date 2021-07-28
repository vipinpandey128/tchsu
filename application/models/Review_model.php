<?php 
class Review_model extends CI_Model
{	
	protected $table = 'tbl_review';
	public function save_review($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_review()
	{
	    	$this->db->order_by('id');
		return $this->db->get($this->table)->result();
	}
	public function get_review_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_review_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_review()
	{
		$this->db->where('status',1);
		$this->db->order_by('id' ,'desc');
		return $this->db->get($this->table)->result();
	}
	public function delete_review_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
