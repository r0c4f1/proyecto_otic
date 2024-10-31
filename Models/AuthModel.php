<?php 
	class AuthModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function sessionLogin($cedula, $clave){
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$cedula' AND clave = '$clave'";

			$request = $this->select($sql);

			return $request;
		}

		public function userRegister($nombre, $apellido, $fechaNac, $sexo, $telefono, $email, $cedula, $clave){
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$cedula'";

			$request = $this->select($sql);

			if ($request) return false;

			$sql = "INSERT INTO usuario (id_usuario, 
										 nombres, 
										 apellidos, 
										 fecha_nacimiento, 
										 telefono, 
										 sexo,
										 email,
										 clave,
										 admin) VALUES (?,?,?,?,?,?,?,?,?)";

			$arrData = array($cedula, $nombre, $apellido, $fechaNac, $telefono, $sexo, $email, $clave, 0);

			$insert  = $this->insert($sql, $arrData); 

			return true;
		}

	}
 ?>