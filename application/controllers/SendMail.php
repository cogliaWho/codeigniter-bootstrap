<?php
class SendMail extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function send() {
	    $this->email->from('lorenzo@yellowbear.it', 'Lorenzo Cogliati - YB');
	    $this->email->to('coglia@gmail.com');
	    $this->email->cc('lorenzo.cogliati@gmail.com'); 
	    $this->email->subject('Your Subject');
	    $this->email->message('Your Message');
	    //$this->email->attach('/path/to/file1.png'); // attach file
	    //$this->email->attach('/path/to/file2.pdf');
	    if ($this->email->send())
	        echo "Mail Sent!";
	    else
	        echo "There is error in sending mail!";


        //$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
        //redirect($refering_url, 'refresh');
    }
}