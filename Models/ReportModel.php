<?php 
	class ReportModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function ReportResources(){
			$sql = "SELECT * FROM usuario ";

			$request = $this->select_all($sql);

			return $request;
		}

    }