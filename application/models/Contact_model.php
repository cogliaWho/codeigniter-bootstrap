<?php
class Contact_model extends CI_Model {

    public function __construct(){}
    
	public function set_message()
	{
	    $data = array(
	        'name' => $this->input->post('name'),
	        'email' => $this->input->post('email'),
	        'subject' => $this->input->post('subject'),
	        'message' => $this->input->post('message')
	    );

	    return $this->db->insert('message', $data);
	}
}