<?php
	
	class Controller 
	{
			protected $index;
			protected $dataModel;
		function __construct()
		{
			require_once APP_PATH . "/app/config/view.php";
			$this->index = new View();
			
		}
		public function loadModel($modulName, $fileName){
			$filepath = APP_PATH. '/app/'.$modulName.'/model/' .$fileName .".php";
			if(file_exists($filepath)){
				require_once $filepath;
				$nameModel = $fileName."Model";
				//gan OBJ dataModel = new HomeModel
				$this->dataModel = new $nameModel();
			}

		}

		public function setView($modulName){
			$this->index->modulName = $modulName;
		}
	}


?>