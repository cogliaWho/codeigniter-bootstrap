<?php
class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ( ! file_exists(APPPATH.'/views/pages/contact.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Contacts'; // Capitalize the first letter
        $data['error'] = '';

        $this->form_validation->set_rules('name', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Oggetto', 'trim|required');
        $this->form_validation->set_rules('message', 'Messaggio', 'trim|required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/contact', $data);
            $this->load->view('templates/footer');
        }  
    }
}