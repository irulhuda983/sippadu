<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_users','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		/*$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);*/
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(1,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_users->delete_users();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_users->enable_users();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_users->disable_users();
		}
		
		$d['title'] = $title = 'Users Manager';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'users';
		$d['menuactive'] = 'users_akun';
		
		//$d['op_view'] = $this->mod_users->op_view();
		//$d['op_sorting'] = $this->mod_users->op_sorting();
		//$d['slc_op_ta'] = $this->session->userdata('op_ta');
		//$d['slc_op_view'] = $this->session->userdata('op_view');
		//$d['slc_op_sorting'] = $this->session->userdata('op_sorting_users');
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_users->data_users($limit,$offset);
		$d['tot'] = $tot = $this->mod_users->data_users()->num_rows();
		
		$config['base_url'] = site_url(fmodule('users/index'));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="tile-footer dvd dvd-top"><div class="row"><div class="col-sm-4 text-left"><ul class="pagination pagination-sm m-0">';
		$config['full_tag_close'] = '</ul></div></div></div>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$d['pagination'] = $this->pagination->create_links();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('users/users',$d);
		
	}
	
	public function add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(1,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_users->insert_users();
			$usr = $this->mod_users->get_last_id();
			//$b = $this->mod_users->insert_auth_region($usr);
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Silakan isi data dengan benar');
				redirect(current_url());
			}
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'users';
		$d['menuactive'] = 'users_akun';
		
		$d['op_level'] = $this->mod_users->op_level();
		$d['op_group'] = $this->mod_users->op_group();
		$d['op_auth_mode'] = $this->mod_users->op_auth_mode();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url('apps'));
		$this->breadcrumb->append_crumb('Users', site_url(fmodule('users')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('users/users_add',$d);
	}
	
	public function edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(1,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_users->update_users($id);
			$b = $this->mod_users->insert_auth_region($id);
			set_alert('success','Data berhasil diupdate');
			redirect(current_url());
		}
		
		$d['title'] = $title = 'Edit Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'users';
		$d['menuactive'] = 'users_akun';
		$d['op_level'] = $this->mod_users->op_level();
		$d['op_group'] = $this->mod_users->op_group();
		$d['op_auth_mode'] = $this->mod_users->op_auth_mode();
		$d['data'] = $this->mod_users->get_data_users($id);
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Users', site_url(fmodule('users')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('users/users_edit',$d);
	}
	
	public function authuser()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(2,$DataAkses);
		
		//$this->session->keep_flashdata('op_user');
		$op_user = ($this->session->flashdata('op_user') ? $this->session->flashdata('op_user') : 0);
		if($this->input->post('refresh')){
			//$this->session->set_flashdata('op_user',$this->input->post('op_user'));
			//redirect(current_url());
			$op_user = $this->input->post('op_user');
		}
		
		if($this->input->post('submit')){
			$a = $this->mod_users->insert_auth_users();
		}
		
		$d['title'] = $title = 'Setting Hak Akses User';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'users';
		$d['menuactive'] = 'users_hakaksesusers';
		$d['data_modul'] = $this->mod_users->data_modul();
		$d['op_users'] = $this->mod_users->op_users();
		//$d['slc_op_users'] = $user = $this->session->flashdata('op_user');
		$d['slc_op_users'] = $op_user;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Users', site_url(fmodule('users')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('users/users_authuser',$d);
	}
	
	public function authlevel()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(3,$DataAkses);
		
		$op_level = ($this->session->flashdata('op_level') ? $this->session->flashdata('op_level') : 0);
		//$this->session->keep_flashdata('op_level');
		if($this->input->post('refresh')){
			//$this->session->set_flashdata('op_level',$this->input->post('op_level'));
			//redirect(current_url());
			$op_level = $this->input->post('op_level');
		}
		
		if($this->input->post('submit')){
			$a = $this->mod_users->insert_auth_level();
		}
		
		$d['title'] = $title = 'Setting Hak Akses Level';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'users';
		$d['menuactive'] = 'users_hakakseslevel';
		$d['data_modul'] = $this->mod_users->data_modul();
		$d['op_level'] = $this->mod_users->op_level();
		//$d['slc_op_level'] = $user = $this->session->flashdata('op_level');
		$d['slc_op_level'] = $op_level;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Users', site_url(fmodule('users')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('users/users_authlevel',$d);
	}
	
	public function authgroup()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(4,$DataAkses);
		
		$op_group = ($this->session->flashdata('op_group') ? $this->session->flashdata('op_group') : 0);
		//$this->session->keep_flashdata('op_group');
		if($this->input->post('refresh')){
			//$this->session->set_flashdata('op_group',$this->input->post('op_group'));
			//redirect(current_url());
			$op_group = $this->input->post('op_group');
		}
		
		if($this->input->post('submit')){
			$a = $this->mod_users->insert_auth_group();
		}
		
		$d['title'] = $title = 'Setting Hak Akses Group';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'users';
		$d['menuactive'] = 'users_hakaksesgroup';
		$d['data_modul'] = $this->mod_users->data_modul();
		$d['op_group'] = $this->mod_users->op_group();
		//$d['slc_op_group'] = $user = $this->session->flashdata('op_group');
		$d['slc_op_group'] = $op_group;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Users', site_url(fmodule('users')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('users/users_authgroup',$d);
	}
	
	public function update_user_log(){
		$a = $this->mod_users->update_user_log();
	}
	
	public function cek_user_log(){
		$a = $this->mod_users->cek_user_log();
		echo $a->num_rows();
	}
	
	public function users_list_online(){
		$d['data'] = $this->mod_users->users_list_online();
		$this->load->view('users/users_list_online',$d);
	}
}