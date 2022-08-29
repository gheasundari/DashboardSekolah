<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ETL extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
        $this->load->model('Import');
        if (!$this->Auth_Model->current_user()) {
            redirect('Auth/login');
        }
        if ($this->Auth_Model->current_user()->rules == 2) {
            redirect('dashboard');
        }
    }
    public function index()
    {
        $currentuser = $this->Auth_Model->current_user();
        $data['file'] = $this->Import->selectFile();
        $tahun = $this->Import->selecttahunfile();
        $tahun_dim = $this->Import->dim_tahun();
        $temp_tahun = array();
        $select_tahun = array();
        foreach ($tahun_dim as $row) {
            array_push($temp_tahun, $row['tahun']);
        }
        for ($i = date('Y') + 1; $i >= date('Y') - 5; $i--) {
            if (!in_array($i, $temp_tahun)) {
                array_push($select_tahun, $i);
            }
        }
        foreach ($tahun as $row) {
            $berkas = $this->Import->selectfilebyyear($row->data_tahun);
            $row->berkas = $berkas;
        }
        $data['tahun'] = $tahun;
        $data['select_tahun'] = $select_tahun;

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $currentuser);
        $this->load->view('upload_file/upload_file', $data);
        $this->load->view('layout/footer');
    }

    function prosesUpload()
    {
        $tahun_data = $this->input->post('tahun_data');
        $this->etl_upload(); //tabel xls
        $this->uploadToXlTable($tahun_data); // xls to xl
        $this->transform(); // proses transform
        $this->insertToDim($tahun_data); //dimasukan ketabel dim
        $this->insertToFact(); // dimasukan le tabel fact
        $this->session->set_flashdata('success', 'File berhasil di proses.');
        redirect('c_etl', 'refresh');
    }

    // FUNCTION UPLOAD FILE DAN MASUKAN KE XLS_SEKOLAH di database (TABEL PENAMPUNG)
    function etl_upload()
    {
        //echo "string";
        ini_set("memory_limit", "-1");
        $config['upload_path'] = './xls/';
        $config['allowed_types'] = 'xls';
        $this->load->library('upload', $config);
        $dataexcel = array();
        $tahun_data = $this->input->post('tahun_data');
        $this->load->model('Import');
        if (!$this->upload->do_upload('fxls')) {
            $data = array('error' => $this->upload->display_errors());
            //echo $data['error']; 
            $this->session->set_flashdata('error_import2', 'File Salah! Mohon upload File Format *.xls');
            redirect('c_etl', 'refresh');
        } else {
            $data = array('error' => false);
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('UTF-16');
            $file = $upload_data['full_path'];

            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // //Sheet Mainan
            $data = $this->excel_reader->sheets[0];

            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][2]));
            // var_dump(strtoupper($data['cells'][1][2]) != 'NAMA');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][4]));
            // var_dump(strtoupper($data['cells'][1][4]) != 'JK');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][6]));
            // var_dump(strtoupper($data['cells'][1][6]) != 'TEMPAT LAHIR');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][7]));
            // var_dump(strtoupper($data['cells'][1][7]) != 'TANGGAL LAHIR');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][9]));
            // var_dump(strtoupper($data['cells'][1][9]) != 'AGAMA');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][17]));
            // var_dump(strtoupper($data['cells'][1][17]) != 'JENIS TINGGAL');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][18]));
            // var_dump(strtoupper($data['cells'][1][18]) != 'ALAT TRANSPORTASI');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][25]));
            // var_dump(strtoupper($data['cells'][1][25]) != 'ROMBEL SAAT INI');
            // echo "<br/>";
            // var_dump(strtoupper($data['cells'][1][28]));
            // var_dump(strtoupper($data['cells'][1][28]) != 'PENERIMA KIP');
            // // die();
            // echo "<br/>";
            $dataexcel = array();
            if (
                // $data['numCols'] != 48
                strtoupper($data['cells'][1][2]) != 'NAMA'
                or strtoupper($data['cells'][1][4]) != 'JK'
                or strtoupper($data['cells'][1][6]) != 'TEMPAT LAHIR'
                or strtoupper($data['cells'][1][7]) != 'TANGGAL LAHIR'
                or strtoupper($data['cells'][1][9]) != 'AGAMA'
                or strtoupper($data['cells'][1][17]) != 'JENIS TINGGAL'
                or strtoupper($data['cells'][1][18]) != 'ALAT TRANSPORTASI'
                or strtoupper($data['cells'][1][25]) != 'ROMBEL SAAT INI'
                or strtoupper($data['cells'][1][28]) != 'PENERIMA KIP'
                or strtoupper($data['cells'][1][39]) != 'SEKOLAH ASAL'
            ) {
                // echo "SALAH FORMAT";
                $path = './xls/' . $upload_data['file_name'];
                unlink($path);
                $this->session->set_flashdata('error', 'File Salah! Mohon upload File sesuai format.');
                redirect('c_etl', 'refresh');
            } else {
                // echo "BENAR FORMAT";
                // die();
                $tahun_data = $this->input->post('tahun_data');
                $this->load->model('Import');
                for ($i = 2; $i <= $data['numRows']; $i++) {
                    $dataexcel[$i - 1]['nisn'] = $data['cells'][$i][5];
                    $dataexcel[$i - 1]['nama_lengkap'] = $data['cells'][$i][2];
                    $dataexcel[$i - 1]['jenis_kelamin'] = $data['cells'][$i][4];
                    $dataexcel[$i - 1]['tempat_lahir'] = $data['cells'][$i][6];
                    $dataexcel[$i - 1]['tanggal_lahir'] = $data['cells'][$i][7];
                    $dataexcel[$i - 1]['agama'] = $data['cells'][$i][9];
                    $dataexcel[$i - 1]['jenis_tinggal'] = $data['cells'][$i][17];
                    $dataexcel[$i - 1]['transportasi'] = $data['cells'][$i][18];
                    $dataexcel[$i - 1]['rombel'] = $data['cells'][$i][25];
                    $dataexcel[$i - 1]['penerima_kip'] = $data['cells'][$i][23];
                    $dataexcel[$i - 1]['asal_sekolah'] = $data['cells'][$i][39];
                    $dataexcel[$i - 1]['data_tahun'] =  $tahun_data;
                    $this->Import->tambah_data_sekolah($dataexcel[$i - 1]); //MENAMBAHKAN KE XLS
                }
                $datafile = array(
                    'path_file' => 'xls/' . $upload_data['file_name'],
                    'file_name' => $upload_data['file_name'],
                    'data_tahun' => $tahun_data
                );
                $this->Import->uploadfile($datafile);
            }
        }
    }

    function transform()
    {
        $this->Import->repairAsalSekolah();
        $this->Import->repairNullJenisTinggal();
        $this->Import->repairNullTransportasi();
    }

    function uploadToXlTable($datatahun)
    {
        $this->load->model('Import');
        $this->Import->uploadXlsToXl($datatahun);
    }

    function insertToDim($datatahun)
    {
        $this->load->model('Import');
        $this->Import->insetToDimAsalSekolah($datatahun);
        $this->Import->insetToDimJenisKelamin();
        $this->Import->insetToDimAgama();
        $this->Import->insetToDimpenerimakip();
        $this->Import->insetToDimpenerimakip();
        $this->Import->insetToDimJenisTinggal();
        $this->Import->insetToDimJenisTransportasi();
        $this->Import->insetToDimRombel();
        $this->Import->insetToDimTahun();
    }

    function insertToFact()
    {
        $this->load->model('Import');
        $this->Import->insertToFact();
    }

    function deletebyyear($tahun)
    {
        $this->load->model('Import');
        $berkas = $this->Import->selectfilebyyear($tahun);

        foreach ($berkas as $row) {
            unlink('./' . $row->path_file);
        }
        $test = $this->Import->deleteByYear($tahun);

        // var_dump($testaja);
        $this->session->set_flashdata('success', 'Data berhasil dihapus semua.');
        redirect('c_etl', 'refresh');
    }
    function deleteAll()
    {
        $this->load->model('Import');
        $this->Import->deleteAll();
        $this->session->set_flashdata('success', 'Data berhasil dihapus semua.');
        redirect('c_etl', 'refresh');
    }
}
