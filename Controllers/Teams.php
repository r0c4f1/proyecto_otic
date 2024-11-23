<?php

class Teams extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

    public function teams(){

        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Equipos";
        $data['page_functions'] = functions($this, "Teams");

		$this->views->getView($this,"teams",$data);
    }

    public function getTeams($id = ""){
        if ($_GET) {
            
            $requestUser = $this->model->selectTeams($id);

            if ($id != 	"") {
                echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
                return;
            }
            
            for ($i=0; $i < count($requestUser); $i++) { 
                $editar = "<button class='btn btn-outline-success' onclick='modalEditarEquipoDeTrabajo(".$requestUser[$i]["id_equipoDeTrabajo"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-success' onclick='cancelarEquipoDeTrabajo(".$requestUser[$i]["id_equipoDeTrabajo"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
            }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function getRegisteredUsers($idCapacitacion){
        if ($_GET) {
            $requestUser = $this->model->selectRegisteredUsers($idCapacitacion);

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function registerTeamsUser(){
        if ($_POST) {
            $id_usuario = strClean($_POST['id_usuario']);
            $id_equipoDeTrabajo = strClean($_POST['id_equipoDeTrabajo']);
            
            $requestUser = $this->model->insertRegisterTeamsUser($id_usuario, $id_equipoDeTrabajo);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Cedula No Encontrada");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function addTeams(){
        if ($_POST) {
            $nombre = strClean($_POST['nombre']);
            
            $requestUser = $this->model->insertTeams($nombre);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Nombre no encontrado");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function editTeams(){
        if ($_POST) {
            $nombre = strClean($_POST['nombre']);
            $id_equipoDeTrabajo = strClean($_POST['id_equipoDeTrabajo']);
            
            $requestUser = $this->model->updateTeams($nombre, $id_equipoDeTrabajo);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Cedula No Encontrada");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function cancelTeams($id_equipoDeTrabajo){
        if ($_GET) {
            $requestUser = $this->model->deleteTeams($id_equipoDeTrabajo);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Capacitación No Encontrada");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
}