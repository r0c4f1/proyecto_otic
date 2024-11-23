<?php

class Resources extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

     // Views
     public function resources(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Recursos";
        $data['page_functions'] = functions($this, "resources");
		$this->views->getView($this,"resources",$data);
    }

    public function getResources($id = ""){
        if ($_GET) {
            
            $requestUser = $this->model->selectResources($id);
            if (empty($requestUser)) {
                echo json_encode(["message" => "No se encontraron el recurso."], JSON_UNESCAPED_UNICODE);
                return;
            }
            if ($id != 	"") {
                echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
                return;
            }
            
            for ($i=0; $i < count($requestUser); $i++) { 
                $editar = "<button class='btn btn-outline-success' onclick='modalEditarProyecto(".$requestUser[$i]["id_recurso"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-success' onclick='cancelarProyecto(".$requestUser[$i]["id_recurso"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
                }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }


}