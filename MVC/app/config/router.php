<?php
class Router{
	public $routers = [];

	public function get($url = '', $routing = ['controller' => '', 'action' => '']){
		$this->routers[] = [
			'method'	=> 'GET',
			'url' 		=> $url,
			'routing' 	=> $routing
		];
	}

	public function post($url = '', $routing = ['controller' => '', 'action' => '']){
		$this->routers[] = [
			'method'	=> 'POST',
			'url' 		=> $url,
			'routing' 	=> $routing
		];
	}
}




?>