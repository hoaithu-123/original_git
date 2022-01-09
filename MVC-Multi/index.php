<?php
	define("APP_PATH", realpath('.'));
	require_once APP_PATH .'/app/config/loader.php';

	$load = new Load();
	$load->upload();


?>