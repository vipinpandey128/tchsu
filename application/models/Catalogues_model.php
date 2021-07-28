<?php 
class Catalogues_model extends CI_Model
{	
	protected $table = 'tbl_catalogues';
	public function save_catalogues($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_catalogues()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_catalogues_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_catalogues_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_catalogues()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_catalogues_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
