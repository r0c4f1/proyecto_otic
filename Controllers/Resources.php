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
                $editar = "<button class='btn btn-outline-success' onclick='editar(".$requestUser[$i]["id_recurso"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-danger' onclick='confirmed(".$requestUser[$i]["id_recurso"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
                if ( $requestUser[$i]['disponible'] == 0) {
                    $requestUser[$i]['disponible'] = "<div class='empty'>0</div>";
                }else {
                    $requestUser[$i]['disponible'] = "<div class='boss'>1</div>";
                }
                }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }
    public function registerResource(){
        if($_POST){
            $nombre = strClean($_POST["nombre"]);
            $tipo = strClean($_POST["tipo"]);
            $cantidad = strClean($_POST["cantidad"]);
            $disponible = isset($_POST["disponible"]) ? strClean($_POST["disponible"]) : 0;  
            
    
            $requestUser = $this->model->insertResource($nombre, $tipo, $cantidad, $disponible);
    
            if($requestUser){
                $arrResponse = array("status" => true, "msg" => "Recurso registrado correctamente.");
            }else{
                $arrResponse = array("status" => false, "title" => "Error", "msg" => "Este Recurso ya está registrado!");
            }
    
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function updateResource(){
        if($_POST){
            $nombre = strClean($_POST["nombre"]);
            $tipo = strClean($_POST["tipo"]);
            $cantidad = strClean($_POST["cantidad"]);
            $disponible = isset($_POST["disponible"]) ? strClean($_POST["disponible"]) : 0;  
            $id_recurso = strClean($_POST['id_recurso']);

            $requestUser = $this->model->resourceUpdate($nombre, $tipo, $cantidad, $disponible, $id_recurso);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Fallo Al Actualizar!");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public  function cancelResource(){
        if ($_GET) {
            $id_recurso = $_POST['id_recurso'];
            $status = $_POST['status'];
            $requestUser = $this->model->deleteResource($id_recurso, $status);

            if($requestUser){
                $arrResponse = array("status" => true, "msg" => "Recurso Eliminado");
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Recurso no existente");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

}