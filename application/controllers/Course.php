<?php
class Course extends CI_Controller{


    function __construct(){
 		parent::__construct();
   		$this->load->model('Menu_board_model');
   
   }


	function Course()
	{
		$data['cms_page'] = $this->cms_model->get_cms_by_id(28);
		$data['course'] = $this->course_model->get_all_active_course();
		$this->load->view('front/course/listing',$data);
	}
	function listing()
	{
		$data['cms_page'] = $this->cms_model->get_cms_by_id(28);
		$url = $this->uri->segment(1);
	   	$url =  explode('.', $url) ; 
		$board_data = $this->board_model->get_board_by_urlslug($url[0]);

		if(!$board_data){
		    
			redirect('404');
		}
		$type =$class=$subject='';
		if (isset($_GET['price_filter'])) {
			$type = $_GET['price_filter'] ;
		}

		$data['cms_page'] = $board_data;

		if ($type == 'low') {
			$order_by = "Asc" ; 
		}else{
			$order_by = "DESC" ; 
		}


		if (isset($_GET['class']) || !empty($_GET['class']) ) {
				$class = $_GET['class'] ; 
		}
		if (isset($_GET['subject']) || !empty($_GET['subject']) ) {
				$subject = $_GET['subject'] ; 
		}


		$data['course'] = $this->course_model->get_course_by_board_id_order_by($board_data[0]->id,$order_by,$class, $subject);
		
		$subboard = $this->board_model->get_board_by_child($board_data[0]->id);	
		// if(count($subboard ) ) {
		// 	foreach ($subboard as $key => $value) {
		// 			$boardArray[$key] = $value->id ; 
		// 	}
		// 	$data['course'] = $this->course_model->get_course_by_mulit_board_id_order_by($boardArray,$order_by);
		// }


		$this->load->view('front/course/listing',$data);
		
	}
	function get_course_by_cat(){
		$args = func_get_args();
		 $uri = $this->uri->segment(1);
		$board_data = $this->board_model->get_board_by_urlslug(rtrim($args[0],'.html'));
		if(count($board_data) > 0)
		{	
			$courses = $this->course_model->get_course_by_board_id($board_data[0]->id);
			
		}

	}


	public function searchbyprice()
	{
		
		$start = $_POST['min_val'];
		$end = $_POST['max_val'];
		$board_refid = $_POST['board_refid'];
		$min_carat = $_POST['min_carat'];
		$max_carat = $_POST['max_carat'];
		$min_ratti = $_POST['min_ratti'];
		$max_ratti = $_POST['max_ratti'];
		$max_price_filter = $_POST['max_price_filter'];
		$min_price_filter = $_POST['min_price_filter'];
		$treatment = $_POST['treatment'];
		$discount  = $_POST['discount'];
		$offer  = $_POST['offer'];
		
		
		
	    $data = $this->course_model->carat_filter_data($start,$end,$board_refid,$min_carat,$max_carat,$min_ratti,$max_ratti,$max_price_filter,$min_price_filter,$treatment,$discount,$offer);
		
		echo json_encode($data);
		
	}

	
	public function search(){
		if(isset($_GET['search']))
		{
			$keyword = $_GET['search'];
		}else{
			$keyword ='';
		}	
		$data['RESULT'] = $this->course_model->search_courses($keyword);
        $data['courseS'] = $this->course_model->search_courses($keyword);
		$this->load->view('front/search/listing',$data);
	}
 

	function detail()
	{
	    $uri2 = $this->uri->segment(2);
		$url =     explode('.',$uri2);
		$course_data = $this->course_model->get_course_by_urlslug($url[0]);
		
		if(!$course_data){
		    
			redirect('404');
		}
		$board_refid = $course_data[0]->board_refid;
		
		$data['course'] = $course_data;
		$data['course_board'] = $this->course_model->get_course_by_board_id($board_refid, 10); 
	
		$this->load->view('front/course/details',$data);
	}


	function save_review()
	{
		$user_id = $this->session->userdata('USER_ID');
		$msg = '';
		if(empty($user_id))
		{
			$msg = 'login';
		}
		else
		{
			if(isset($_POST) )
			{
				$ins_data['user_id']  = $user_id;
				$ins_data['pro_id']  = $_POST['pro_id'];
				$ins_data['description']  = $_POST['description'];
				$ins_data['rating']  = $_POST['rating'];
				$ins_data['create_date']  =  date('Y-m-d h:i:m');
				$this->course_model->save_review_data($ins_data);
				$msg =  1;
				
			}
			else
			{
				$msg =  0;
			}
		}
		
		echo $msg; 
	}
	
	
	function test()
	{
		$corrent_month = date('m');
		$total_days = cal_days_in_month(CAL_GREGORIAN, $corrent_month, 2018);
		$total_row = round($total_days/7);
		$array_day = array(1=>'Sun',2=>'Mon',3=>'Tue',4=>'Wed',5=>'Thu',6=>'Fri',7=>'Sat');
		$first_day = date('D', strtotime(date('Y-m-1')));
		$k = array_search($first_day, $array_day);
		
		echo '<table>';
		echo '<thead><tr><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr></thead>';
		echo '<tbody>';		
		echo '<tr>';	
			for($j=1; $j<=$total_days; $j++)
			{
				echo '<td>'.$j.'</td>';
				echo ($j%7==0)? '</tr><tr>' : '' ;
			}
		echo '</tr>';			
		echo '</tbody>';
		echo '</table>'; 
	}
	
	function add_to_compare()
	{
	   $args = func_get_args();
	   $pro_ids = $this->session->userdata('COMPARE_IDS');
	   if(is_array($pro_ids) && !in_array($args[0],$pro_ids))
	   {
	        array_push($pro_ids,$args[0]);
	        $compare_data = array('COMPARE_IDS'=> $pro_ids);
	        $this->session->set_userdata($compare_data);
	   }else{
	        $compare_data = array('COMPARE_IDS'=> array($args[0]));
	        $this->session->set_userdata($compare_data);
	   }
	   redirect('course/compare');
	}
	
	function compare()
	{
	    //$this->session->unset_userdata('COMPARE_IDS');
	    $pro_ids = $this->session->userdata('COMPARE_IDS');
	    if(empty($pro_ids) && !is_array($pro_ids)){ redirect('course/listing'); }
	    
	    $data['RESULT'] = $this->course_model->get_all_course_multiple_ids($pro_ids);
		$data['courseS'] = $this->course_model->get_all_course_multiple_ids($pro_ids);
	    $this->load->view('front/course/compare_listing',$data);
	}
	
}
