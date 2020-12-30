<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lpks extends CI_Controller {

	var $nama_izin 	= 'Izin Pendirian LPK Swasta';
	var $class_izin	= 'lpks';
	var $kode_izin	= 15;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_lpks','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$user = $this->session->userdata('sippadu_userid');
		$Kd_Jenis = 1; //baru, perpanjangan, perubahan
		$d = $this->mod_all->load();
		
		if($this->input->post('submit')){
			$this->mod_lpks->insert_lpks();
		}
			
		$d['title'] = $title = lang('Pendaftaran Izin');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'daftar';
		$d['op_pengurus_permohonan'] = $this->mod_lpks->op_pengurus_permohonan();
		$d['op_jenis_izin'] = $this->mod_lpks->op_jenis_izin();
		$d['op_perusahaan'] = $this->mod_lpks->op_perusahaan($user);
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['op_pelanggan'] = $this->mod_lpks->op_pelanggan($user);
		$d['data'] = $this->mod_lpks->get_personal($user);
		$d['Kd_Izin'] = $this->kode_izin;
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis'] = $Kd_Jenis;
		$d['Syarat_Ketentuan'] = $this->mod_lpks->syarat_ketentuan($this->kode_izin);
		
		
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_daftar',$d);
	}
	
	public function cetak_tt($id=0)
	{
		$d = $this->mod_all->load();
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['data'] = $this->mod_lpks->get_lpks($id);
		$d['Kd_Izin'] = $this->kode_izin;
		$d['Nm_Izin'] = $this->nama_izin;
		
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_tt',$d);
	}
	
	public function op_perusahaan(){
		$idperusahaan = $this->input->post('op_perusahaan');
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['data'] = $this->mod_lpks->get_perusahaan($idperusahaan);
		$this->load->view($this->class_izin.'/op_perusahaan',$d);
	}
	
	public function op_dokumen(){
		$d['Kd_Izin'] = $this->kode_izin;
		$d['Kd_Jenis'] = $this->input->post('Kd_Jenis'); //baru, perpanjangan, perubahan
		$this->load->view($this->class_izin.'/op_dokumen',$d);
	}
	
	
}
