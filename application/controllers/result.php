<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends MY_Controller {
    public function index($id = null)
    {
        if($id == null)
        {
            redirect(base_url_segment());
        }
        $question = $this->site_model->get_question_by_id($id);
        if(!isset($question[0]))
        {
            redirect(base_url_segment());
        }
        if($question[0]['like'] == 0 && $question[0]['unlike'] == 0)
        {
            $question[0]['like_perc'] = 50;
            $question[0]['unlike_perc'] = 50;
        }
        else
        {
            $question[0]['likes_all'] = $question[0]['like'] + $question[0]['unlike'];
            $question[0]['like_perc'] = ceil(100 * ($question[0]['like'] / $question[0]['likes_all']));
            $question[0]['unlike_perc'] = floor(100 * ($question[0]['unlike'] / $question[0]['likes_all']));
        }
        $question[0]['clicks_all'] = $question[0]['click'] + $question[0]['unclick'];
        $question[0]['click_perc'] = ceil(100 * ($question[0]['click'] / $question[0]['clicks_all']));
        $question[0]['unclick_perc'] = floor(100 * ($question[0]['unclick'] / $question[0]['clicks_all']));
        $this->langparser->parse('templates/sidebar', []);
        $this->langparser->parse("result", ['question' => $question, 'base_url' => base_url(), 'base_url_segment' => base_url_segment()]);
    }
}