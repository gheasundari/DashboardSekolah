<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual extends CI_Model
{
    // public function getCountSiswaByYear($tahun)
    // {
    //     $this->db->select('count(fs.nisn) as jumlah_siswa, dt.tahun');
    //     $this->db->from('fact_sekolah fs');
    //     $this->db->join('dim_tahun dt', 'dt.id_tahun = fs.data_tahun', 'left');
    //     $this->db->group_by('dt.tahun');
    //     // $this->db->where('tahun', $tahun);
    //     // return $this->db->get()->result();
    //     return $this->db->get()->result();
    // }
    public function getCountSiswaByYear($tahun)
    {
        $this->db->select('count(fs.nisn) as jumlah_siswa, dt.tahun');
        $this->db->from('fact_sekolah fs');
        $this->db->join('dim_tahun dt', 'dt.id_tahun = fs.data_tahun', 'left');
        $this->db->group_by('dt.tahun');
        // $this->db->where('tahun', $tahun);
        // return $this->db->get()->result();
        return $this->db->get()->result();
    }
}
