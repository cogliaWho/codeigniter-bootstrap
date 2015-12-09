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
        $data['title'] = 'Upload Slide:'; // Capitalize the first letter
        $data['error'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('pagesMember/slideshows', $data);
        $this->load->view('templates/footer', $data);
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
            $this->load->view('templates/header', $data);
            $this->load->view('pagesMember/slideshows', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }

    public function create()
	{

        

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('visible', 'Visible', 'required');
        
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pagesMember/slideshows', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            $this->slideshows_model->set_slideshows();

            if( is_dir('./resources/slideshows/'.$this->input->post('title')) === false )
            {
                mkdir('./resources/slideshows/'.$this->input->post('title'));
            }
            $config = array(
            'upload_path' => './resources/slideshows/'.$this->input->post('title').'/',
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "1536",
            'max_width' => "2048"
            );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                //$data = array('upload_data' => $this->upload->data());
                $this->load->view('templates/header', $data);
                $this->load->view('news/success');
                $this->load->view('templates/footer');
            }
            else
            {
                $data['error'] = $this->upload->display_errors();
                //$error = array('error' => $this->upload->display_errors());
                $this->load->view('templates/header', $data);
                $this->load->view('pagesMember/slideshows', $data);
                $this->load->view('templates/footer');
            }           
        }
	}
}