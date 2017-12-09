<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends MY_Controller {
    public function index()
    {
        $data = array(
            'view' => 'home',
            'data' => array(
                'question' => $this->site_model->get_question()
            )
        );
        $this->load->view('templates/main', $data);
    }
    
    public function remove($id = null)
    {
        if($id == null)
        {
            redirect(base_url_segment());
        }
        $this->site_model->remove_question($id);
    }
}