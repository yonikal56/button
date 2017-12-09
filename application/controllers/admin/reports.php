<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller {
    public function __construct() {
        parent::__construct();        
        if(!$this->site_model->is_admin())
        {
            redirect(base_url_segment());
        }
        $this->curses_array = $this->site_model->get_curses();
    }
    
    private function get_reports()
    {
        $reports = $this->site_model->get_reports_array();
        foreach ($reports as $key => $report)
        {
            $report['choice1'] = "";
            $report['choice2'] = "";
            $report['question'] = $this->site_model->get_question_by_id($report['question_ID']);
            if(isset($report['question'][0]))
            {
                $report['choice1'] = $report['question'][0]['choice1'];
                $report['choice2'] = $report['question'][0]['choice2'];
            }
            else
            {
                $this->site_model->remove_report($report['ID']);
            }
            $reports[$key] = $report;
        }
        return $reports;
    }
    
    public function index()
    {
        $reports = $this->get_reports();
        $data = array(
            'view' => 'admin/show_reports',
            'data' => array(
                'reports' => $reports
            )
        );
        $this->load->view('templates/main', $data);
    }
    
    public function delete_question($id = null)
    {
        if($id != null)
        {
            $this->site_model->remove_question($this->site_model->get_report_question_id($id));
            $this->site_model->remove_report($id);
        }
        redirect(base_url_segment().'admin/reports');
    }
    
    public function edit_question($id = null)
    {
        if($id == null)
        {
            redirect(base_url_segment().'admin/reports');
        }
        $question_id = $this->site_model->get_report_question_id($id);
        $this->form_validation->set_rules('if_content', translate('if'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[75]|callback_curses');
        $this->form_validation->set_rules('but_content', translate('but'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[75]|callback_curses');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'admin/edit_question',
                'data' => array(
                    'question' => $this->site_model->get_question_by_id($question_id),
                    'message' => validation_errors(),
                    'message_type' => 'error'
                )
            );
        }
        else
        {
            $this->site_model->edit_question($_POST['if_content'], $_POST['but_content'], $question_id);
            $this->site_model->remove_report($id);
            redirect(base_url_segment().'admin/reports');
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
    
    public function approve_question($id = null)
    {
        if($id != null)
        {
            $this->site_model->approve_question($this->site_model->get_report_question_id($id));
            $this->site_model->remove_report($id);
        }
        redirect(base_url().'admin/reports');
    }
    
    public function delete($id = null)
    {
        if($id != null)
        {
            $this->site_model->remove_report($id);
        }
        redirect(base_url().'admin/reports');
    }
}