<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        
    }
    
    public function logout()
    {
        if($this->site_model->if_connected())
        {
            $this->site_model->logout();
        }
        redirect(base_url_segment());
    }
    
    public function register()
    {
        if($this->site_model->if_connected())
        {
            redirect(base_url_segment());
        }
        $this->form_validation->set_rules('username', translate('username'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[15]|callback_unique');
        $this->form_validation->set_rules('password', translate('password'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('email', translate('email'), 'trim|required|valid_email|xss_clean|htmlspecialchars|min_length[5]|max_length[25]');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'register',
                'data' => array(
                    'message' => validation_errors(),
                    'message_type' => 'bg-danger',
                    'succeed' => false
                )
            );
            $this->load->view('templates/main', $data);
        }
        else
        {
            $this->site_model->register($_POST['username'], $_POST['email'], $_POST['password']);
            $data = array(
                'view' => 'register',
                'data' => array(
                    'message' => translate('user_registered'),
                    'message_type' => 'bg-success',
                    'succeed' => true
                )
            );
            $this->load->view('templates/main', $data);
        }
    }
    
    public function login()
    {
        if($this->site_model->if_connected())
        {
            redirect(base_url());
        }
        $this->form_validation->set_rules('username', translate('username'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('password', translate('password'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[25]|callback_check_details');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'login',
                'data' => array(
                    'message' => validation_errors(),
                    'message_type' => 'bg-danger'
                )
            );
            $this->load->view('templates/main', $data);
        }
        else
        {
            $this->site_model->login($_POST['username'], $_POST['password']);
        }
    }
    
    /* CALLBACK VALIDATORS */
    public function unique($username)
    {
        $user = $this->site_model->get_user_details($username);
        if(count($user) == 0)
        {
            return true;
        }
        return false;
    }
    
    public function check_details()
    {
        return ($this->site_model->check_details($_POST['username'], $_POST['password'], false));
    }
}