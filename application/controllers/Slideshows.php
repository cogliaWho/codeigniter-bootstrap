<?php
class Slideshows extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slideshows_model');
    }

    public function create()
	{
        if ( ! file_exists(APPPATH.'/views/pagesMember/slideshows.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('visible', 'Visible', 'required');
        
        $data['title'] = 'Create Slideshows'; // Capitalize the first letter

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pagesMember/slideshows', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            $this->slideshows_model->set_slideshows();
            $this->load->view('news/success');
        }
	}
}