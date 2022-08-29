<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Rombel extends CI_Controller
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
        $this->load->model('Visual_Rombel');
        $this->load->model('Tahun');
        $this->load->model('Auth_Model');
        if (!$this->Auth_Model->current_user()) {
            redirect('Auth/login');
        }
    }

    public function index()
    {
        $data['tahun'] = $this->Tahun->select();
        $currentuser = $this->Auth_Model->current_user();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $currentuser);
        $this->load->view('Rombel/v_rombel', $data);
        $this->load->view('layout/footer');
    }

    public function chartRombelByYear($tahun)
    {
        $data = $this->Visual_Rombel->getRombelByYear($tahun);
        echo json_encode($data);
    }
}
