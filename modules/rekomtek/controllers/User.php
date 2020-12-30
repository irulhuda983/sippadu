<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
		$this->load->model('RekomAll_model', 'rekom');
		// $this->auth->restrict(fmodule('login'));
    }

    public function index()
    {
        $this->load->view('login/index',);
    }

}