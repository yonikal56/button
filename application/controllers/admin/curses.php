<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curses extends MY_Controller {
    public function __construct() {
        parent::__construct();        
        if(!$this->site_model->is_admin())
        {
            redirect(base_url_segment());
        }
    }
    
    public function index()
    {
        if(isset($_POST['curse']))
        {
            if(!empty($_POST['curse']))
            {
                $this->site_model->add_curse($_POST['curse']);
            }
        }
        $data = array(
            'view' => 'admin/show_curses',
            'data' => array(
                'curses' => $this->site_model->get_curses_array()
            )
        );
        $this->load->view('templates/main', $data);
    }
    
    public function delete($id = null)
    {
        if($id != null)
        {
            $this->site_model->remove_curse($id);
        }
        redirect(base_url_segment().'admin/curses');
    }
}