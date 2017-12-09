<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unapproved extends MY_Controller {
    public function __construct() {
        parent::__construct();        
        if(!$this->site_model->is_admin())
        {
            redirect(base_url_segment());
        }
        $this->curses_array = $this->site_model->get_curses();
    }
    
    public function index($page = 1)
    {
        $questions = $this->site_model->get_questions_unapproved_array($page);
        $this->load->library('pagination');
        $config['base_url'] = base_url_segment()."admin/unapproved/";
        $config['total_rows'] = count($this->site_model->get_questions_unapproved_array());
        $config['per_page'] = 50;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $data = array(
            'view' => 'admin/show_questions_unapproved',
            'data' => array(
                'questions' => $questions,
                'pagination' => $this->pagination->create_links()
            )
        );
        $this->load->view('templates/main', $data);
    }
    
    public function action()
    {
        foreach ($_POST as $key => $value)
        {
            if(strstr($key, "checkbox") != NULL)
            {
                if($_POST['action'] == "approve")
                {
                    echo "approved question $value";
                    $this->site_model->approve_question($value);
                }
                elseif($_POST['action'] == "delete")
                {
                    echo "deleted question $value";
                    $this->site_model->remove_question($value);
                }
            }
        }
        redirect(base_url_segment().'admin/unapproved');
    }
    
    public function approve($id = null)
    {
        if($id != null)
        {
            $this->site_model->approve_question($id);
        }
        redirect(base_url_segment().'admin/unapproved');
    }
    
    public function delete($id = null)
    {
        if($id != null)
        {
            $this->site_model->remove_question($id);
        }
        redirect(base_url_segment().'admin/unapproved');
    }
    
    public function edit($id = null)
    {
        if($id == null)
        {
            redirect(base_url_segment().'admin/unapproved');
        }
        $this->form_validation->set_rules('if_content', translate('if'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[75]|callback_curses');
        $this->form_validation->set_rules('but_content', translate('but'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[75]|callback_curses');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'admin/edit_question',
                'data' => array(
                    'question' => $this->site_model->get_question_by_id($id),
                    'message' => validation_errors(),
                    'message_type' => 'error'
                )
            );
        }
        else
        {
            $this->site_model->edit_question($_POST['if_content'], $_POST['but_content'], $id);
            redirect(base_url_segment().'admin/unapproved');
        }
        $this->load->view('templates/main', $data);
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
}