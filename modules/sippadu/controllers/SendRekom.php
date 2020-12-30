<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SendRekom extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_users','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		/*$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);*/
		$this->auth->restrict(fmodule('login'));
    }

    public function rekomApotek($id)
    {
        // $this->db->set('Flow_Rekom', 1);
        // $this->db->where('ID', $id);
        // $update = $this->db->update('sippadu_apotek');
        // if($update){
        //     $data = $this->db->get_where('sippadu_apotek', ['ID' => $id])->row_array();
        //     $cek = $this->db->get_where('rekom_izin', ['izin_id' => $id, 'jenis_izin' => 11])->row_array();
        //     if($cek == NULL){
        //         $this->db->set('skpd_id', 2);
        //         $this->db->set('jenis_izin', 11);
        //         $this->db->set('nama_table', 'sippadu_apotek');
        //         $this->db->set('izin_id', $id);
        //         $this->db->set('pelanggan_id', $data['ID_Pelanggan']);
        //         $this->db->set('no_surat', '');
        //         $this->db->set('fo', 0);
        //         $this->db->set('bo', 0);
        //         $this->db->set('kabid', 0);
        //         $this->db->set('kadin', 0);
        //         $this->db->set('serah', 0);
        //         $this->db->set('tanggal_minta', time());
        //         $this->db->set('tanggal_serah', 0);
        //         $this->db->set('status', 1);
                
        //         $this->db->insert('rekom_izin');
    
        //         set_alert('success','Rekomendasi berhasil disimpan');
        //         redirect('apotek/rekom_edit/'.$id);
        //     }else{
        //         set_alert('success','Rekomendasi Sudah terkirim');
        //         redirect('apotek/rekom_edit/'.$id);
        //     }
        // }


        $data = $this->db->get_where('sippadu_apotek', ['ID' => $id])->row_array();
        $cek = $this->db->get_where('rekom_izin', ['izin_id' => $id, 'jenis_izin' => 11])->row_array();
        if($cek == NULL){
            $this->db->set('skpd_id', 2);
            $this->db->set('jenis_izin', 11);
            $this->db->set('nama_table', 'sippadu_apotek');
            $this->db->set('izin_id', $id);
            $this->db->set('no_reg', $data['ID_Reg']);
            $this->db->set('pelanggan_id', $data['ID_Pelanggan']);
            $this->db->set('no_surat', '');
            $this->db->set('fo', 0);
            $this->db->set('bo', 0);
            $this->db->set('kabid', 0);
            $this->db->set('kadin', 0);
            $this->db->set('serah', 0);
            $this->db->set('tanggal_minta', time());
            $this->db->set('tanggal_serah', 0);
            $this->db->set('status', 1);
            
            $this->db->insert('rekom_izin');
            $track = [
                'id_reg' => $data['ID_Reg'],
                'bidang' => 'rekom',
                'unit' => 'dptmptsp',
                'tanggal' => date('d-m-Y H:i:s'),
                'pesan' => 'Permohonan Rekomendasi Ke Dinas Kesehatan'
            ];
            $this->db->insert('sippadu_track_izin', $track);

            set_alert('success','Rekomendasi berhasil Dikirim');
            redirect('apotek/rekom_edit/'.$id);
        }else{
            set_alert('success','Rekomendasi Sudah terkirim');
            redirect('apotek/rekom_edit/'.$id);
        }
    }

    public function rekomKlinik($id)
    {
        // $this->db->set('Flow_Rekom', 1);
        // $this->db->where('ID', $id);
        // $update = $this->db->update('sippadu_opklinik');
        // if($update){
            
        // }

        $data = $this->db->get_where('sippadu_opklinik', ['ID' => $id])->row_array();
            $cek = $this->db->get_where('rekom_izin', ['izin_id' => $id, 'jenis_izin' => 14])->row_array();
            if($cek == NULL){
                $this->db->set('skpd_id', 2);
                $this->db->set('jenis_izin', 14);
                $this->db->set('nama_table', 'sippadu_opklinik');
                $this->db->set('izin_id', $id);
                $this->db->set('no_reg', $data['ID_Reg']);
                $this->db->set('pelanggan_id', $data['ID_Pelanggan']);
                $this->db->set('no_surat', '');
                $this->db->set('fo', 0);
                $this->db->set('bo', 0);
                $this->db->set('kabid', 0);
                $this->db->set('kadin', 0);
                $this->db->set('serah', 0);
                $this->db->set('tanggal_minta', time());
                $this->db->set('tanggal_serah', 0);
                $this->db->set('status', 1);
                
                $this->db->insert('rekom_izin');
                $track = [
                    'id_reg' => $data['ID_Reg'],
                    'bidang' => 'rekom',
                    'unit' => 'dptmptsp',
                    'tanggal' => date('d-m-Y H:i:s'),
                    'pesan' => 'Permohonan Rekomendasi Ke Dinas Kesehatan'
                ];
                $this->db->insert('sippadu_track_izin', $track);
        
                set_alert('success','Rekomendasi Berhasil Terkirim');
                redirect('opklinik/rekom_edit/'.$id);
            }else{
                set_alert('success','Rekomendasi Sudah Terkirim');
                redirect('opklinik/rekom_edit/'.$id);
            }
    }

    public function rekomOptik($id)
    {
        // $this->db->set('Flow_Rekom', 1);
        // $this->db->where('ID', $id);
        // $update = $this->db->update('sippadu_optik');
        // if($update){
            
        // }

        $data = $this->db->get_where('sippadu_optik', ['ID' => $id])->row_array();
            $cek = $this->db->get_where('rekom_izin', ['izin_id' => $id, 'jenis_izin' => 17])->row_array();
            if($cek == NULL){
                $this->db->set('skpd_id', 2);
                $this->db->set('jenis_izin', 17);
                $this->db->set('nama_table', 'sippadu_optik');
                $this->db->set('izin_id', $id);
                $this->db->set('no_reg', $data['ID_Reg']);
                $this->db->set('pelanggan_id', $data['ID_Pelanggan']);
                $this->db->set('no_surat', '');
                $this->db->set('fo', 0);
                $this->db->set('bo', 0);
                $this->db->set('kabid', 0);
                $this->db->set('kadin', 0);
                $this->db->set('serah', 0);
                $this->db->set('tanggal_minta', time());
                $this->db->set('tanggal_serah', 0);
                $this->db->set('status', 1);
                
                $this->db->insert('rekom_izin');
                $track = [
                    'id_reg' => $data['ID_Reg'],
                    'bidang' => 'rekom',
                    'unit' => 'dptmptsp',
                    'tanggal' => date('d-m-Y H:i:s'),
                    'pesan' => 'Permohonan Rekomendasi Ke Dinas Kesehatan'
                ];
                $this->db->insert('sippadu_track_izin', $track);
        
                set_alert('success','Rekomendasi Berhasil Terkirim');
                redirect('opklinik/rekom_edit/'.$id);
            }else{
                set_alert('success','Rekomendasi Sudah Terkirim');
                redirect('opklinik/rekom_edit/'.$id);
            }
    }

    public function rekomItKesehatan($id)
    {
        // $this->db->set('Flow_Rekom', 1);
        // $this->db->where('ID', $id);
        // $update = $this->db->update('tbitkesehatan');
        // if($update){
           
        // }
        $data = $this->db->get_where('tbitkesehatan', ['ID' => $id])->row_array();
        $cek = $this->db->get_where('rekom_izin', ['izin_id' => $id, 'jenis_izin' => 9])->row_array();
        if($cek == NULL){
            $this->db->set('skpd_id', 2);
            $this->db->set('jenis_izin', 9);
            $this->db->set('nama_table', 'tbitkesehatan');
            $this->db->set('izin_id', $id);
            $this->db->set('no_reg', $data['ID_Reg']);
            $this->db->set('pelanggan_id', $data['ID_Pelanggan']);
            $this->db->set('no_surat', '');
            $this->db->set('fo', 0);
            $this->db->set('bo', 0);
            $this->db->set('kabid', 0);
            $this->db->set('kadin', 0);
            $this->db->set('serah', 0);
            $this->db->set('tanggal_minta', time());
            $this->db->set('tanggal_serah', 0);
            $this->db->set('status', 1);
            
            $this->db->insert('rekom_izin');
            $track = [
                'id_reg' => $data['ID_Reg'],
                'bidang' => 'rekom',
                'unit' => 'dptmptsp',
                'tanggal' => date('d-m-Y H:i:s'),
                'pesan' => 'Permohonan Rekomendasi Ke Dinas Kesehatan'
            ];
            $this->db->insert('sippadu_track_izin', $track);
    
            set_alert('success','Rekomendasi Berhasil Terkirim');
            redirect('opklinik/rekom_edit/'.$id);
        }else{
            set_alert('success','Rekomendasi Sudah Terkirim');
            redirect('opklinik/rekom_edit/'.$id);
        }
    }
    
    public function rekomLapKlinik($id)
    {
        // $this->db->set('Flow_Rekom', 1);
        // $this->db->where('ID', $id);
        // $update = $this->db->update('sippadu_labklinik');
        // if($update){
            
        // }

        $data = $this->db->get_where('sippadu_labklinik', ['ID' => $id])->row_array();
            $cek = $this->db->get_where('rekom_izin', ['izin_id' => $id, 'jenis_izin' => 12])->row_array();
            if($cek == NULL){
                $this->db->set('skpd_id', 2);
                $this->db->set('jenis_izin', 12);
                $this->db->set('nama_table', 'sippadu_labklinik');
                $this->db->set('izin_id', $id);
                $this->db->set('no_reg', $data['ID_Reg']);
                $this->db->set('pelanggan_id', $data['ID_Pelanggan']);
                $this->db->set('no_surat', '');
                $this->db->set('fo', 0);
                $this->db->set('bo', 0);
                $this->db->set('kabid', 0);
                $this->db->set('kadin', 0);
                $this->db->set('serah', 0);
                $this->db->set('tanggal_minta', time());
                $this->db->set('tanggal_serah', 0);
                $this->db->set('status', 1);
                
                $this->db->insert('rekom_izin');
                $track = [
                    'id_reg' => $data['ID_Reg'],
                    'bidang' => 'rekom',
                    'unit' => 'dptmptsp',
                    'tanggal' => date('d-m-Y H:i:s'),
                    'pesan' => 'Permohonan Rekomendasi Ke Dinas Kesehatan'
                ];
                $this->db->insert('sippadu_track_izin', $track);
        
                set_alert('success','Rekomendasi Berhasil Terkirim');
                redirect('opklinik/rekom_edit/'.$id);
            }else{
                set_alert('success','Rekomendasi Sudah Terkirim');
                redirect('opklinik/rekom_edit/'.$id);
            }
    }

    // end
}
