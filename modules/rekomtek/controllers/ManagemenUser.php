<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagemenUser extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
		$this->load->model(array('mod_all','mod_daftar'));
		// $this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu', 'date','file','html'));

		$this->load->model('Dinkes_model', 'dinkes');
        $this->load->model('Rekom_model', 'rekom');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $query = "SELECT * FROM `rekom_user` JOIN `rekom_user_role` WHERE `rekom_user`.`role_id` = `rekom_user_role`.`id_role`";
        $user = $this->db->query($query)->result_array();
        $data = [
			'title' => 'Managemen User',
            'menu' => 'user',
            'user' => $user
			// 'rekom' => $rekom
		];
        
        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
			'title' => 'Tambah User',
            'menu' => 'user',
            'role' => $this->db->get('rekom_user_role')->result_array()
			// 'rekom' => $rekom
        ];
        
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('role', 'role', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $this->_save();
        }


    }

    public function _save()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role = $this->input->post('role');
        $foto = 'default.png';
        $upload_foto = $_FILES['foto']['name'];
        if ($upload_foto) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/admin/images/user_rekom/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<p id="pesan">' . $this->upload->display_errors() . '</p>');
                redirect('ManagementUser/tambah');
            }
        }

        $user = [
            'nama_user_rekom' => $nama,
            'username_rekom' => $username,
            'password_rekom' => $password,
            'role_id' => $role,
            'unit_id' => 2,
            'is_aktif' => 1,
            'foto' => $foto
        ];

        $this->db->insert('rekom_user', $user);

        $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i> Berhasil tambah User.
					</div>');

        redirect('ManagemenUser');
    }

    public function edit($id)
    {
        $query = "SELECT * FROM `rekom_user` JOIN `rekom_user_role` ON `rekom_user`.`role_id` = `rekom_user_role`.`id_role` WHERE `rekom_user`.`id_user_rekom` = '$id'";
        $user = $this->db->query($query)->row_array();
        $data = [
			'title' => 'Tambah User',
            'menu' => 'user',
            'role' => $this->db->get('rekom_user_role')->result_array(),
			'user' => $user
        ];
        
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('role', 'role', 'required|trim');
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $this->_update();
        }
    }

    public function _update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $role = $this->input->post('role');
        $foto = $this->input->post('foto_lama');

        $upload_foto = $_FILES['foto']['name'];
        if ($upload_foto) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/admin/images/user_rekom/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<p id="pesan">' . $this->upload->display_errors() . '</p>');
                redirect('ManagementUser/edit');
            }
        }

        $this->db->set('nama_user_rekom', $nama);
        $this->db->set('username_rekom', $username);
        $this->db->set('role_id', $role);
        $this->db->set('foto', $foto);
        $this->db->where('id_user_rekom', $id);
        $this->db->update('rekom_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i> Berhasil tambah User.
					</div>');

        redirect('ManagemenUser');


    }

    public function ubah_password($id)
    {
        $query = "SELECT * FROM `rekom_user` JOIN `rekom_user_role` ON `rekom_user`.`role_id` = `rekom_user_role`.`id_role` WHERE `rekom_user`.`id_user_rekom` = '$id'";
        $user = $this->db->query($query)->row_array();
        $data = [
			'title' => 'Tambah User',
            'menu' => 'user',
            'role' => $this->db->get('rekom_user_role')->result_array(),
			'user' => $user
        ];
        
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/ubah_password', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $this->_update_password();
        }
    }

    public function _update_password()
    {
        $id = $this->input->post('id');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    
        $this->db->set('password_rekom', $password);
        $this->db->where('id_user_rekom', $id);
        $this->db->update('rekom_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i> Paasword berhasil diubah.
					</div>');

        redirect('ManagemenUser');
    }

    public function delete($id)
    {
        $this->db->delete('rekom_user', ['id_user_rekom' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Rekomendasi berhasil di hapus.
			</div>');
			redirect('ManagemenUser');
    }

}