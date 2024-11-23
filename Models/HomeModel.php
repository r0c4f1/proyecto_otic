<?php 
	class HomeModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectGenderIndicator(){
			$sql = "SELECT sexo, COUNT(sexo) AS cantidad FROM usuario WHERE status = 1 GROUP BY sexo";

			$request = $this->select_all($sql);

			return $request;
		}
		public function selectProjectIndicator(){
			$sql = "SELECT id_proyecto, estado, COUNT(id_proyecto) AS cantidad FROM proyecto WHERE status = 1 GROUP BY estado";

			$request = $this->select_all($sql);

			return $request;
		}
		

	}
 ?>