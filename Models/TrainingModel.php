<?php 
	class TrainingModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectTraining($id){
            if ($id == "") {
                $sql = "SELECT tema, fecha, duracion, id_capacitacion FROM capacitacion WHERE status = 1";
                $request = $this->select_all($sql);
            }else {
                $sql = "SELECT tema, fecha, duracion FROM capacitacion WHERE id_capacitacion = $id AND status = 1";
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

        public function insertRegisterTrainingUser($id_usuario, $id_capacitacion){
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' AND status = 1";
	
			$request = $this->select($sql);
	
			if (!$request) return false;

            $sql =  "INSERT INTO usuario_capacitacion (id_usuario, id_capacitacion) VALUES (?,?)";

            $arrData = array($id_usuario, $id_capacitacion);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

        public function insertTraining($tema, $fecha, $duracion){
            $sql =  "INSERT INTO capacitacion (tema, fecha, duracion) VALUES (?,?,?)";

            $arrData = array($tema, $fecha, $duracion);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

        public function updateTraining($tema, $fecha, $duracion, $id_usuario){
            $sql =  "UPDATE capacitacion SET tema = ?, fecha = ?, duracion = ? WHERE  id_capacitacion = $id_usuario";

            $arrData = array($tema, $fecha, $duracion);

			$request = $this->update($sql, $arrData);

			return $request;
		}

        public function deleteTraining($id_capacitacion){
            $sql =  "UPDATE capacitacion SET status = ?  WHERE id_capacitacion = $id_capacitacion";

            $arrData = array(0);

			$request = $this->update($sql, $arrData);

			return $request;
		}

    }