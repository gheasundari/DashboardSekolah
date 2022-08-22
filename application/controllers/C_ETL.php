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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $currentuser);
        $this->load->view('upload_file/upload_file');
        $this->load->view('layout/footer');
    }

    function prosesUpload()
    {
        $tahun_data = $this->input->post('tahun_data');
        $this->etl_upload();
        $this->uploadToXlTable($tahun_data);
        $this->transform();
        $this->insertToDim($tahun_data);
        $this->insertToFact();
        $this->session->set_flashdata('success', 'File berhasil di proses.');
        redirect('C_ETL', 'refresh');
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
            //$data = array('error' => $this->upload->display_errors());
            //echo $data['error']; 
            $this->session->set_flashdata('error_import2', 'File Salah! Mohon upload File Format *.xls');
            redirect('C_ETL', 'refresh');
        } else {
            $data = array('error' => false);
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('UTF-16');
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            //Sheet Mainan
            $data = $this->excel_reader->sheets[0];
            $dataexcel = array();
            if (
                $data['cells'][1][2] != 'Nama'
                and $data['cells'][1][4] != 'JK'
                and $data['cells'][1][6] != 'Tempat Lahir'
                and $data['cells'][1][7] != 'Tanggal Lahir'
                and $data['cells'][1][9] != 'Agama'
                and $data['cells'][1][17] != 'Jenis Tinggal'
                and $data['cells'][1][18] != 'Alat Transportasi'
                and $data['cells'][1][25] != 'Rombel Saat Ini'
                and $data['cells'][1][23] != 'KIP'
                and $data['cells'][1][39] != 'Sekolah Asal'
            ) {
                // echo "SALAH FORMAT";
                $path = './xls/' . $upload_data['file_name'];
                unlink($path);
                $this->session->set_flashdata('error', 'File Salah! Mohon upload File sesuai format.');
                redirect('C_ETL', 'refresh');
            } else {
                // echo "BENAR FORMAT";
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
                    $this->Import->tambah_data_sekolah($dataexcel[$i - 1]);
                }
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

    function deleteAll()
    {
        $this->load->model('Import');
        $this->Import->deleteAll();
        $this->session->set_flashdata('success', 'Data berhasil dihapus semua.');
        redirect('C_ETL', 'refresh');
    }
}
