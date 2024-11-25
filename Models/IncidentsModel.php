<?php 
	class IncidentsModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectIncidents($id){
            if ($id == "") {
                $sql = "SELECT i.*, t.categoria, t.id_tipo FROM incidencias i 
				INNER JOIN tipo_incidencia t
				ON i.id_tipo = t.id_tipo
				WHERE i.status = 1";
                $request = $this->select_all($sql);
            }else {
                $sql = "SELECT i.*, t.categoria, t.id_tipo  FROM incidencias i 
				INNER JOIN tipo_incidencia t
				ON i.id_tipo = t.id_tipo
				WHERE i.id_incidencia = $id AND i.status = 1";
                $request = $this->select($sql);
            }
            
			return $request;
		}

		public function selectAssignment($id_asignacion){
            $sql = "SELECT *, ar.id AS id_asignacion_recurso FROM asignacion a 
					INNER JOIN equipodetrabajo e ON a.id_equipo = e.id_equipodetrabajo
					INNER JOIN asignacion_recurso ar ON a.id_asignacion = ar.id_asignacion
					INNER JOIN recursos r ON r.id_recurso = ar.id_recurso
					INNER JOIN incidencias i ON i.id_asignacion = a.id_asignacion
					WHERE a.id_asignacion = $id_asignacion AND a.status = 1";
            $request = $this->select($sql);
            
			return $request;
		}


        public function insertIncidents($id_tipo, $id_usuario, $fecha_reporte, $fecha_solucion){
			$sql = "INSERT INTO incidencias (id_tipo, descripcion, fecha_reporte, fecha_solucion, status) VALUES (?,?,?,?,?)";

			$arrData = array($id_tipo, $id_usuario, $fecha_reporte, $fecha_solucion, 1);

			$request = $this->insert($sql, $arrData);

			return $request;
		}

		public function insertAssign($id_equipo, $fecha_asignacion, $estado, $id_recurso, $cantRecurso, $id_incidencia){
			// insertar en tabla asignacion
			$sqlAsignacion = "INSERT INTO asignacion (id_equipo, fecha_asignacion, estado, numero_recursos, status) VALUES (?,?,?,?,?)";

			$arrDataAsignacion = array($id_equipo, $fecha_asignacion, $estado, $cantRecurso, 1);

			$id_asignacion = $this->insert($sqlAsignacion, $arrDataAsignacion);

			//actualizar la tabla incidencias

			$sqlActualizarIncidencias = "UPDATE incidencias SET id_asignacion = ? WHERE id_incidencia = $id_incidencia";

			$arrDataActualizarIncidencias = array($id_asignacion);

			$requestIncidencia = $this->update($sqlActualizarIncidencias, $arrDataActualizarIncidencias);

			//insertar en tabla asignacion equipo

			$sqlAsignacionEquipo = "INSERT INTO asignacion_equipo (id_asignacion, id_equipo) VALUES (?,?)";

			$arrDataAsignacionEquipo = array($id_asignacion, $id_equipo);

			$request = $this->insert($sqlAsignacionEquipo, $arrDataAsignacionEquipo);

			//insertar en tabla asignacion recurso

			$sqlAsignacionRecurso = "INSERT INTO asignacion_recurso (id_asignacion, id_recurso) VALUES (?,?)";

			$arrDataAsignacionRecurso = array($id_asignacion, $id_recurso);

			$request = $this->insert($sqlAsignacionRecurso, $arrDataAsignacionRecurso);

			// actualizar recurso

			$sqlRecurso = "SELECT cantidad FROM recursos WHERE disponible = 1 
									AND status = 1 AND id_recurso = $id_recurso";

			$requestCantidad = $this->select($sqlRecurso);

			$nuevacantidad = $requestCantidad['cantidad'] - $cantRecurso;

			$sqlActualizarRecurso = "UPDATE recursos SET cantidad = ? WHERE id_recurso = $id_recurso";

			$arrDataActualizarRecurso = array($nuevacantidad);

			$requestFinal = $this->update($sqlActualizarRecurso, $arrDataActualizarRecurso);

			return $requestFinal;
		}



		public function updateIncidents($id_incidencia, $id_tipo, $descripcion, $fecha_reporte, $fecha_solucion){
			$sql = "UPDATE incidencias SET  id_tipo = ?, descripcion = ?, fecha_reporte =  ?, fecha_solucion = ? WHERE id_incidencia = $id_incidencia";

			$arrData = array($id_tipo, $descripcion, $fecha_reporte, $fecha_solucion);

			$request = $this->update($sql, $arrData);

			return $request;
		}

		public function deleteIncidents($id){
			$sql = "UPDATE incidencias SET status = ? WHERE id_incidencia = $id";

			$arrData = array(0);

			$request = $this->update($sql, $arrData);

			return $request;
		}
    }