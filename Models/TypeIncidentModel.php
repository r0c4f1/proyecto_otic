<?php 
	class TypeIncidentModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectTypeIncident($id){
            if ($id == "") {
                $sql = "SELECT id_tipo, categoria, nombre_tipo FROM tipo_incidencia WHERE status = 1";
                $request = $this->select_all($sql);
            }else {
                $sql = "SELECT id_tipo, categoria, nombre_tipo FROM tipo_incidencia WHERE id_tipo = $id AND status = 1";
                $request = $this->select($sql);
            }

			return $request;
		}

		public function selectCategoryTypeIncident(){
            $sql = "SELECT categoria, id_tipo FROM tipo_incidencia WHERE status = 1  GROUP BY categoria";
            $request = $this->select_all($sql);

			return $request;
		}

		public function deleteTypeIncident($id_tipo){
            $sql =  "UPDATE tipo_incidencia SET status = ?  WHERE id_tipo = $id_tipo";

            $arrData = array(0);

			$request = $this->update($sql, $arrData);

			return $request;
		}

        public function insertTypeIncident($categoria, $nombre_tipo){
            $sql =  "INSERT INTO tipo_incidencia (categoria, nombre_tipo, status) VALUES (?,?,?)";

            $arrData = array($categoria, $nombre_tipo, 1);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

		public function typeIncidentUpdate($categoria, $nombre_tipo, $id) {
			$sql = "UPDATE tipo_incidencia SET categoria = ?, nombre_tipo = ? WHERE id_tipo  = '$id'";

			$arrData = array($categoria, $nombre_tipo);

			$request = $this->update($sql, $arrData);

			return $request;
		}

    }