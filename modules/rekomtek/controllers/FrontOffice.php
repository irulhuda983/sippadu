<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FrontOffice extends CI_Controller {

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
		if($unit == 2){
			// $rekom = $this->dinkes->getData();
			$fo = 'FO/dinkes';
		}elseif ($unit == 1) {
			$fo = 'FO/cipta';
		}
		// $rekom = 

		$data = [
			'title' => 'Front Office',
			'menu' => 'frontoffice',
			'unit' => $unit,
			'menuIzin' => $this->rekom->getMenuIzin($unit)
			// 'rekom' => $rekom
		];

        $this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
        $this->load->view($fo, $data);
        $this->load->view('templates/footer', $data);
	}

	public function cekDokumen($id)
	{
		$unit = $this->session->userdata('unit');
		$rekomIzin = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
		$izin = $this->db->get_where($rekomIzin['nama_table'], ['ID' => $rekomIzin['izin_id']])->row_array();
		$dokumen = $this->rekomAll->getDokumen($rekomIzin['jenis_izin'], $izin['Jenis_Izin']);

		$data = [
			'title' => 'Dokumen',
			'menu' => 'frontoffice',
			'unit' => $unit,
			'menuIzin' => $this->rekom->getMenuIzin($unit),
			'izin' => $izin,
			'dokumen' => $dokumen
		];


        $this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
        $this->load->view('FO/dokumen', $data);
        $this->load->view('templates/footer', $data);
	}
	
	
}