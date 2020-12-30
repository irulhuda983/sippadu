<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_tabel extends CI_Model {
	
	//================== TABEL ================//
	
	function tabel_tabel($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Tabel like "%'.$keyword.'%") OR (a.Deskripsi like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username,(select count(ID_Col) from ci_tabel_col where ID_Web = '.config().' and ID_Tabel = a.ID_Tabel and Status = 1) AS Kolom,(select count(*) from (select ID_Web,ID_Tabel,ID_Row from ci_tabel_data WHERE ID_Web = '.config().' and Status = 1 GROUP BY ID_Row) as b WHERE b.ID_Web = a.ID_Web and b.ID_Tabel = a.ID_Tabel) AS Baris FROM ci_tabel a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_tabel(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Tabel'] = $id;
				$this->db->delete('ci_tabel',$wh);
				$this->db->delete('ci_tabel_log',$wh);
				$this->db->delete('ci_tabel_tags',$wh);
				$this->db->delete('ci_tabel_col',$wh);
				$this->db->delete('ci_tabel_data',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_tabel(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Tabel'] = $id;
				$this->db->update('ci_tabel',$in,$wh);
				$this->db->update('ci_tabel_col',$in,$wh);
				$this->db->update('ci_tabel_data',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_tabel(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Tabel'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_tabel_col',$in,$wh);
				$this->db->update('ci_tabel_data',$in,$wh);
				$this->db->update('ci_tabel',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_tabel($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Tabel',$id)->get('ci_tabel');
		return $a;
	}
	
	function data_kolom($id=0){
		$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Tabel',$id)->get('ci_tabel_col');
		return $a;
	}
	
	function data_baris($id=0){
		//$a = $this->db->where('ID_Web',config())->where('ID_Tabel',$id)->get('ci_tabel_data');
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		/* if($data_kolom->num_rows() > 0){
			foreach($data_kolom->result() as $k){
				$d[] = $k->
			}
		} */
		
		$a = $this->db->query('SELECT ID_Row FROM ci_tabel_data a where a.ID_Web = "'.config().'" and a.ID_Tabel = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
	
	function data_col($id=0){
		//$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Tabel',$id)->get('ci_tabel_col');
		$a = $this->db->query('SELECT ID_Col FROM ci_tabel_col a where a.ID_Web = "'.config().'" and a.ID_Tabel = "'.$id.'" GROUP BY ID_Col ORDER BY a.Nomor ASC');
		return $a;
	}
	
	function data_row($id=0){
		//$a = $this->db->where('ID_Web',config())->where('ID_Tabel',$id)->get('ci_tabel_data');
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		/* if($data_kolom->num_rows() > 0){
			foreach($data_kolom->result() as $k){
				$d[] = $k->
			}
		} */
		
		$a = $this->db->query('SELECT ID_Row FROM ci_tabel_data a where a.ID_Web = "'.config().'" and a.ID_Tabel = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
	
	function insert_tabel($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Tabel','Nm_Tabel','required');
		$this->form_validation->set_rules('Deskripsi','Isi Deskripsi','');
		$this->form_validation->set_rules('op_tabel_kategori','Kategori Tabel','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Tabel','Last_ID')->where('ID_Web',config())->get('ci_tabel');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->Last_ID+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Tabel'] = $last_id;
			$in['Nm_Tabel'] = $this->input->post('Nm_Tabel');
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
			$a = $this->db->insert('ci_tabel',$in);
			$insert_id = $last_id;
			
			$op_tabel_kategori = $this->input->post('op_tabel_kategori');
			if(is_array($op_tabel_kategori)){
				foreach($op_tabel_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Tabel'] = $insert_id;
					$this->db->insert('ci_tabel_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Tabel'] = $insert_id;
				$this->db->insert('ci_tabel_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Tabel'] = $insert_id;
						$this->db->insert('ci_tabel_tags',$in3);
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
						$in4['ID_Tabel'] = $insert_id;
						$in4['Nomor'] = $Nomor[$idx];
						$in4['Nm_Col'] = $Kolom[$idx];
						$in4['Sort_Order'] = $Sort[$idx];
						$this->db->insert('ci_tabel_col',$in4);
					}
				}
			}
			
			
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(str_replace('tabel/add','tabel/edit/'.$insert_id,current_url()));
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_tabel($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Tabel','Nm_Tabel','required');
		$this->form_validation->set_rules('Deskripsi','Isi Deskripsi','');
		$this->form_validation->set_rules('op_tabel_kategori','Kategori Tabel','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Tabel'] = $id;
			$in['Nm_Tabel'] = $this->input->post('Nm_Tabel');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_tabel',$in,$wh);
			
			$op_tabel_kategori = $this->input->post('op_tabel_kategori');
			$this->db->delete('ci_tabel_log',$wh);
			if(is_array($op_tabel_kategori)){
				foreach($op_tabel_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Tabel'] = $id;
					$this->db->insert('ci_tabel_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Tabel'] = $id;
				$this->db->insert('ci_tabel_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_tabel_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Tabel'] = $id;
						$this->db->insert('ci_tabel_tags',$in3);
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
							$in4['ID_Tabel'] = $id;
							$in4['Nomor'] = $a_Nomor;
							$in4['Nm_Col'] = $a_Kolom;
							$in4['Sort_Order'] = $a_Sort;
							$this->db->update('ci_tabel_col',$in4,$wh4);
						}
						else{
							$in4['ID_Web'] = config();
							$in4['ID_Tabel'] = $id;
							$in4['Nomor'] = $a_Nomor;
							$in4['Nm_Col'] = $a_Kolom;
							$in4['Sort_Order'] = $a_Sort;
							$this->db->insert('ci_tabel_col',$in4);
						}
					}
					else{
						if($a_ID_Col != '0'){
							$wh4['ID_Web'] = config();
							$wh4['ID_Tabel'] = $id;
							$wh4['ID_Col'] = $a_ID_Col;
							$this->db->delete('ci_tabel_col',$wh4);
							$this->db->delete('ci_tabel_data',$wh4);
							
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
	
	function save_data_tabel($id=0){
		$ID_Row = $this->input->post('ID_Row');
		$col = $this->input->post('col');
		
		
		for($i=0;$i<count($ID_Row);$i++){
			$marker = $this->input->post('marker_'.$i);
			$exist = $this->input->post('exist_'.$i);
			for($j=0;$j<count($col);$j++){
				if($marker != '0'){
					if($exist != '0'){
						$wh['ID_Web'] = config();
						$wh['ID_Tabel'] = $id;
						$wh['ID_Col'] = $col[$j];
						$wh['ID_Row'] = $ID_Row[$i];
						$in['Value'] = $this->input->post('col_val_'.$i.'_'.$j);
						$in['Status'] = 1;
						$a = $this->db->update('ci_tabel_data',$in,$wh);
					}
					else{
						/* $wh2['ID_Web'] = config();
						$wh2['ID_Tabel'] = $id;
						$wh2['ID_Col'] = $col[$j];
						$wh2['ID_Row'] = $ID_Row[$i];
						$last_id = 0;
						$z = $this->db->select_max('ID','ID')->get_where('ci_tabel_data',$wh2);
						if($z->num_rows() > 0){
							$xx = $z->first_row();
							$last_id = $xx->ID+1;
						} */
						
						$in['ID_Web'] = config();
						$in['ID_Tabel'] = $id;
						$in['ID_Col'] = $col[$j];
						$in['ID_Row'] = $ID_Row[$i];
						//$in['ID'] = $last_id;
						$in['Value'] = $this->input->post('col_val_'.$i.'_'.$j);
						$in['Status'] = 1;
						$a = $this->db->insert('ci_tabel_data',$in);
					}
				}
				else{
					if($exist != '0'){
						$wh['ID_Web'] = config();
						$wh['ID_Tabel'] = $id;
						$wh['ID_Col'] = $col[$j];
						$wh['ID_Row'] = $ID_Row[$i];
						$a = $this->db->delete('ci_tabel_data',$wh);
					}
				}
			}
		}
		/* $col = $this->input->post('col');
		$ID_Row = $this->input->post('ID_Row');
		$marker = $this->input->post('marker');
		$exist = $this->input->post('exist');
		for($i=0;$i<count($col);$i++){
			$row[$i] = $this->input->post('col_'.$i);
			$ID[$i] = $this->input->post('ID_'.$i);
			for($j=0;$j<count($row[$i]);$j++){
				if($marker[$j] != '0'){
					if($exist[$j] != '0'){
						$wh['ID_Web'] = config();
						$wh['ID_Tabel'] = $id;
						$wh['ID_Col'] = $col[$i];
						$wh['ID_Row'] = $ID_Row[$j];
						//$wh['ID'] = $ID[$i][$j];
						$in['Value'] = $row[$i][$j];
						$in['Status'] = 1;
						$a = $this->db->update('ci_tabel_data',$in,$wh);
					}
					else{
						$in['ID_Web'] = config();
						$in['ID_Tabel'] = $id;
						$in['ID_Col'] = $col[$i];
						$in['ID_Row'] = $ID_Row[$j];
						$in['Value'] = $row[$i][$j];
						$in['Status'] = 1;
						$a = $this->db->insert('ci_tabel_data',$in);
					}
				}
				else{
					if($exist[$j] != '0'){
						$wh['ID_Web'] = config();
						$wh['ID_Tabel'] = $id;
						$wh['ID_Col'] = $col[$i];
						$wh['ID_Row'] = $ID_Row[$j];
						$a = $this->db->delete('ci_tabel_data',$wh);
					}
				}
			}
			
		} */
		set_alert('success','Data berhasil diupdate');
		redirect(current_url());
	}
	
	function slc_op_tabel_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Tabel',$id)->get('ci_tabel_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_tabel_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Tabel',$id)->get('ci_tabel_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_tabel_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_tabel_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_tabel_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_tabel_kategori',$wh);
				$this->db->delete('ci_tabel_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_tabel_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_tabel_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_tabel_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_tabel_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_tabel_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_tabel_kategori');
		return $a;
	}
	
	
	function insert_tabel_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_tabel_kategori');
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
			$a = $this->db->insert('ci_tabel_kategori',$in);
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
		
	function update_tabel_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_tabel_kategori',$in,$wh);
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
	
	function op_tabel_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_tabel_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
}


