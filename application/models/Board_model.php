<?php 
class Board_model extends CI_Model
{	
	protected $table = 'tbl_board';
	/*start forum board model*/
	public function get_board_by_urlslug($key)
	{
		$this->db->where('url_slug',$key);
		return $this->db->get($this->table)->result();
	}
	
	public function save_board($data)
	{
		$this->db->insert($this->table,$data);


	}
	

    /*----------------------------   MAPPING QUERY START HERE  ----------------------------------*/


    /*----------------------------   MAPPING QUERY END HERE  ----------------------------------*/

	public function get_all_board()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_board_by_id($id)
	{
	   
		$this->db->where('id',$id);
		return $this->db->get('tbl_board')->result();
	}
	public function update_board_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_board()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	
	public function get_board_by_parent($id,$limit=0)
	{
		$this->db->where('home_display','1');
		$this->db->where('status','1');
		$this->db->where('parent_id',$id);
		if($limit){
			$this->db->order_by($limit);	
		}
		return $this->db->get($this->table)->result();
	}
	public function get_board_by_parent_menu($id)
	{
		$this->db->where('home_display','0');
		$this->db->where('status','1');
		$this->db->where('parent_id',$id);
		return $this->db->get($this->table)->result();
	}


	public function get_courseboard_by_parent()
	{
		$this->db->where('status',1);
		$this->db->where('parent_id !=','0');
		return $this->db->get('tbl_menu_board')->result();
	}

		public function get_board_by_child($id)
	{
		$this->db->where('status',1);
		$this->db->where('parent_id',$id);
		return $this->db->get($this->table)->result();
	}
	
	
	function get_all_child_board_with_count_course($parent_id)
	{
		$this->db->select('board.id, board.title, board.url_slug, count(course.id) as courses');
		$this->db->from($this->table.' as board');
		$this->db->join('tbl_courses as course','course.board_refid = board.id','left');
		$this->db->group_by('board.id');
		$this->db->where('board.parent_id',$parent_id);
		return $this->db->get()->result();
	}
	
	/* function get_all_child_board_with_count_course($parent_id)
	{
		$this->db->select('board.id, board.title, board.url_slug, count(course.id) as courses');
		$this->db->from($this->table.' as board');
		$this->db->join('tbl_courses as course','course.board_refid = board.id','left');
		$this->db->group_by('course.board_refid');
		$this->db->where('board.parent_id',0);
		return $this->db->get()->result();
	} */
	
	/*end forum board model*/
	
	public function get_all_child_board($parent_id,$level =0)
	{
		$this->db->where('parent_id',$parent_id);
		$query_data = $this->db->get($this->table)->result();
		
		if(count($query_data)>0)
		{		
			$level++;
			foreach($query_data as $data)
			{
				echo '<option value="'.$data->id.'">';
				echo str_repeat('--',$level-1).' '.$data->title.' ('.$data->code.')';
				$child = $this->check_child_board($data->id);
				if(count($child))
				{
					$this->get_all_child_board($data->id,$level);
				}
				echo '</option>';
			}					
		}	
	}
	
	public function get_all_child_board_for_admin($parent_id,$level =0)
	{   $cat_data = array();
		$this->db->where('id',$parent_id);
		$query_data = $this->db->get($this->table)->result();
		//return ($parent_id==0 && $level==0)?'Root':'';
		if(count($query_data)>0)
		{	
			$level++;			
			$oprator = ($level!=1)?' <strong> / </strong> ':'';
			array_push($cat_data,$query_data[0]->title);
			array_push($cat_data,$this->get_all_child_board_for_admin($query_data[0]->parent_id,$level));								
		}
		return $cat_data;
		//return $data;		
	}


	public function get_quality_type()
	{
    $this->db->select('*');
    $this->db->from('tbl_quality');
     $query = $this->db->get();    
     return $query->result();
}


	public function get_sub_cat()
	{
	    $this->db->select('*');
	    $this->db->from('tbl_blogs');
	    $query = $this->db->get();    
	    return $query->result();
    }

    public function get_board_by_sub($id)
	{
		$this->db->where('status',1);
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}



  public function get_all_age1()
	{
		
		return $this->db->get('tbl_courses')->result();
	}
	/*public function get_all_child_board($id,$level =0)
	{
		$this->db->where('parent_id',$id);
		$query_data = $this->db->get($this->table)->result();
		if(count($query_data)>0)
		{
			$level++;
			echo "<ul>";
			foreach($query_data as $data)
			{
				echo '<li>';
				echo $data->title;
				$child = $this->check_child_board($data->id);
				if(count($child))
				{
					$this->get_all_child_board($data->id);
				}
				echo '</li>';
			}
			echo "</ul>";
		}	
	}*/
	
	public function check_child_board($id)
	{
		$this->db->where('parent_id',$id);
		return $this->db->get($this->table)->result();
	}
	
	
}
