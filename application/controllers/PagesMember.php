<?php
class PagesMember extends MY_Controller {

    public function view($page = 'home')
	{
        if ( ! file_exists(APPPATH.'/views/pagesMember/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pagesMember/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
}