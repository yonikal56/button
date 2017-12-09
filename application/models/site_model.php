<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {
    private $site_lang;
    
    public function __construct() {
        parent::__construct();
        $language_data = language_details();
        $this->site_lang = $language_data['short'];
        $this->lang_end = $language_data['end'];
        $this->lang_start = $language_data['start'];
        $this->langs_starts = $language_data['langs_starts'];
        //$this->database_installer();
    }
    
    public function get_tabs($all = FALSE)
    {
        $is_admin = $this->is_admin();
        $is_login = $this->if_connected();
        $result = [];
        $this->db->order_by('`order`', 'ASC');
        $data = $this->db->get($this->lang_start."tabs");
        if($all)
        {
            $result = $data->result_array();
        }
        else
        {
            foreach($data->result_array() as $row)
            {
                if(($row['is_admin'] == 0) || (($row['is_admin'] == 1) && $is_admin))
                {
                    if(($row['is_login'] == 2) || ($row['is_login'] == 0 && !$is_login) || ($row['is_login'] == 1 && $is_login))
                    {
                        $result[] = $row;
                    }
                }
            }
        }
        return $result;
    }
    
    public function add_tab($name, $title, $page, $is_login, $is_admin)
    {
        $data = array(
            'name' => $name,
            'title' => $title,
            'page' => $page,
            'order' => (count($this->get_tabs(true)) + 1),
            'is_login' => $is_login,
            'is_admin' => $is_admin
        );
        $this->db->insert($this->lang_start.'tabs', $data); 
    }
    
    public function edit_tab($id, $name, $title, $page, $is_login, $is_admin)
    {
        $data = array(
            'name' => $name,
            'title' => $title,
            'page' => $page,
            'is_login' => $is_login,
            'is_admin' => $is_admin
        );
        $this->db->where('ID', $id);
        $this->db->update($this->lang_start.'tabs', $data);
    }
    
    public function if_tab_exists($id)
    {
        $query = $this->db->get_where($this->lang_start.'tabs', array('ID' => $id));
        return count($query->result_array()) >= 1;
    }
    
    public function get_tab($id)
    {
        $query = $this->db->get_where($this->lang_start.'tabs', array('ID' => $id));
        return $query->result_array()[0];
    }
    
    public function change_tab_order($id, $dir)
    {
        if($this->if_tab_exists($id))
        {
            $tab = $this->get_tab($id);
            if($dir == 'up' && $tab['order'] >= 2)
            {
                $data = array(
                    'order' => $tab['order']
                );
                $this->db->where('order', $tab['order'] - 1);
                $this->db->update($this->lang_start.'tabs', $data); 

                $data = array(
                    'order' => $tab['order'] - 1
                );
                $this->db->where('ID', $tab['ID']);
                $this->db->update($this->lang_start.'tabs', $data);
            }
            elseif($dir == 'down' && $tab['order'] < count($this->get_tabs(true)))
            {
                $data = array(
                    'order' => $tab['order']
                );
                $this->db->where('order', $tab['order'] + 1);
                $this->db->update($this->lang_start.'tabs', $data); 

                $data = array(
                    'order' => $tab['order'] + 1
                );
                $this->db->where('ID', $tab['ID']);
                $this->db->update($this->lang_start.'tabs', $data);
            }
        }
    }
    
    public function remove_tab($id)
    {
        if($this->if_tab_exists($id))
        {
            $tab = $this->get_tab($id);
            $this->db->query("UPDATE `{$this->lang_start}tabs` SET `order` = `order` - 1 WHERE `order` > {$tab['order']}");
            $this->db->delete($this->lang_start."tabs", array('ID' => $id));
        }
    }
    
    public function get_pages()
    {
        $query = $this->db->get($this->lang_start."pages");
        return $query->result_array();
    }
    
    public function get_page($machine_name)
    {
        $get = $this->db->get_where($this->lang_start."pages", ['machine_name' => $machine_name]);
        return $get->result_array();
    }
    
    public function get_page_by_id($id)
    {
        $get = $this->db->get_where($this->lang_start."pages", ['ID' => $id]);
        return $get->result_array();
    }
    
    public function if_page_exists($id)
    {
        $query = $this->db->get_where($this->lang_start.'pages', array('ID' => $id));
        return count($query->result_array()) >= 1;
    }
    
    public function remove_page($id)
    {
        $this->db->delete($this->lang_start."pages", array('ID' => $id));
    }
    
    public function add_page($name, $machine_name, $html, $description, $keywords)
    {
        $data = array(
            'machine_name' => $machine_name,
            'name' => $name,
            'html' => $html,
            'description' => $description,
            'keywords' => $keywords
        );
        $this->db->insert($this->lang_start."pages", $data); 
    }
    
    public function edit_page($id, $name, $machine_name, $html, $desc, $keywords)
    {
        $data = array(
            'machine_name' => $machine_name,
            'name' => $name,
            'html' => $html,
            'description' => $desc,
            'keywords' => $keywords
        );
        $this->db->where('ID', $id);
        $this->db->update($this->lang_start.'pages', $data);
    }
    
    public function add_question($if, $but)
    {
        $get = $this->db->get_where($this->lang_start."questions", ['choice1' => $if, 'choice2' => $but]);
        if(count($get->result_array()) == 0)
        {
            $this->db->insert($this->lang_start."questions", [
                'choice1' => $if,
                'choice2' => $but,
                'click' => 0,
                'unclick' => 0,
                'like' => 0,
                'unlike' => 0,
                'adder_IP' => $_SERVER['REMOTE_ADDR'],
                'deleted' => 0,
                'approved' => 0
            ]);
        }
    }
    
    public function get_user_details($username)
    {
        $this->db->where("username", $username);
        $query = $this->db->get($this->lang_start.'users');
        return $query->result_array();
    }
    
    public function check_details($username, $password, $passworeded = true)
    {
        $user = $this->get_user_details($username);
        if(count($user) == 1)
        {
            $user = $user[0];
            $pass_to_check = ($passworeded ? $password : pass($password, $user['salt']));
            if($user['password'] == $pass_to_check)
            {
                return true;
            }
        }
        return false;
    }
    
    public function login($username, $password)
    {
        if($this->check_details($username, $password, false))
        {
            $user = $this->get_user_details($username)[0];
            set_cookie('button_user' . $this->lang_end, $username, time() + 60*60*24*30);
            set_cookie('button_pass' . $this->lang_end, $user['password'], time() + 60*60*24*30);
            redirect(base_url_segment());
        }
        return false;
    }
    
    public function is_admin()
    {
        if($this->if_connected())
        {
            $user = $this->get_user_details(get_cookie('button_user' . $this->lang_end))[0];
            if($user['is_admin'] == 1)
            {
                return true;
            }
        }
        return false;
    }
    
    public function if_connected()
    {
        if(get_cookie('button_user' . $this->lang_end) && get_cookie('button_pass' . $this->lang_end))
        {
            if($this->check_details(get_cookie('button_user' . $this->lang_end), get_cookie('button_pass' . $this->lang_end)))
            {
                return true;
            }
            $this->logout();
            redirect(base_url_segment());
        }
        return false;
    }
	
	public function logout()
    {
        delete_cookie('button_user' . $this->lang_end);
        delete_cookie('button_pass' . $this->lang_end);
    }
    
    public function add_curse($curse)
    {
        $this->db->insert($this->lang_start.'curses', ['curse' => $curse]);
    }
    
    public function get_curses_array()
    {
        return $this->db->get($this->lang_start.'curses')->result_array();
    }
    
    public function edit_question($choice1, $choice2, $id)
    {
        $this->db->update($this->lang_start.'questions', ['choice1' => $choice1, 'choice2' => $choice2], ['ID' => $id]);
    }
    
    public function get_questions_array($page = null)
    {
        if($page != null)
        {
            return $this->db->get_where($this->lang_start.'questions', ['deleted' => 0], 50, ($page-1)*50)->result_array();
        }
        return $this->db->get_where($this->lang_start.'questions', ['deleted' => 0])->result_array();
    }
    
    public function get_questions_unapproved_array($page = null)
    {
        if($page != null)
        {
            return $this->db->get_where($this->lang_start.'questions', ['deleted' => 0, 'approved' => 0], 50, ($page-1)*50)->result_array();
        }
        return $this->db->get_where($this->lang_start.'questions', ['deleted' => 0, 'approved' => 0])->result_array();
    }
    
    public function get_reports_array()
    {
        return $this->db->get($this->lang_start.'reports')->result_array();
    }
    
    public function get_report_question_id($id)
    {
        $report = $this->db->get_where($this->lang_start.'reports', ['ID' => $id])->result_array();
        return $report[0]['question_ID'];
    }
    
    public function remove_curse($id)
    {
        $this->db->delete($this->lang_start.'curses', ['ID' => $id]);
    }
    
    public function remove_report($id)
    {
        $this->db->delete($this->lang_start.'reports', ['ID' => $id]);
    }
    
    public function register($username, $email, $password)
    {
        $salt = random_salt();
        $this->db->insert($this->lang_start."users", [
            'username' => $username,
            'email' => $email,
            'salt' => $salt,
            'password' => pass($password, $salt),
            'ok' => 1,
            'IP' => $_SERVER['REMOTE_ADDR'],
            'is_admin' => 0
        ]);
    }
    
    public function get_curses()
    {
        $curses = [];
        $query = $this->db->get($this->lang_start."curses");
        $result = $query->result_array();
        foreach ($result as $curse)
        {
            $curses[] = $curse['curse'];
        }
        return $curses;
    }
    
    public function get_question()
    {
        $this->db->order_by('ID', 'RANDOM');
        $this->db->limit(1);
        $this->db->where("deleted", 0);
        $this->db->where("approved", 1);
        $query = $this->db->get($this->lang_start.'questions');
        return $query->result_array();
    }
    
    public function click($id, $pos)
    {
        if($pos == "yes")
        {
            $this->db->set("click", "click+1", FALSE);
        }
        else
        {
            $this->db->set("unclick", "unclick+1", FALSE);
        }
        $this->db->where("ID", $id);
        $this->db->update($this->lang_start.'questions');
    }
    
    public function like($id, $pos)
    {
        if($pos == "yes")
        {
            $this->db->set("like", "`like`+1", FALSE);
        }
        else
        {
            $this->db->set("unlike", "`unlike`+1", FALSE);
            $question = $this->get_question_by_id($id);
            if($question[0]['unlike'] >= 149 && $question[0]['approved'] == 0)
            {
                $this->db->set("deleted", 1);
            }
        }
        $this->db->where("ID", $id);
        $this->db->update($this->lang_start.'questions');
    }
    
    public function get_question_by_id_approved($id)
    {
        $this->db->where("ID", $id);
        $this->db->where("deleted", 0);
        $this->db->where("approved", 1);
        $query = $this->db->get($this->lang_start."questions", 1);
        return $query->result_array(); 
    }
    
    public function get_question_by_id($id)
    {
        $this->db->where("ID", $id);
        $this->db->where("deleted", 0);
        $query = $this->db->get($this->lang_start."questions", 1);
        return $query->result_array(); 
    }
    
    public function send_report($title, $content, $id)
    {
        $question = $this->get_question_by_id($id);
        $this->db->insert($this->lang_start."reports", [
            'question_ID' => $id,
            'title' => $title,
            'content' => $content,
            'sender_IP' => $_SERVER['REMOTE_ADDR']
        ]);
    }
    
    public function report_exists($question_ID)
    {
        $this->db->where("question_ID", $question_ID);
        $query = $this->db->get($this->lang_start.'reports');
        return count($query->result_array()) >= 1;
    }
    
    public function remove_question($id)
    {
        $this->db->update($this->lang_start."questions", ['deleted' => 1], ['ID' => $id]);
    }
    
    public function approve_question($id)
    {
        $this->db->update($this->lang_start."questions", ['approved' => 1], ['ID' => $id]);
    }
    
    public function database_installer()
    {
        $database_tables = [
            'curses' => ['curse' => 'TEXT'],
            'questions' => ['choice1' => 'TEXT','choice2' => 'TEXT','click' => 'INT','unclick' => 'INT','`like`' => 'INT','unlike' => 'INT','adder_IP' => 'TEXT','deleted' => 'INT','approved' => 'INT'],
            'reports' => ['question_ID' => 'INT','title' => 'TEXT','content' => 'TEXT','sender_IP' => 'TEXT'],
            'users' => ['username' => 'TEXT','email' => 'TEXT','salt' => 'TEXT','password' => 'TEXT','ok' => 'INT','IP' => 'TEXT','is_admin' => 'TEXT'],
            'tabs' => ['name' => 'TEXT','title' => 'TEXT','page' => 'TEXT','`order`' => 'INT','is_login' => 'INT','is_admin' => 'INT'],
            'pages' => ['machine_name' => 'TEXT','name' => 'TEXT','html' => 'TEXT','description' => 'TEXT','keywords' => 'TEXT']
        ];
        $inserts = [
            'tabs' => [
                ['name' => '{$lang.home}','title' => '{$lang.start_play}','page' => '','order' => '1','is_login' => '2','is_admin' => '0'],
                ['name' => '{$lang.add_question}','title' => '{$lang.add_your_own}','page' => 'add','order' => '2','is_login' => '2','is_admin' => '0'],
                ['name' => '{$lang.approve_questions}','title' => '{$lang.approve_questions}','page' => 'admin/unapproved','order' => '3','is_login' => '1','is_admin' => '1'],
                ['name' => '{$lang.new_account}','title' => '{$lang.register_now}','page' => 'user/register','order' => '4','is_login' => '0','is_admin' => '0'],
                ['name' => '{$lang.login}','title' => '{$lang.login_user}','page' => 'user/login','order' => '5','is_login' => '0','is_admin' => '0'],
                ['name' => '{$lang.logout} [{username}]','title' => '{$lang.logout_user}','page' => 'user/logout','order' => '6','is_login' => '1','is_admin' => '0'],
            ]
        ];
        
        
        foreach($this->langs_starts as $lang_name => $lang_start)
        {
            foreach ($database_tables as $table_name => $table_parameters)
            {
                $query = $this->db->query("SHOW TABLES LIKE ?", [$lang_start . $table_name]);
                if($query->num_rows() == 0)
                {
                    $query = "CREATE TABLE " . $lang_start . $table_name . "(ID INT NOT NULL AUTO_INCREMENT,";
                    foreach ($table_parameters as $field => $type)
                    {
                        $binds[] = $field;
                        $binds[] = $type;
                        $query .= "{$field} {$type} NOT NULL,";
                    }
                    $query .= "PRIMARY KEY (ID)) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8";
                    $result = $this->db->query($query);
                    
                    if(isset($inserts[$table_name]))
                    {
                        foreach($inserts[$table_name] as $insert_value)
                        {
                            $this->db->insert($lang_start.$table_name, $insert_value);
                        }
                    }
                }
            }
        }
    }
}