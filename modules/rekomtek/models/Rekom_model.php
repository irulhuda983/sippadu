<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekom_model extends CI_Model {

    public function getMenuIzin($unit)
    {
        $data = $this->db->get_where('tb_izin', ['SKPD_Rekom' => $unit])->result_array();

        return $data;
    }

}