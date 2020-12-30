<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sk extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
	}	
	
	public function saveSk()
	{
        $reg = $this->input->post('no_reg');
        $id_rekom = $this->input->post('id_rekom');
        $no_surat = $this->input->post('no_surat');
        $sifat = $this->input->post('sifat');
        $lamp = $this->input->post('lam');
        $hal = $this->input->post('hal');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggal');
        $kepada = $this->input->post('kepada');
        $jenis_izin = $this->input->post('jenis_izin');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $dokter = $this->input->post('dokter');
        $alamat = $this->input->post('alamat');
        $Kadin = $this->input->post('Kadin');
        $pangkat = $this->input->post('pangkat');
        $nip = $this->input->post('nip');
        $tembusan1 = $this->input->post('tembusan1');

        $in = [
            'no_reg' => $no_reg,
            'rekom_id' => $id_rekom,
            'no_surat' => $no_surat,
            'sifat' => $sifat,
            'lamp' => $lamp,
            'hal' => $hal,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'kepada' => $kepada,
            'jenis_izin' => $jenis_izin,
            'jenis_pelayanan' => $jenis_pelayanan,
            'dokter' => $dokter,
            'alamat' => $alamat,
            'kadin' => $kadin,
            'pangkat' => $pangkat,
            'nip' => $nip,
            'tembusan_1' => $tembusan1,
            'tembusan_2' => NULL,
            'ttd' => NULL
        ];

        $this->db->set('no_reg', $reg);
        $this->db->set('rekom_id', $id_rekom);
        $this->db->set('no_surat', $no_surat);
        $this->db->set('sifat', $sifat);
        $this->db->set('lamp', $lamp);
        $this->db->set('hal', $hal);
        $this->db->set('tempat', $tempat);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('kepada', $kepada);
        $this->db->set('jenis_izin', $jenis_izin);
        $this->db->set('jenis_pelayanan', $jenis_pelayanan);
        $this->db->set('dokter', $dokter);
        $this->db->set('alamat', $alamat);
        $this->db->set('kadin', $kadin);
        $this->db->set('pangkat', $pangkat);
        $this->db->set('nip', $nip);
        $this->db->set('tembusan_1', $tembusan1);
            
        $que = $this->db->insert('rekom_sk_opklinik');

        // var_dump($que);
        // var_dump($_POST);

        $this->session->set_flashdata('alert', 'Berhasil Set Surat');
        redirect('backOffice/setSurat/'.$id_rekom);
    }
	
	
}