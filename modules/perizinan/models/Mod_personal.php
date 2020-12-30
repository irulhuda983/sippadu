<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_personal extends CI_Model {
	
	function get_tbl_personal($limit=0,$offset=0){
		$user = $this->session->userdata('sippadu_userid');
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY b.NM_PELANGGAN ASC';
		//$order = 'p.NM_PELANGGAN ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			//$keyword = 'anggaran';
			$q_where .= 'AND (b.IDPELANGGAN like "%'.$keyword.'%"  or b.NM_PELANGGAN like "%'.$keyword.'%" OR b.NOKITAS like "%'.$keyword.'%" OR b.ALAMATPELANGGAN like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select b.IDPELANGGAN,b.ALAMATPELANGGAN,b.NM_PELANGGAN,b.NOKITAS from sippadu_user_pelanggan a inner join tbpelanggan b on a.ID_Pelanggan = b.IDPELANGGAN where /*a.ID_Web = "'.config().'" AND*/ a.ID_User = "'.$user.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function op_provinsi(){
		$a = $this->db->order_by('NAMA_PROVINSI','ASC')->get('tbprovinsi');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Provinsi -';
				$h[$aa->ID_PROVINSI] = $aa->NAMA_PROVINSI;
			}
		}
		else{
			$h['0'] = '- Pilih Provinsi -';
		}
		return $h;
	}
	
	function op_kota(){
		$op_provinsi = $this->input->post('op_provinsi');
		$a = $this->db->where('ID_PROVINSI',$op_provinsi)->order_by('NAMA_KOTA','ASC')->get('tbkota');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Kota -';
				$h[$aa->ID_KOTA] = $aa->NAMA_KOTA;
			}
		}
		else{
			$h['0'] = '- Pilih Kota -';
		}
		return $h;
	}
	
	function op_kecamatan(){
		$op_kota = $this->input->post('op_kota');
		$a = $this->db->where('ID_KOTA',$op_kota)->order_by('NAMA_KECAMATAN','ASC')->get('tbkecamatan');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Kecamatan -';
				$h[$aa->ID_KECAMATAN] = $aa->NAMA_KECAMATAN;
			}
		}
		else{
			$h['0'] = '- Pilih Kecamatan -';
		}
		return $h;
	}
	
	function op_desa(){
		$op_kecamatan = $this->input->post('op_kecamatan');
		$a = $this->db->where('ID_KECAMATAN',$op_kecamatan)->order_by('NAMA_DESA','ASC')->get('tbdesa');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Desa -';
				$h[$aa->ID_DESA] = $aa->NAMA_DESA;
			}
		}
		else{
			$h['0'] = '- Pilih Desa -';
		}
		return $h;
	}
	
	function get_personal($id=0){
		$a = $this->db->where('IDPELANGGAN',$id)->get('tbpelanggan');
		return $a;
	}
	
	function delete_fo_tbl(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['IDPELANGGAN'] = $id;
				$this->db->delete('tbpelanggan',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function insert_personal($win=FALSE,$redirect=FALSE){
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','');
		$this->form_validation->set_rules('gender','Jenis Kelamin','is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('nokitas','No Identitas','required|is_unique[sippadu_user.NOKITAS]');
		$this->form_validation->set_rules('npwp','NPWP','is_unique[sippadu_user.NPWP]');
		$this->form_validation->set_rules('telepon','Telepon','');
		$this->form_validation->set_rules('hp','HP','');
		$this->form_validation->set_rules('fax','Fax','');
		$this->form_validation->set_rules('email','Email','');
		if($this->form_validation->run() == TRUE){
			
			//$q_last_id = $this->db->select_max('ID','ID')->where('YEAR(TGL_DAFTAR)',TimeNow('Y'))->get('tbpelanggan');
			$q_last_id = $this->db->select_max('ID','ID')->get('sippadu_user');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}
			$q_last_reg = $this->db->select_max('No_Reg','No_Reg')->where('YEAR(TGL_DAFTAR)',TimeNow('Y'))->get('sippadu_user');
			$last_reg = 1;
			if($q_last_reg->num_rows() > 0){
				$a_last_reg = $q_last_reg->row();
				$last_reg = $a_last_reg->No_Reg + 1;
			}
			$in['No_Reg'] = $last_reg;
			$in['ID'] = $last_id;
			$in['ID_User'] = $this->session->userdata('sippadu_userid');
			$in['IDPELANGGAN'] = $idpelanggan = TimeNow('Y').str_pad($last_reg,5,0,STR_PAD_LEFT);
			$in['NM_PELANGGAN'] = $this->input->post('nama');
			$in['TEMPAT_LAHIR'] = $this->input->post('tempat_lahir');
			$in['TGL_LAHIR'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in['SEX'] = $this->input->post('gender');
			$in['PEKERJAAN'] = $this->input->post('pekerjaan');
			$in['ALAMATPELANGGAN'] = $this->input->post('alamat');
			$in['PROVINSI'] = $this->input->post('op_provinsi');
			$in['KOTA'] = $this->input->post('op_kota');
			$in['KECAMATAN'] = $this->input->post('op_kecamatan');
			$in['DESA'] = $this->input->post('op_desa');
			$in['TELP'] = $this->input->post('telepon');
			$in['FAX'] = $this->input->post('fax');
			$in['EMAIL'] = $this->input->post('email');
			$in['IDENTITAS'] = '01';
			$in['NOKITAS'] = $this->input->post('nokitas');
			$in['JNS_PELANGGAN'] = '01';
			$in['TGL_DAFTAR'] = TimeNow('Y-m-d H:i:s');
			$in['NPWP'] = $this->input->post('npwp');
			$in['NO_HP'] = $this->input->post('hp');
			$in['STATUS_DAFTAR'] = 'L';
			$a = $this->db->insert('tbpelanggan',$in);
			if($a){
				set_alert('success','Data berhasil disimpan');
				if($win){
					if($redirect){
						$this->session->set_flashdata('WindowRedirect',1);
						$this->session->set_flashdata('IDRedirect',$idpelanggan);
					}
					else{
						$this->session->set_flashdata('WindowReload',1);
					}
				}
				
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function update_personal($id=0,$win=FALSE,$redirect=FALSE){
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','');
		$this->form_validation->set_rules('gender','Jenis Kelamin','is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('nokitas','No Identitas','required');
		$this->form_validation->set_rules('npwp','NPWP','');
		$this->form_validation->set_rules('telepon','Telepon','');
		$this->form_validation->set_rules('hp','HP','');
		$this->form_validation->set_rules('fax','Fax','');
		$this->form_validation->set_rules('email','Email','');
		if($this->form_validation->run() == TRUE){
			
			$wh2['ID_Web'] = config();
			$wh2['ID_User'] = $id;
			$wh2['No_Kitas'] = $nokitas = $this->input->post('nokitas');
			$in2['Nm_User'] = $this->input->post('nama');
			$in2['Tempat_Lahir'] = $this->input->post('tempat_lahir');
			$in2['Tgl_Lahir'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in2['Gender'] = $this->input->post('gender');
			$in2['Pekerjaan'] = $this->input->post('pekerjaan');
			$in2['Alamat'] = $this->input->post('alamat');
			$in2['Provinsi'] = $this->input->post('op_provinsi');
			$in2['Kota'] = $this->input->post('op_kota');
			$in2['Kecamatan'] = $this->input->post('op_kecamatan');
			$in2['Desa'] = $this->input->post('op_desa');
			$in2['Telp'] = $this->input->post('telepon');
			$in2['No_HP'] = $this->input->post('hp');
			$in2['Fax'] = $this->input->post('fax');
			$in2['Email'] = $this->input->post('email');
			$in2['NPWP'] = $this->input->post('npwp');
			$s = $this->db->update('sippadu_user',$in2,$wh);
			
			$cek_kitas = $this->db->where('NOKITAS',$nokitas)->get('tbpelanggan');
			if($cek_kitas->num_rows() > 0){
				$ck = $cek_kitas->first_row();
				$wh['IDPELANGGAN'] = $idpelanggan = $ck->IDPELANGGAN;
				$wh['ID_Web'] = config();
				$in['ID_User'] = $this->session->userdata('sippadu_userid');
				$in['NM_PELANGGAN'] = $this->input->post('nama');
				$in['TEMPAT_LAHIR'] = $this->input->post('tempat_lahir');
				$in['TGL_LAHIR'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
				$in['SEX'] = $this->input->post('gender');
				$in['PEKERJAAN'] = $this->input->post('pekerjaan');
				$in['ALAMATPELANGGAN'] = $this->input->post('alamat');
				$in['PROVINSI'] = $this->input->post('op_provinsi');
				$in['KOTA'] = $this->input->post('op_kota');
				$in['KECAMATAN'] = $this->input->post('op_kecamatan');
				$in['DESA'] = $this->input->post('op_desa');
				$in['TELP'] = $this->input->post('telepon');
				$in['FAX'] = $this->input->post('fax');
				$in['EMAIL'] = $this->input->post('email');
				$in['IDENTITAS'] = '01';
				$in['NOKITAS'] = $this->input->post('nokitas');
				$in['JNS_PELANGGAN'] = '01';
				//$in['TGL_DAFTAR'] = TimeNow('Y-m-d H:i:s');
				$in['NPWP'] = $this->input->post('npwp');
				$in['NO_HP'] = $this->input->post('hp');
				$in['STATUS_DAFTAR'] = 'L';
				$a = $this->db->update('tbpelanggan',$in,$wh);
			}
			else{
				$q_last_id = $this->db->select_max('ID','ID')->get('tbpelanggan');
				$last_id = 1;
				if($q_last_id->num_rows() > 0){
					$a_last_id = $q_last_id->row();
					$last_id = $a_last_id->ID + 1;
				}
				$q_last_reg = $this->db->select_max('No_Reg','No_Reg')->where('YEAR(TGL_DAFTAR)',TimeNow('Y'))->get('tbpelanggan');
				$last_reg = 1;
				if($q_last_reg->num_rows() > 0){
					$a_last_reg = $q_last_reg->row();
					$last_reg = $a_last_reg->No_Reg + 1;
				}
				$in['ID_Web'] = config();
				$in['No_Reg'] = $last_reg;
				$in['ID'] = $last_id;
				$in['ID_User'] = $this->session->userdata('sippadu_userid');
				$in['IDPELANGGAN'] = $idpelanggan = TimeNow('Y').str_pad($last_reg,5,0,STR_PAD_LEFT);
				$in['NM_PELANGGAN'] = $this->input->post('nama');
				$in['TEMPAT_LAHIR'] = $this->input->post('tempat_lahir');
				$in['TGL_LAHIR'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
				$in['SEX'] = $this->input->post('gender');
				$in['PEKERJAAN'] = $this->input->post('pekerjaan');
				$in['ALAMATPELANGGAN'] = $this->input->post('alamat');
				$in['PROVINSI'] = $this->input->post('op_provinsi');
				$in['KOTA'] = $this->input->post('op_kota');
				$in['KECAMATAN'] = $this->input->post('op_kecamatan');
				$in['DESA'] = $this->input->post('op_desa');
				$in['TELP'] = $this->input->post('telepon');
				$in['FAX'] = $this->input->post('fax');
				$in['EMAIL'] = $this->input->post('email');
				$in['IDENTITAS'] = '01';
				$in['NOKITAS'] = $this->input->post('nokitas');
				$in['JNS_PELANGGAN'] = '01';
				$in['TGL_DAFTAR'] = TimeNow('Y-m-d H:i:s');
				$in['NPWP'] = $this->input->post('npwp');
				$in['NO_HP'] = $this->input->post('hp');
				$in['STATUS_DAFTAR'] = 'L';
				$a = $this->db->insert('tbpelanggan',$in);
				
			}
			
			$this->session->set_userdata('sess_id_pelanggan',$idpelanggan);
			
			if($a){
				redirect(site_url(fmodule($this->session->userdata('sess_class_izin'))));
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function save_session_personal(){
		$this->form_validation->set_rules('op_pelanggan','Pilih Pelanggan','');
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','');
		$this->form_validation->set_rules('gender','Jenis Kelamin','is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('nokitas','No Identitas','required');
		$this->form_validation->set_rules('npwp','NPWP','');
		$this->form_validation->set_rules('telepon','Telepon','');
		$this->form_validation->set_rules('hp','HP','');
		$this->form_validation->set_rules('fax','Fax','');
		$this->form_validation->set_rules('email','Email','');
		if($this->form_validation->run() == TRUE){
			
			$in2['sess_p_op_pelanggan'] = $this->input->post('op_pelanggan');
			$in2['sess_p_id_web'] = config();
			$in2['sess_p_id_user'] = $id;
			$in2['sess_p_no_kitas'] = $nokitas = $this->input->post('nokitas');
			$in2['sess_p_nm_user'] = $this->input->post('nama');
			$in2['sess_p_tempat_lahir'] = $this->input->post('tempat_lahir');
			$in2['sess_p_tgl_lahir'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in2['sess_p_gender'] = $this->input->post('gender');
			$in2['sess_p_pekerjaan'] = $this->input->post('pekerjaan');
			$in2['sess_p_alamat'] = $this->input->post('alamat');
			$in2['sess_p_provinsi'] = $this->input->post('op_provinsi');
			$in2['sess_p_kota'] = $this->input->post('op_kota');
			$in2['sess_p_kecamatan'] = $this->input->post('op_kecamatan');
			$in2['sess_p_desa'] = $this->input->post('op_desa');
			$in2['sess_p_telp'] = $this->input->post('telepon');
			$in2['sess_p_no_hp'] = $this->input->post('hp');
			$in2['sess_p_fax'] = $this->input->post('fax');
			$in2['sess_p_email'] = $this->input->post('email');
			$in2['sess_p_npwp'] = $this->input->post('npwp');
			$a = $this->session->set_userdata($in2);
			
			redirect(site_url(fmodule($this->session->userdata('sess_class_izin'))));
			
		}
	}
	
	function cek_data_personal($kitas=0){
		$a = $this->db->like('NOKITAS',$kitas)->get('tbpelanggan');
		return $a;
	}
	
	function cek_id_personal($kitas=''){
		$a = $this->db->where('NOKITAS',$kitas)->get('tbpelanggan');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = $aa->IDPELANGGAN;
		}
		return $h;
	}
	
	function cek_nama_personal($kitas=''){
		$a = $this->db->where('NOKITAS',$kitas)->get('tbpelanggan');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = $aa->NM_PELANGGAN;
		}
		return $h;
	}
	
	function op_pelanggan($id=0){
		$a = $this->db->query('SELECT b.IDPELANGGAN,b.NM_PELANGGAN FROM sippadu_user_log a inner join tbpelanggan b on a.ID_Pelanggan=b.IDPELANGGAN WHERE /*a.ID_Web = '.config().' AND*/ a.ID_User = "'.$id.'"');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Data Pemohon -';
				$h[$aa->IDPELANGGAN] = $aa->NM_PELANGGAN;
				$h['add'] = '+ Tambah Data Pemohon +';
			}
		}
		else{
			$h['0'] = '+ Tambah Data Pemohon +';
		}
		return $h;
	}
	
	function get_tbl_klaim($limit=0,$offset=0){
		$user = $this->session->userdata('sippadu_userid');
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY Nm_Personal ASC';
		//$order = 'p.NM_PELANGGAN ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			//$keyword = 'anggaran';
			$q_where .= 'AND (Nm_Personal like "%'.$keyword.'%"  or No_Kitas like "%'.$keyword.'%") ';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select * FROM sippadu_personal_klaim where Status = 0 AND ID_User = "'.$user.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function insert_klaim(){
		$this->form_validation->set_rules('nokitas','Nomor Identitas','required');
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','is_natural_no_zero');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','is_natural_no_zero');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','is_natural_no_zero');
		$this->form_validation->set_rules('no_hp','No Handphone','required');
		
		if($this->form_validation->run() == TRUE){
			$userid = $this->session->userdata('sippadu_userid');
			$qlast = $this->db->select_max('ID','ID')->get('sippadu_personal_klaim');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID+1;
			} 
			
			if ($_FILES['file_kitas']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('theme').'/files/berkas/personal/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$config['file_name']= 'klaim-'.$last_id;
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('file_kitas')) {
					$u	 				= $this->upload->data();
					$in2['Filename']	= $u['file_name'];
				}
			}
			
			$in2['ID'] = $last_id;
			$in2['ID_User'] = $userid;
			$in2['No_Kitas'] = $this->input->post('nokitas');
			$in2['Nm_Personal'] = $this->input->post('nama');
			$in2['Tempat_Lahir'] = $this->input->post('tempat_lahir');
			$in2['Tgl_Lahir'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in2['No_HP'] = $this->input->post('no_hp');
			$in2['Status'] = 0;
			$a = $this->db->insert('sippadu_personal_klaim',$in2);
			
			if($a){
				set_alert('success','Data berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
			
		}
	}
	
	function update_klaim($id=0){
		$this->form_validation->set_rules('nokitas','Nomor Identitas','required');
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','is_natural_no_zero');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','is_natural_no_zero');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','is_natural_no_zero');
		$this->form_validation->set_rules('no_hp','No Handphone','required');
		
		if($this->form_validation->run() == TRUE){
			if ($_FILES['file_kitas']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('theme').'/files/berkas/personal/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$config['file_name']= 'klaim-'.$id;
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('file_kitas')) {
					$u	 				= $this->upload->data();
					$in2['Filename']	= $u['file_name'];
				}
				
				$oldfile = $this->input->post('oldfile');
				file_exists($upload_path.$oldfile) ? unlink($upload_path.$oldfile) : '';
			}
			
			$userid = $this->session->userdata('sippadu_userid');
			$wh2['ID'] = $id;
			$wh2['ID_User'] = $userid;
			$in2['No_Kitas'] = $this->input->post('nokitas');
			$in2['Nm_Personal'] = $this->input->post('nama');
			$in2['Tempat_Lahir'] = $this->input->post('tempat_lahir');
			$in2['Tgl_Lahir'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in2['No_HP'] = $this->input->post('no_hp');
			//$in2['Status'] = 0;
			$a = $this->db->update('sippadu_personal_klaim',$in2,$wh2);
			
			if($a){
				set_alert('success','Data berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
			
		}
	}
	
	function get_data_klaim($id=0){
		$a = $this->db->where('ID',$id)->get('sippadu_personal_klaim');
		return $a;
	}
	
	function delete_personal_klaim(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID'] = $id;
				$this->db->delete('sippadu_personal_klaim',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
}
