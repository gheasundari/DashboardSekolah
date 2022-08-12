<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun extends CI_Model
{
  public function select()
  {
    $this->db->select('id_tahun, tahun');
    $this->db->order_by('tahun', 'DESC');
    $query = $this->db->get('dim_tahun');
    return $query->result();
  }
}
