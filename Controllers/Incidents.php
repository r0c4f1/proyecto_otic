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
                $editar = "<button class='btn btn-outline-success' onclick='modalEditarIncidencia(".$requestUser[$i]["id_incidencia"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-success' onclick='cancelarIncidencia(".$requestUser[$i]["id_incidencia"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;
            }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function getAssignment($idAsignacion){
        if ($_GET) {
            $requestUser = $this->model->selectAssignment($idAsignacion);

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }
    

    public  function getAsignedIncidents($idAsignacion){
        if ($_GET) {
            $requestUser = $this->model->selectAsignedIncidents($idAsignacion);

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function setIncidents(){
        if ($_POST) {
            $descripcion = strClean($_POST['descripcion']);
            $id_tipo = strClean($_POST['id_tipo']);
            $fecha_reporte = strClean($_POST['fecha_reporte']);
            $fecha_solucion = strClean($_POST['fecha_solucion']);
            
            $requestUser = $this->model->insertIncidents($id_tipo, $descripcion, $fecha_reporte, $fecha_solucion);
            
            
            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "No Insertado");
            }
        
        
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function assignIncident(){
        if ($_POST) {
            $id_equipo = strClean($_POST['id_equipo']);
            $id_incidencia = strClean($_POST['id_incidencia']);
            $fecha_asignacion = strClean($_POST['fecha_asignacion']);
            $estado = strClean($_POST['estado']);
            $id_recurso = strClean($_POST['idRecurso']);
            $cantRecurso = strClean($_POST['cantRecurso']);
            
            $requestUser = $this->model->insertAssign($id_equipo, $fecha_asignacion, $estado, $id_recurso, $cantRecurso, $id_incidencia);
            
            
            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "No Insertado");
            }
        
        
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function updateIncidents(){
        if ($_POST) {
            $id_incidencia = strClean($_POST['id_incidencia']);
            $descripcion = strClean($_POST['descripcion']);
            $id_tipo = strClean($_POST['id_tipo']);
            $fecha_reporte = strClean($_POST['fecha_reporte']);
            $fecha_solucion = strClean($_POST['fecha_solucion']);
            
            $requestUser = $this->model->updateIncidents($id_incidencia, $id_tipo, $descripcion, $fecha_reporte, $fecha_solucion);
            
            
            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "No Actualizado");
            }
        
        
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function delIncidents($id){
        if ($_GET) {
            $requestUser = $this->model->deleteIncidents($id);
            
            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Incidencia no encontrada");
            }
        
        
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
}