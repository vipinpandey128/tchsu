<?php 
class Custom_courses_model extends CI_Model
{	
	protected $table = 'tbl_custom_courses';
	public function get_all_custom_courses()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_custom_courses_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_custom_courses_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_custom_courses()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	
	
	public function get_all_personalize_images()
	{
		return $this->db->get('tbl_custom_soap_images')->result();
	}
	public function save_personalize_images($data)
	{
		$this->db->insert('tbl_custom_soap_images',$data);
	}	
	function delete_personalize_images($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_custom_soap_images');
	}
}
