<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Sekolah extends CI_Controller
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
        $this->load->model('Visual_Sekolah');
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
        $this->load->view('AsalSekolah/v_sekolah', $data);
        $this->load->view('layout/footer');
    }

    public function chartSekolahByYear($tahun)
    {
        $data = $this->Visual_Sekolah->getAsalSekolahByYear($tahun);
        echo json_encode($data);
    }

    public function chartTopAsalSekolah($tahun)
    {
        $datas = $this->Visual_Sekolah->getTopAsalSekolah($tahun);
        echo json_encode($datas);
        // var_dump($result);
    }
}
