<?php
//ini_set('MAX_EXECUTION_TIME', -1);
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Model
{
  function tambah_data_sekolah($dataexcel)
  {
    // $anggotaganti=$this
    // $dataexcel=$this->db->query("insert into xls_penelitian (id, judul, anggota, tahun, jenis, dana, prodi, status) 
    //    select id, judul, $anggota, tahun, jenis, dana, prodi, status from xls_penelitian");
    $this->db->replace('xls_sekolah', $dataexcel);
  }

  function uploadXlsToXl($data_tahun)
  {
    $this->db->query("INSERT INTO xl_sekolah(nisn, nama_lengkap, jenis_kelamin, tempat_lahir,tanggal_lahir,agama,jenis_tinggal,
    transportasi,penerima_kip,rombel,asal_sekolah,data_tahun)
    SELECT nisn, nama_lengkap, IF(jenis_kelamin = 'L' , 'Laki-laki', 'Perempuan') as jenis_kelamin, 
    upper(tempat_lahir) as tempat_lahir, tanggal_lahir, agama,
    upper(jenis_tinggal) as jenis_tinggal,
    upper(transportasi) as transportasi,
    penerima_kip, IF(rombel like  '%MIPA%' , 'MIPA', 'IPS') as rombel, 
    upper(asal_sekolah) as asal_sekolah, data_tahun 
    FROM `xls_sekolah` WHERE data_tahun='" . $data_tahun . "'");
  }

  function insetToDimAsalSekolah($data_tahun)
  {
    $this->db->query('insert into dim_asalsekolah (nama_sekolah) 
    SELECT DISTINCT `asal_sekolah` FROM `xl_sekolah` 
    WHERE `data_tahun` = ' . $data_tahun . ' 
    and asal_sekolah not in (SELECT DISTINCT nama_sekolah FROM dim_asalsekolah)');
  }

  function insetToDimJenisKelamin()
  {
    $this->db->query('insert into dim_jeniskelamin (jenis_kelamin) 
    SELECT DISTINCT `jenis_kelamin` FROM `xl_sekolah` 
    where jenis_kelamin not in (SELECT DISTINCT jenis_kelamin FROM dim_jeniskelamin)');
  }

  function insetToDimAgama()
  {
    $this->db->query('insert into dim_agama (agama) 
    SELECT DISTINCT `agama` FROM `xl_sekolah` 
    where agama not in (SELECT DISTINCT agama FROM dim_agama)');
  }

  function insetToDimpenerimakip()
  {
    $this->db->query('insert into dim_penerimakip (penerimakip) 
    SELECT DISTINCT `penerima_kip` FROM `xl_sekolah` 
    where penerima_kip not in (SELECT DISTINCT penerimakip FROM dim_penerimakip)');
  }

  function insetToDimJenisTinggal()
  {
    $this->db->query('insert into dim_jenistinggal (jenis_tinggal) 
    SELECT DISTINCT `jenis_tinggal` FROM `xl_sekolah` 
    where jenis_tinggal not in (SELECT DISTINCT jenis_tinggal FROM dim_jenistinggal)');
  }

  function insetToDimJenisTransportasi()
  {
    $this->db->query('insert into dim_transportasi(jenis_transportasi) 
    SELECT DISTINCT `transportasi` FROM `xl_sekolah` 
    where transportasi not in (SELECT DISTINCT jenis_transportasi FROM dim_transportasi)');
  }

  function insetToDimRombel()
  {
    $this->db->query('insert into dim_rombel(nama_rombel) 
    SELECT DISTINCT `rombel` FROM `xl_sekolah` 
    where rombel not in (SELECT DISTINCT nama_rombel FROM dim_rombel)');
  }

  function insetToDimTahun()
  {
    $this->db->query('insert into dim_tahun(tahun) 
    SELECT DISTINCT `data_tahun` FROM `xl_sekolah` 
    where data_tahun not in (SELECT DISTINCT tahun FROM dim_tahun)');
  }

  function repairNullJenisTinggal()
  {
    $this->db->query("UPDATE `xl_sekolah` SET `jenis_tinggal` = 'LAINNYA' where `jenis_tinggal` is null");
  }

  function repairNullTransportasi()
  {
    $this->db->query("UPDATE `xl_sekolah` SET `transportasi` = 'LAINNYA' where `transportasi` is null");
  }

  function repairAsalSekolah()
  {
    //KEY, VAL
    $dataToReplace = [
      'SMP NEGERI' => 'SMPN',
      'SMP N' => 'SMPN',
      'MTS NEGERI' => 'MTSN',
      'MTS NEGRI' => 'MTSN',
      'MTS.N' => 'MTSN',
      'MTs.S' => 'MTSS',
      'MTS 1NEGERI' => 'MTSN 1',
      'INHU' => 'INDRAGIRI HULU',
    ];

    foreach ($dataToReplace as $key => $val) {
      $this->db->query("UPDATE `xl_sekolah` SET `asal_sekolah` = REPLACE(asal_sekolah, '" . $val . "', '" . $key . "')");
    }
    // -- $sqlReplace = 'REPLACE(' . ($sqlReplace ? $sqlReplace : 'replace_field') . ', "' . $key . '", "' . $val . '")';
  }

  function insertToFact()
  {
    $query = "INSERT INTO fact_sekolah (nisn, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, jenis_tinggal, transportasi, penerima_kip, rombel, asal_sekolah, data_tahun) 
SELECT nisn, nama_lengkap, 
(select s.id_jeniskelamin from dim_jeniskelamin s WHERE s.jenis_kelamin = x.jenis_kelamin) as jenis_kelamin,
tempat_lahir, tanggal_lahir,
(select a.id_agama from dim_agama a WHERE a.agama = x.agama) as agama,
(select j.id_jenis_tinggal from dim_jenistinggal j WHERE j.jenis_tinggal = x.jenis_tinggal) as jenis_tinggal,
(select t.id_transportasi from dim_transportasi t WHERE t.jenis_transportasi = x.transportasi) as transportasi,
(select k.id_kip from dim_penerimakip k WHERE k.penerimakip = x.penerima_kip) as penerima_kip,
(select r.id_rombel from dim_rombel r WHERE r.nama_rombel = x.rombel) as rombel,
(select ss.id_asalsekolah from dim_asalsekolah ss WHERE ss.nama_sekolah = x.asal_sekolah) as asal_sekolah,
(select t.id_tahun from dim_tahun t WHERE t.tahun = x.data_tahun) as data_tahun
FROM xl_sekolah x
GROUP by x.nisn
      ";
    $this->db->query($query);
  }

  public function deleteAll()
  {
    $this->db->empty_table('dim_agama');
    $this->db->empty_table('dim_asalsekolah');
    $this->db->empty_table('dim_jeniskelamin');
    $this->db->empty_table('dim_penerimakip');
    $this->db->empty_table('dim_rombel');
    $this->db->empty_table('dim_jenistinggal');
    $this->db->empty_table('dim_tahun');
    $this->db->empty_table('dim_transportasi');
    $this->db->empty_table('fact_sekolah');
    $this->db->empty_table('xls_sekolah');
    $this->db->empty_table('xl_sekolah');
  }
}
