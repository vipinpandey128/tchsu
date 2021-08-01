<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StateBoard extends CI_Controller
{

	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();

		/*load Model*/
		$this->load->model('State_model');
	}

	public function index()
	{
		$this->load->view('admin/state_board');
	}


	/*Insert*/
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('admin/state_board');

		/*Check submit button */
		if ($this->input->post('save')) {
			$bytes = random_bytes(16);
			$bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
			$bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);
			$uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));


			//Check whether user upload picture
			if (!empty($_FILES['boardimage']['name'])) {
				$fileExt = pathinfo($_FILES["boardimage"]["name"], PATHINFO_EXTENSION);
				$config['upload_path'] = 'uploads/school/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $uuid . "." . $fileExt;

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('boardimage')) {
					$uploadData = $this->upload->data();
					$picture = $uploadData['file_name'];
				} else {
					$picture = '';
				}
			} else {
				$picture = '';
			}

			$data['IconName'] = $uuid . "." . $fileExt;
			$data['TitleName'] = $this->input->post('titlename');
			$data['BoardName'] = $this->input->post('boardname');
			$data['URL'] = $this->input->post('url');
			$response = $this->State_model->saverecords($data);
			if ($response == true) {
				echo "Records Saved Successfully";
			} else {
				echo "Insert error !";
			}
		}
	}

	public function saveclass()
	{
		/*load registration view form*/
		$this->load->view('admin/state_board');

		/*Check submit button */
		if ($this->input->post('save')) {
			$bytes = random_bytes(16);
			$bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
			$bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);
			$uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));


			//Check whether user upload picture
			if (!empty($_FILES['iconname']['name'])) {
				$fileExt = pathinfo($_FILES["iconname"]["name"], PATHINFO_EXTENSION);
				$config['upload_path'] = 'uploads/school_course/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '1000';
				$config['max_width'] = '100';
				$config['max_height'] = '100';
				$config['file_name'] = $uuid . "." . $fileExt;

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('iconname')) {
					$this->upload->data();
					$data['IconName'] = $uuid . "." . $fileExt;
					$data['ClassName'] = $this->input->post('classname');
					$data['SCID'] = $this->input->post('scid');
					$data['URL'] = $this->input->post('url');
					$response = $this->State_model->saverecords($data);
					if ($response == true) {
						echo "Records Saved Successfully";
					} else {
						echo "Insert error !";
					}
				}
			}
		}
	}
}
