<?php

class Incidents extends Controllers {
    
    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Home');
			die();
		}
    }
    
    // Views
    public function incidents(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Servicios";
        $data['page_functions'] = functions($this, "incidents");
		$this->views->getView($this,"incidents",$data);
    }

    public function getIncidents($id = ""){
        if ($_GET) {
            $requestUser = $this->model->selectIncidents($id);

            if ($id != 	"") {
                echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
                return;
            }
            
            for ($i=0; $i < count($requestUser); $i++) { 
                $editar = "<button class='btn btn-outline-success' onclick='modalEditarCapacitacion(".$requestUser[$i]["id_incidencia"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-success' onclick='cancelarCapacitacion(".$requestUser[$i]["id_incidencia"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
            }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function getAsignedIncidents($idAsignacion){
        if ($_GET) {
            $requestUser = $this->model->selectAsignedIncidents($idAsignacion);

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }


}