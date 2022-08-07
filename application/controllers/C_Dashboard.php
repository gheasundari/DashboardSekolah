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
    }
    public function index()
    {
        // $data['CountSiswaByYear'] = $this->Visual->getCountSiswaByYear(date('Y') - 1);
        $data['CountSiswaByThreeYear'] = $this->Visual->getCountSiswaByThreeYear('2021');
        $data['CountSiswaNow'] = $this->Visual->getCountSiswaByYear('2021');
        $data['CountAsalSekolahNow'] = $this->Visual_Sekolah->getCountAsalSekolahByYear('2021');
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
    public function chartCountSiswaByYear($tahun)
    {
        $data = $this->Visual->getCountSiswaByYear($tahun);
        echo json_encode($data);
    }
    // public function chartAsalSekolahByYear($tahun)
    // {
    //     $data = $this->Visual->getCountAsalSekolahByYear($tahun);
    //     // var_dump($data);
    //     // die();
    //     echo json_encode($data);
    // }

    public function chartCountGender()
    {
        $data = $this->Visual->getCountGender();
        echo json_encode($data);
    }
}
