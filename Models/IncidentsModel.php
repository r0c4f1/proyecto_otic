<?php 
	class IncidentsModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectIncidents($id){
            if ($id == "") {
                $sql = "SELECT * FROM incidencias WHERE status = 1";
                $request = $this->select_all($sql);
            }else {
                $sql = "SELECT * FROM incidencias WHERE id_incidencia = $id AND status = 1";
                $request = $this->select($sql);
            }
            
			return $request;
		}

        public function selectAsignedIncidents($idAsignacion){
			$sql = "SELECT * FROM asignacion_equipo ae
                    INNER JOIN equipodetrabajo e ON ae.id_equipo = e.id_equipodetrabajo
                    WHERE ae.id_asignacion = $idAsignacion AND e.status = 1";


			$request = $this->select_all($sql);

			return $request;
		}
    }