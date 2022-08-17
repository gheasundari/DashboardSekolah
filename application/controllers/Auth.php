<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Auth_Model');
        // if (!$this->Auth_Model->current_user()) {
        //     redirect('dashboard');
        // }
    }

    public function index()
    {
        show_404();
    }

    public function login()
    {
        $this->load->model('Auth_Model');
        $this->load->library('form_validation');
        if ($this->Auth_Model->current_user()) {
            redirect('dashboard');
        }

        $rules = $this->Auth_Model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('login_form');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->Auth_Model->login($username, $password)) {
            redirect('c_etl', 'refresh');
            // echo "TES";
            // die();
        } else {
            $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
        }

        $this->load->view('login_form');
    }

    public function logout()
    {
        $this->load->model('Auth_Model');
        $this->Auth_Model->logout();
        redirect(site_url());
    }
}
