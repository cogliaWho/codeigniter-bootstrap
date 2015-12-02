<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();

        $site_lang = $ci->session->userdata('site_lang');

        if (!$site_lang) {
        	$site_lang = 'italian';
        } 
    }
}