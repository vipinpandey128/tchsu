<?php 
class Slider_model extends CI_Model
{	
	protected $table = 'tbl_slider';
	public function save_slider($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_slider()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_slider_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_slider_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_slider()
	{
		$this->db->where('status',1);
		$this->db->where('type','Slider');
		return $this->db->get($this->table)->result();
	}
	public function delete_slider_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
	
	public function get_all_active_banner()
	{
		$this->db->where('status',1);
		$this->db->where('type','Banner');
		return $this->db->get($this->table)->result();
	}
}
