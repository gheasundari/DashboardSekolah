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
        $this->load->model('Auth_Model');
        if (!$this->Auth_Model->current_user()) {
            redirect('Auth/login');
        }
    }
    public function index()
    {
        // $data['CountSiswaByYear'] = $this->Visual->getCountSiswaByYear(date('Y') - 1);
        $tahun = date('Y');

        $data['CountSiswaNow'] = $this->Visual->getCountSiswaByYear($tahun);
        $data['CountAsalSekolahNow'] = $this->Visual_Sekolah->getCountAsalSekolahByYear($tahun);
        $data['CountPenerimaKipNow'] = $this->Visual_KIP->getCountPenerimaKipByYear($tahun);
        $data['CountRombelNow'] = $this->Visual_Rombel->getCountRombelByYear($tahun);
        $currentuser = $this->Auth_Model->current_user();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $currentuser);
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
        echo json_encode($data);
    }
    // public function chartCountSiswaByYear($tahun)
    // {
    //     $data = $this->Visual->getCountSiswaByYear($tahun);
    //     echo json_encode($data);
    // }

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
