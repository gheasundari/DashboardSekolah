<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_JK extends CI_Model
{
    public function getCountSexByYear($tahun)
    {
        $data = $this->db->query("SELECT count(fs.asal_sekolah) as jumlah_siswa, `sk`.`nama_sekolah`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_asalsekolah` `sk` ON `sk`.`id_asalsekolah` = `fs`.`asal_sekolah` GROUP BY `dt`.`tahun`, nama_sekolah HAVING `dt`.`tahun` = '" . $tahun . "' ORDER BY jumlah_siswa DESC limit 1");
        return $data->row();
        // return $this->db->get_compiled_select();
    }
    public function getSexByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`sk`.`nama_sekolah`) as jumlah, `sk`.`nama_sekolah`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_asalsekolah` `sk` ON `sk`.`id_asalsekolah` = `fs`.`asal_sekolah` GROUP BY `dt`.`tahun`, nama_sekolah HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    public function getGender($tahun)
    {
        $data =  $this->db->query("SELECT count(fs.nisn) as jumlah_siswa, js.jenis_kelamin, `dt`.`tahun` FROM `fact_sekolah` `fs` 
        LEFT JOIN `dim_jeniskelamin` `js` ON `js`.`id_jeniskelamin` = `fs`.jenis_kelamin
        LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` GROUP by tahun,js.jenis_kelamin HAVING tahun =" . $tahun . "");
        return $data->result();
    }
}
