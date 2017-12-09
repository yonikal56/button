<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managetabs extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
        if(!$this->site_model->is_admin())
        {
            redirect(base_url_segment());
        }
	}
    
    public function index()
	{
        $data = array(
            'view' => 'admin/tabs',
            'data' => array(
                'tabs' => $this->site_model->get_tabs(true)
            )
        );
		$this->load->view('templates/main', $data);
	}
    
    public function change_order($tab_id = null, $dir = null)
    {
        if($tab_id != null && $dir != null)
        {
            $this->site_model->change_tab_order($tab_id, $dir);
        }
        redirect(base_url_segment().'admin/managetabs');
    }
    
    public function remove_tab($tab_id = null)
    {
        if($tab_id != null)
        {
            $this->site_model->remove_tab($tab_id);
        }
        redirect(base_url_segment().'admin/managetabs');
    }
    
    public function edit_tab($tab_id = null)
    {
        if($tab_id == null)
        {
            redirect(base_url_segment().'admin/managetabs');
        }
        if(!$this->site_model->if_tab_exists($tab_id))
        {
            redirect(base_url_segment().'admin/managetabs');
        }
        $this->form_validation->set_rules('name', translate('name'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('title', translate('title'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('page', translate('page'), 'trim|required|xss_clean|htmlspecialchars');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'admin/edit_tab',
                'data' => array(
                    'message' => validation_errors(),
                    'message_class' => 'bg-danger',
                    'tab' => array($this->site_model->get_tab($tab_id))
                )
            );
        }
        else
        {
            $this->site_model->edit_tab($_POST['id'], $_POST['name'], $_POST['title'], $_POST['page'], $_POST['is_login'], $_POST['is_admin']);
            $data = array(
                'view' => 'admin/edit_tab',
                'data' => array(
                    'message' => translate('tab_edited'),
                    'message_class' => 'bg-success',
                    'tab' => array($this->site_model->get_tab($tab_id))
                )
            );
        }
        $this->load->view('templates/main', $data);
    }
    
    public function add_tab()
    {
        $this->form_validation->set_rules('name', translate('name'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('title', translate('title'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('page', translate('page'), 'trim|required|xss_clean|htmlspecialchars');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'admin/add_tab',
                'data' => array(
                    'message' => validation_errors(),
                    'message_class' => 'bg-danger'
                )
            );
        }
        else
        {
            $this->site_model->add_tab($_POST['name'], $_POST['title'], $_POST['page'], $_POST['is_login'], $_POST['is_admin']);
            $data = array(
                'view' => 'admin/add_tab',
                'data' => array(
                    'message' => translate('tab_added'),
                    'message_class' => 'bg-success'
                )
            );
        }
        $this->load->view('templates/main', $data);
    }
}