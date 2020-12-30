<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_language extends CI_Model {
	
	function tabel_language($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Lang ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Format like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_lang a WHERE a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_language(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Lang'] = $id;
				$this->db->delete('ci_lang',$wh);
				$this->db->delete('ci_lang_translate',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_language(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Lang'] = $id;
				$this->db->update('ci_lang',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_language(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Lang'] = $id;
				$this->db->update('ci_lang',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_language($id=0){
		$a = $this->db->where('ID_Lang',$id)->get('ci_lang');
		return $a;
	}
	
	function get_id_lang($Kd_Lang=''){
		$a = $this->db->where('Kd_Lang',$Kd_Lang)->get('ci_lang');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_Lang;
		}
		return $h;
	}
	
	function insert_language(){
		$this->form_validation->set_rules('Nm_Lang','Nama Language','required');
		$this->form_validation->set_rules('Class_Lang','Class Language','required');
		$this->form_validation->set_rules('Kd_Lang','Kode Language','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Lang','ID_Lang')->get('ci_lang');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Lang+1;
			} 
			
			$in['ID_Lang'] = $last_id;
			$in['Nm_Lang'] = $this->input->post('Nm_Lang');
			$in['Class_Lang'] = $this->input->post('Class_Lang');
			$in['Kd_Lang'] = $this->input->post('Kd_Lang');
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_lang',$in);
			
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
		
	function update_language($id=0){
		$this->form_validation->set_rules('Nm_Lang','Nama Language','required');
		$this->form_validation->set_rules('Class_Lang','Class Language','required');
		$this->form_validation->set_rules('Kd_Lang','Kode Language','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Lang'] = $id;
			$in['Nm_Lang'] = $this->input->post('Nm_Lang');
			$in['Class_Lang'] = $this->input->post('Class_Lang');
			$in['Kd_Lang'] = $this->input->post('Kd_Lang');
			$a = $this->db->update('ci_lang',$in,$wh);
			
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
	
	function tabel_translate($limit=0,$offset=0){
		$lang = $this->session->userdata('set_lang');
		$keyword = '';
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
		}
		$a = $this->db->query('CALL ci_LangTabel('.config().',"'.$lang.'","'.$keyword.'",'.$limit.','.$offset.')');
		$a->next_result();
		return $a;
	}
	
	function tabel_translate_ori($limit=0,$offset=0){
		$lang = $this->session->userdata('set_lang');
		$keyword = '';
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
		}
		$a = $this->db->query('CALL ci_LangTabelSystem('.config().',"'.$lang.'","'.$keyword.'",'.$limit.','.$offset.')');
		$a->next_result();
		return $a;
	}
	
	function op_language(){
		$a = $this->db->order_by('Nm_Lang','asc')->where('Status',1)->get('ci_lang');
		$d = array();
		if($a->num_rows() > 0){
			$d['0'] = '- Pilih Language -';
			foreach($a->result() as $aa){
				$d[$aa->Kd_Lang] = $aa->Nm_Lang;
			}
		}
		return $d;
	}
	
	function delete_translate(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Format'] = $id;
				$this->db->delete('ci_lang_format',$wh);
				$this->db->delete('ci_lang_translate',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_translate(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Format'] = $id;
				$this->db->update('ci_lang_format',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_translate(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Format'] = $id;
				$this->db->update('ci_lang_format',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function save_translate(){
		$ID_Lang = $this->input->post('ID_Lang');
		$Kd_Lang = $this->input->post('Kd_Lang');
		$ID_Format = $this->input->post('ID_Format');
		$Translate = $this->input->post('Translate');
		if(is_array($ID_Format)){
			foreach($ID_Format as $idx => $val){
				$idformat = $ID_Format[$idx];
				$translate = $Translate[$idx];
				$cek = $this->db->where('ID_Lang',$ID_Lang)->where('ID_Format',$idformat)->get('ci_lang_translate')->num_rows();
				if($cek > 0){
					$wh['ID_Lang'] = $ID_Lang;
					$wh['ID_Format'] = $idformat;
					$in['Translate'] = $translate;
					//$this->db->update('ci_lang_translate',$in,$wh);
					$this->db->query('UPDATE ci_lang_translate SET Translate = "'.$translate.'" WHERE ID_Lang = '.$ID_Lang.' AND ID_Format = '.$idformat);
				}
				else{
					$in['ID_Lang'] = $ID_Lang;
					$in['ID_Format'] = $idformat;
					$in['Translate'] = $translate;
					$this->db->insert('ci_lang_translate',$in);
				}
			}
			$this->update_lang($Kd_Lang);
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function update_lang($language='id'){
		$b = $this->db->where('Status',1)->get('ci_apps');
		if($b->num_rows() > 0){
			foreach($b->result() as $bb){
				$a = $this->db->query('CALL ci_LangTranslate("'.$language.'")');
				
				if (!file_exists('./modules/'.$bb->Class.'/language/'.$language)) {
					mkdir('./modules/'.$bb->Class.'/language/'.$language, 0777, true);
				}
				
				$file_lang = array(
							'calendar_lang.php',
							'date_lang.php',
							'db_lang.php',
							'email_lang.php',
							'form_validation_lang.php',
							'ftp_lang.php',
							'imglib_lang.php',
							'migration_lang.php',
							'number_lang.php',
							'pagination_lang.php',
							'profiler_lang.php',
							'unit_test_lang.php',
							'upload_lang.php'
							);
				$isi="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');"	;
				
				if(is_array($file_lang)){
					foreach($file_lang as $fl){
						$flang = './modules/'.$bb->Class.'/language/'.$language.'/'.$fl;
						if(!file_exists($flang)){
							write_file($flang, $isi);
						}
					}
				}
				
				$file = './modules/'.$bb->Class.'/language/'.$language.'/default_lang.php';
				$index = './modules/'.$bb->Class.'/language/'.$language.'/index.html';
				
				if(file_exists($file)){
					unlink($file);
				}
				
				if(!file_exists($index)){
					$index_s = '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>';
					write_file($index, $index_s);
				}
				
				$lang=array();
$langstr="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
* Update:  ".TimeNow('Y-m-d H:i')."
*
* Description:  ".$language." language file for general views
*
*/"."\n\n\n";



				foreach ($a->result() as $aa){
					$val = addslashes($aa->Translate);
					$langstr.= "\$lang['".$aa->Format."'] = '$val';"."\n";
				}
				write_file($file, $langstr);
				$a->next_result();
			}
		}
		
	}
}
