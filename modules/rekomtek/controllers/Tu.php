<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
            redirect('login');
        }
		$this->load->model(array('mod_all','mod_daftar'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu', 'date','file','html'));

		$this->load->model('Dinkes_model', 'dinkes');
		$this->load->model('Rekom_model', 'rekom');
		$this->load->model('RekomAll_model', 'rekomAll');
		// $this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$unit = $this->session->userdata('unit');
		// if($this->session->userdata('unit') == 2){
		// 	$rekom = $this->dinkes->getData();
		// }
		// $rekom = 

		$data = [
			'title' => 'Tata Usaha',
			'menu' => 'tu',
			'unit' => $unit,
			'menuIzin' => $this->rekom->getMenuIzin($unit)
			// 'rekom' => $rekom
		];
		// var_dump($rekom);
		// die;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('TU/dinkes', $data);
        $this->load->view('templates/footer', $data);
	}

	public function serahPtsp($id)
	{
		$unit = $this->session->userdata('unit');

		$data = [
			'title' => 'Tata Usaha',
			'menu' => 'tu',
			'unit' => $unit,
			'menuIzin' => $this->rekom->getMenuIzin($unit),
			'izin' => $this->rekomAll->getDataIzinById($id)['izin'],
			'rekom' => $this->rekomAll->getDataIzinById($id)['rekom']
		];
		// var_dump($data['izin']);
		// die;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('TU/serahPtsp', $data);
		$this->load->view('templates/footer', $data);
		
	}

	public function uploadSk()
	{
		$id_izin = $this->input->post('izin_id');
		$id_rekom = $this->input->post('rekom_id');
        $table = $this->input->post('table');
        $no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		

		$this->db->set('serah', 1);
		$this->db->set('tanggal_serah', time());
        $this->db->where('id_rekom_izin', $id_rekom);
        $valid = $this->db->update('rekom_izin');

        $rekom = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id_rekom])->row_array();
        $this->db->set('id_reg', $rekom['no_reg']);
        $this->db->set('bidang', 'tu');
        $this->db->set('unit', 'DINKES');
        $this->db->set('tanggal', date('d-m-Y H:i:s'));
        $this->db->set('pesan', 'Penyerahan rekomendasi ke PTSp');
		$this->db->insert('sippadu_track_izin');
		
		if($valid){
            
			
			$upload_sk = $_FILES['file_sk']['name'];
			if ($upload_sk) {
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size']     = '20000';
				$config['upload_path'] = './assets/admin/sk_rekom/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file_sk')) {
					$file = $this->upload->data('file_name');
					$this->db->set('Isi_Surat_Rekom', $file);
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i> '.$this->upload->display_errors().'
					</div>');
					// $this->session->set_flashdata('pesan', '<p id="pesan">' . $this->upload->display_errors() . '</p>');
					redirect('tu/serahPtsp/'.$id_rekom);
				}

				$this->db->set('No_Surat_Rekom', $no_surat);
				$this->db->set('Tgl_Surat_Rekom', $tanggal_surat);
				$this->db->set('Flow_Rekom', 1);
				$this->db->where('ID', $id_izin);
				$this->db->update($table);
				
			}
            

            $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				rekomendasi berhasil di serahkan.
			</div>');
			redirect('tu');
        }
		// cek gambar
        // $upload_gambar = $_FILES['file_sk']['name'];
        // if ($upload_gambar) {
        //     $config['allowed_types'] = 'pdf';
        //     $config['max_size']     = '20000';
        //     $config['upload_path'] = './assets/sk_rekom/';

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('file_sk')) {
        //         $new_foto = $this->upload->data('file_name');
        //         // $this->db->set('foto', $new_foto);
        //     } else {
        //         // $this->session->set_flashdata('pesan', '<p id="pesan">' . $this->upload->display_errors() . '</p>');
        //         redirect('tu');
		// 	}
			
		// }

		// $this->db->set('No_Surat_Rekom', $no_surat);
		// $this->db->set('Tgl_Surat_Rekom', $tanggal_surat);
        // $this->db->Where('ID', $id_izin);
        // $this->db->update($table);
		// $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
        // 	<button type="button" class="close" data-dismiss="alert">
        // 		<i class="ace-icon fa fa-times"></i>
        // 	</button>

        // 	<i class="ace-icon fa fa-check green"></i>

        // 	rekomendasi berhasil di serahkan.
        // </div>');
        // redirect('tu');
	}
	
	
}