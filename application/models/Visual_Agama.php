<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_Agama extends CI_Model
{
    public function getAgamaByYear($tahun)
    {
        //Mengambil data agama dengan tahun di tentukan dari tabel fact dan berhubungan dengan tabel dim_agama dan dim_tahun 
        $data = $this->db->query("SELECT count(`fs`.`id_agama`) as jumlah, `ag`.`agama`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_agama` `ag` ON `ag`.`id_agama` = `fs`.`id_agama` GROUP BY `dt`.`tahun`, agama HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    // public function getCountAgamaThreeYear($tahun)
    // {
    //     //Mengambil data agama dengan tahun di tentukan dari tabel fact_agama dan berhubungan dengan tabel dim_agama dan dim_tahun 
    //     $data = $this->db->query("SELECT count(`fs`.`id_rombel`) as jumlah, `rb`.`nama_rombel`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_rombel` `rb` ON `rb`.`id_rombel` = `fs`.`id_rombel` GROUP BY `dt`.`tahun`, rombel  HAVING tahun >= " . ($tahun - 3) . "");
    //     return $data->result();
    //     // return $this->db->get_compiled_select();
    // }
}
