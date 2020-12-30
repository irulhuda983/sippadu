<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RekomAll_model extends CI_Model {

    public function getDataRekom($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 0";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }

    public function getDataRekomFo($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 0";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }

    public function getDataRekomBo($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 1 AND `rekom_izin`.`bo` = 0";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }

    public function getDataRekomKabid($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 1 AND `rekom_izin`.`bo` = 1 AND `rekom_izin`.`kabid` = 0";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }

    public function getDataRekomKadin($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 1 AND `rekom_izin`.`bo` = 1 AND `rekom_izin`.`kabid` = 1 AND `rekom_izin`.`kadin` = 0";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }

    public function getDataRekomTu($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 1 AND `rekom_izin`.`bo` = 1 AND `rekom_izin`.`kabid` = 1 AND `rekom_izin`.`kadin` = 1 AND `rekom_izin`.`serah` = 0";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }

    public function getDataRekomArsip($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `rekom_izin` ON `tbpelanggan`.`IDPELANGGAN` = `rekom_izin`.`pelanggan_id` WHERE `rekom_izin`.`jenis_izin` = '$izin' AND `rekom_izin`.`fo` = 1 AND `rekom_izin`.`bo` = 1 AND `rekom_izin`.`kabid` = 1 AND `rekom_izin`.`kadin` = 1 AND `rekom_izin`.`serah` = 1";
        $data = $this->db->query($query)->result_array();
        // $data = $this->db->get_where('rekom_izin', ['jenis_izin' => $izin])->result_array();

        return $data;
    }


    public function getDataIzin($izin)
    {
        $query = "SELECT * FROM `tbpelanggan` JOIN `sippadu_apotek` ON `tbpelanggan`.`IDPELANGGAN` = `sippadu_apotek`.`ID_Pelanggan` WHERE `sippadu_apotek`.`Flow_Rekom` = 1";
        $data = $this->db->query($query)->result_array();

        return $data;
    }

    public function getDataIzinById($id)
    {
        $rekom_izin = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        $table = $rekom_izin['nama_table'];
        $idIzin = $rekom_izin['izin_id'];

        $data = [
            'izin' => $rekom_izin,
            'rekom' => $this->db->get_where($table, ['ID' => $idIzin])->row_array()
        ];

        return $data;
    }

    public function getDetailIzin($id)
    {
        $rekom_izin = $this->db->get_where('rekom_izin', ['id_rekom_izin' => $id])->row_array();
        $table = $rekom_izin['nama_table'];
        $idIzin = $rekom_izin['izin_id'];

        $data = $this->db->get_where($table, ['ID' => $idIzin])->row_array();

        return $data;
    }


    public function getDokumen($kd_izin, $kd_jenis)
    {
        $query = "SELECT * FROM `tb_dokumen_setting` JOIN `tb_dokumen` ON `tb_dokumen_setting`.`Kd_Dok` = `tb_dokumen`.`Kd_Dok` WHERE `tb_dokumen_setting`.`Kd_Izin` = 11 AND `tb_dokumen_setting`.`Kd_Jenis` = '$kd_jenis'";
        $data = $this->db->query($query)->result_array();

        return $data;
    }

}