<?php 
	class ResourcesModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectResources($id){
			if ($id == "") {
				$sql = "SELECT id_recurso, nombre, tipo, cantidad, disponible FROM recursos WHERE status = 1";
				$request = $this->select_all($sql);
			}else {
				$sql = "SELECT id_recurso, nombre, tipo, cantidad, disponible FROM recursos WHERE id_recurso = $id AND status = 1";
				$request = $this->select($sql);
			}
	
			return $request;
		}
     
        public function insertProject($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado){
            $sql =  "INSERT INTO proyecto (nombre, descripcion, fecha_inicio, fecha_fin, estado) VALUES (?,?,?,?,?)";

            $arrData = array($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

        public function updateProject($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado, $id_proyecto){
            $sql =  "UPDATE proyecto SET nombre = ?, descripcion = ?, fecha_inicio = ?, fecha_fin = ?, estado = ? WHERE  id_proyecto = $id_proyecto";

            $arrData = array($nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado);

			$request = $this->update($sql, $arrData);

			return $request;
		}

        public function deleteProject($id_proyecto){
            $sql =  "UPDATE proyecto SET status = ?  WHERE id_proyecto = $id_proyecto";

            $arrData = array(0);

			$request = $this->update($sql, $arrData);

			return $request;
		}

    }