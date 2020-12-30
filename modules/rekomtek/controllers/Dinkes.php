<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dinkes extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
        $this->load->model('RekomAll_model', 'rekom');
        $this->load->helper('download');
		// $this->auth->restrict(fmodule('login'));
    }

    public function getDataFo($id)
    {
        $rekom = $this->rekom->getDataRekomFo($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('FO/tableIzinDinkes', $data);
    }
    
    public function getDataBo($id)
    {
        $rekom = $this->rekom->getDataRekomBo($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('BO/tableIzinDinkes', $data);
    }

    public function getDataKabid($id)
    {
        $rekom = $this->rekom->getDataRekomKabid($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('kabid/tableIzinDinkes', $data);
    }

    public function getDataKadin($id)
    {
        $rekom = $this->rekom->getDataRekomKadin($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('kadin/tableIzinDinkes', $data);
    }

    public function getDataTu($id)
    {
        $rekom = $this->rekom->getDataRekomTu($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        $data = [
            'rekom' => $rekom
        ];
        $this->load->view('TU/tableIzinDinkes', $data);
    }

    public function getDataArsip($id)
    {
        $rekom = $this->rekom->getDataRekomArsip($id);
        // $izin = $this->rekom->getDataizin($rekom['rekom_table', ]);
        // $data = [
        //     'rekom' => $rekom
        // ];
        // var_dump($rekom);
        if($rekom == NULL){
            $data = [
                'status' => 0
            ];
        }else{
            $data = [
                'status' => 1,
                'rekom' => $rekom
            ];
        }
        
        echo json_encode($data);
    }


    // ----------------------
    // Ajax data untuk validasi
    // -----------------------

    public function getDataValidasi($id)
    {
        // $rekom = $this->rekom->getDataRekomById($id);
        // $idIzin = $rekom['id_rekom_izin'];
        $data = $this->rekom->getDataIzinById($id);

        echo json_encode($data);
    }

    public function getDataValidasiBo($id)
    {
        $data = $this->rekom->getDataIzinById($id);

        echo json_encode($data);
    }

    public function getDataValidasiKadin($id)
    {
        $data = $this->rekom->getDataIzinById($id);

        echo json_encode($data);
    }

    public function getDataValidasiTu($id)
    {
        $data = $this->rekom->getDataIzinById($id);

        echo json_encode($data);
    }

    // ----------------------
    // Ajax data untuk validasi
    // -----------------------


    // ----------------------
    // validasi
    // -----------------------

    public function validasiFo($id)
    {
        // var_dump($id);
        $this->db->set('fo', 1);
        $this->db->where('id_rekom_izin', $id);
        $valid = $this->db->update('rekom_izin');
        
        $rekom = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        // $izin = $this->db->get_where($rekom['nama_table'], ['ID' => $rekom['izin_id']])->row_array();
        $this->db->set('id_reg', $rekom['no_reg']);
        $this->db->set('bidang', 'fo');
        $this->db->set('unit', 'DINKES');
        $this->db->set('tanggal', date('d-m-Y H:i:s'));
        $this->db->set('pesan', 'Pemeriksaan Dokumen oleh Front Office');
        $this->db->insert('sippadu_track_izin');

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

    public function validasiBo($id)
    {
        $this->db->set('bo', 1);
        $this->db->set('visitasi_bo', 1);
        $this->db->where('id_rekom_izin', $id);
        $valid = $this->db->update('rekom_izin');

        $rekom = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        $this->db->set('id_reg', $rekom['no_reg']);
        $this->db->set('bidang', 'kadin');
        $this->db->set('unit', 'DINKES');
        $this->db->set('tanggal', date('d-m-Y H:i:s'));
        $this->db->set('pesan', 'Visitasi Oleh Dinkes');
        $this->db->insert('sippadu_track_izin');
        
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

    public function validasiKabid($id)
    {
        $this->db->set('kabid', 1);
        $this->db->where('id_rekom_izin', $id);
        $valid = $this->db->update('rekom_izin');
        
        $rekom = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        $this->db->set('id_reg', $rekom['no_reg']);
        $this->db->set('bidang', 'kabid');
        $this->db->set('unit', 'DINKES');
        $this->db->set('tanggal', date('d-m-Y H:i:s'));
        $this->db->set('pesan', 'Pengecekan dokumen oleh kepala bidang');
        $ins = $this->db->insert('sippadu_track_izin');



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

    public function validasiKadin($id)
    {
        $this->db->set('kadin', 1);
        $this->db->where('id_rekom_izin', $id);
        $valid = $this->db->update('rekom_izin');

        $rekom = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        $this->db->set('id_reg', $rekom['no_reg']);
        $this->db->set('bidang', 'kadin');
        $this->db->set('unit', 'DINKES');
        $this->db->set('tanggal', date('d-m-Y H:i:s'));
        $this->db->set('pesan', 'Penandatanganan Surat Rekomendasi Oleh kepala Dinas');
        $this->db->insert('sippadu_track_izin');

        
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

    public function validasiTu($id)
    {
        $this->db->set('serah', 1);
        $this->db->where('id_rekom_izin', $id);
        $valid = $this->db->update('rekom_izin');

        $rekom = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        $this->db->set('id_reg', $rekom['no_reg']);
        $this->db->set('bidang', 'tu');
        $this->db->set('unit', 'DINKES');
        $this->db->set('tanggal', date('d-m-Y H:i:s'));
        $this->db->set('pesan', 'Penyerahan rekomendasi ke PTSp');
        $this->db->insert('sippadu_track_izin');
        
        $data = [];

        if($valid){
            
            $this->db->set('Flow_Rekom', 1);
            $this->db->where('ID', $rekom['izin_id']);
            $this->db->update($rekom['nama_table']);
            

            $data['status'] = 1;
            $data['pesan'] = "Berhasil Validasi";
        }else{
            $data['status'] = 0;
            $data['pesan'] = "Gagal Validasi";
        }

        echo json_encode($data);
    }

     // ----------------------
    // END validasi
    // -----------------------

    // ------------------
    // Tolak Izin
    // ------------

    public function tolakFo()
    {
        $id = $_POST['id'];
        $reg = $_POST['reg'];
        $urai = explode('/', $reg);
        $table = '';
        if($urai[1] == 'APOTEK'){
            $table = 'sippadu_apotek';
        }else if($urai[1] == 'LAB-KLINIK'){
            $table = 'sippadu_labklinik';
        }else if($urai[1] == 'OPKLINIK'){
            $table = 'sippadu_opklinik';
        }else {
            $table = '';
        }

        $this->db->set('Flow_Rekom', 0);
        $this->db->where('ID_Reg', $reg);
        $izin = $this->db->update($table);
        if($izin){
            $data_rekom = [
                'fo' => 2
            ];
            $rekom = $this->db->update('rekom_izin', $data_rekom, ['id_rekom_izin' => $id]);
            $data = ['izin' => $rekom];
            echo json_encode($data);
        }else{
            $data = ['izin' => false];
            echo json_encode($data);
        }
    }

    public function tolakBo()
    {
        $id = $_POST['id'];
        $data_rekom = [
            'fo' => 0
        ];
        $rekom = $this->db->update('rekom_izin', $data_rekom, ['id_rekom_izin' => $id]);
        $data = ['izin' => $rekom];
        echo json_encode($data);
    }

    // ------------------
    // buat surat
    // ------------------
    public function downloadSk($table, $id)
    {
        $data = $this->db->get_where($table, ['ID' => $id])->row_array();
        force_download('assets/admin/sk_rekom/'. $data['Isi_Surat_Rekom'], NULL);
    }

    
}