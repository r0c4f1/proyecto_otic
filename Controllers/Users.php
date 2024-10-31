<?php

class Users extends Controllers {
    
    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Home');
			die();
		}
    }
    
    // Views
    public function users(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Users";
        $data['page_functions'] = functions($this, "users");
		$this->views->getView($this,"users",$data);
    }

    public function getUsers(){
        if ($_GET) {
            $requestUser = $this->model->selectUsers();

            for ($i=0; $i < count($requestUser); $i++) { 
                $editar = "<button class='btn btn-outline-success' onclick='editar(".$requestUser[$i]["id_usuario"].")'><i class='fa-regular fa-pen-to-square'></i></button>";
                $eliminar = "<button class='btn btn-outline-success' onclick='eliminar(".$requestUser[$i]["id_usuario"].")'><i class='fa-solid fa-trash'></i></button>";
                $requestUser[$i]['opc'] =  $editar . " " . $eliminar;

                $requestUser[$i]['admin'] = $requestUser[$i]['admin'] > 0  ? "<div class='admin'></div>" : "<div class='no-admin'></div>";

            }

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getUser($id){
        if ($_GET) {
            $requestUser = $this->model->selectUser($id);

            echo json_encode($requestUser, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setStatus(){
        if ($_POST) {
            $id_usuario = $_POST['id_usuario'];
            $status = $_POST['status'];
            
            $requestUser = $this->model->updateStatus($id_usuario, $status);

            if ($requestUser) {
                $arraResponse =  array("status" => true, "msg" => "Eliminado");
            }else {
                $arraResponse =  array("status" => false, "msg" => "Error");
            }

            echo json_encode($arraResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public  function verifyId(){
        if ($_POST) {
            $id_usuario = strClean($_POST['id_usuario']);

            $requestUser = $this->model->idExist($id_usuario);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Esta Cedula Esta Registrada!", "msg" => "Cedula Registrada!");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }


    public function registerUser(){
        if($_POST){
            $nombre = strClean($_POST["nombre"]);
            $cedula = strClean($_POST["cedula"]);
            $apellido = strClean($_POST["apellido"]);
            $fechaNac = strClean($_POST["fechaNac"]);
            $sexo = strClean($_POST["sexo"]);
            $telefono = strClean($_POST["telefono"]);
            $email = strClean($_POST["email"]);
            $unidad = strClean($_POST["unidad"]);
            $cargo = strClean($_POST["cargo"]);
            $clave = hash("md5", $_POST["clave"]);
            $admin = isset($_POST["admin"]) ? strClean($_POST["admin"]) : 0;  

            if(empty($cedula) || empty($clave)){
                $arrResponse = array('status' => false, "title" => "Error!", "msg" => "Campos cedula y clave nescesarios");
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }

            $requestUser = $this->model->userRegister($nombre, $apellido, $fechaNac, $sexo, $telefono, $email, $cedula, $clave, $admin, $unidad, $cargo);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Esta Cedula Esta Registrada!", "msg" => "Cedula Registrada!");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    
    
    public function updateUser(){
        if($_POST){
            $nombre = strClean($_POST["nombre"]);
            $id_usuario = strClean($_POST["id_usuario"]);
            $apellido = strClean($_POST["apellido"]);
            $fechaNac = strClean($_POST["fechaNac"]);
            $sexo = strClean($_POST["sexo"]);
            $telefono = strClean($_POST["telefono"]);
            $email = strClean($_POST["email"]);
            $unidad = strClean($_POST["unidad"]);
            $cargo = strClean($_POST["cargo"]);
            // $clave = hash("md5", $_POST["clave"]);
            // $admin = isset($_POST["admin"]) ? strClean($_POST["admin"]) : 0;  

            $requestUser = $this->model->userUpdate($nombre, $apellido, $fechaNac, $sexo, $telefono, $email, $id_usuario, $unidad, $cargo);

            if($requestUser){
                $arrResponse = array("status" => true);
            }else{
                $arrResponse = array("status" => false, "title" => "Error!", "msg" => "Fallo Al Actualizar!");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

}