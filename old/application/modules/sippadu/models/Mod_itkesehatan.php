<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_itkesehatan extends CI_Model {
	
	function get_tbl_itkesehatan_fo($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_itkesehatan_bo($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_itkesehatan_kabid($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = 1 and tbitkesehatan.Flow_Kabid = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_itkesehatan_kadin($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = 1 and tbitkesehatan.Flow_Kabid = 1 and tbitkesehatan.Flow_Kadin = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_itkesehatan_tu($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = 1 and tbitkesehatan.Flow_Kabid = 1 and tbitkesehatan.Flow_Kadin = 1 and tbitkesehatan.Flow_TU = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_itkesehatan_cetak($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = 1 and tbitkesehatan.Flow_Kabid = 1 and tbitkesehatan.Flow_Kadin = 1 and tbitkesehatan.Flow_TU = 1 and tbitkesehatan.Flow_Serah = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_itkesehatan_serah($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbitkesehatan.ID_Pelanggan like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbitkesehatan.Nm_Usaha like "%'.$keyword.'%" OR tbitkesehatan.ID_Reg like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbitkesehatan.ID,
		tbitkesehatan.ID_Reg,
		tbitkesehatan.ID_Pelanggan,
		tbitkesehatan.ID_Usaha,
		"" AS Kd_Jns,
		tbitkesehatan.Jenis_Izin,
		tbitkesehatan.Nm_Usaha,
		tbitkesehatan.No_SK,
		tbitkesehatan.Tgl_SK,
		tbitkesehatan.Flow_FO,
		tbitkesehatan.Flow_BO,
		tbitkesehatan.Flow_Kabid,
		tbitkesehatan.Flow_Kadin,
		tbitkesehatan.Flow_TU,
		tbitkesehatan.Flow_Serah,
		tbitkesehatan.Time_Buat,
		tbitkesehatan.Time_Selesai,
		tbitkesehatan.Nm_Pengambil,
		tbitkesehatan.Time_Diambil,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbpelanggan.PROVINSI,
		tbpelanggan.KOTA,
		tbpelanggan.KECAMATAN,
		tbpelanggan.DESA,
		tbpelanggan.TELP,
		tbpelanggan.NO_HP
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan WHERE tbitkesehatan.Flow_FO = 1 and tbitkesehatan.Flow_BO = 1 and tbitkesehatan.Flow_Kabid = 1 and tbitkesehatan.Flow_Kadin = 1 and tbitkesehatan.Flow_TU = 1 and tbitkesehatan.Flow_Serah = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_personal($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY NM_PELANGGAN ASC';
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (p.IDPELANGGAN like "%'.$keyword.'%"  or p.NM_PELANGGAN like "%'.$keyword.'%" OR p.NOKITAS like "%'.$keyword.'%" OR p.ALAMATPELANGGAN like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select p.*, v.ID_PROVINSI, v.NAMA_PROVINSI, q.ID_KOTA, q.NAMA_KOTA, k.ID_KECAMATAN,k.NAMA_KECAMATAN, d.ID_DESA, d.NAMA_DESA from tbpelanggan p, tbkecamatan k, tbdesa d, tbkota q, tbprovinsi v where v.ID_PROVINSI = p.PROVINSI AND q.ID_KOTA = p.KOTA and k.ID_KECAMATAN=p.KECAMATAN and d.ID_DESA=p.DESA and d.ID_KECAMATAN=p.KECAMATAN '.$q_where.' '.$q_order.' '.$q_limit.'');
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
	
	function get_itkesehatan($id=0){
		$a = $this->db->where('ID',$id)->get('tbitkesehatan');
		return $a;
	}
	
	function delete_tbl_itkesehatan(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			$count_success = array();
			$count_error = array();
			foreach($chk as $id){
				$wh['ID'] = $id;
				$wh['Flow_Kabid'] = '0';
				$wh['Flow_Kadin'] = '0';
				$wh['Flow_TU'] = '0';
				$wh['Flow_Serah'] = '0';
				$a = $this->db->get_where('tbitkesehatan',$wh);
				if($a->num_rows() > 0){
					$b = $this->db->delete('tbitkesehatan',$wh);
					$count_success[] = 1; 
				}
				else{
					$count_error[] = 1;
				}
				
			}
			set_alert('info',count($count_success).' data berhasil dihapus. '.count($count_error).' data gagal dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function verifikasi_tbl_itkesehatan($param='',$status=1){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID'] = $id;
				switch($param){
					case 'bo':
						$in['Flow_BO'] = $status;
						$in['Nm_BO'] = $this->session->userdata('userfullname');
						break;
					case 'kabid':
						$in['Flow_Kabid'] = $status;
						$in['Nm_Kabid'] = $this->session->userdata('userfullname');
						break;
					case 'kadin':
						$in['Flow_Kadin'] = $status;
						$in['Nm_Kadin'] = $this->session->userdata('userfullname');
						break;
					case 'tu':
						$in['Flow_TU'] = $status;
						$in['Nm_TU'] = $this->session->userdata('userfullname');
						if($status=='1'){
							$in['Time_Selesai'] = TimeNow('Y-m-d H:i');
						}
						else{
							$in['Time_Selesai'] = NULL;
						}
						break;
					case 'serah':
						$in['Flow_Serah'] = $status;
						$in['Nm_Serah'] = $this->session->userdata('userfullname');
						if($status=='1'){
							$in['Time_Diambil'] = TimeNow('Y-m-d H:i');
						}
						else{
							$in['Nm_Serah'] = NULL;
							$in['Kd_Pengambil'] = NULL;
							$in['Nm_Pengambil'] = NULL;
							$in['Alamat_Pengambil'] = NULL;
							$in['Telp_Pengambil'] = NULL;
							$in['Time_Diambil'] = NULL;
						}
						break;
					default:
						$in['Flow_FO'] = $status;
						$in['Nm_FO'] = $this->session->userdata('userfullname');
						break;
				}
				
				$this->db->update('tbitkesehatan',$in,$wh);
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function insert_itkesehatan_fo(){
		$Kd_Access = $this->input->post('Kd_Access');
		$Kd_Izin = $this->input->post('Kd_Izin');
		$Kd_Jenis = $this->input->post('jenis_izin');
		
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
		
		$this->form_validation->set_rules('kategori_izin','Kategori Izin','is_natural_no_zero');
		$this->form_validation->set_rules('nama_usaha','Tempat Bekerja','');
		$this->form_validation->set_rules('alamat_usaha','Alamat Tempat Bekerja','');
		$this->form_validation->set_rules('str','Nomor STR','');
		//$this->form_validation->set_rules('perihal','Perihal Izin','required');
		//$this->form_validation->set_rules('lokasi','Lokasi Usaha','required');
		//$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		//$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		//$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		//$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		
		if($this->form_validation->run() == TRUE){
			
			$q_last_id = $this->db->select_max('ID','ID')->get('tbitkesehatan');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}
			
			$q_last_reg = $this->db->select_max('No_Reg','No_Reg')->where('YEAR(Time_Buat)',TimeNow('Y'))->get('tbitkesehatan');
			$last_reg = 1;
			if($q_last_reg->num_rows() > 0){
				$a_last_reg = $q_last_reg->row();
				$last_reg = $a_last_reg->No_Reg + 1;
			}
			$in2['No_Reg'] = $last_reg;
			$in2['ID'] = $last_id;
			$in2['ID_Reg'] = str_pad($last_reg,5,0,STR_PAD_LEFT).'/ITKES/'.TimeNow('Y');
			$in2['No_Surat_Mohon'] = $this->input->post('no_mohon');
			$in2['Tgl_Mohon'] = db_time($this->input->post('tgl_mohon'));
			$in2['ID_Pelanggan'] = $this->input->post('idpelanggan');
			$in2['Kd_Pengurus'] = $this->input->post('op_pengurus_permohonan');
			$in2['Nm_Pengurus'] = $this->input->post('nama_pengurus');
			$in2['Alamat_Pengurus'] = $this->input->post('alamat_pengurus');
			$in2['Telp_Pengurus'] = $this->input->post('hp_pengurus');
			$in2['Nm_Usaha'] = $this->input->post('nama_usaha');
			$in2['Alamat_Usaha'] = $this->input->post('alamat_usaha');
			$in2['Jenis_Izin'] = $this->input->post('jenis_izin');
			$in2['Registrasi_Ke'] = $this->input->post('urutan');
			$in2['No_SKL'] = $this->input->post('no_sk_lama');
			$in2['Tgl_SKL'] = db_time($this->input->post('tgl_sk_lama'));
			$in2['Kategori'] = $this->input->post('kategori_izin');
			$in2['STR'] = $this->input->post('str');
			//$in2['Kd_Provinsi'] = $this->input->post('op_provinsi');
			//$in2['Kd_Kota'] = $this->input->post('op_kota');
			//$in2['Kd_Kecamatan'] = $this->input->post('op_kecamatan');
			//$in2['Kd_Desa'] = $this->input->post('op_desa');
			$in2['Flow_FO'] = 1;
			
			$in2['Time_Buat'] = TimeNow('Y-m-d H:i:s');
			$in2['Nm_FO'] = $this->session->userdata('userfullname');
			$a = $this->db->insert('tbitkesehatan',$in2);
			
			
			if($a){
				$chk = $this->input->post('chk');
				if(is_array($chk)){
					$wh3['ID_Izin'] = $last_id;
					$wh3['Kd_Izin'] = $Kd_Izin;
					$this->db->delete('tb_dokumen_log',$wh3);
					foreach($chk as $c){
						$in4['ID_Izin'] = $last_id;
						$in4['Kd_Izin'] = $Kd_Izin;
						$in4['Kd_Dok'] = $c;
						$this->db->insert('tb_dokumen_log',$in4);
					}
				}
				set_alert('success','Data berhasil disimpan');
				redirect(fmodule('itkesehatan/fo'));
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function update_itkesehatan($id=0){
		$Kd_Access = $this->input->post('Kd_Access');
		$Kd_Izin = $this->input->post('Kd_Izin');
		$Kd_Jenis = $this->input->post('jenis_izin');
		
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
		
		$this->form_validation->set_rules('kategori_izin','Kategori Izin','is_natural_no_zero');
		$this->form_validation->set_rules('nama_usaha','Tempat Bekerja','');
		$this->form_validation->set_rules('alamat_usaha','Alamat Tempat Bekerja','');
		$this->form_validation->set_rules('str','Nomor STR','');
		//$this->form_validation->set_rules('perihal','Perihal Izin','required');
		//$this->form_validation->set_rules('lokasi','Lokasi Usaha','required');
		//$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		//$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		//$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		//$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		
		if($Kd_Access == 'bo'){
			/* $this->form_validation->set_rules('jenis','Jenis Bangunan','required');
			$this->form_validation->set_rules('peruntukan','Peruntukan Bangunan','required');
			$this->form_validation->set_rules('luas','Luas Bangunan','required');
			$this->form_validation->set_rules('retribusi','Nilai Total Retribusi','required');
			$this->form_validation->set_rules('utara','Batas Utara','required');
			$this->form_validation->set_rules('selatan','Batas Selatan','required');
			$this->form_validation->set_rules('timur','Batas Timur','required');
			$this->form_validation->set_rules('barat','Batas Barat','required');
			$this->form_validation->set_rules('kepemilikan','Kepemilikan Tanah','required');
			$this->form_validation->set_rules('bap','BAP','');
			$this->form_validation->set_rules('tgl_bap','Tanggal BAP',''); */
			$this->form_validation->set_rules('keterangan','Keterangan',''); 
			
		}
		
		if($Kd_Access == 'tu'){
			
			$this->form_validation->set_rules('no_sk','Nomor SK','required');
			$this->form_validation->set_rules('no_urut_sk','No Urut SK','required');
			$this->form_validation->set_rules('tgl_sk','Tanggal SK','required');
			$this->form_validation->set_rules('tgl_ska','Tanggal SK Akhir','');
		}
		
		if($this->form_validation->run() == TRUE){
			
			/*$q_last_id = $this->db->select_max('ID','ID')->where('YEAR(Time_Buat)',TimeNow('Y'))->get('tbitkesehatan');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}*/
			
			$wh2['ID'] = $id;
			//$in2['IDIzin Tenaga Kesehatan'] = str_pad($last_id,5,0,STR_PAD_LEFT).'/Izin Tenaga Kesehatan/'.TimeNow('Y');
			$in2['No_Surat_Mohon'] = $this->input->post('no_mohon');
			$in2['Tgl_Mohon'] = db_time($this->input->post('tgl_mohon'));
			$in2['ID_Pelanggan'] = $this->input->post('idpelanggan');
			$in2['Kd_Pengurus'] = $this->input->post('op_pengurus_permohonan');
			$in2['Nm_Pengurus'] = $this->input->post('nama_pengurus');
			$in2['Alamat_Pengurus'] = $this->input->post('alamat_pengurus');
			$in2['Telp_Pengurus'] = $this->input->post('hp_pengurus');
			$in2['Nm_Usaha'] = $this->input->post('nama_usaha');
			$in2['Alamat_Usaha'] = $this->input->post('alamat_usaha');
			$in2['Jenis_Izin'] = $this->input->post('jenis_izin');
			$in2['Registrasi_Ke'] = $this->input->post('urutan');
			$in2['No_SKL'] = $this->input->post('no_sk_lama');
			$in2['Tgl_SKL'] = db_time($this->input->post('tgl_sk_lama'));
			$in2['Kategori'] = $this->input->post('kategori_izin');
			$in2['STR'] = $this->input->post('str');
			//$in2['Kd_Provinsi'] = $this->input->post('op_provinsi');
			//$in2['Kd_Kota'] = $this->input->post('op_kota');
			//$in2['Kd_Kecamatan'] = $this->input->post('op_kecamatan');
			//$in2['Kd_Desa'] = $this->input->post('op_desa');
			
			if($Kd_Access == 'fo'){
				$in2['Nm_FO'] = $this->session->userdata('userfullname');
			}
			
			if($Kd_Access == 'bo' || $Kd_Access == 'tu'){
				/* $in2['Jenis_Bangunan'] = $this->input->post('jenis');
				$in2['Peruntukan_Bangunan'] = $this->input->post('peruntukan');
				$in2['Luas_Bangunan'] = $this->input->post('luas');
				$in2['Nilai_Retribusi'] = $this->input->post('retribusi');
				$in2['Batas_Utara'] = $this->input->post('utara');
				$in2['Batas_Selatan'] = $this->input->post('selatan');
				$in2['Batas_Timur'] = $this->input->post('timur');
				$in2['Batas_Barat'] = $this->input->post('barat');
				$in2['Nm_SHM'] = $this->input->post('kepemilikan');
				$in2['BAP'] = $this->input->post('bap');
				$in2['Tgl_BAP'] = $this->input->post('tgl_bap'); */
				$in2['Keterangan'] = $this->input->post('keterangan');
				$in2['Font_Size'] = $this->input->post('font');
				
			}
			
			if($Kd_Access == 'bo'){
				$in2['Flow_BO'] = 1;
				$in2['Nm_BO'] = $this->session->userdata('userfullname');
			}
			
			if($Kd_Access == 'tu'){
				$in2['Tgl_SK'] = db_time($this->input->post('tgl_sk'));
				$in2['Tgl_SKA'] = db_time($this->input->post('tgl_ska'));
				$in2['No_SK'] = $this->input->post('no_sk');
				$in2['ID_SK'] = $this->input->post('no_urut_sk');
				$in2['ID_TTD'] = 1;
				
				$in2['Flow_TU'] = 1;
				$in2['Nm_TU'] = $this->session->userdata('userfullname');
			}
			
			$a = $this->db->update('tbitkesehatan',$in2,$wh2);
			
			
			if($a){
				$chk = $this->input->post('chk');
				if(is_array($chk)){
					$wh3['ID_Izin'] = $id;
					$wh3['Kd_Izin'] = $Kd_Izin;
					$this->db->delete('tb_dokumen_log',$wh3);
					foreach($chk as $c){
						$in4['ID_Izin'] = $id;
						$in4['Kd_Izin'] = $Kd_Izin;
						$in4['Kd_Dok'] = $c;
						$this->db->insert('tb_dokumen_log',$in4);
					}
				}
				set_alert('success','Data berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function get_data_perusahaan($id=0){
		$a = $this->db->where('IDPERUSAHAAN',$id)->get('tbperusahaan');
		return $a;
	}
	
	function get_data_itkesehatan($id=0){
		$a = $this->db->where('ID',$id)->get('tbitkesehatan');
		return $a;
	}
	
	function op_perusahaan($idpelanggan=0){
		$a = $this->db->where('IDPELANGGAN',$idpelanggan)->order_by('NM_PERUSAHAAN','ASC')->get('tbperusahaan');
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
	
	function op_jenis_izin(){
		$h = array();
		$h['1'] = 'Baru';
		$h['2'] = 'Perpanjangan';
		$h['3'] = 'Perubahan';
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
	
	function op_pengurus_permohonan(){
		$h = array();
		$h['1'] = 'Sendiri';
		$h['2'] = 'Pihak Kedua';
		return $h;
	}
	
	function op_status_perusahaan(){
		$h = array();
		$h['0'] = '- Pilih Status -';
		$h['1'] = 'Kantor Tunggal';
		$h['2'] = 'Kantor Pusat';
		$h['3'] = 'Kantor Cabang';
		$h['4'] = 'Kantor Pembantu';
		$h['5'] = 'Kantor Perwakilan';
		$h['6'] = 'Kantor Cabang Pembantu';
		$h['7'] = 'Unit Produksi/Pabrik';
		$h['8'] = 'Kantor Kas';
		return $h;
	}
	
	function op_kategori_itkesehatan(){
		$h = array();
		$h['0'] = '- Pilih Kategori Izin Tenaga Kesehatan -';
		$h['1'] = 'Izin Tenaga Kesehatan Mikro';
		$h['2'] = 'Izin Tenaga Kesehatan Kecil';
		$h['3'] = 'Izin Tenaga Kesehatan Menengah';
		$h['4'] = 'Izin Tenaga Kesehatan Besar';
		return $h;
	}
	
	function op_kegiatan_usaha(){
		$h = array();
		$h['0'] = '- Pilih Kegiatan Usaha -';
		$h['1'] = 'Perdagangan Barang';
		$h['2'] = 'Perdagangan Jasa';
		$h['3'] = 'Perdagangan Barang dan Jasa';
		return $h;
	}
	
	function op_kelembagaan(){
		$h = array();
		$h['0'] = '- Pilih Kelembagaan -';
		$h['1'] = 'Perdagangan Skala Mikro';
		$h['2'] = 'Perdagangan Skala Kecil';
		$h['3'] = 'Perdagangan Skala Menengah';
		$h['4'] = 'Perdagangan Skala Besar (Perdagangan Dalam Negeri)';
		$h['5'] = 'Perdagangan Skala Besar (Perdagangan Dalam Negeri,Ekspor,Impor)';
		return $h;
	}
	
	function op_verifikasi(){
		$h = array();
		$h['0'] = 'Belum Disetujui';
		$h['1'] = 'Telah Disetujui';
		return $h;
	}
	
	function op_serah_terima(){
		$h = array();
		$h['0'] = 'Belum Diserahkan';
		$h['1'] = 'Telah Diserahkan Pada Orang Yang Sama';
		$h['2'] = 'Telah Diserahkan Pada Orang Lain';
		return $h;
	}
	
	function op_bukti_terima(){
		$h = array();
		$h['0'] = '-';
		$h['1'] = 'BUKTI PEMBAYARAN/KITAS, SURAT REGISTER';
		$h['2'] = 'BUKTI PEMBAYARAN/KITAS, SURAT REGISTER, SURAT KUASA ASLI';
		return $h;
	}
	
	function op_kategori_izin(){
		$h = array();
		$h['0'] = '-';
		$h['1'] = 'SURAT IJIN KERJA BIDAN (SIKB)';
		$h['2'] = 'SURAT IJIN KERJA PERAWAT (SIKP)';
		return $h;
	}
	
	function get_nomor_sk($idizin=0,$param=0,$kbli=0){
		
		$a = $this->db->where('ID',$idizin)->get('tbitkesehatan');
		$aa = $a->first_row();
		//$id_perusahaan = $aa->ID_Perusahaan; // ID Perusahaan
		$h = $aa->No_SK;
		
		if($h == '' or $this->input->post('submit')){
			/*if($param == ''){
				$e = $this->db->where('IDPERUSAHAAN',$id_perusahaan)->get('tbperusahaan');
				$ee = $e->first_row();
				$kategori_izin = $ee->KATEGORI_IZIN; // Jenis Mikro, Menengah, Besar
				$kode = substr($kategori_izin,-1);
				switch($kode){
					case '1': $param = '1'; break;
					case '2': $param = '2'; break;
					case '3': $param = '3'; break;
					case '4': $param = '4'; break;
					default: $param = '0'; break;
				}
			}*/
			
			// Get Format
			$kd_izin = 9; //Kode Izin Tenaga Kesehatan
			$param = $aa->Kategori;
			$c = $this->db->where('Kd_Izin',$kd_izin)->where('Param',$param)->get('tb_parameter');
			if($c->num_rows() > 0){
			$cc = $c->first_row();
			$format = $cc->Format;
			}
			else{
				$format = '[NOURUT]/[TAHUN]';
			}
			//$format = '[NOURUT]';
			
			$kblia = substr($kbli,0,2);
			
			// Get ID SK
			//$no_urut = str_pad($this->get_id_sk($idizin),5,0,STR_PAD_LEFT);
			$no_urut = $this->get_id_sk($idizin);
			$jenis_ajuan = str_pad($aa->Jenis_Izin,2,0,STR_PAD_LEFT);
			
			$h = str_replace(array('[NOURUT]','[TAHUN]','[JENISAJUAN]'),array($no_urut,TimeNow('Y'),$jenis_ajuan),$format);
		}
		
		return $h;
	}
	
	function get_id_sk($idizin=0){
		$a = $this->db->where('ID',$idizin)->where('YEAR(Time_Buat)',TimeNow('Y'))->get('tbitkesehatan');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_SK;
		}
		
		if($h=='' or $this->input->post('submit')){
			$d = $this->db->select_max('ID_SK','ID_SK')->where('YEAR(Time_Buat)',TimeNow('Y'))->get('tbitkesehatan');
			$h = 1;
			if($d->num_rows() > 0){
				$dd = $d->first_row();
				$h = $dd->ID_SK+1;
			}
		}
		
		return $h;
	}
	
	function get_nomor_agenda($idizin=0,$param=0){
		
		$a = $this->db->where('ID',$idizin)->get('tbitkesehatan');
		$aa = $a->first_row();
		$id_perusahaan = $aa->IDPERUSAHAAN; // ID Perusahaan
		$h = $aa->NO_AGENDA;
		
		if($h == '' or $this->input->post('submit')){
			/*if($param == ''){
				$e = $this->db->where('IDPERUSAHAAN',$id_perusahaan)->get('tbperusahaan');
				$ee = $e->first_row();
				$kategori_izin = $ee->KATEGORI_IZIN; // Jenis Mikro, Menengah, Besar
				$kode = substr($kategori_izin,-1);
				switch($kode){
					case '1': $param = '1'; break;
					case '2': $param = '2'; break;
					case '3': $param = '3'; break;
					case '4': $param = '4'; break;
					default: $param = '0'; break;
				}
			}*/
			
			// Get Format
			$kd_izin = 9; //Kode Izin Tenaga Kesehatan
			$c = $this->db->where('Kd_Izin',$kd_izin)->where('Param',$param)->get('tb_parameter');
			if($c->num_rows() > 0){
			$cc = $c->first_row();
			$format = $cc->Format;
			}
			else{
				$format = '[NOURUT]/[TAHUN]';
			}
			//$format = '[NOURUT]';
			
			
			// Get ID Agenda
			$no_urut = str_pad($this->get_id_agenda($idizin),3,0,STR_PAD_LEFT);
			
			//Bulan Romawi
			$bln_now = TimeNow('m');
			switch($bln_now){
				case '01': $bln = 'I'; break;
				case '02': $bln = 'II'; break;
				case '03': $bln = 'III'; break;
				case '04': $bln = 'IV'; break;
				case '05': $bln = 'V'; break;
				case '06': $bln = 'VI'; break;
				case '07': $bln = 'VII'; break;
				case '08': $bln = 'VIII'; break;
				case '09': $bln = 'IX'; break;
				case '10': $bln = 'X'; break;
				case '11': $bln = 'XI'; break;
				case '12': $bln = 'XII'; break;
			}
			
			$h = str_replace(array('[NOURUT]','[BULANROMAWI]','[TAHUN]'),array($no_urut,$bln,TimeNow('Y')),$format);
		}
		
		return $h;
	}
	
	function get_id_agenda($idizin=0){
		$a = $this->db->where('ID',$idizin)->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbitkesehatan');
		$aa = $a->first_row();
		$h = $aa->ID_AGENDA;
		
		if($h=='' or $this->input->post('submit')){
			$d = $this->db->select_max('ID_AGENDA','ID_AGENDA')->get('tbitkesehatan');
			$dd = $d->first_row();
			
			$h = $dd->ID_AGENDA+1;
		}
		
		return $h;
	}
	
	function tbl_print($start='',$end=''){
		$st = TimeFormat($start,'Y-m-d');
		$en = TimeFormat($end,'Y-m-d');
		$a = $this->db->query('SELECT
		tbitkesehatan.ID_Reg AS ID_IZIN,
		tbitkesehatan.Time_Buat AS TGL_BUAT,
		"Izin Tenaga Kesehatan" AS NM_IZIN,
		"" AS KODEJENIS,
		right(tbitkesehatan.Jenis_Izin,1) AS JENIS_IZIN,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbprovinsi.NAMA_PROVINSI,
		tbkota.NAMA_KOTA,
		tbkecamatan.NAMA_KECAMATAN,
		tbdesa.NAMA_DESA,
		/* tbperusahaan.NM_PERUSAHAAN, */
		tbitkesehatan.Nm_Usaha AS NM_PERUSAHAAN,
		tbpelanggan.NO_HP,
		0 AS INVESTASI,
		0 AS NAKER_L,
		0 AS NAKER_P,
		tbitkesehatan.Nm_FO,
		tbitkesehatan.Nm_BO,
		tbitkesehatan.Nm_Pengambil,
		tbitkesehatan.Nm_Pengurus AS NM_PENGURUS,
		tbitkesehatan.Time_Selesai AS TGL_SELESAI,
		tbitkesehatan.Time_Diambil AS TGL_DIAMBIL
		FROM
		tbitkesehatan
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan
		/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbitkesehatan.ID_Usaha */
		INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
		INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
		INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
		INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
		WHERE
		Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"');
		
		return $a;
	}
	
	function for_replace($id=0){
		$a = $this->db->where('ID',$id)->get('tbitkesehatan');
		$aa = $a->row();
		$idpel = $aa->ID_Pelanggan;
		$h = array(
				'[NAMAPELANGGAN]' 		=> pelanggan($idpel,'nama'),
				'[PEKERJAANPELANGGAN]'	=> pelanggan($idpel,'pekerjaan'),
				'[ALAMATPELANGGAN]'	=> pelanggan($idpel,'alamat').' '.desa(pelanggan($idpel,'desa')).', '.kecamatan(pelanggan($idpel,'kecamatan')).', '.kota(pelanggan($idpel,'kota')).', '.provinsi(pelanggan($idpel,'provinsi')),
				'[NAMAUSAHA]'			=> $aa->Nm_Usaha,
				'[PERIHAL]'				=> $aa->Perihal,
				'[NAMASHM]'				=> $aa->Nm_SHM,
				'[ALAMATUSAHA]'			=> $aa->Lokasi,
			);
		return $h;
	}
	
	
	
	function data_serah($idizin=0){
		$a = $this->db->query('SELECT IFNULL(Kd_Pengambil,0) AS KD_PENGAMBIL, Nm_Pengambil AS NM_PENGAMBIL, Alamat_Pengambil AS ALAMAT_PENGAMBIL, Telp_Pengambil AS TELP_PENGAMBIL FROM tbitkesehatan WHERE ID = '.$idizin);
		return $a;
	}
	
	function data_serah_ajax(){
		$idizin = $this->input->post('ID_Izin');
		$kdpengambil = $this->input->post('Kd_Pengambil');
		switch($kdpengambil){
			case 1:
				$q = $this->db->query('SELECT Nm_Pengurus AS NM_PENGURUS, Alamat_Pengurus AS ALAMAT_PENGURUS, Telp_Pengurus AS TELP_PENGURUS FROM tbitkesehatan WHERE ID = '.$idizin);
				if($q->num_rows() > 0){
					$get = $q->row();
					$nm_pengurus = $get->NM_PENGURUS;
					if($nm_pengurus != ''){
						$a = $q;
					}
					else{
						$a = $this->db->query('SELECT b.NM_PELANGGAN AS NM_PENGURUS, b.ALAMATPELANGGAN AS ALAMAT_PENGURUS, REPLACE(NO_HP,"+62","0") AS TELP_PENGURUS FROM tbitkesehatan a INNER JOIN tbpelanggan b ON a.ID_Pelanggan = b.IDPELANGGAN WHERE a.ID = '.$idizin);
					}
				}
				break;
			case 2:
				$a = $this->db->query('SELECT b.NM_PELANGGAN AS NM_PENGURUS, b.ALAMATPELANGGAN AS ALAMAT_PENGURUS, REPLACE(NO_HP,"+62","0") AS TELP_PENGURUS FROM tbitkesehatan a INNER JOIN tbpelanggan b ON a.ID_Pelanggan = b.IDPELANGGAN WHERE a.ID = '.$idizin);
				
				break;
			default:
				$a = $this->db->query('SELECT NULL AS NM_PENGURUS, NULL AS ALAMAT_PENGURUS, NULL AS TELP_PENGURUS');
				break;
		}
		return $a;
	}
	
	function simpan_pengambil($idizin=0){
		$this->form_validation->set_rules('op_pengambil','Opsi Pengambil Berkas','is_natural_no_zero');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('hp','Telepon','required');
		if($this->form_validation->run() == TRUE){
			$wh['ID'] = $idizin;
			$in['Flow_Serah'] = 1;
			$in['Nm_Serah'] = $this->session->userdata('userfullname');
			$in['Kd_Pengambil'] = $this->input->post('op_pengambil');
			$in['Nm_Pengambil'] = $this->input->post('nama');
			$in['Alamat_Pengambil'] = $this->input->post('alamat');
			$in['Telp_Pengambil'] = $this->input->post('hp');
			$in['Time_Diambil'] = TimeNow('Y-m-d H:i');
			$a = $this->db->update('tbitkesehatan',$in,$wh);
			if($a){
				set_alert('success','Data berhasil disimpan');
				$this->session->set_flashdata('WindowReload',1);
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
}
