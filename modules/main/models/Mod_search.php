<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_search extends CI_Model {
	
	function tabel_search($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY z.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Judul like "%'.$keyword.'%") OR (a.Konten like "%'.$keyword.'%")';
		}
		
		$a = $this->db->query('
		SELECT * FROM
		(
			SELECT "berita" as Type,a.*,b.Nm_User,b.Username FROM ci_berita a LEFT JOIN ci_user b ON a.Author = b.ID_User and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.'
			UNION ALL
			SELECT "informasi" as Type,a.*,b.Nm_User,b.Username FROM ci_informasi a LEFT JOIN ci_user b ON a.Author = b.ID_User and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.'
		) z '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
}
