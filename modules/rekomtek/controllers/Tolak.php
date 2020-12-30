<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tolak extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
	}	
	
	public function index()
	{
		$data = [
            'title' => 'Izin Ditolak',
            'menu' => 'tolak',
            'rekom' => $this->db->get_where('rekom_izin', ['fo' => 2])->result_array()
        ];


        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('tolak/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete($id, $table)
    {
        $this->db->set('Flow_Rekom', 0);
        $this->db->where('ID', $id);
        $this->db->update($table);

        $this->db->delete('rekom_izin', ['izin_id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Rekomendasi berhasil di hapus.
			</div>');
			redirect('tolak');
    }
	
	
}