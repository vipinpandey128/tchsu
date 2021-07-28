<?php 
class Tutor_model extends CI_Model
{	
	protected $table = 'tbl_tutor';
	public function save_tutor($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_tutor()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_tutor_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_tutor_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_tutor()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_tutor_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
	
	
}
