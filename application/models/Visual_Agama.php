<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_Agama extends CI_Model
{
    public function getAgamaByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`agama`) as jumlah, `ag`.`agama`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_agama` `ag` ON `ag`.`id_agama` = `fs`.`agama` GROUP BY `dt`.`tahun`, agama HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    public function getCountAgamaThreeYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`rombel`) as jumlah, `rb`.`nama_rombel`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_rombel` `rb` ON `rb`.`id_rombel` = `fs`.`rombel` GROUP BY `dt`.`tahun`, rombel  HAVING tahun >= " . ($tahun - 3) . "");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
}
