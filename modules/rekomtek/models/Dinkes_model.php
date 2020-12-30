<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dinkes_model extends CI_Model {

    public function getData()
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `sippadu_apotek` ON `tbpelanggan`.`IDPELANGGAN` = `sippadu_apotek`.`ID_Pelanggan` WHERE `sippadu_apotek`.`Flow_Rekom` = 1";
        $data = $this->db->query($query)->result_array();

        return $data;
    }

}