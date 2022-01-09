<?php
	define("APP_PATH", realpath('.'));
	require_once APP_PATH .'/app/config/loader.php';
	// echo ("day la file index"); 
	// echo $_GET['url'];
	// die();
	$load = new Load();
	$load->upload();


?>