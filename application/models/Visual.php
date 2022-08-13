<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual extends CI_Model
{
    public function getCountSiswaByYear($tahun)
    {
        $this->db->select('count(fs.nisn) as jumlah_siswa, dt.tahun');
        $this->db->from('fact_sekolah fs');
        $this->db->join('dim_tahun dt', 'dt.id_tahun = fs.data_tahun', 'left');
        $this->db->group_by('dt.tahun');
        $this->db->having('dt.tahun', $tahun);
        // $this->db->where('tahun', $tahun);
        // return $this->db->get()->result();
        return $this->db->get()->row();
    }

    public function getCountSiswaByThreeYear($tahun)
    {
        // SELECT count(fs.nisn) as jumlah_siswa, `dt`.`tahun`
        // FROM `fact_sekolah` `fs`
        // LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun`
        // GROUP BY `dt`.`tahun`
        // ORDER BY `dt`.`tahun` DESC
        $this->db->select('count(fs.nisn) as jumlah_siswa, dt.tahun');
        $this->db->from('fact_sekolah fs');
        $this->db->join('dim_tahun dt', 'dt.id_tahun = fs.data_tahun', 'left');
        $this->db->group_by('dt.tahun');
        $this->db->having('tahun >=',  date('Y') - 3);
        $this->db->order_by('dt.tahun', 'desc');
        // return $this->db->get_compiled_select();
        return $this->db->get()->result();
    }

    public function getCountGender()
    {
        $data =  $this->db->query("SELECT count(fs.nisn) as jumlah_siswa, js.jenis_kelamin, `dt`.`tahun` FROM `fact_sekolah` `fs` 
        LEFT JOIN `dim_jeniskelamin` `js` ON `js`.`id_jeniskelamin` = `fs`.jenis_kelamin
        LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` GROUP by tahun,js.jenis_kelamin order by tahun desc");
        return $data->result();
    }

    public function getCountGenderByYear($tahun)
    {
        $data =  $this->db->query("SELECT count(fs.nisn) as jumlah_siswa, js.jenis_kelamin, `dt`.`tahun` FROM `fact_sekolah` `fs` 
        LEFT JOIN `dim_jeniskelamin` `js` ON `js`.`id_jeniskelamin` = `fs`.jenis_kelamin
        LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` GROUP by tahun,js.jenis_kelamin HAVING tahun >= " . ($tahun - 3) . " order by tahun desc");
        return $data->result();
    }
}
