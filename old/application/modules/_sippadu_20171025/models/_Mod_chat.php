<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_chat extends CI_Model {
	
	function chatHeartBeat($username=''){
		$sql = $this->db->where('`to`',$username)->where('recd',0)->get('ci_chat');
		return $sql;
	}
	
	function updateRCD($username=''){
		$wh['`to`'] = $username;
		$wh['recd'] = 0;
		$in['recd'] = 1;
		$sql = $this->db->update('ci_chat',$in,$wh);
		return $sql;
	}
	
	function InsertChat($from='',$to='',$message=''){
		$in['from'] = $from;
		$in['`to`'] = $to;
		$in['message'] = $message;
		$in['sent'] = TimeNow('Y-m-d H:i');
		$sql = $this->db->query('ci_chat',$in);
		return $sql;
	}
	
}
