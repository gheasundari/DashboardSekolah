<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun extends CI_Model
{
  public function select()
  {
    //Mengambil semua isi tabel dim_tahun
    $this->db->select('id_tahun, tahun');
    $this->db->order_by('tahun', 'DESC');
    $query = $this->db->get('dim_tahun');
    return $query->result();
  }
  public function selectlast()
  {
    //Mengambil semua isi tabel dim_tahun
    $this->db->select('id_tahun, tahun');
    $this->db->order_by('tahun', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('dim_tahun');
    return $query->row();
  }

  public function selectThreeYear()
  {
    //Mengambil semua isi tabel dim_tahun 3 tahun teratas
    // limit(3) mengartikan 3 data terakhir
    $this->db->select('id_tahun, tahun');
    $this->db->order_by('tahun', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get('dim_tahun');
    return $query->result();
  }
}
