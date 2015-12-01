<?php
class LangSwitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "italian";
        $this->session->set_userdata('site_lang', $language);
        $refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
        redirect($refering_url, 'refresh');
    }
}