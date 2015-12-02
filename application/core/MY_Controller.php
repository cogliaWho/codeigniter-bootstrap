<?php

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('cw_logged'))
        {
            redirect('login'); 
            die(); // the user is not logged in, redirect them!
        }
    }
}