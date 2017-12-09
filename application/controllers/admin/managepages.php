<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managepages extends MY_Controller {
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
            'view' => 'admin/pages',
            'data' => array(
                'pages' => $this->site_model->get_pages()
            )
        );
		$this->load->view('templates/main', $data);
	}
    
    public function remove_page($page_id = null)
    {
        if($page_id != null)
        {
            $this->site_model->remove_page($page_id);
        }
        redirect(base_url_segment().'admin/managepages');
    }
    
    public function edit_page($page_id = null)
    {
        if($page_id == null)
        {
            redirect(base_url_segment().'admin/managepages');
        }
        if(!$this->site_model->if_page_exists($page_id))
        {
            redirect(base_url_segment().'admin/managepages');
        }
        $page_for_d = $this->site_model->get_page_by_id($page_id);
        $this->form_validation->set_rules('name', translate('name'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('machine_name', translate('machine_name'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('description', translate('description'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('keywords', translate('keywords'), 'trim|required|xss_clean|htmlspecialchars');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'admin/edit_page',
                'data' => array(
                    'message' => validation_errors(),
                    'message_class' => 'bg-danger',
                    'page' => $page_for_d
                )
            );
        }
        else
        {
            $this->site_model->edit_page($_POST['id'], $_POST['name'], $_POST['machine_name'], $_POST['html'], $_POST['description'], $_POST['keywords']);
            $data = array(
                'view' => 'admin/edit_page',
                'data' => array(
                    'message' => translate('page_edited'),
                    'message_class' => 'bg-success',
                    'page' => $page_for_d
                )
            );
        }
        $this->load->view('templates/main', $data);
    }
    
    public function add_page()
    {
        $this->form_validation->set_rules('name', translate('name'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('machine_name', translate('machine_name'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('description', translate('description'), 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('keywords', translate('keywords'), 'trim|required|xss_clean|htmlspecialchars');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'admin/add_page',
                'data' => array(
                    'message' => validation_errors(),
                    'message_class' => 'bg-danger'
                )
            );
        }
        else
        {
            $this->site_model->add_page($_POST['name'], $_POST['machine_name'], $_POST['html'], $_POST['description'], $_POST['keywords']);
            $data = array(
                'view' => 'admin/add_page',
                'data' => array(
                    'message' => translate('page_added'),
                    'message_class' => 'bg-success'
                )
            );
        }
        $this->load->view('templates/main', $data);
    }
}