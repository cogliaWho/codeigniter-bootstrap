<?php
class Slideshows_model extends CI_Model {

    public function __construct(){}

    public function get_slideshows($title = FALSE)
	{
        if ($title === FALSE)
        {
            return FALSE;
            die();
        }
        
        $query = $this->db->get_where('slideshows', array('title' => $title));
        return $query->row_array();
	}

	public function set_slideshows()
	{
	    $data = array(
	        'title' => $this->input->post('title'),
	        'image' => $this->input->post('image'),
	        'position' => $this->input->post('position'),
	        'visible' => $this->input->post('visible')
	    );

	    return $this->db->insert('slideshows', $data);
	}
}