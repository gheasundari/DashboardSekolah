<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_JenisKelamin extends CI_Controller
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
        $this->load->model('Visual_JK');
        $this->load->model('Tahun');
    }

    public function index()
    {
        // $data['CountSiswaByYear'] = $this->Visual->getCountSiswaByYear(date('Y') - 1);
        $data['tahun'] = $this->Tahun->select();
        // $data['CountSiswaNow'] = $this->Visual->getCountSiswaByYear('2019');
        // $data['CountAsalSekolahNow'] = $this->Visual_Sekolah->getCountAsalSekolahByYear('2019');
        // $data['CountPenerimaKipNow'] = $this->Visual_KIP->getCountPenerimaKipByYear('2019');
        // $data['CountRombelNow'] = $this->Visual_Rombel->getCountRombelByYear('2019');
        // var_dump($data['tahun']);
        // die();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('JenisKelamin/v_jeniskelamin', $data);
        $this->load->view('layout/footer');
    }

    public function chartSexByYear($tahun)
    {
        $data = $this->Visual_JK->getGender($tahun);
        echo json_encode($data);
    }
}
