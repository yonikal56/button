<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('language_details'))
{
    function language_details()
    {
        $uri =& get_instance();
        $languages_long = ['en' => 'english', 'ru' => 'russian', 'he' => 'hebrew'];
        $languages_short = ['english' => 'en', 'hebrew' => 'he', 'russian' => 'ru'];
        $languages_start = ['hebrew' => '', 'english' => 'en_', 'russian' => 'ru_'];
        $languages_end = ['hebrew' => '', 'english' => '_en', 'russian' => '_ru'];
        $languages_dir = ['english' => 'ltr', 'hebrew' => 'rtl', 'russian' => 'ltr'];
        $languages_direction = ['english' => 'left', 'hebrew' => 'right', 'russian' => 'left'];
        $languages_url = ['english' => 'en/', 'hebrew' => '', 'russian' => 'ru/'];
        $languages_charset = ['english' => 'utf-8', 'hebrew' => 'utf-8', 'russian' => 'utf-8'];
        $language_db_charset = ['english' => 'utf8', 'hebrew' => 'utf8', 'russian' => 'utf8'];
        $language = "hebrew";
        if(in_array($uri->uri->segment(1), array_keys($languages_long)))
        {
            $language = $languages_long[$uri->uri->segment(1)];
        }
        $data = [
            'segment' => $uri->uri->segment(1),
            'long' => $language,
            'short' => $languages_short[$language],
            'end' => $languages_end[$language],
            'start' => $languages_start[$language],
            'dir' => $languages_dir[$language],
            'direction' => $languages_direction[$language],
            'url' => $languages_url[$language],
            'charset' => $languages_charset[$language],
            'db_charset' => $language_db_charset[$language],
            'langs_starts' => $languages_start,
        ];
        /*$uri->config->set_item('char_set', $data['charset']);
        $uri->config->set_item('dbcollat', $data['charset'] . '_ci');*/
        return $data;
    }
}

if(!function_exists('base_url_segment'))
{
    function base_url_segment()
    {
        $lang_data = language_details();
        $base_url_segment = base_url().$lang_data['url'];
        return $base_url_segment;
    }
}

if(!function_exists('translate'))
{
    function translate($name)
    {
        $ci =& get_instance();
        $lang_data = language_details();
        $ci->lang->load("site", $lang_data['long']);
        $array = func_get_args();
        array_shift($array);
        return vsprintf($ci->CI->lang->line($name), $array);
    }
}

if(!function_exists('die_r'))
{
	function die_r($var)
	{
		echo '<pre>';
		print_r($var);
		die();
	}	
}

if(!function_exists('random_pass'))
{
	function random_pass()
	{
		$string = "1234567890abcdefghijklmnopqrstvuwxyz1234567890abcdefghijklmnopqrstvuwxyz1234567890abcdefghijklmnopqrstvuwxyz";
		$pass = str_shuffle($string);
		return substr($pass, 0, 6);
	}	
}

if(!function_exists('random_salt'))
{
	function random_salt()
	{
		$string = "1234567890!@#$%^&*()abcdefghijklmnopqrstvuwxyzABCDEFGHIJKLMNOPQRSTVUWXYZ,./'[]";
		$pass = str_shuffle($string);
		return substr($pass, 0, 10);
	}	
}

if(!function_exists('pass'))
{
	function pass($string, $salt)
	{
        $pass = sha1($salt . sha1($salt) . $string);
		$pass = hash('sha256', sha1($salt) . hash('sha256', $string . $salt));
		return sha1($pass . sha1($salt . $string . $salt));
	}	
}