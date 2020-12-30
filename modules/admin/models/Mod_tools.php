<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_tools extends CI_Model {
	
	function ClearDataWeb($id=0){
		$db = $this->db->database;
		$a = $this->db->query('SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND COLUMN_NAME = "ID_Web"');
		$not_read = array('ci_domain','ci_domain_apps');
		$return = false;
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$table = $aa->TABLE_NAME;
				if(!in_array($table,$not_read)){
					$wh['ID_Web'] = $id;
					$this->db->delete($table,$wh);
				}
			}
			$return = true;
		}
		return $return;
	}
	
	function BackupDataWeb(){
		$db = $this->db->database;
		$a = $this->db->query('SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND COLUMN_NAME = "ID_Web"');
		$not_read = array('ci_domain','ci_domain_apps');
		$h = '';
		$arr = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$table = $aa->TABLE_NAME;
				if(!in_array($table,$not_read)){
					$data = $this->BackupDataTable($table);
					if($data != ''){
						$arr[] = $data;
					}
				}
			}
			$h = implode(';;;;;;;;;;',$arr);
		}
		return $h;
	}
	
	function BackupDataTable($table=''){
		$db = $this->db->database;
		$a = $this->db->query('SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND TABLE_NAME = "'.$table.'"');
		$h = '';
		if($a->num_rows() > 0){
			$field = array();
			$sql = '';
			foreach($a->result() as $aa){
				$col = $aa->COLUMN_NAME;
				$field[] = '`'.$col.'`';
			}
			$fields = implode(',',$field);
			$val = $this->BackupDataValues($table);
			$sql = '';
			if($val != ''){
				$sql .= 'DELETE FROM `'.$table.'` WHERE ID_Web = '.config().';;;;;;;;;;';
				$sql .= 'INSERT INTO `'.$table.'`('.$fields.') VALUES '.$val;
			}
			$h = $sql;
		}
		return $h;
	}
	
	function BackupDataValues($table=''){
		$db = $this->db->database;
		$ID_Web = config();
		$a = $this->db->query('SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND TABLE_NAME = "'.$table.'"');
		$b = $this->db->query('SELECT * FROM `'.$table.'` WHERE ID_Web = '.$ID_Web);
		$r = array();
		$f = array();
		$h = '';
		if($b->num_rows() > 0){
			$i = 0;
			foreach($b->result_array() as $bb){
				if($a->num_rows() > 0){
					foreach($a->result() as $aa){
						$f[$i][] = '\''.addslashes($bb[$aa->COLUMN_NAME]).'\'';
					}
					$_r = implode(',',$f[$i]);
					$r[$i] = '('.$_r.')';
					++$i;
				}
			}
			$h = implode(',',$r);
		}
		return $h;
	}
	
	function backup(){
		$this->load->helper('download');
		$this->load->library('encryption');
		
		$Nm_Backup = $this->input->post('Nm_Backup');
		$backup_file = './assets/'.config('theme').'/backup/'.$Nm_Backup;
		if(file_exists($backup_file)){
			unlink($backup_file);
		}
		
		$code = 'ThisFileBackupOnlyForIDWeb='.config().';';
		$text = $this->BackupDataWeb();
		$file_encrypt = $this->encryption->encrypt($code.$text);
		/* write_file($backup_file,$file_encrypt);
		$get_file_backup = file_get_contents($backup_file);
		force_download($Nm_Backup, $get_file_backup); */
		force_download($Nm_Backup, $file_encrypt);
		//file_exists($backup_file) ? unlink($backup_file) : '' ;
	}
	
	function restore(){
		$this->load->library('encryption');
		if ($_FILES['userfile']['name']){
			$config['upload_path'] 	= $upload_path = './assets/'.config('theme').'/temp/';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']= TRUE;	
			$config['allowed_types']= '*';
			$this->upload->initialize($config); 
			
			$filename = '';
			if ($this->upload->do_upload()) {
				$u	 		= $this->upload->data();
				$filename	= $u['file_name'];
				$file_encrypt 	= file_get_contents($upload_path.$filename);
				$file_decrypt	= $this->encryption->decrypt($file_encrypt);
				$string_query 	= trim($file_decrypt);
				$code = 'ThisFileBackupOnlyForIDWeb='.config().';';
				$check_file		= substr_count($string_query,$code);
				if($check_file){
					$string_query 	= str_replace($code,'',$string_query);
					$array_query 	= explode(';;;;;;;;;;',$string_query);
					foreach($array_query as $query)
					{
						$this->db->query($query);
					}
				}
				file_exists($upload_path.$filename) ? unlink($upload_path.$filename) : '' ;
				set_alert('success','Data berhasil di restore');
				redirect(current_url());
			}
			else{
				$this->session->set_flashdata('error',$this->upload->display_errors());
				redirect(current_url());
			}
			
		}
		else{
			set_alert('error','Data gagal di restore');
			redirect(current_url());
		}
	}
}
