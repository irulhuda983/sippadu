<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_chat','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
		$this->auth->restrict(fmodule('login'));
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 

		if (!isset($_SESSION['chatHistory'])) {
			$_SESSION['chatHistory'] = array();	
		}

		if (!isset($_SESSION['openChatBoxes'])) {
			$_SESSION['openChatBoxes'] = array();	
		}
		//load_cache();
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses(1,$this->session->userdata('userid'));
		
		$d['title'] = $title = 'Dashboard';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'dashboard';
		$d['menuactive'] = 'dashboard';
		
		
		$this->breadcrumb->append_crumb('Dashboard', '/');
		$this->load->view('home_chat',$d);
		
	}
	

	function chatHeartbeat() {
		$userfullname = $this->session->userdata('userfullname');
		$username = $this->session->userdata('username');
		$sql = $this->mod_chat->chatHeartbeat($username);
		$items = '';

		$chatBoxes = array();
		
			foreach($sql->result() as $chat) {

				if (!isset($_SESSION['openChatBoxes'][$chat->from]) && isset($_SESSION['chatHistory'][$chat->from])) {
					$items = $_SESSION['chatHistory'][$chat->from];
				}

				$chat->message = $this->sanitize($chat->message);

				$items .= <<<EOD
							   {
					"s": "0",
					"f": "{$chat->from}",
					"m": "{$chat->message}"
			   },
EOD;

			if (!isset($_SESSION['chatHistory'][$chat->from])) {
				$_SESSION['chatHistory'][$chat->from] = '';
			}

			$_SESSION['chatHistory'][$chat->from] .= <<<EOD
								   {
					"s": "0",
					"f": "{$chat->from}",
					"m": "{$chat->message}"
			   },
EOD;
				
				unset($_SESSION['tsChatBoxes'][$chat->from]);
				$_SESSION['openChatBoxes'][$chat->from] = $chat->sent;
			}

		if (!empty($_SESSION['openChatBoxes'])) {
		foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
			if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
				$now = time()-strtotime($time);
				$time = date('d F Y H:i', strtotime($time));

				$message = "$time";
				if ($now > 180) {
					$items .= <<<EOD
	{
	"s": "2",
	"f": "$chatbox",
	"m": "{$message}"
	},
EOD;

		if (!isset($_SESSION['chatHistory'][$chatbox])) {
			$_SESSION['chatHistory'][$chatbox] = '';
		}

		$_SESSION['chatHistory'][$chatbox] .= <<<EOD
			{
	"s": "2",
	"f": "$chatbox",
	"m": "{$message}"
	},
EOD;
				$_SESSION['tsChatBoxes'][$chatbox] = 1;
			}
			}
		}
	}

		$sql = $this->mod_chat->updateRCD($username);

		if ($items != '') {
			$items = substr($items, 0, -1);
		}
	header('Content-type: application/json');
	?>
	{
			"items": [
				<?php echo $items;?>
			]
	}

	<?php
				exit(0);
	}

	function chatBoxSession($chatbox) {
		
		$items = '';
		
		if (isset($_SESSION['chatHistory'][$chatbox])) {
			$items = $_SESSION['chatHistory'][$chatbox];
		}

		return $items;
	}

	function startChatSession() {
		$items = '';
		if (!empty($_SESSION['openChatBoxes'])) {
			foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
				$items .= $this->chatBoxSession($chatbox);
			}
		}


		if ($items != '') {
			$items = substr($items, 0, -1);
		}

	header('Content-type: application/json');
	?>
	{
			"username": "<?php echo $_SESSION['username'];?>",
			"items": [
				<?php echo $items;?>
			]
	}

	<?php


		exit(0);
	}

	function sendChat() {
		$from = $_SESSION['username'];
		$to = $_POST['to'];
		$message = $_POST['message'];

		$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());
		
		$messagesan = $this->sanitize($message);

		if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
			$_SESSION['chatHistory'][$_POST['to']] = '';
		}

		$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
						   {
				"s": "1",
				"f": "{$to}",
				"m": "{$messagesan}"
		   },
EOD;


		unset($_SESSION['tsChatBoxes'][$_POST['to']]);

		$sql = $this->mod_chat->InsertChat($from,$to,$message);
		echo "1";
		exit(0);
	}

	function closeChat() {

		unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
		
		echo "1";
		exit(0);
	}

	function sanitize($text) {
		$text = htmlspecialchars($text, ENT_QUOTES);
		$text = str_replace("\n\r","\n",$text);
		$text = str_replace("\r\n","\n",$text);
		$text = str_replace("\n","<br>",$text);
		return $text;
	}
	
	
}