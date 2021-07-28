<?php 
class Subject_model extends CI_Model
{	
	protected $table = 'tbl_subject';
	public function save_subject($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_subject()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_subject_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_subject_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_subject()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_subject_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
