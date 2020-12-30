<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_daftar'));
		// $this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
		$this->load->library('form_validation');
		// $this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
        if ($this->session->userdata('user')) {
            redirect('rekomtek');
        }
		$data = [
            'title' => 'Login'
		];
		
		$this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Masukkan Username Address'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Masukkan password'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index', $data);
        } else {
            // validasi sukses
            $this->_login();
        }
	}


	public function _login()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');

		$user = $this->db->get_where('rekom_user', ['username_rekom' => $username])->row_array();
		
		if($user){
			// jika user aktif
            if ($user['is_aktif'] == 1) {

                // jika password benar
                // if ($password == $user['password_rekom']) {
                if(password_verify($password, $user['password_rekom'])){
                    $data = [
                        'id' => $user['id_user_rekom'],
						'nama' => $user['nama_user_rekom'],
						'user' => $user['username_rekom'],
						'unit' => $user['unit_id'],
                        'role' => $user['role_id'],
                        'foto' => $user['foto'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('/');
                } else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Username atau password Salah.
                </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        User sedang di nonaktifkan.
                    </div>');
                redirect('login');
            }
		}else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Username atau password Salah.
                </div>');
			redirect('login');
		}
    }
    
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('unit');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('foto');
        redirect('login');
    }
	
	
}