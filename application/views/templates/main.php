<?php
$language_data = language_details();
$this->lang->load("site", $language_data['long']);
$base_url = base_url();
$base_url_segment = base_url_segment();
$if_connected = $this->site_model->if_connected();
$user = "";
if($if_connected)
{
    $user = get_cookie('button_user' . $language_data['end']);
}
$header_data = array(
    'base_url' => $base_url,
    'base_url_segment' => $base_url_segment,
    'title' => isset($title) ? $title : translate('site_title'),
    'description' => isset($description) ? $description : translate('site_description'),
    'keywords' => isset($keywords) ? $keywords : translate('site_keywords'),
    'if_connected' => $if_connected,
    'username' => $user,
    'dir' => $language_data['dir'],
    'direction' => $language_data['direction'],
    'end' => $language_data['end'],
    'charset' => $language_data['charset']
);
$footer_data = array(
    'base_url' => $base_url,
    'base_url_segment' => $base_url_segment,
    'year' => date('Y'),
    'add_your_own_path' => isset($add_your_own_path) ? $add_your_own_path : 'add',
    'if_connected' => $if_connected,
    'username' => $user,
    'dir' => $language_data['dir'],
    'end' => $language_data['end'],
    'direction' => $language_data['direction'],
    'opposite_direction' => $language_data['direction'] == 'right' ? 'left' : 'right',
    'tabs' => $this->site_model->get_tabs()
);
$data = isset($data) ? $data : array();
$data['base_url'] = base_url();
$data['base_url_segment'] = base_url_segment();
$data['if_connected'] = $if_connected;
$data['username'] = $user;
$data['dir'] = $language_data['dir'];
$data['end'] = $language_data['end'];
$data['lang_short'] = $language_data['short'];
$this->langparser->parse('templates/header', $header_data);
$this->langparser->parse('templates/sidebar', []);
$this->langparser->parse($view, $data);
$this->langparser->parse('templates/footer', $footer_data);