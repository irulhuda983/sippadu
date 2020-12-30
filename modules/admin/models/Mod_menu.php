<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_menu extends CI_Model {
	
	//===============================
	
	function tabel_menu($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Sort_Order DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Menu like "%'.$keyword.'%") OR (a.Konten like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_menu a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_menu(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Menu'] = $id;
				$this->db->delete('ci_menu',$wh);
				
				$wh2['ID_Web'] = config();
				$wh2['ID_Parent'] = $id;
				$this->db->delete('ci_menu',$wh2);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_menu(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Menu'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_menu',$in,$wh);
				
				$wh2['ID_Web'] = config();
				$wh2['ID_Parent'] = $id;
				$in2['Status'] = 1;
				$this->db->update('ci_menu',$in2,$wh2);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_menu(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Menu'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_menu',$in,$wh);
				
				$wh2['ID_Web'] = config();
				$wh2['ID_Parent'] = $id;
				$in2['Status'] = 0;
				$this->db->update('ci_menu',$in2,$wh2);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function save_menu(){
		$ID_Menu = $this->input->post('ID_Menu');
		$Sort = $this->input->post('Sort');
		$c_id = count($ID_Menu);
		for($i=0;$i<$c_id;$i++){
			$in['Sort_Order'] = $Sort[$i];
			$wh['ID_Menu'] = $ID_Menu[$i];
			$wh['ID_Web'] = config();
			$this->db->update('ci_menu',$in,$wh);
		}
		set_alert('success','Data berhasil dinonaktifkan');
		redirect(current_url());
	}
	
	function data_menu($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
		return $a;
	}
	
	function insert_menu($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('op_menu_kategori','Kategori Menu','is_natural_no_zero');
		$this->form_validation->set_rules('op_parent','Parent','');
		$this->form_validation->set_rules('Class_Menu','Class Menu','');
		$this->form_validation->set_rules('Nm_Menu','Nama Menu','required');
		$this->form_validation->set_rules('Head Frame','Tampilkan Judul','');
		$this->form_validation->set_rules('Jn_Menu','Jenis Menu','required');
		if($this->input->post('Jn_Menu') != 1){
		$this->form_validation->set_rules('op_apps','Aplikasi','');
		$this->form_validation->set_rules('URL','Apps / URL','');
		$this->form_validation->set_rules('H_Frame','Height Frame','');
		$this->form_validation->set_rules('W_Frame','Width Frame','');
		}
		$this->form_validation->set_rules('Konten','Isi Konten','');
		$this->form_validation->set_rules('Time','Time','');
		$this->form_validation->set_rules('Deskripsi1','Deskripsi 1','');
		$this->form_validation->set_rules('Deskripsi2','Deskripsi 2','');
		
		if($this->form_validation->run() == TRUE){
			
			$qlast = $this->db->select_max('ID_Menu','ID_Menu')->where('ID_Web',config())->get('ci_menu');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Menu+1;
			} 
			
			$in['ID_Web'] = config();
			$in['ID_Menu'] = $last_id;
			$in['ID_Parent'] = $parent = $this->input->post('op_parent');
			
			/* $par = $this->db->where('ID_Menu',$parent)->get('ci_menu');
			$idlevel = 0;
			if($par->num_rows() > 0){
				$p = $par->row();
				$idlevel = $p->Level+1;
			} */
			
			$in['ID_Kategori'] = $ID_Kategori = $this->input->post('op_menu_kategori');
			//$in['Level'] = $idlevel;
			$in['Nm_Menu'] = $this->input->post('Nm_Menu');
			$in['Class_Menu'] = ($this->input->post('Class_Menu')!='' ? url_title($this->input->post('Class_Menu'),'-',TRUE) : url_title($this->input->post('Nm_Menu'),'-',TRUE));
			$in['Jn_Menu'] = $this->input->post('Jn_Menu');
			if($this->input->post('Jn_Menu') != 1){
				$in['ID_Apps'] = $this->input->post('op_apps');
				$in['URL'] = $this->input->post('URL');
				$in['ID_Config'] = $this->input->post('ID_Config');
				$in['Item'] = $this->input->post('Item');
			}
			if($this->input->post('Jn_Menu') == 3){
				$in['H_Frame'] = $this->input->post('H_Frame');
				$in['W_Frame'] = $this->input->post('W_Frame');
			}
			$in['Konten'] = $this->input->post('Konten');
			$in['Head_Frame'] = $this->input->post('Head_Frame');
			$in['Description1'] = $this->input->post('Deskripsi1');
			$in['Description2'] = $this->input->post('Deskripsi2');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			
			$qsort = $this->db->select_max('Sort_Order','Sort_Order')->where('ID_Web',config())->where('ID_Parent',$parent)->where('ID_Kategori',$ID_Kategori)->get('ci_menu');
			$sort = 0;
			if($qsort->num_rows() > 0){
				$s = $qsort->row();
				$sort = $s->Sort_Order+1;
			}
			
			$in['Sort_Order'] = $sort;
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_menu',$in);
			
			
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
		
	function update_menu($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('op_menu_kategori','Kategori Menu','is_natural_no_zero');
		$this->form_validation->set_rules('op_parent','Parent','');
		$this->form_validation->set_rules('Nm_Menu','Nama Menu','required');
		$this->form_validation->set_rules('Class_Menu','Class Menu','');
		$this->form_validation->set_rules('Head Frame','Tampilkan Judul','');
		$this->form_validation->set_rules('Jn_Menu','Jenis Menu','required');
		if($this->input->post('Jn_Menu') != 1){
		$this->form_validation->set_rules('op_apps','Aplikasi','');
		$this->form_validation->set_rules('URL','Apps / URL','');
		$this->form_validation->set_rules('H_Frame','Height Frame','');
		$this->form_validation->set_rules('W_Frame','Width Frame','');
		}
		$this->form_validation->set_rules('Konten','Isi Konten','');
		$this->form_validation->set_rules('Time','Time','');
		$this->form_validation->set_rules('Deskripsi1','Deskripsi 1','');
		$this->form_validation->set_rules('Deskripsi2','Deskripsi 2','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Menu'] = $id;
			$in['ID_Parent'] = $parent = $this->input->post('op_parent');
			/* $par = $this->db->where('ID_Menu',$parent)->get('ci_menu');
			$idlevel = 0;
			if($par->num_rows() > 0){
				$p = $par->row();
				$idlevel = $p->Level+1;
			} */
			$in['ID_Kategori'] = $this->input->post('op_menu_kategori');
			//$in['Level'] = $idlevel;
			$in['Nm_Menu'] = $this->input->post('Nm_Menu');
			$in['Class_Menu'] = ($this->input->post('Class_Menu')!='' ? url_title($this->input->post('Class_Menu'),'-',TRUE) : url_title($this->input->post('Nm_Menu'),'-',TRUE));
			$in['Jn_Menu'] = $this->input->post('Jn_Menu');
			if($this->input->post('Jn_Menu') != 1){
				$in['ID_Apps'] = $this->input->post('op_apps');
				$in['URL'] = $this->input->post('URL');
				$in['ID_Config'] = $this->input->post('ID_Config');
				$in['Item'] = $this->input->post('Item');
			}
			if($this->input->post('Jn_Menu') == 3){
				$in['H_Frame'] = $this->input->post('H_Frame');
				$in['W_Frame'] = $this->input->post('W_Frame');
			}
			$in['Konten'] = $this->input->post('Konten');
			$in['Head_Frame'] = $this->input->post('Head_Frame');
			$in['Description1'] = $this->input->post('Deskripsi1');
			$in['Description2'] = $this->input->post('Deskripsi2');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			//$in['Sort_Order'] = 0;
			$a = $this->db->update('ci_menu',$in,$wh);
			
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
	}
	
	function update_content($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Menu','Nama Menu','required');
		$this->form_validation->set_rules('Konten','Isi Konten','');
		$this->form_validation->set_rules('Time','Time','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Menu'] = $id;
			$in['Nm_Menu'] = $this->input->post('Nm_Menu');
			$in['Konten'] = $this->input->post('Konten');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_menu',$in,$wh);
			
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
	}
	
	function tabel_menu_kategori($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Sort_Order ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Kategori like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_menu_kategori a WHERE a.ID_Web = '.config().' AND a.ID_Kategori > 2 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_menu_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_menu_kategori',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_menu_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_menu_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_menu_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_menu_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_menu_kategori($id=0){
		$a = $this->db->where('ID_Kategori',$id)->get('ci_menu_kategori');
		return $a;
	}
	
	
	function insert_menu_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Kategori','Last_ID')->where('ID_Web',config())->get('ci_menu_kategori');
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last = $ls->Last_ID;
				if($last > 0){
					$last_id = $last+1;
				}
				else{
					$last_id = 3;
				}
			} 
			
			$in['ID_Web'] = config();
			$in['ID_Kategori'] = $last_id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Show_Title'] = $this->input->post('Show_Title');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Status'] = 1;
			$a = $this->db->insert('ci_menu_kategori',$in);
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
		
	function update_menu_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Show_Title'] = $this->input->post('Show_Title');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_menu_kategori',$in,$wh);
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
	
	function save_menu_kategori(){
		$ID_Web = config();
		$ID_Kategori = $this->input->post('ID_Kategori');
		$Sort_Order = $this->input->post('Sort_Order');
		if(is_array($ID_Kategori)){
			foreach($ID_Kategori as $idx => $val){
				$sort = $Sort_Order[$idx];
				$id = $ID_Kategori[$idx];
				$this->db->query('UPDATE ci_menu_kategori SET Sort_Order = "'.$sort.'" WHERE ID_Web = "'.$ID_Web.'" AND ID_Kategori > 2 AND ID_Kategori = "'.$id.'"');
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function op_menu_kategori(){
		//$a = $this->db->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_menu_kategori');
		$a = $this->db->query('
		SELECT * FROM
		(
		SELECT * FROM ci_menu_kategori WHERE ID_Kategori <= 2
		UNION ALL
		SELECT * FROM ci_menu_kategori WHERE ID_Web = "'.config().'" AND ID_Kategori > 2
		) z ORDER BY z.Sort_Order,z.ID_Kategori ASC
		');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih Kategori -';
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		else{
			$d['0']	= '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_parent($id=0){
		$a = $this->db->where('ID_Web',config())->order_by('Level','asc')->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Menu !=',$id)->get('ci_menu');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih Menu -';
				$d[$aa->ID_Menu] = tree_menu_level($aa->Level).$aa->Nm_Menu;
			}
		}
		else{
			$d['0']	= '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_apps_active(){
		/* $a = $this->db->query('
		SELECT a.ID_Apps,a.Nm_Apps,a.Index_Page,"_blank" as Target from ci_apps a where a.ID_Apps = 1
		UNION ALL
		SELECT a.ID_Apps,a.Nm_Apps,a.Index_Page,"" as Target from ci_apps a where a.ID_Apps = 2
		UNION ALL
		select a.ID_Apps,a.Nm_Apps,a.Index_Page,"" as Target from ci_apps a where a.ID_Apps > 2 AND (select count(*) from ci_domain_apps b where b.ID_Apps = a.ID_Apps AND b.ID_Web = '.config().' AND b.Status = 1) = 1'); */
		
		$a = $this->db->query('CALL ci_sp_UserAksesApps("'.config().'","'.$this->session->userdata('userid').'")');
		
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= 'External Link';
				$d[$aa->ID_Apps] = $aa->Nm_Apps;
			}
		}
		else{
			$d['0']	= 'External Link';
		}
		$a->next_result(); 
		
		return $d;
	}
	
	function tabel_menu_config($ID_Apps=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Sort_Order,a.ID_Config ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Config like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_menu_config a INNER JOIN ci_modul_log b ON a.Kd_Modul = b.Kd_Modul WHERE b.ID_Web = "'.config().'" AND a.ID_Apps = '.$ID_Apps.' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function tabel_menu_item($ID_Config=0,$limit=0,$offset=0){
		$x = $this->db->where('ID_Config',$ID_Config)->get('ci_menu_config');
		$Table_Name = 'ci_berita';
		$Field_ID = 'ID_Berita';
		$Field_Name = 'Judul';
		if($x->num_rows() > 0){
			$xx = $x->row();
			$Table_Name = $xx->Table_Name;
			$Field_ID = $xx->Field_ID;
			$Field_Name = $xx->Field_Name;
			
			if($Table_Name != ''){
				$q_limit = '';
				$q_where = '';
				$q_order = 'ORDER BY '.$Field_ID.' ASC';
				
				if($limit){
					$q_limit = 'LIMIT '.$offset.','.$limit.'';
				}
						
				if($this->input->post('search') != ''){
					$keyword = $this->input->post('keyword');
					$q_where .= 'AND ('.$Field_Name.' like "%'.$keyword.'%")';
				}
				
				
				$a = $this->db->query('SELECT '.$Field_ID.' AS Field_ID,'.$Field_Name.' AS Field_Name FROM '.$Table_Name.' WHERE ID_Web = '.config().' AND Status = 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
			}
			else{
				$a = $this->db->query('SELECT "" AS Field_ID,"Semua" AS Field_Name');
			}
		}
		else{
			$a = $this->db->query('SELECT "" AS Field_ID,"Semua" AS Field_Name');
		}
		
		return $a;
	}
	
	function data_menu_config($id=0){
		$a = $this->db->where('ID_Config',$id)->get('ci_menu_config');
		return $a;
	}
	
	function get_menu_item($ID_Menu=0,$s='Nm_Item'){
		$h = '';
		$Jn_Item = '';
		$Nm_Item = '';
		
		$ID_Config = 0;
		$Item = 0;
		$a = $this->mod_menu->data_menu($ID_Menu);
		if($a->num_rows() > 0){
			$aa = $a->row();
			$ID_Config = $aa->ID_Config;
			$Item = $aa->Item;
		}
		
		$b = $this->mod_menu->data_menu_config($ID_Config);
		if($b->num_rows() > 0){
			$bb = $b->row();
			$Jn_Item = $bb->Nm_Config;
		}
		
		$x = $this->db->where('ID_Config',$ID_Config)->get('ci_menu_config');
		$Table_Name = 'ci_berita';
		$Field_ID = 'ID_Berita';
		$Field_Name = 'Judul';
		if($x->num_rows() > 0){
			$xx = $x->row();
			$Table_Name = $xx->Table_Name;
			$Field_ID = $xx->Field_ID;
			$Field_Name = $xx->Field_Name;
			
			if($Table_Name != ''){
				$c = $this->db->query('SELECT '.$Field_ID.' AS Field_ID,'.$Field_Name.' AS Field_Name FROM '.$Table_Name.' WHERE ID_Web = '.config().' AND '.$Field_ID.' = "'.$Item.'"');
			}
			else{
				$c = $this->db->query('SELECT "" AS Field_ID,"- Semua -" AS Field_Name');
			}
		}
		else{
			$c = $this->db->query('SELECT "" AS Field_ID,"- Semua -" AS Field_Name');
		}
		
		if($c->num_rows() > 0){
			$cc = $c->row();
			$Nm_Item = $cc->Field_Name;
		}
		
		switch($s){
			case 'Nm_Item':
				$h = $Nm_Item;
			break;
			case 'Jn_Item':
				$h = $Jn_Item;
			break;
			case 'ID_Config':
				$h = $ID_Config;
			break;
			case 'Item':
				$h = $Item;
			break;
			default:
				$h = '';
			break;
		}
		
		return $h;
	}
}


