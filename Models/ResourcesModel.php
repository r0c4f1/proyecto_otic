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
     
        public function insertResource($nombre, $tipo, $cantidad, $disponible){
            $sql =  "INSERT INTO recursos (nombre, tipo, cantidad, disponible) VALUES (?,?,?,?)";

            $arrData = array($nombre, $tipo, $cantidad, $disponible);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

        public function resourceUpdate($nombre, $tipo, $cantidad, $disponible, $id_recurso){
            $sql =  "UPDATE recursos SET nombre = ?, tipo = ?, cantidad = ?, disponible = ? WHERE  id_recurso = '$id_recurso'";

            $arrData = array($nombre, $tipo, $cantidad, $disponible);

			$request = $this->update($sql, $arrData);

			return $request;
		}

        public function deleteResource($id_recurso, $status){
            $sql =  "UPDATE recursos SET status = ?  WHERE id_recurso = $id_recurso";

            $arrData = array($status);

			$request = $this->update($sql, $arrData);

			return $request;
		}

    }