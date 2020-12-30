<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekomtek extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
	}	
	
	public function index()
	{
		$data = [
            'title' => 'Dashboard',
            'menu' => 'dashboard'
        ];


        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        if($this->session->userdata('role') == 1){
            $this->load->view('home/index', $data);
        }else {
            $this->load->view('home/user', $data);
        }
        $this->load->view('templates/footer', $data);
    }
	
	
}