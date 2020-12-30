<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_sippadu','mod_all'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
		/* $config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config); */
		$this->auth->restrict(fmodule('login'));
		//load_cache();
    }
    
    public function getDataTteImb($id)
    {
        echo json_encode($id);
    }

	public function getDataTteReklame($id)
    {
		$data = $this->db->get_where('tbreklame', ['ID' => $id])->row_array();
        echo json_encode($data);
    }
}