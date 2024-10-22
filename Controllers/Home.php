<?php

class Home extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

    public function home(){

        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Inicio";
        $data['page_functions'] = functions($this, "home");

		$this->views->getView($this,"home",$data);
    }

}