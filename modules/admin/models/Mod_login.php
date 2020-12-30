<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_login extends CI_Model {
	
	function insert_captcha($word='',$time=''){
		$data = array(
				'captcha_time'  => $time,
				'ip_address'    => $this->input->ip_address(),
				'word'          => $word
		);

		$query = $this->db->insert_string('ci_captcha', $data);
		$this->db->query($query);
	}
	
	function validasi_captcha(){
		$expiration = time() - 7200;
		$this->db->where('captcha_time < ', $expiration)
				->delete('ci_captcha');

		$sql = 'SELECT COUNT(*) AS count FROM ci_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		return $row->count;
	}	
	
	function op_ta(){
		
		$a = $this->db->where('Status',1)->order_by('Tahun_Db','desc')->get('simda_db');
		
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0'] = '- Pilih Tahun Anggaran -';
				$d[$aa->Kd_Db] = $aa->Nm_Db;
			}
		}
		else{
			$d[] = '- Tidak ada data tahun anggaran -';
		}
		return $d;
	}
	
	function op_ta_maintenance(){
		
		$a = $this->db->order_by('Tahun_Db','desc')->get('simda_db');
		
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0'] = '- Pilih Tahun Anggaran -';
				$d[$aa->Kd_Db] = $aa->Nm_Db;
			}
		}
		else{
			$d[] = '- Tidak ada data tahun anggaran -';
		}
		return $d;
	}
	
	public function set_session_name($id=0){
		$a = $this->db->where('Kd_Db',$id)->get('simda_db');
		if($a->num_rows() > 0){
			$aa = $a->row();
			$th = $aa->Tahun_Db;
			$db_name = $aa->Nm_Db;
			$this->session->set_userdata('sess_Tahun_Db',$th);
			$this->session->set_userdata('sess_Nm_Db',$db_name);
			$this->session->set_userdata('sess_Nm_Simda','SIMDA '.$th);
		}
	}
}
