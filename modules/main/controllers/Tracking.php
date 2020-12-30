<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_tracking'));
		$this->load->library(array('pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	

	public function index()
	{
		$register = $this->input->post('register');
		$kitas = $this->input->post('kitas');
		$data = [
			'track' => $this->mod_tracking->data_tracking($register,$kitas)->row_array(),
			'detail' => $this->mod_tracking->detailTrack($register)
		];
		echo json_encode($data);
	}
	
}