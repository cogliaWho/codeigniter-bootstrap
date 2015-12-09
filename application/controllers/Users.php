<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function registration()
    {
        $data['title'] = 'User Registration';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/registration');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->users_model->set_user();
            $this->load->view('pages/success');
        }
    }

    public function login()
    {
        $data['title'] = 'Log in page';

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
           
            $this->load->view('pages/login');
        }
        else
        {   
            if($this->users_model->is_user()){              
                $this->session->set_userdata('cw_logged', 'true');             
                redirect('member/profile');
            } else {
                $this->load->view('pages/login_error');
                $this->session->unset_userdata('cw_logged');
            }
        }
        $this->load->view('templates/footer');
    }

    public function logout(){
        $this->session->unset_userdata('cw_logged');
        redirect('home');
    }
}