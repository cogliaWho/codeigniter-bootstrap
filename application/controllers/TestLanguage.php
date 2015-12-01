<?php
class TestLanguage extends CI_Controller
{
    public function __construct() {
        parent::__construct();   	 
    }

    function index() {
        $data["language_msg"] = lang("msg_last_name");
        $this->load->view('testLanguage', $data);
    }
}