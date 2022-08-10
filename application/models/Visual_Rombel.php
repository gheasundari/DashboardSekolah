<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_Rombel extends CI_Model
{
    public function getCountKipByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`rombel`) as jumlah, `rb`.`nama_rombel`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_rombel` `rb` ON `rb`.`id_rombel` = `fs`.`rombel` GROUP BY `dt`.`tahun`, rombel HAVING `dt`.`tahun` = '2019'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    public function getCountPenerimaKipByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`penerima_kip`) as jumlah_kip, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_penerimakip` `kip` ON `kip`.`id_kip` = `fs`.`penerima_kip` GROUP BY `dt`.`tahun`, `kip`.`penerimakip` HAVING `dt`.`tahun` = '2019' and penerimakip='Ya'");
        return $data->row();
        // return $this->db->get_compiled_select();
    }
}