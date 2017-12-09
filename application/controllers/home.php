<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    public function index($id = null, $all = "no")
    {
        $bool = true;
        if($id != null)
        {
            $question = $this->site_model->get_question_by_id_approved($id);
            if(isset($question[0]))
            {
                $bool = false;
                $description = translate('specific_description', $question[0]['choice1'], $question[0]['choice2']);
            }
        }
        
        if($bool) 
        {
            $question = $this->site_model->get_question();
        }
        
        if($all == "no")
        {
            $data = array(
                'view' => 'home',
                'data' => array(
                    'question' => $question
                )
            );
            if(isset($description))
            {
                $data['description'] = $description;
            }
            $this->load->view('templates/main', $data);
        }
        else
        {
            $this->langparser->parse('templates/sidebar', []);
            $this->langparser->parse("home", ['question' => $question]);
        }
    }
    
    public function instructions()
    {
        $data = array(
            'view' => 'instructions',
            'data' => array(
                
            )
        );
        $this->load->view('templates/main', $data);
    }
    
    public function about()
    {
        $data = array(
            'view' => 'about',
            'data' => array(
                
            )
        );
        $this->load->view('templates/main', $data);
    }
}