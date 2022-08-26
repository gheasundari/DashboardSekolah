<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_JenisTinggal extends CI_Model
{
    // public function getCountJenisTinggalByYear($tahun)
    // {
    //     $data = $this->db->query("SELECT count(`fs`.`id_jenistinggal`) as jumlah, `jt`.`jenis_tinggal`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_jenistinggal` `jt` ON `jt`.`id_jenis_tinggal` = `fs`.`id_jenistinggal` GROUP BY `dt`.`tahun`, jenis_tinggal HAVING `dt`.`tahun` = '" . ($tahun) . "'");
    //     return $data->result();
    //     // return $this->db->get_compiled_select();
    // }
    public function getJenisTinggalByYear($tahun)
    {
        //Mengambil data jenis tanggal dengan tahun di tentukan dari tabel fact dan berhubungan dengan tabel dim_jenistinggal dan dim_tahun 
        $data = $this->db->query("SELECT count(`fs`.`id_jenistinggal`) as jumlah, `jt`.`jenis_tinggal`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_jenistinggal` `jt` ON `jt`.`id_jenis_tinggal` = `fs`.`id_jenistinggal` GROUP BY `dt`.`tahun`, jenis_tinggal HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    public function getCountJenisTinggalThreeYear($tahun)
    {
        //Mengambil data jenis tanggal dengan 3 tahun dari tahun di tentukan dari tabel fact dan berhubungan dengan tabel dim_jenistinggal dan dim_tahun 
        $data = $this->db->query("SELECT count(`fs`.`id_jenistinggal`) as jumlah, `jt`.`jenis_tinggal`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_jenistinggal` `jt` ON `jt`.`id_jenis_tinggal` = `fs`.`id_jenistinggal` GROUP BY `dt`.`tahun`, jenis_tinggal  HAVING tahun >= " . ($tahun - 3) . "");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
}
