<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_reklame extends CI_Model {
	
	function op_jenis_izin(){
		$h = array();
		$h['1'] = 'Baru';
		$h['2'] = 'Perpanjangan';
		$h['3'] = 'Perubahan';
		return $h;
	}
	
	function op_pengurus_permohonan(){
		$h = array();
		$h['1'] = 'Sendiri';
		$h['2'] = 'Pihak Kedua';
		return $h;
	}
	
	function op_bentuk_perusahaan(){
		$h = array();
		$h['0'] = '- Pilih Bentuk Usaha -';
		$h['1'] = 'Perseroan Terbatas (PT)';
		$h['2'] = 'Perseroan Terbatas Belum Berbadan Hukum';
		$h['3'] = 'Persekutuan Comanditer (CV)';
		$h['4'] = 'Firma (FA)';
		$h['5'] = 'Koperasi';
		$h['6'] = 'Perusahaan Perorangan';
		$h['7'] = 'Bentuk Perusahaan Lainnya';
		return $h;
	}
	
	function syarat_ketentuan($id=0){
		$a = $this->db->where('Kd_Izin',$id)->get('tb_izin');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = $aa->Syarat_Ketentuan;
		}
		return $h;
	}
	
	function op_perusahaan($id=0){
		$a = $this->db->query('SELECT b.IDPERUSAHAAN,b.NM_PERUSAHAAN FROM sippadu_user_perusahaan a inner join tbperusahaan b on a.ID_Perusahaan=b.IDPERUSAHAAN  WHERE a.ID_User = "'.$id.'"');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '+ Tambah Usaha +';
				$h[$aa->IDPERUSAHAAN] = $aa->NM_PERUSAHAAN;
			}
		}
		else{
			$h['0'] = '+ Tambah Usaha +';
		}
		return $h;
	}
	
	function op_pelanggan($id=0){
		$a = $this->db->query('SELECT b.IDPELANGGAN,b.NM_PELANGGAN FROM sippadu_user_pelanggan a inner join tbpelanggan b on a.ID_Pelanggan=b.IDPELANGGAN WHERE a.ID_User = "'.$id.'"');
		$h = array();
		$h['0'] = '- Pilih Data Pemohon -';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[$aa->IDPELANGGAN] = $aa->NM_PELANGGAN;
			}
		}
		$h['add'] = '+ Tambah Data Pemohon +';
		return $h;
	}
	
	function get_personal($id=0){
		$a = $this->db->where('IDPELANGGAN',$id)->get('tbpelanggan');
		return $a;
	}
	
	function get_reklame($id=0){
		$a = $this->db->where('ID',$id)->get('tbreklame');
		return $a;
	}
	
	function get_perusahaan($id=0){
		$a = $this->db->where('IDPERUSAHAAN',$id)->get('tbperusahaan');
		return $a;
	}
	
	
	function insert_reklame(){
		$this->form_validation->set_rules('op_pelanggan','Pilih Pemohon','');
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','');
		$this->form_validation->set_rules('gender','Jenis Kelamin','is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','');
		$this->form_validation->set_rules('alamat','Alamat','');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('nokitas','No Identitas','');
		$this->form_validation->set_rules('npwp','NPWP','');
		$this->form_validation->set_rules('telepon','Telepon','');
		$this->form_validation->set_rules('hp','HP','');
		$this->form_validation->set_rules('fax','Fax','');
		$this->form_validation->set_rules('email','Email','');
		
		$this->form_validation->set_rules('no_mohon','No Surat Mohon','');
		$this->form_validation->set_rules('tgl_mohon','Tanggal Mohon','');
		$this->form_validation->set_rules('op_pengurus_permohonan','Pengurus Permohonan','is_natural_no_zero');
		$this->form_validation->set_rules('nama_pengurus','Nama Pengurus','');
		$this->form_validation->set_rules('alamat_pengurus','Alamat Pengurus','');
		$this->form_validation->set_rules('hp_pengurus','No HP Pengurus','');
		$this->form_validation->set_rules('jenis_izin','Jenis Izin','is_natural_no_zero');
		$this->form_validation->set_rules('urutan','Registrasi Ke','');
		$this->form_validation->set_rules('no_sk_lama','Nomor SK Lama','');
		$this->form_validation->set_rules('tgl_sk_lama','Tanggal SK Lama','');
		
		/* $this->form_validation->set_rules('nama_usaha','Nama Usaha','');
		$this->form_validation->set_rules('alamat_usaha','Alamat Usaha','');
		$this->form_validation->set_rules('rt_usaha','RT Usaha','');
		$this->form_validation->set_rules('rw_usaha','RW Usaha','');
		$this->form_validation->set_rules('kodepos_usaha','Kodepos Usaha','');
		$this->form_validation->set_rules('telp_usaha','Telepon Usaha','');
		$this->form_validation->set_rules('fax_usaha','Fax Usaha',''); */
		//$this->form_validation->set_rules('perihal','Perihal Izin','required');
		//$this->form_validation->set_rules('lokasi','Lokasi Usaha','required');
		/* $this->form_validation->set_rules('op_provinsi2','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi2','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan2','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa2','Desa','is_natural_no_zero'); */
		/* $this->form_validation->set_rules('npwp_perusahaan','NPWP','');
		$this->form_validation->set_rules('telepon_perusahaan','Telepon','');
		$this->form_validation->set_rules('fax_perusahaan','Fax','');
		$this->form_validation->set_rules('email','Email','');
		$this->form_validation->set_rules('web_perusahaan','Website','');
		$this->form_validation->set_rules('op_bentuk_perusahaan','Bentuk Perusahaan','is_natural_no_zero');
		$this->form_validation->set_rules('jabatan','Jabatan','required'); */
		if($this->form_validation->run() == TRUE){
			
			$qa_last_id = $this->db->select_max('ID','ID')->get('tbpelanggan');
			$last_id_pelanggan = 1;
			if($qa_last_id->num_rows() > 0){
				$a_last_id = $qa_last_id->row();
				$last_id_pelanggan = $a_last_id->ID + 1;
			}
			$qa_last_reg = $this->db->select_max('No_Reg','No_Reg')->where('YEAR(TGL_DAFTAR)',TimeNow('Y'))->get('tbpelanggan');
			$last_reg = 1;
			if($qa_last_reg->num_rows() > 0){
				$a_last_reg = $qa_last_reg->row();
				$last_reg = $a_last_reg->No_Reg + 1;
			}
			
			
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
			
			if($this->input->post('op_pelanggan') == 'add'){
				$in['ID_Web'] = config();
				$in['No_Reg'] = $last_reg;
				$in['ID_User'] = 0;
				$in['ID'] = $last_id_pelanggan;
				$in['IDPELANGGAN'] = $idpelanggan = TimeNow('Y').str_pad($last_reg,5,0,STR_PAD_LEFT);
				$a = $this->db->insert('tbpelanggan',$in);
				
				//=== insert log user pelanggan
				$in2['ID_Web'] = config();
				$in2['ID_User'] = $this->session->userdata('sippadu_userid');
				$in2['ID_Pelanggan'] = $idpelanggan;
				$b = $this->db->insert('sippadu_user_pelanggan',$in2);
			}
			else{
				$wh['IDPELANGGAN'] = $idpelanggan = $this->input->post('op_pelanggan');
				$a = $this->db->update('tbpelanggan',$in,$wh);
			}
			
			
			
			//=== insert
			
			
			$idperusahaan = $this->input->post('op_perusahaan');
			$in3['IDPELANGGAN'] = $idpelanggan;
			$in3['NM_PERUSAHAAN'] = $this->input->post('nama_perusahaan');
			$in3['ALAMAT'] = $this->input->post('alamat_perusahaan');
			$in3['PROVINSI'] = $this->input->post('op_provinsi');
			$in3['KOTA'] = $this->input->post('op_kota');
			$in3['KECAMATAN'] = $this->input->post('op_kecamatan');
			$in3['DESA'] = $this->input->post('op_desa');
			$in3['NPWP'] = $this->input->post('npwp_perusahaan');
			$in3['TELP'] = $this->input->post('telepon_perusahaan');
			$in3['FAX'] = $this->input->post('fax_perusahaan');
			$in3['EMAIL'] = $this->input->post('email_perusahaan');
			$in3['WEB'] = $this->input->post('web_perusahaan');
			$in3['BNTK_PERUSAHAAN'] = $this->input->post('op_bentuk_perusahaan');
			$in3['JABATAN'] = $this->input->post('jabatan');
			
			if($idperusahaan == '0'){
				$qb_last_id = $this->db->select_max('IDPERUSAHAAN','IDPERUSAHAAN')->get('tbperusahaan');
				if($qb_last_id->num_rows() > 0){
					$b_last_id = $qb_last_id->row();
					$idperusahaan = $b_last_id->IDPERUSAHAAN + 1;
				}
				
				$in3['IDPERUSAHAAN'] = $idperusahaan;
				$this->db->insert('tbperusahaan',$in3);
				
				//=== insert log user pelanggan
				$in6['ID_Web'] = config();
				$in6['ID_User'] = $this->session->userdata('sippadu_userid');
				$in6['ID_Perusahaan'] = $idperusahaan;
				$e = $this->db->insert('sippadu_user_perusahaan',$in6);
			}
			else{
				$wh3['IDPERUSAHAAN'] = $idperusahaan;
				$this->db->update('tbperusahaan',$in3,$wh3);
			}
			
			$qc_last_id = $this->db->select_max('ID','ID')->get('tbreklame');
			$last_id_izin = 1;
			if($qc_last_id->num_rows() > 0){
				$c_last_id = $qc_last_id->row();
				$last_id_izin = $c_last_id->ID + 1;
			}
			
			$qc_last_reg = $this->db->select_max('No_Reg','No_Reg')->where('YEAR(Time_Buat)',TimeNow('Y'))->get('tbreklame');
			$last_reg_izin = 1;
			if($qc_last_reg->num_rows() > 0){
				$c_last_reg = $qc_last_reg->row();
				$last_reg_izin = $c_last_reg->No_Reg + 1;
			}
			
			$in4['No_Reg'] = $last_reg_izin;
			$in4['ID'] = $last_id_izin;
			$in4['ID_Reg'] = str_pad($last_reg_izin,5,0,STR_PAD_LEFT).'/REKLAME/'.TimeNow('Y');
			$in4['ID_Pelanggan'] = $idpelanggan;
			//$in4['IDPERUSAHAAN'] = $idperusahaan;
			$in4['Jenis_Izin'] = $jenis_izin = $this->input->post('jenis_izin');
			$in4['No_Surat_Mohon'] = $this->input->post('no_mohon');
			$in4['Tgl_Mohon'] = db_time($this->input->post('tgl_mohon'));
			$in4['Kd_Pengurus'] = $this->input->post('op_pengurus_permohonan');
			$in4['Nm_Pengurus'] = $this->input->post('nama_pengurus');
			$in4['Alamat_Pengurus'] = $this->input->post('alamat_pengurus');
			$in4['Telp_Pengurus'] = $this->input->post('hp_pengurus');
			$in4['Jenis_Izin'] = $this->input->post('jenis_izin');
			$in4['Registrasi_Ke'] = $this->input->post('urutan');
			$in4['No_SKL'] = $this->input->post('no_sk_lama');
			$in4['Tgl_SKL'] = db_time($this->input->post('tgl_sk_lama'));
			/* $in4['Nm_Usaha'] = $this->input->post('nama_usaha');
			$in4['Alamat_Usaha'] = $this->input->post('alamat_usaha');
			$in4['RT_Usaha'] = $this->input->post('rt_usaha');
			$in4['RW_Usaha'] = $this->input->post('rw_usaha');
			$in4['Kodepos_Usaha'] = $this->input->post('kodepos_usaha');
			$in4['Telp_Usaha'] = $this->input->post('telp_usaha');
			$in4['Fax_Usaha'] = $this->input->post('fax_usaha');
			$in4['Kd_Provinsi'] = $this->input->post('op_provinsi2');
			$in4['Kd_Kota'] = $this->input->post('op_kota2');
			$in4['Kd_Kecamatan'] = $this->input->post('op_kecamatan2');
			$in4['Kd_Desa'] = $this->input->post('op_desa2'); */
			$in4['Flow_FO'] = 1;
			
			$in4['Time_Buat'] = TimeNow('Y-m-d H:i:s');
			$in4['Nm_FO'] = $this->session->userdata('sippadu_userfullname');
			$in4['Status'] = 1;
			$a = $this->db->insert('tbreklame',$in4);
			
			
			//==== upload berkas
			
			$Kd_Izin = $this->input->post('Kd_Izin');
			$Kd_Jenis = $this->input->post('jenis_izin');
			$ID_Izin = $last_id_izin;
			$data_dok = dok_checklist($Kd_Izin,$Kd_Jenis);
			if($data_dok->num_rows() > 0){ 
				foreach($data_dok->result() as $dok){ 
					$Kd_Dok = $dok->Kd_Dok;
					if ($_FILES['userfile_'.$Kd_Dok]['name'] != ''){
						$config['upload_path'] 	= $upload_path = './assets/'.config('theme').'/files/berkas/reklame/';
						$config['encrypt_name']	= FALSE;
						$config['remove_spaces']= TRUE;	
						$config['allowed_types']= '*';
						$this->upload->initialize($config); 

						if ($this->upload->do_upload('userfile_'.$Kd_Dok)) {
							$u	 			= $this->upload->data();
							$in5['Nm_File']	= $u['file_name'];
							$wh5['Kd_Izin']	= $Kd_Izin;
							$wh5['ID_Izin']	= $ID_Izin;
							$wh5['Kd_Dok']	= $Kd_Dok;
							$cek = $this->db->get_where('tb_dokumen_log',$wh5);
							if($cek->num_rows() > 0){
								$this->db->update('tb_dokumen_log',$in5,$wh5);
							}
							else{
								$in5['Kd_Izin']	= $Kd_Izin;
								$in5['ID_Izin']	= $ID_Izin;
								$in5['Kd_Dok']	= $dok->Kd_Dok;
								$this->db->insert('tb_dokumen_log',$in5);
							}
						}
					}
				} 
			}
			
			set_alert('success','Pendaftaran izin anda telah berhasil kami terima dan telah masuk antrian. Silakan cetak tanda terima anda lewat tabel dibawah ini untuk keperluan tracking atau tanda bukti pengajuan izin');
			redirect(site_url(fmodule('history')));
		}
	}
	
	
}
