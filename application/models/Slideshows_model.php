<?php
class Slideshows_model extends CI_Model {

    public function __construct(){}

    public function get_slideshows()
	{      
		$this->db->select('slideshow');
        $query = $this->db->get('slideshows');
        return $query->result_array();
	}

	public function slideshow_exists($slideshow){
		$this->db->where('slideshow',$slideshow);
	    $query = $this->db->get('slideshows');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function set_slideshow()
	{
		$data = array(
	        'slideshow' => $this->input->post('slideshow')
	    );
    	return $this->db->insert('slideshows', $data);    
	}

    public function get_slides($slideshow = FALSE)
	{
        if ($slideshow === FALSE)
        {
            $query = $this->db->get('slides');
            return $query->result_array();
            die();
        }
        
        $query = $this->db->get_where('slides', array('slideshow' => $slideshow));
        return $query->result_array();
	}

	public function remove_slide($slideID){
		return $this->db->delete('slides', array('id' => $slideID));
	}

	public function set_slide()
	{
	    $data = array(
	        'slideshow' => $this->input->post('slideshow'),
	        'image' => $_FILES['image']['name'],
	        'position' => $this->input->post('position'),
	        'visible' => $this->input->post('visible')
	    );

	    return $this->db->insert('slides', $data);
	}
}