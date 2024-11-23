<?php

class Project extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

     // Views
     public function project(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Proyecto";
        $data['page_functions'] = functions($this, "project");
		$this->views->getView($this,"project",$data);
    }
   
    public function getProject($id = ""){
        if ($_GET) {
            
            $requestUser = $this->model->selectProject($id);
            if (empty($requestUser)) {
                echo json_encode(["message" => "No se encontraron proyectos."], JSON_UNESCAPED_UNICODE);
                return;
            }
            if ($id != 	"") {
                echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
                return;
            }
            
            for ($i=0; $i < count($requestUser); $i++) { 
                $editar = "<button class='btn btn-outline-success' onclick='modalEditarProyecto(".$requestUser[$i]["id_proyecto"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-danger' onclick='cancelarProyecto(".$requestUser[$i]["id_proyecto"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
                }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }
    
    public function registerProject(){
        if($_POST){
            $nombre = strClean($_POST["nombre"]);
            $descripcion = strClean($_POST["descripcion"]);
            $fecha_inicio = strClean($_POST["fecha_inicio"]);
            $fecha_fin = strClean($_POST["fecha_fin"]);
            $estado = strClean($_POST["estado"]);
    
            $requestUser = $this->model->insertProject($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado);
    
            if($requestUser){
                $arrResponse = array("status" => true, "msg" => "Proyecto registrado correctamente.");
            }else{
                $arrResponse = array("status" => false, "title" => "Error", "msg" => "Este Proyecto ya está registrado!");
            }
    
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public  function updateProject(){
        if ($_POST) {
            $nombre = strClean($_POST["nombre"]);
            $descripcion = strClean($_POST["descripcion"]);
            $fecha_inicio = strClean($_POST["fecha_inicio"]);
            $fecha_fin = strClean($_POST["fecha_fin"]);
            $estado = strClean($_POST["estado"]);
            $id_proyecto = strClean($_POST['id_proyecto']);
            
                        $requestUser = $this->model->projectUpdate($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado, $id_proyecto);



            if($requestUser){
                $arrResponse = array("status" => true);
                
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Error");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    public  function cancelProject($id_proyecto){
        if ($_GET) {
            $requestUser = $this->model->deleteProject($id_proyecto);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Proyecto No Encontrado");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getRecycleBinProject($id = ""){
        if ($_GET) {
            
            $requestUser = $this->model->selectRecycleBinProject($id);
            if (empty($requestUser)) {
                echo json_encode(["message" => "No se encontraron proyectos."], JSON_UNESCAPED_UNICODE);
                return;
            }
            if ($id != 	"") {
                echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
                return;
            }
            
            for ($i=0; $i < count($requestUser); $i++) { 
                $restaurar = "<button class='btn btn-outline-primary' onclick='restaurarProyecto(".$requestUser[$i]["id_proyecto"].")'><i class='fa-solid fa-undo'></i></button>";
                
                $requestUser[$i]['opc'] =  $restaurar;
                }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function restoreProject($id_proyecto){
        if ($_GET) {
            $requestUser = $this->model->updateRecycleBinProject($id_proyecto);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Proyecto No Encontrado");
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

}