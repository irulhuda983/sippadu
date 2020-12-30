<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller {

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
    }
    
    public function index()
    {
        $unit = $this->session->userdata('unit');

		$data = [
			'title' => 'Arsip Berkas',
			'menu' => 'arsip',
			'unit' => $unit,
			'menuIzin' => $this->rekom->getMenuIzin($unit)
			// 'rekom' => $rekom
		];
		// var_dump($rekom);
		// die;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('arsip/dinkes', $data);
        $this->load->view('templates/footer', $data);
    }
}