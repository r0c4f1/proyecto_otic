<?php

class Users extends Controllers {
    
    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Home');
			die();
		}
    }
    
    // Views
    public function users(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Users";
        $data['page_functions'] = functions($this, "users");
		$this->views->getView($this,"users",$data);
    }

}