<?php

class Settings extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

    public function settings(){

        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Ajustes";
        $data['page_functions'] = functions($this, "settings");

		$this->views->getView($this,"settings",$data);
    }
}