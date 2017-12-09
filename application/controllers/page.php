<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    public function index($page = null)
    {
        $pdata = $this->site_model->get_page(urldecode($page));
        if(count($pdata) == 0)
        {
            redirect(base_url_segment());
        }
        $page = $pdata[0];
        $data = array(
            'title' => $page['name'],
            'description' => $page['description'],
            'keywords' => $page['keywords'],
            'view' => 'page',
            'data' => array(
                'content' => $page['html']
            )
        );
        $this->load->view('templates/main', $data);
    }
}