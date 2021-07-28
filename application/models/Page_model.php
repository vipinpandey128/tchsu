<?php 
class Page_model extends CI_Model
{	
	protected $table = 'tbl_cms';
	/*start forum course model*/
	public function save_data($data)
	{
  
		$this->db->insert($this->table,$data);
	}

     public function get_all_data()
	{
		return $this->db->get($this->table)->result();
	}


	public function get_data_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_data_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	public function delete_data_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}



}
