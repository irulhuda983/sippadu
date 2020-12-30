<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_form extends CI_Model {
	
	//================== TABEL ================//
	
	function tabel_form($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Form like "%'.$keyword.'%") OR (a.Deskripsi like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username,(select count(*) from ci_form_col where ID_Form = a.ID_Form and Status = 1 and ID_Web = "'.config().'") AS Kolom,(select count(*) from (select ID_Web,ID_Form,ID_Row from ci_form_data WHERE ID_Web = '.config().' and Status = 1 GROUP BY ID_Row) as b WHERE b.ID_Web = a.ID_Web and b.ID_Form = a.ID_Form) AS Baris FROM ci_form a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_form(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Form'] = $id;
				$this->db->delete('ci_form',$wh);
				$this->db->delete('ci_form_log',$wh);
				$this->db->delete('ci_form_tags',$wh);
				$this->db->delete('ci_form_col',$wh);
				$this->db->delete('ci_form_data',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_form(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Form'] = $id;
				$this->db->update('ci_form',$in,$wh);
				$this->db->update('ci_form_col',$in,$wh);
				$this->db->update('ci_form_data',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_form(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Form'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_form_col',$in,$wh);
				$this->db->update('ci_form_data',$in,$wh);
				$this->db->update('ci_form',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_form($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Form',$id)->get('ci_form');
		return $a;
	}
	
	function data_kolom($id=0){
		//$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Form',$id)->get('ci_form_col');
		$a = $this->db->query('SELECT a.*,b.Nm_Type FROM ci_form_col a inner join ci_form_col_type b on a.Type = b.ID_Type WHERE a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" ORDER BY a.Nomor ASC');
		return $a;
	}
	
	function data_baris($id=0){
		//$a = $this->db->where('ID_Web',config())->where('ID_Form',$id)->get('ci_form_data');
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		/* if($data_kolom->num_rows() > 0){
			foreach($data_kolom->result() as $k){
				$d[] = $k->
			}
		} */
		
		$a = $this->db->query('SELECT ID_Row FROM ci_form_data a where a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
	
	function data_col($id=0){
		//$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Form',$id)->get('ci_form_col');
		$a = $this->db->query('SELECT ID_Col FROM ci_form_col a where a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" GROUP BY ID_Col ORDER BY a.Nomor ASC');
		return $a;
	}
	
	function data_row($id=0){
		//$a = $this->db->where('ID_Web',config())->where('ID_Form',$id)->get('ci_form_data');
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		/* if($data_kolom->num_rows() > 0){
			foreach($data_kolom->result() as $k){
				$d[] = $k->
			}
		} */
		
		$a = $this->db->query('SELECT ID_Row FROM ci_form_data a where a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" GROUP BY ID_Row ORDER BY ID_Row ASC '.$q_order.'');
		return $a;
	}
	
	function insert_form($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Form','Nm_Form','required');
		$this->form_validation->set_rules('Deskripsi','Isi Deskripsi','');
		$this->form_validation->set_rules('op_form_kategori','Kategori Form','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Form','ID_Form')->where('ID_Web',config())->get('ci_form');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Form+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Form'] = $last_id;
			$in['Nm_Form'] = $this->input->post('Nm_Form');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_form',$in);
			$insert_id = $last_id;
			
			$op_form_kategori = $this->input->post('op_form_kategori');
			if(is_array($op_form_kategori)){
				foreach($op_form_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Form'] = $insert_id;
					$this->db->insert('ci_form_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Form'] = $insert_id;
				$this->db->insert('ci_form_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Form'] = $insert_id;
						$this->db->insert('ci_form_tags',$in3);
					}
				}
			}
			
			$ID = $this->input->post('ID');
			$Kolom = $this->input->post('Kolom');
			$Sort = $this->input->post('Sort');
			$Nomor = $this->input->post('Nomor');
			if(is_array($Kolom)){
				foreach($Kolom as $idx => $val){
					if($ID[$idx] != '0'){
						$in4['ID_Web'] = config();
						$in4['ID_Form'] = $insert_id;
						$in4['Nomor'] = $Nomor[$idx];
						$in4['Nm_Col'] = $Kolom[$idx];
						$in4['Sort_Order'] = $Sort[$idx];
						$this->db->insert('ci_form_col',$in4);
					}
				}
			}
			
			
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(str_replace('form/add','form/edit/'.$insert_id,current_url()));
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_form($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Form','Nm_Form','required');
		$this->form_validation->set_rules('Deskripsi','Isi Deskripsi','');
		$this->form_validation->set_rules('op_form_kategori','Kategori Form','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Form'] = $id;
			$in['Nm_Form'] = $this->input->post('Nm_Form');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_form',$in,$wh);
			
			$op_form_kategori = $this->input->post('op_form_kategori');
			$this->db->delete('ci_form_log',$wh);
			if(is_array($op_form_kategori)){
				foreach($op_form_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Form'] = $id;
					$this->db->insert('ci_form_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Form'] = $id;
				$this->db->insert('ci_form_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_form_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Form'] = $id;
						$this->db->insert('ci_form_tags',$in3);
					}
				}
			}
			
			$ID_Col = $this->input->post('ID_Col');
			$ID = $this->input->post('ID');
			$Kolom = $this->input->post('Kolom');
			$Sort = $this->input->post('Sort');
			$Nomor = $this->input->post('Nomor');
			if(is_array($ID_Col)){
				foreach($ID_Col as $idx => $val){
					$a_ID 		= $ID[$idx];
					$a_ID_Col	= $ID_Col[$idx];
					$a_Nomor	= $Nomor[$idx];
					$a_Kolom	= $Kolom[$idx];
					$a_Sort 	= $Sort[$idx];
					if($a_ID != '0'){
						if($a_ID_Col != '0'){
							$wh4['ID_Col'] = $a_ID_Col;
							$in4['ID_Web'] = config();
							$in4['ID_Form'] = $id;
							$in4['Nomor'] = $a_Nomor;
							$in4['Nm_Col'] = $a_Kolom;
							$in4['Sort_Order'] = $a_Sort;
							$this->db->update('ci_form_col',$in4,$wh4);
						}
						else{
							$in4['ID_Web'] = config();
							$in4['ID_Form'] = $id;
							$in4['Nomor'] = $a_Nomor;
							$in4['Nm_Col'] = $a_Kolom;
							$in4['Sort_Order'] = $a_Sort;
							$this->db->insert('ci_form_col',$in4);
						}
					}
					else{
						if($a_ID_Col != '0'){
							$wh4['ID_Web'] = config();
							$wh4['ID_Form'] = $id;
							$wh4['ID_Col'] = $a_ID_Col;
							$this->db->delete('ci_form_col',$wh4);
							$this->db->delete('ci_form_data',$wh4);
							
						}
					}
				}
			}
			
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
	
	function save_data_form(){
		$col = $this->input->post('col');
		$form = $this->input->post('form');
		$ID_Form = $this->input->post('ID_Form');
		$ID_Row = $this->input->post('ID_Row');
		if($ID_Row != '0'){
			if(is_array($col)){
				foreach($col as $i => $key){
					$wh['ID_Web'] = config();
					$wh['ID_Form'] = $ID_Form;
					$wh['ID_Col'] = $col[$i];
					$wh['ID_Row'] = $ID_Row;
					$in['Value'] = $form[$i];
					$a = $this->db->update('ci_form_data',$in,$wh);
				}
			}
			
			$h = alert('success','Data berhasil diupdate');
		}
		else{
			//$b = $this->db->query('SELECT (max(ID_Row)+1) as ID_Row FROM ci_form_data WHERE ID_Web = "'.config().'" and ID_Form = "'.$ID_Form.'"');
			$b = $this->db->select_max('ID_Row','ID_Row')->where('ID_Web',config())->where('ID_Form',$ID_Form)->get('ci_form_data');
			$last_id = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$last_id = $bb->ID_Row+1;
			}
			
			if(is_array($col)){
				foreach($col as $i => $key){
					$in['ID_Web'] = config();
					$in['ID_Form'] = $ID_Form;
					$in['ID_Col'] = $col[$i];
					$in['ID_Row'] = $last_id;
					$in['Value'] = $form[$i];
					$in['Status'] = 1;
					$a = $this->db->insert('ci_form_data',$in);
				}
			}
			
			$h = alert('success','Data berhasil ditambahkan');
		} 
		//$h = $ID_Form;
		
		return $h;
	}
	
	function delete_data_form(){
		$wh['ID_Row'] = $this->input->post('ID_Row');
		$a = $this->db->delete('ci_form_data',$wh);
		$h = alert('error','Data gagal dihapus');
		if($a){
			$h = alert('success','Data berhasil dihapus');
		}
		return $h;
	}
	
	function slc_op_form_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Form',$id)->get('ci_form_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_form_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Form',$id)->get('ci_form_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_form_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_form_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_form_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_form_kategori',$wh);
				$this->db->delete('ci_form_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_form_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_form_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_form_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_form_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_form_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_form_kategori');
		return $a;
	}
	
	
	function insert_form_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_form_kategori');
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
			$a = $this->db->insert('ci_form_kategori',$in);
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
		
	function update_form_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_form_kategori',$in,$wh);
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
	
	function op_form_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_form_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
	
	function op_form_type(){
		$a = $this->db->order_by('ID_Type','asc')->where('Status',1)->get('ci_form_col_type');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Type] = $aa->Nm_Type;
			}
		}
		return $d;
	}
	
	function slc_op_form_type($ID_Form=0,$ID_Col=0){
		$h = 1;
		$a = $this->db->select('Type')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col');
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Type;
		}
		return $h;
	}
	
	function get_nm_col($ID_Form=0,$ID_Col=0){
		$h = 1;
		$a = $this->db->select('Nm_Col')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col');
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Nm_Col;
		}
		return $h;
	}
	
	function get_keterangan($ID_Form=0,$ID_Col=0){
		$h = 1;
		$a = $this->db->select('Keterangan')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col');
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Keterangan;
		}
		return $h;
	}
	
	function data_form_option($ID_Form=0,$ID_Col=0){
		$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col_option');
		return $a;
	}
	
	function save_setting_edit($ID_Form=0,$ID_Col=0){
		$Type = $this->input->post('op_form_type');
		$wh['ID_Form'] = $ID_Form;
		$wh['ID_Col'] = $ID_Col;
		$in['Type'] = $Type;
		$in['Keterangan'] = $this->input->post('Keterangan');
		$a = $this->db->update('ci_form_col',$in,$wh);
		
		$ID_Option = $this->input->post('ID_Option');
		$ID = $this->input->post('ID');
		$Nm_Option = $this->input->post('Nm_Option');
		$Default = $this->input->post('Default');
		$Nomor = $this->input->post('Nomor');
		if(is_array($ID_Option)){
			foreach($ID_Option as $idx => $val){
				
				$a_ID 		= $ID[$idx];
				$a_ID_Option= $ID_Option[$idx];
				$a_Nomor	= $Nomor[$idx];
				$a_Nm_Option= $Nm_Option[$idx];
				$vDefault	= ($Default==$a_ID_Option ? 1 : 0);
				if($a_ID != '0'){
					if($a_ID_Option != '0'){
						$wh4['ID_Option'] = $a_ID_Option;
						$wh4['ID_Web'] = config();
						$wh4['ID_Form'] = $ID_Form;
						$wh4['ID_Col'] = $ID_Col;
						$in4['Nomor'] = $a_Nomor;
						$in4['Nm_Option'] = $a_Nm_Option;
						$in4['Default'] = $vDefault;
						$this->db->update('ci_form_col_option',$in4,$wh4);
					}
					else{
						$b = $this->db->select_max('ID_Option','ID_Option')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col_option');
						$last_id = 1;
						if($b->num_rows() > 0){
							$bb = $b->row();
							$last_id = $bb->ID_Option+1;
						}
						
						$in4['ID_Web'] = config();
						$in4['ID_Form'] = $ID_Form;
						$in4['ID_Col'] = $ID_Col;
						$in4['ID_Option'] = $last_id;
						$in4['Nomor'] = $a_Nomor;
						$in4['Nm_Option'] = $a_Nm_Option;
						$in4['Default'] = $vDefault;
						$this->db->insert('ci_form_col_option',$in4);
					}
				}
				else{
					if($a_ID_Option != '0'){
						$wh4['ID_Web'] = config();
						$wh4['ID_Form'] = $ID_Form;
						$in4['ID_Col'] = $ID_Col;
						$wh4['ID_Option'] = $a_ID_Option;
						$this->db->delete('ci_form_col_option',$wh4);
						
					}
				}
			}
		}
		if($a){
			//if($this->input->post('saveclose')){
				$this->session->set_flashdata('WindowClose',1);
			//}
			//$this->session->set_flashdata('WindowReload',1);
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Data gagal disimpan');
			redirect(current_url());
		}
	}
	
}


