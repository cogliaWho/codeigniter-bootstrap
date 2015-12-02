<?php
class Users_model extends CI_Model {

    public function __construct(){}

    public function is_user()
	{
		$input_email = $this->input->post('email');
		$input_password = $this->input->post('password');

        $query = $this->db->get_where('users', array('email' => $input_email));
        $user_auth = $query->row_array();
    	if( $user_auth['email'] === $input_email && password_verify($input_password, $user_auth['password']) ){

    		if(password_needs_rehash($user_auth['password'], PASSWORD_DEFAULT)) {
		        $new_hash = password_hash($input_password, PASSWORD_DEFAULT);
		        // store new hash in database here
		        $this->db->set('password', $new_hash);
				$this->db->where('password', $user_auth['password']);
				$this->db->update('users');
		    }
    		return TRUE;
    	} else {
    		return FALSE;
    	}
	}

    /*public function get_user($slug = FALSE)
	{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('users', array('slug' => $slug));
        return $query->row_array();
	}*/

	public function set_user()
	{

		$hash_pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

	    $data = array(
	        'email' => $this->input->post('email'),
	        'password' => $hash_pass
	    );

	    return $this->db->insert('users', $data);
	}
}