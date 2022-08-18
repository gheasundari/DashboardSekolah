<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_Rombel extends CI_Model
{
    public function getCountRombelByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`id_rombel`) as jumlah, `rb`.`nama_rombel` as nama_rombel, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_rombel` `rb` ON `rb`.`id_rombel` = `fs`.`id_rombel` GROUP BY `dt`.`tahun`, nama_rombel HAVING `dt`.`tahun` = '" . ($tahun) . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    public function getRombelByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`id_rombel`) as jumlah, `rb`.`nama_rombel` as nama_rombel, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_rombel` `rb` ON `rb`.`id_rombel` = `fs`.`id_rombel` GROUP BY `dt`.`tahun`, nama_rombel HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    public function getCountRombelThreeYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`id_rombel`) as jumlah, `rb`.`nama_rombel` as rombel, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_rombel` `rb` ON `rb`.`id_rombel` = `fs`.`id_rombel` GROUP BY `dt`.`tahun`, rombel  HAVING tahun >= " . ($tahun - 3) . "");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
}
