<?php

class TypeIncident extends Controllers {
    
    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Home');
			die();
		}
    }
    
    // Views
    public function typeIncident(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "TypeIncident";
        $data['page_functions'] = functions($this, "typeIncident");
		$this->views->getView($this,"typeIncident",$data);
    }

    public function getTypeIncident($id = ""){
        if ($_GET) {
            
            $requestUser = $this->model->selectTypeIncident($id);
            if (empty($requestUser)) {
                echo json_encode(["message" => "No se encontro."], JSON_UNESCAPED_UNICODE);
                return;
            }
            if ($id != 	"") {
                echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
                return;
            }
            
            for ($i=0; $i < count($requestUser); $i++) { 
                $editar = "<button class='btn btn-outline-success' onclick='modalEditTypeIncident(".$requestUser[$i]["id_tipo"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-danger' onclick='confirmed(".$requestUser[$i]["id_tipo"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
            }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getCategoryTypeIncident(){
        if ($_GET) {
            $requestUser = $this->model->selectCategoryTypeIncident();
            
            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public function registerTypeIncident(){
        if($_POST){
            $categoria = strClean($_POST["categoria"]);
            $nombre_tipo = strClean($_POST["nombre_tipo"]);
    
            $requestUser = $this->model->insertTypeIncident($categoria, $nombre_tipo);
    
            if($requestUser){
                $arrResponse = array("status" => true, "msg" => "Registrado correctamente.");
            }else{
                $arrResponse = array("status" => false, "title" => "Error", "msg" => "Ya está registrado!");
            }
    
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public  function updateTypeIncident(){
        if ($_POST) {
            $categoria = strClean($_POST["categoria"]);
            $nombre_tipo = strClean($_POST["nombre_tipo"]);
            $id = strClean($_POST['id_tipo']);
            
                        $requestUser = $this->model->typeIncidentUpdate($categoria, $nombre_tipo, $id);



            if($requestUser){
                $arrResponse = array("status" => true);
                
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Error");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function cancelTypeIncident($id_tipo){
        if ($_GET) {
            $requestUser = $this->model->deleteTypeIncident($id_tipo);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "No Encontrado");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

}