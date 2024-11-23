<?php

class Poa extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

    public function poa(){

        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "POA";
        $data['page_functions'] = functions($this, "poa");

		$this->views->getView($this,"poa",$data);
    }
}