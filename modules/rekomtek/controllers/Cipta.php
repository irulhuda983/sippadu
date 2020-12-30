<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cipta extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
		$this->load->model('RekomAll_model', 'rekom');
		// $this->auth->restrict(fmodule('login'));
    }

    public function getDataFo($id)
    {
        $rekom = $this->rekom->getDataRekomFo($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('FO/tableIzinCipta', $data);
    }

}