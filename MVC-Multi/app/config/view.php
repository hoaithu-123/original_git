<?php
	class View
	{	public $modulName;


		public function Render($fileName ){
		$nameView = APP_PATH . '/app/'.$this->modulName.'/view/'. $fileName . ".php";
		require_once APP_PATH . '/app/'.$this->modulName.'/view/index.php';
		
		}

	}
?>