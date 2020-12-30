<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_report','mod_all'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form','pdf','download'));
	}
	public function data($skpd=0,$jenis=0,$merk=0,$tahun=0)
	{
		
		$d['data'] = $data = $this->mod_report->data_laporan(0,$skpd,$jenis,$merk,$tahun);
		$d['string'] = site_url(fmodule('report/data/'.$skpd.'/'.$jenis.'/'.$merk.'/'.$tahun));
		if($skpd > 0){
			$filename = 'Rpt_SKPD.pdf';
			$d['data_print'] = $this->mod_report->data_print_skpd($skpd,$jenis,$merk,$tahun);
			$html = $this->load->view('report/rpt_skpd',$d, false);
		}
		else{
			$filename = 'Rpt_Kab.pdf';
			$d['data_print'] = $this->mod_report->data_print_kab($jenis,$merk,$tahun);
			$html = $this->load->view('report/rpt_kab',$d, false);
		}
	}
	
	public function bappeda_kua_usulan_pendapatan()
	{
		$this->load->view('report/bappeda/kua_usulan_pendapatan');
	}
	
}