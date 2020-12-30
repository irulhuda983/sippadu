<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_cetak','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form','pdf','download'));
		$this->auth->restrict(fmodule('login'));
	}

	public function pdf($encode='',$download='download',$filename='Report'){
		$d = wkhtmltopdf($encode,$filename.'_'.time(),$download);
		$html = $this->load->view('cetak/preview',$d);
	}
	
	public function pdfp($encode='',$download='download',$filename='Report'){
		$d = wkhtmltopdf($encode,$filename.'_'.time(),$download,'portrait');
		$html = $this->load->view('cetak/preview',$d);
	}
	
	public function pdfl($encode='',$download='download',$filename='Report'){
		$d = wkhtmltopdf($encode,$filename.'_'.time(),$download,'landscape');
		$html = $this->load->view('cetak/preview',$d);
	}
	
}