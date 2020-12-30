<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apotek extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
		$this->load->model('RekomAll_model', 'rekom');
		// $this->auth->restrict(fmodule('login'));
	}	

    public function getDataApotek($id)
    {
        $rekom = $this->rekom->getDataRekom($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('apotek/tableIzin', $data);
    }

    public function getDataValidasi($id)
    {
        // $rekom = $this->rekom->getDataRekomById($id);
        // $idIzin = $rekom['id_rekom_izin'];
        $data = $this->rekom->getDataIzinById($id);

        echo json_encode($data);
    }

    public function validasiFo($id)
    {
        $this->db->set('fo', 1);
        $this->db->where('id_rekom_izin', $id);
        $valid = $this->db->update('rekom_izin');
        
        $data = [];

        if($valid){
            $data['status'] = 1;
            $data['pesan'] = "Berhasil Validasi";
        }else{
            $data['status'] = 0;
            $data['pesan'] = "Gagal Validasi";
        }

        echo json_encode($data);
    }

}