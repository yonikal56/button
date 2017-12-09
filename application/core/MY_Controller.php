<?php

class MY_Controller extends CI_Controller {
    public $lang_long_name;
    public $lang_short_name;
    
    public function __construct() {
        parent::__construct();
        $language_data = language_details();
        //print_r($language_data);
        $this->lang->load("site", $language_data['long']);
        $this->CI = get_instance();
        $this->lang_long_name = $language_data['long'];
        $this->lang_short_name = $language_data['short'];
        $this->form_validation->set_message('required', translate('required_error'));
        $this->form_validation->set_message('min_length', translate('min_length_error'));
        $this->form_validation->set_message('max_length', translate('max_length_error'));
        $this->form_validation->set_message('valid_email', translate('valid_email_error'));
        $this->form_validation->set_message('curses', translate('curses_error'));
        $this->form_validation->set_message('accept_terms', translate('accept_terms_error'));
        $this->form_validation->set_message('recaptcha', translate('recaptcha_error'));
        $this->form_validation->set_message('unique', translate('unique_error'));
        $this->form_validation->set_message('check_details', translate('check_details_error'));
    }
}