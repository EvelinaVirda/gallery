<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function uploadImage()
	{
		$this->load->view('v_uploadImage');
	}
	public function processUpload()
	{

		$config['upload_path']          = './uploads/karyawan/foto/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 3000;
		$config['max_height']           = 2000;
		$result['message'] = "";
		$this->load->library('upload', $config, 'foto');
		$this->foto->initialize($config);
		$upload_foto = $this->foto->do_upload('uploadImage');

		$config['upload_path']          = './uploads/karyawan/berkas/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 3000;
		$config['max_height']           = 2000;
		$result['message'] = "";
		$this->load->library('upload', $config, 'berkas');
		$this->berkas->initialize($config);
		$upload_berkas = $this->berkas->do_upload('uploadBerkas');

		$config['upload_path']          = './uploads/karyawan/ttd/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 3000;
		$config['max_height']           = 2000;
		$result['message'] = "";
		$this->load->library('upload', $config, 'ttd');
		$this->ttd->initialize($config);
		$upload_ttd = $this->ttd->do_upload('uploadTtd');

		if ($upload_foto && $upload_berkas && $upload_ttd) {

			$data_foto = $this->foto->data();
			$gambar = $data_foto['file_name'];

			$data_berkas = $this->berkas->data();
			$berkas = $data_berkas['file_name'];

			$data_ttd = $this->ttd->data();
			$ttd = $data_ttd['file_name'];
		} else {
			$result = $this->foto->display_errors();
			$result = $this->berkas->display_errors();
			$result = $this->ttd->display_errors();
		}

		// if (!$this->upload->do_upload('uploadImage')) {
		// 	$result['message'] = array('error' => $this->upload->display_errors());
		// } else {
		// 	$result = array('upload_data' => $this->upload->data());
		// 	$gambar = $result['upload_data']['file_name'];
		// 	$result['message'] = "Berhasil";
		// }
		// if (!$this->upload->do_upload('uploadBerkas')) {
		// 	$result['message'] = array('error' => $this->upload->display_errors());
		// } else {
		// 	$result = array('upload_data' => $this->upload->data());
		// 	$berkas = $result['upload_data']['file_name'];
		// 	$result['message'] = "Berhasil";
		// }
		// if (!$this->upload->do_upload('uploadTtd')) {
		// 	$result['message'] = array('error' => $this->upload->display_errors());
		// } else {
		// 	$result = array('upload_data' => $this->upload->data());
		// 	$ttd = $result['upload_data']['file_name'];
		// 	$result['message'] = "Berhasil";
		// }
		//add line tes
		$this->db->query("INSERT INTO foto values(null, 'uploads/karyawan/foto/$gambar')");
		$this->db->query("INSERT INTO foto values(null, 'uploads/karyawan/berkas/$berkas')");
		$this->db->query("INSERT INTO foto values(null, 'uploads/karyawan/ttd/$ttd')");
		echo json_encode($result);
	}
}
