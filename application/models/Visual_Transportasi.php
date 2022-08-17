<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_Transportasi extends CI_Model
{
    public function getTransportasiByYear($tahun)
    {
        $data = $this->db->query("SELECT count(`fs`.`transportasi`) as jumlah, `tp`.`jenis_transportasi`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_transportasi` `tp` ON `tp`.`id_transportasi` = `fs`.`transportasi` GROUP BY `dt`.`tahun`, transportasi HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
}
