<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_Sekolah extends CI_Model
{
    public function getCountAsalSekolahByYear($tahun)
    {
        $data = $this->db->query("SELECT count(fs.asal_sekolah) as jumlah_siswa, `sk`.`nama_sekolah`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_asalsekolah` `sk` ON `sk`.`id_asalsekolah` = `fs`.`asal_sekolah` GROUP BY `dt`.`tahun`, nama_sekolah HAVING `dt`.`tahun` = '" . $tahun . "' ORDER BY jumlah_siswa DESC limit 1");
        return $data->row();
        // return $this->db->get_compiled_select();
    }
}
