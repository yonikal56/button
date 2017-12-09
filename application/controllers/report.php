<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {
    public function index($id = null)
    {
        if($id == null)
        {
            redirect(base_url_segment());
        }
        $this->form_validation->set_rules('title', translate('title'), 'trim|required|xss_clean|htmlspecialchars|min_length[2]|max_length[75]');
        $this->form_validation->set_rules('content', translate('content'), 'trim|required|xss_clean|htmlspecialchars|min_length[5]|max_length[275]');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'view' => 'report',
                'data' => array(
                    'question' => $this->site_model->get_question_by_id($id),
                    'message' => validation_errors(),
                    'message_type' => 'error',
                    'report_exists' => $this->site_model->report_exists($id)
                )
            );
            $this->load->view('templates/main', $data);
        }
        else
        {
            $this->site_model->send_report($_POST['title'], $_POST['content'], $id);
            redirect(base_url_segment());
        }
    }
}