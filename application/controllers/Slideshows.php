<?php
class Slideshows extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slideshows_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ( ! file_exists(APPPATH.'/views/pagesMember/slideshows.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Upload Slide:'; // Capitalize the first letter
        $data['error'] = '';
        
        $this->load->view('templates/header', $data);
        $this->load->view('pagesMember/slideshows', $data);
        $this->load->view('templates/footer', $data);
    }

    public function remove($slideID)
    {
        $this->slideshows_model->remove_slide($slideID);
        $data['title'] = 'Upload Slide:'; // Capitalize the first letter
        $data['error'] = '';
        $data['slideshows'] = $this->slideshows_model->get_slideshows();
        $data['slides'] = $this->slideshows_model->get_slides();
        $this->load->view('templates/header', $data);
        $this->load->view('pagesMember/slideupload', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('slideshow', 'Slideshow Name', 'trim|required');
        if ($this->form_validation->run() !== FALSE)
        {
            $ss_exist = $this->slideshows_model->slideshow_exists($this->input->post('slideshow'));

            if(!$ss_exist){
                $this->slideshows_model->set_slideshow();
            }
        }

        $data['title'] = 'Upload Slide:'; // Capitalize the first letter
        $data['error'] = '';
        $data['slideshows'] = $this->slideshows_model->get_slideshows();
        $data['slides'] = $this->slideshows_model->get_slides();

        $this->load->view('templates/header', $data);
        $this->load->view('pagesMember/slideupload', $data);
        $this->load->view('templates/footer', $data);
    }

    public function upload()
	{
        $this->form_validation->set_rules('slideshow', 'Slideshow Name', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|required');

        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'Image', 'required');
        }

        if ($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'Upload Slide:'; // Capitalize the first letter
            $data['error'] = '';
            $data['slideshows'] = $this->slideshows_model->get_slideshows();
            $data['slides'] = $this->slideshows_model->get_slides();
            $this->load->view('templates/header', $data);
            $this->load->view('pagesMember/slideupload', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            $this->slideshows_model->set_slide();

            if( is_dir('./resources/slideshows/'.$this->input->post('slideshow')) === false )
            {
                mkdir('./resources/slideshows/'.$this->input->post('slideshow'));
            }
            $config = array(
            'upload_path' => './resources/slideshows/'.$this->input->post('slideshow').'/',
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "1536",
            'max_width' => "2048"
            );

            $this->load->library('upload', $config);
            if($this->upload->do_upload('image'))
            {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('templates/header', $data);
                $this->load->view('pagesMember/success', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $data['error'] = $this->upload->display_errors();
                $data['title'] = 'Upload ERROR';
                $data['slideshows'] = $this->slideshows_model->get_slideshows();
                $data['slides'] = $this->slideshows_model->get_slides();
                $this->load->view('templates/header', $data);
                $this->load->view('pagesMember/slideupload', $data);
                $this->load->view('templates/footer');
            }           
        }
	}
}