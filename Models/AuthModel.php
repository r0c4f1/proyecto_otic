<?php 
	class AuthModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function sessionLogin($cedula, $clave){
			$sql = "SELECT e.nombres AS nombre, e.cedula, u.id FROM usuario u 
					INNER JOIN empleados e
					ON u.cedula = e.cedula
					WHERE u.cedula = '$cedula' AND u.clave = '$clave'";

			$request = $this->select($sql);

			return $request;
		}

	}
 ?>

