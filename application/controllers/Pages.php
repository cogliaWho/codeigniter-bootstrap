<?php
class Pages extends CI_Controller {

    public function view($page = 'home')
	{
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $site_lang = $this->session->userdata('site_lang');
        $this->lang->load($data['title'], $site_lang);
        $data['language_msg'] = lang('msg_last_name');
        
        $this->load->model('slideshows_model');
        $data['slides'] = $this->slideshows_model->get_slides('ss1');

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
}