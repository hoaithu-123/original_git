<?php
	class View
	{	public function Render($fileName ){
		$nameView = APP_PATH . '/app/view/'. $fileName . ".php";
		require_once APP_PATH . "/app/view/index.php";
		
		}

	}
?>