<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackOffice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
            redirect('login');
        }
		$this->load->model(array('mod_all','mod_daftar'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu', 'date','file','html'));

		$this->load->model('Dinkes_model', 'dinkes');
		$this->load->model('Rekom_model', 'rekom');
		$this->load->model('RekomAll_model', 'rekomAll');
		// $this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$unit = $this->session->userdata('unit');
		// if($this->session->userdata('unit') == 2){
		// 	$rekom = $this->dinkes->getData();
		// }
		// $rekom = 

		$data = [
			'title' => 'Back Office',
			'menu' => 'backoffice',
			'unit' => $unit,
			'menuIzin' => $this->rekom->getMenuIzin($unit)
			// 'rekom' => $rekom
		];
		// var_dump($rekom);
		// die;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('BO/dinkes', $data);
        $this->load->view('templates/footer', $data);
	}

	public function setSurat($id)
	{
		$unit = $this->session->userdata('unit');
		// if($this->session->userdata('unit') == 2){
		// 	$rekom = $this->dinkes->getData();
		// }
		// $rekom = 

		$data = [
			'title' => 'Seting Surat Keterangan',
			'menu' => 'backoffice',
			'unit' => $unit,
			'table' => 'sippadu_labklinik',
			'izin' => $this->rekomAll->getDetailIzin($id),
			'rekom' => $id
		];

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sk/setSkDinkes', $data);
        $this->load->view('templates/footer', $data);
	}
	
	
}