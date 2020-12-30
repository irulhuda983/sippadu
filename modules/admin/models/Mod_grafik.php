<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_grafik extends CI_Model {
	
	//================== GRAFIK ================//
	
	function tabel_grafik($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Grafik DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Grafik like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_Jenis FROM ci_grafik a INNER JOIN ci_grafik_jenis b ON a.Jn_Grafik = b.ID_Jenis WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_grafik(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Grafik'] = $id;
				$this->db->delete('ci_grafik',$wh);
				$this->db->delete('ci_grafik_log',$wh);
				$this->db->delete('ci_grafik_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_grafik(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Grafik'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_grafik',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_grafik(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Grafik'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_grafik',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_grafik($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Grafik',$id)->get('ci_grafik');
		return $a;
	}
	
	function get_grafik($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Grafik',$id)->get('ci_grafik');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Nm_Grafik;
		}
		return $h;
	}
	
	
	function insert_grafik($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Grafik','Nama Grafik','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		$this->form_validation->set_rules('Konten','Konten','');
		$this->form_validation->set_rules('op_grafik_jenis','Jenis Grafik','is_natural_no_zero');
		$this->form_validation->set_rules('Satuan','Satuan','required');
		$this->form_validation->set_rules('Series_Nama','Series (Nama)','required');
		$this->form_validation->set_rules('Series_Angka','Series (Angka)','required');
		$this->form_validation->set_rules('Sort_Order_By','Urutkan Berdasarkan','required');
		$this->form_validation->set_rules('Asc_Desc','Jenis Urutan','required');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Grafik','ID_Grafik')->get('ci_grafik');
			$idd = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$idd = $bb->ID_Grafik+1;
			}
			$in['ID_Web'] = config();
			$in['ID_Grafik'] = $idd;
			$in['Nm_Grafik'] = $this->input->post('Nm_Grafik');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Konten'] = $this->input->post('Konten');
			$in['Jn_Grafik'] = $this->input->post('Jn_Grafik');
			$in['Satuan'] = $this->input->post('Satuan');
			$in['Pembagi'] = $this->input->post('Pembagi');
			$in['Series_Nama'] = $this->input->post('Series_Nama');
			$in['Series_Angka'] = $this->input->post('Series_Angka');
			$in['Sort_Order_By'] = $this->input->post('Sort_Order_By');
			$in['Asc_Desc'] = $this->input->post('Asc_Desc');
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Time_Created'] = db_time(TimeNow());
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			//$in['Time_Modified'] = db_time(TimeNow());
			$in['Status'] = 1;
			$a = $this->db->insert('ci_grafik',$in);
			$insert_id = $idd;
			
			$op_grafik_kategori = $this->input->post('op_grafik_kategori');
			if(is_array($op_grafik_kategori)){
				foreach($op_grafik_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Grafik'] = $insert_id;
					$this->db->insert('ci_grafik_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Grafik'] = $insert_id;
				$this->db->insert('ci_grafik_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Grafik'] = $insert_id;
						$this->db->insert('ci_grafik_tags',$in3);
					}
				}
			}
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_grafik($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Grafik','Nama Grafik','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		$this->form_validation->set_rules('Konten','Konten','');
		$this->form_validation->set_rules('op_grafik_jenis','Jenis Grafik','is_natural_no_zero');
		$this->form_validation->set_rules('Satuan','Satuan','required');
		$this->form_validation->set_rules('Series_Nama','Series (Nama)','required');
		$this->form_validation->set_rules('Series_Angka','Series (Angka)','required');
		$this->form_validation->set_rules('Sort_Order_By','Urutkan Berdasarkan','required');
		$this->form_validation->set_rules('Asc_Desc','Jenis Urutan','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Grafik'] = $id;
			$in['Nm_Grafik'] = $this->input->post('Nm_Grafik');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Konten'] = $this->input->post('Konten');
			$in['Jn_Grafik'] = $this->input->post('Jn_Grafik');
			$in['Satuan'] = $this->input->post('Satuan');
			$in['Pembagi'] = $this->input->post('Pembagi');
			$in['Series_Nama'] = $this->input->post('Series_Nama');
			$in['Series_Angka'] = $this->input->post('Series_Angka');
			$in['Sort_Order_By'] = $this->input->post('Sort_Order_By');
			$in['Asc_Desc'] = $this->input->post('Asc_Desc');
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			//$in['Time_Created'] = db_time(TimeNow());
			$in['Time_Modified'] = db_time(TimeNow());
			//$in['Status'] = 1;
			$a = $this->db->update('ci_grafik',$in,$wh);
			
			$op_grafik_kategori = $this->input->post('op_grafik_kategori');
			$this->db->delete('ci_grafik_log',$wh);
			if(is_array($op_grafik_kategori)){
				foreach($op_grafik_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Grafik'] = $id;
					$this->db->insert('ci_grafik_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Grafik'] = $id;
				$this->db->insert('ci_grafik_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_grafik_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Grafik'] = $id;
						$this->db->insert('ci_grafik_tags',$in3);
					}
				}
			}
			
			if($a){
				set_alert('success','Data berhasil diubah');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diubah');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function tabel_grafik_data($kategori=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Sort_Order,a.ID ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Data like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_grafik_data a WHERE a.ID_Web = '.config().' AND a.ID_Grafik = '.$kategori.' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_grafik_data(){
		$chk = $this->input->post('chk');
		
		if(is_array($chk)){
			foreach($chk as $id){
				
				$wh['ID_Web'] = config();
				$wh['ID'] = $id;
				$this->db->delete('ci_grafik_data',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_grafik_data(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_grafik_data',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_grafik_data(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_grafik_data',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function save_grafik_data(){
		$ID = $this->input->post('ID');
		$Sort = $this->input->post('Sort_Order');
		$c_id = count($ID);
		for($i=0;$i<$c_id;$i++){
			$in['Sort_Order'] = $Sort[$i];
			$wh['ID'] = $ID[$i];
			$wh['ID_Web'] = config();
			$this->db->update('ci_grafik_data',$in,$wh);
		}
		set_alert('success','Data berhasil dinonaktifkan');
		redirect(current_url());
	}
	
	function data_grafik_data($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID',$id)->get('ci_grafik_data');
		return $a;
	}
	
	function insert_grafik_data($kategori=0){
		$in['ID_Web'] = config();
		$in['ID_Grafik'] = $kategori;
		$in['Nm_Data'] = $this->input->post('Nm_Data');
		$in['Angka_Data'] = str_replace(',','.',$this->input->post('Angka_Data'));
		$in['Sort_Order'] = $this->input->post('Sort_Order');
		$in['Status'] = 1;			
		$a = $this->db->insert('ci_grafik_data',$in);
			
		if($a){
			set_alert('success','Data berhasil ditambahkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Data gagal ditambahkan');
			redirect(current_url());
		}
		return $a;
	}
		
	function update_grafik_data($id=0){
		$wh['ID_Web'] = config();
		$wh['ID'] = $id;
		$in['Nm_Data'] = $this->input->post('Nm_Data');
		$in['Angka_Data'] = str_replace(',','.',$this->input->post('Angka_Data'));
		$in['Sort_Order'] = $this->input->post('Sort_Order');
		$a = $this->db->update('ci_grafik_data',$in,$wh);
		
		if($a){
			set_alert('success','Data berhasil diupdate');
			redirect(current_url());
		}
		else{
			set_alert('error','Data gagal diupdate');
			redirect(current_url());
		}
		return $a;
	}
	
	function op_grafik_jenis(){
		$a = $this->db->order_by('ID_Jenis','asc')->where('Status',1)->get('ci_grafik_jenis');
		$d = array();
		if($a->num_rows() > 0){
			$d['0']	= '- Pilih Jenis Grafik -';
			foreach($a->result() as $aa){
				$d[$aa->ID_Jenis] = $aa->Nm_Jenis;
			}
		}
		else{
			$d['0']	= '- Pilih Jenis Grafik -';
		}
		return $d;
	}
	
	function slc_op_grafik_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Grafik',$id)->get('ci_grafik_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_grafik_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Grafik',$id)->get('ci_grafik_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_grafik_kategori($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Nm_Kategori ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Kategori like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_grafik_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_grafik_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_grafik_kategori',$wh);
				$this->db->delete('ci_grafik_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_grafik_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_grafik_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_grafik_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_grafik_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_grafik_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_grafik_kategori');
		return $a;
	}
	
	
	function insert_grafik_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_grafik_kategori');
			$idd = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$idd = $bb->ID_Kategori+1;
			}
			$in['ID_Web'] = config();
			$in['ID_Kategori'] = $idd;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Status'] = 1;
			$a = $this->db->insert('ci_grafik_kategori',$in);
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_grafik_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_grafik_kategori',$in,$wh);
			if($a){
				set_alert('success','Data berhasil diubah');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diubah');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function op_grafik_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_grafik_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
}


