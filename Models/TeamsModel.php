<?php 
	class TeamsModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectTeams($id){
            if ($id == "") {
                $sql = "SELECT id_equipoDeTrabajo, nombre_equipoDeTrabajo FROM equipodetrabajo WHERE status = 1";
                $request = $this->select_all($sql);
            }else {
                $sql = "SELECT * FROM equipodetrabajo WHERE id_equipoDeTrabajo = $id AND status = 1";
                $request = $this->select($sql);
            }

			return $request;
		}

        public function selectRegisteredUsers($idCapacitacion){
			$sql = "SELECT * FROM usuario_capacitacion uc
                    INNER JOIN usuario u ON uc.id_usuario = u.id_usuario
                    WHERE uc.id_capacitacion = $idCapacitacion AND u.status = 1";


			$request = $this->select_all($sql);

			return $request;
		}

        public function insertRegisterTeamsUser($id_usuario, $id_equipoDeTrabajo){
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' AND status = 1";
	
			$request = $this->select($sql);
	
			if (!$request) return false;

            $sql =  "INSERT INTO equipodetrabajo_usuario (id_equipoDeTrabajo, id_usuario) VALUES (?,?)";

            $arrData = array($id_usuario, $id_equipoDeTrabajo);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

        public function insertTeams($nombre){
            $sql =  "INSERT INTO equipodetrabajo (nombre_equipoDeTrabajo, status) VALUES (?,?)";

            $arrData = array($nombre, 1);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

        public function updateTeams($nombre, $id_equipoDeTrabajo){
            $sql =  "UPDATE equipodetrabajo SET nombre_equipoDeTrabajo = ? WHERE  id_equipoDeTrabajo = $id_equipoDeTrabajo";

            $arrData = array($nombre);

			$request = $this->update($sql, $arrData);

			return $request;
		}

        public function deleteTeams($id_equipoDeTrabajo){
            $sql =  "UPDATE equipodetrabajo SET status = ?  WHERE id_equipoDeTrabajo = $id_equipoDeTrabajo";

            $arrData = array(0);

			$request = $this->update($sql, $arrData);

			return $request;
		}

    }