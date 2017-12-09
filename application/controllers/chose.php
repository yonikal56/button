<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chose extends MY_Controller {
    public function click($id = null, $pos = null)
    {
        if($id == null || $pos == null || !in_array($pos, ['yes','no']))
        {
            redirect(base_url_segment());
        }
        $this->site_model->click($id, $pos);
        redirect(base_url_segment().'result/'.$id);
    }
    
    public function like($id = null, $pos = null)
    {
        if($id == null || $pos == null || !in_array($pos, ['yes','no']))
        {
            redirect(base_url_segment());
        }
        $this->site_model->like($id, $pos);
        redirect(base_url_segment()."home/index/0/yes");
    }
}