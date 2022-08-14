<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Agama extends CI_Controller
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
        $this->load->model('Visual_Agama');
        $this->load->model('Tahun');
    }

    public function index()
    {
        $data['tahun'] = $this->Tahun->select();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('Agama/v_agama', $data);
        $this->load->view('layout/footer');
    }

    public function chartAgamaByYear($tahun)
    {
        $data = $this->Visual_Agama->getAgamaByYear($tahun);
        echo json_encode($data);
    }
}