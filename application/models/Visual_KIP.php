<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Visual_KIP extends CI_Model
{
    public function getKIPByYear($tahun)
    {
        //mengambil jumlah penerima kip berdasarkan tahun tertentu. berhubungan dengan tabel dim_penerimakip dan dim_tahun
        $data = $this->db->query("SELECT count(`fs`.`id_penerimakip`) as jumlah_kip, `kip`.`penerimakip`, `dt`.`tahun` FROM `fact_sekolah` `fs` 
        LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` 
        LEFT JOIN `dim_penerimakip` `kip` ON `kip`.`id_kip` = `fs`.`id_penerimakip` 
        GROUP BY `dt`.`tahun`, `kip`.`penerimakip` 
        HAVING `dt`.`tahun` = '" . $tahun . "'");
        return $data->result();
        // return $this->db->get_compiled_select();
    }
    // public function getCountKipByYear($tahun)
    // {
    //     $data = $this->db->query("SELECT count(`fs`.`id_penerimakip`) as jumlah_kip, `kip`.`penerimakip`, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` LEFT JOIN `dim_penerimakip` `kip` ON `kip`.`id_kip` = `fs`.`id_penerimakip` GROUP BY `dt`.`tahun`, `kip`.`penerimakip` HAVING `dt`.`tahun` = '" . $tahun . "' ORDER BY jumlah_kip DESC limit 1");
    //     return $data->row();
    //     // return $this->db->get_compiled_select();
    // }
    public function getCountPenerimaKipByYear($tahun)
    {

        $data = $this->db->query("SELECT count(`fs`.`id_penerimakip`) as jumlah_kip, `dt`.`tahun` 
        FROM `fact_sekolah` `fs`
        LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` 
        LEFT JOIN `dim_penerimakip` `kip` ON `kip`.`id_kip` = `fs`.`id_penerimakip`
        GROUP BY `dt`.`tahun`, `kip`.`penerimakip` 
        HAVING `dt`.`tahun` = '" . $tahun . "' and penerimakip='Ya'");
        return $data->row();
        // return $this->db->get_compiled_select();
    }

    public function getCountKipByThreeYear($tahun)
    {
        $data = $this->db->query("SELECT count(fs.nisn) as jumlah_penerimakip, kip.penerimakip, `dt`.`tahun` FROM `fact_sekolah` `fs` LEFT JOIN `dim_penerimakip` `kip` ON `kip`.`id_kip` = `fs`.id_penerimakip LEFT JOIN `dim_tahun` `dt` ON `dt`.`id_tahun` = `fs`.`data_tahun` GROUP by tahun,kip.penerimakip HAVING tahun >= " . ($tahun - 3) . " order by tahun desc");
        return $data->result();
    }
}
