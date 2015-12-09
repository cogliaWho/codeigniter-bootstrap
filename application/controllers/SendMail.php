<?php
class SendMail extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('contact_model');
    }

    function send() {
	    $this->email->from($this->input->post('email'), $this->input->post('name'));
	    $this->email->to('coglia@gmail.com');
	    $this->email->cc('lorenzo.cogliati@gmail.com'); 
	    $this->email->subject($this->input->post('subject'));
	    $this->email->message($this->input->post('message'));
	    //$this->email->attach('/path/to/file1.png'); // attach file
	    //$this->email->attach('/path/to/file2.pdf');
	    if ($this->email->send()){
	        echo "Mail Sent!";
	        $this->contact_model->set_message();
	        $refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
        	redirect($refering_url, 'refresh');        
	    	return true;
	    }
	    else{
	        echo "There is error in sending mail!";
	        redirect('contact');
	        return false;
	    }
        
    }
}