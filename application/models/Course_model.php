<?php
class Course_model extends CI_Model
{
	protected $table = 'tbl_courses';
	/*start forum course model*/
	public function save_course($data)
	{

		$this->db->insert($this->table, $data);
	}

	public function get_all_course()
	{
		$this->db->select("course.* , board.code as board_name, tutor.name as tutor_name");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->join('tbl_tutor as tutor', "course.tutor_refid = tutor.id", 'left');

		$this->db->group_by('course.id');
		return $this->db->get()->result();
	}


	public function search_courses($keyword)
	{

		$this->db->like('title', $keyword);
		$this->db->where('status', '1');
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->table)->result();
	}
	public function get_course_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->result();
	}
	public function update_course_by_id($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	public function get_all_active_course($limit = 0)
	{
		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->select(" board.url_slug as board_url,course.url_slug,course.title,course.special_price,course.price,course.id,board.code as board_name, course.image as image , course.img_tag as img_tag,course.subject as subject, course.class as class,course.charges_type as charges_type ");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('course.is_latest', 'yes');
		$this->db->order_by('course.id', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_latest_course($limit = 0)
	{
		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->where('status', '1');
		$this->db->where('is_latest', 'yes');
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->table)->result();
	}
	public function get_all_featured_course($limit = 0)
	{
		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->where('status', '1');
		$this->db->where('is_featured', 'yes');
		$this->db->order_by('position');
		return $this->db->get($this->table)->result();
	}
	public function get_course_by_board_id($board_refid, $limit = 0)
	{

		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->select(" board.url_slug as board_url,course.url_slug,course.title,course.special_price,course.price,course.id,board.code as board_name, course.image as image , course.img_tag as img_tag,course.subject as subject, course.class as class,course.charges_type");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('course.board_refid', $board_refid);
		$this->db->order_by('course.id', 'desc');
		return $this->db->get()->result();
	}
	public function get_course_by_urlslug($key)
	{
		$this->db->select("course.* , board.code as board_name,board.url_slug as board_url, tutor.name as tutor_name");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->join('tbl_tutor as tutor', "course.tutor_refid = tutor.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('course.url_slug', $key);
		return $this->db->get()->result();
	}

	function get_course_url($pri_id)
	{
		$this->db->select("CONCAT(board.url_slug,'/',course.url_slug,'.html') as course_url");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'inner');
		$this->db->where('course.id', $pri_id);
		$data =  $this->db->get()->result();
		return base_url($data[0]->course_url);
	}

	/*end forum course model*/

	public function delete_course($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	public function get_all_featured_course_home($limit = 0)
	{
		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->select(" board.url_slug as board_url,course.url_slug,course.title,course.special_price,course.price,course.id,board.title as board_name, course.image as image , course.img_tag as img_tag,course.subject as subject, course.class as class,course.charges_type");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('course.is_featured', 'yes');
		$this->db->order_by('course.position');
		$this->db->group_by('course.id');

		return $this->db->get()->result();
	}

	public function get_all_latest_course_home($limit = 0)
	{
		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->select(" board.url_slug as board_url,course.url_slug,course.title,course.special_price,course.price,course.id,board.code as board_name, course.image as image , course.img_tag as img_tag,course.subject as subject, course.class as class,course.charges_type");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('course.is_latest', 'yes');
		$this->db->order_by('course.id', 'desc');
		return $this->db->get()->result();
	}

	public function get_course_by_board_id_order_by($board_refid, $low, $class, $subject)
	{
		$query = "course.subject";
		$this->db->select(" board.url_slug as board_url,course.url_slug,course.title,course.special_price,course.price,course.id,board.code as board_name, course.image as image , course.img_tag as img_tag,course.subject as subject, course.class as class,course.charges_type");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('course.board_refid', $board_refid);
		if ($class) {

			$this->db->where('course.class', $class);
		}
		if ($subject) {

			$this->db->where('FIND_IN_SET("' . $subject . ' ", ' . $query . ') <>', '0');
		}

		$this->db->order_by('course.special_price', $low);
		$res =  $this->db->get()->result();
		return $res;
	}

	public function get_course_by_mulit_board_id_order_by($board_refid_array, $low)
	{


		$this->db->where('status', '1');
		$this->db->where_in('board_refid', $board_refid_array);
		$this->db->order_by('special_price', $low);
		return $this->db->get($this->table)->result();
	}
	/*Course Session*/


	public function save_course_chapter($data)
	{

		$this->db->insert('tbl_courses_chapter', $data);
	}

	public function get_course_chapter_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tbl_courses_chapter')->result();
	}
	public function update_course_chapter_by_id($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_courses_chapter', $data);
	}
	public function get_all_active_course_chapter()
	{
		$this->db->where('status', '1');
		$this->db->order_by('id', 'desc');
		return $this->db->get('tbl_courses_chapter')->result();
	}

	public function get_all_course_chapter_by_course_id($course_id)
	{
		$this->db->select("* ");
		$this->db->from('tbl_courses_chapter');
		$this->db->where('course_id', $course_id);

		return $this->db->get()->result();
	}

	public function count_course_chapter_by_course_id($course_id)
	{
		$this->db->select("* ");
		$this->db->from('tbl_courses_chapter');
		$this->db->where('course_id', $course_id);
		return $this->db->get()->num_rows();
	}
	public function last_course_chapter_by_course_id($course_id)
	{
		$this->db->select("* ");
		$this->db->from('tbl_courses_chapter');
		$this->db->where('course_id', $course_id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	public function get_course_detail_by_id($course_id, $limit = 0)
	{
		if ($limit != 0) {
			$this->db->limit($limit);
		}
		$this->db->select(" board.url_slug as board_url,course.url_slug,course.title,course.special_price,course.price,course.id as course_id,board.code as board_name, course.image as image , course.img_tag as img_tag,course.subject as subject, course.class as class,course.charges_type as charges_type ");
		$this->db->from('tbl_courses as course');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->where('course.id', $course_id);
		$this->db->where('course.status', '1');
		$this->db->order_by('course.id', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_course_chapter_session_by_chapter_id($chapter_id, $type)
	{
		$this->db->select("* ");
		$this->db->from('tbl_courses_file');
		$this->db->where('chapter_id', $chapter_id);
		$this->db->where('type', $type);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}

	public function get_course_chapter_session_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tbl_courses_file')->result();
	}
	public function update_course_chapter_session_by_id($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_courses_file', $data);
	}

	public function count_course_chapter_session_by_course_id($course_id, $chapter_id, $type)
	{
		$this->db->select("* ");
		$this->db->from('tbl_courses_file');
		$this->db->where('course_id', $course_id);
		$this->db->where('chapter_id', $chapter_id);
		$this->db->where('type', $type);
		return $this->db->get()->num_rows();
	}

	public function get_course_chapter_by_unique_id($unique_id)
	{
		$this->db->select("course.* , board.code as board_name,board.url_slug as board_url, tutor.name as tutor_name,courses_chapter.id as chapter_id,courses_chapter.title as chapter_title,courses_chapter.description as chapter_description,courses_chapter.unique_id as chapter_unique_id");
		$this->db->from('tbl_courses_chapter as courses_chapter');
		$this->db->join('tbl_courses as course', "courses_chapter.course_id = course.id", 'left');
		$this->db->join('tbl_board as board', "course.board_refid = board.id", 'left');
		$this->db->join('tbl_tutor as tutor', "course.tutor_refid = tutor.id", 'left');
		$this->db->where('course.status', '1');
		$this->db->where('courses_chapter.unique_id', $unique_id);
		return $this->db->get()->result();
	}
}
