<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Dashboard extends CI_Controller
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
        $this->load->model('Visual');
        $this->load->model('Visual_Sekolah');
        $this->load->model('Visual_KIP');
        $this->load->model('Visual_Rombel');
    }
    public function index()
    {
        // $data['CountSiswaByYear'] = $this->Visual->getCountSiswaByYear(date('Y') - 1);
        $data['CountSiswaByThreeYear'] = $this->Visual->getCountSiswaByThreeYear('2019');
        $data['CountSiswaNow'] = $this->Visual->getCountSiswaByYear('2019');
        $data['CountAsalSekolahNow'] = $this->Visual_Sekolah->getCountAsalSekolahByYear('2019');
        $data['CountPenerimaKipNow'] = $this->Visual_KIP->getCountPenerimaKipByYear('2019');
        $data['CountRombelNow'] = $this->Visual_Rombel->getCountRombelByYear('2019');
        // var_dump($data['CountSiswaByThreeYear'] ?? 'test');
        // die();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_dashboard', $data);
        $this->load->view('layout/footer');
    }

    public function chartCountSiswaByThreeYear()
    {
        $data = $this->Visual->getCountSiswaByThreeYear(date('Y'));
        // echo   $data;
        echo json_encode($data);
    }
    public function chartCountKipByThreeYear()
    {
        $data = $this->Visual_KIP->getCountKipByThreeYear(date('Y'));
        // var_dump($data);
        // die();
        echo json_encode($data);
    }
    public function chartCountSiswaByYear($tahun)
    {
        $data = $this->Visual->getCountSiswaByYear($tahun);
        echo json_encode($data);
    }

    public function chartCountGenderByYear()
    {
        $data = $this->Visual->getCountGenderByYear(date('Y'));
        echo json_encode($data);
    }

    public function chartCountRombelByYear()
    {
        $data = $this->Visual_Rombel->getCountRombelThreeYear(date('Y'));
        echo json_encode($data);
    }
}
