<?php 
	class HomeModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectGenderIndicator(){
			$sql = "SELECT sexo, COUNT(sexo) AS cantidad FROM usuario GROUP BY sexo";

			$request = $this->select_all($sql);

			return $request;
		}

	}
 ?>