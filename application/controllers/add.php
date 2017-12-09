<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends MY_Controller {
    private $curses_array =[];
    public function __construct() {
        parent::__construct();
        $this->curses_array = $this->site_model->get_curses();
    }
    
    public function index()
    {
        $this->form_validation->set_rules('if_content', translate('if'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[255]|callback_curses');
        $this->form_validation->set_rules('but_content', translate('but'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[255]|callback_curses');
        $this->form_validation->set_rules('terms', '...', 'callback_accept_terms');
        $this->form_validation->set_rules('g-recaptcha-response', '.', 'callback_recaptcha');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'add',
                'data' => array(
                    'message' => validation_errors(),
                    'message_type' => 'bg-danger'
                )
            );
            $this->load->view('templates/main', $data);
        }
        else
        {
            $this->site_model->add_question($_POST['if_content'], $_POST['but_content']);
            redirect(base_url_segment());
        }
    }
    
    function accept_terms() 
    {
        if (isset($_POST['terms'])) return true;
        return false;
    }
    
    function curses($str)
    {
        foreach ($this->curses_array as $curse) 
        {
            if(strpos($str, $curse) !== false)
            {
                return false;
            }
        }
        return true;
    }
    
    function recaptcha()
    {
        if(isset($_POST['g-recaptcha-response']))
        {
            $secret = "6LeiUB8TAAAAAG8wE7nXGiX9ucpG2BP5aL1wpHF3";
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $data = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip={$remoteip}");
            $json = json_decode($data, TRUE);
            return $json['success'];
        }
        return false;
    }
}