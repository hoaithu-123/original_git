<?php
require_once APP_PATH . "/app/config/router.php";
	class Load{
		// $controllerName: tên link user muốn truy cập
		//$actionName: action muốn thực hiện
		protected $controllerName;
		protected $actionName;
		protected $modulName;
		private $routers = [];
		private $urlParams = [];
		//GET $controllerName, $actionName, $modulName;
		function __construct(){

			$this->setRouter();

			$this->mapURL();
			
			// if(isset($_GET['modul'])){
			// 	$this->modulName = $_GET['modul'];

			// 	if(isset($_GET['controller'])){
			// 		$this->controllerName = $_GET['controller'];
			// 		if(isset($_GET['action'])){
			// 			$this->actionName = $_GET['action'];
			// 		}else{
			// 			$this->actionName = "index";
			// 		}
			// 	}else{
			// 		$this->controllerName = "index";
			// 		$this->actionName = "index";
			// 	}
			// }else{
			// 	$this->modulName = "default";
			// 	$this->controllerName = "index";
			// 	$this->actionName = "index";
			// }


			
			
		}
		//sau khi GET được yêu cầu của user-> load yêu cầu đó
		public function upLoad(){
			//link yêu cầu controller của user
			$link = APP_PATH . '/app/'. $this->modulName.'/controller/'  .$this->controllerName .".php";
			// ktra link có tồn tại không
			if(file_exists($link)){
				require_once $link;
				$controller = new $this->controllerName;
				if(method_exists($controller , $this->actionName)){
					$controller->loadModel($this->modulName, $this->controllerName);
					$controller->setView($this->modulName);
					

					//$controller->{$this->actionName}();
					call_user_func_array(
		 			[$controller, $this->actionName], 
		 			$this->urlParams

				);
				}else{
					$this->notFound();
				}


			}else{
				$this->notFound();
			}

		}

		public function notFound(){

			require_once APP_PATH . '/app/admin/controller/error.php';
			$notFounds = new Errors();
			$notFounds->notfound();

		}
		private function mapURL(){
		$method = $_SERVER['REQUEST_METHOD'];
		$url = 'index.php';
		if(isset($_GET['url'])){
			$url = $_GET['url'];
		}

		
		$url = rtrim($url, '/');

		$url = ($url == 'index.php') ? '/' : ('/' . $url);

		foreach ($this->routers as $router) {
			if ($method == $router['method']) {
				$flagMapURL = false;
				if ($url == $router['url']) {
					$flagMapURL = true;
				}else{
					$urlParams  = explode('/', $url);// mảng URL
					$routerParams = explode('/', $router['url'] );//list thanh phan bang Routing
					if(count($urlParams) == count($routerParams)){
						foreach($urlParams as $key => $urlParam){
								//cờ xác nhận có thành phần tĩnh và động
							$flagUrlParams = false;

							if(preg_match('/^{\w+}$/', $routerParams[$key])){
								$flagUrlParams = true;
								//lưu giá trị URL động
								$this->urlParams[] = $urlParam;
							}else{
								//ktra URL tĩnh
								if($urlParam == $routerParams[$key]){
									$flagUrlParams = true;
								}else{
									$flagUrlParams = false;
									break;
								}
							}
						}
						if($flagUrlParams){
							$flagMapURL = true;
						}

						
					}
					
				}

				if ($flagMapURL) {
					$this->modulName = $router['routing']['module'];
					$this->controllerName = $router['routing']['controller'];
					$this->actionName = $router['routing']['action'];
					break;
				}
			}
		}
	}
	private function setRouter(){
		$router = new Router();
		$router->get('/',
			[	
				'module' => 'admin',
				'controller'=> 'home',
				'action'	=> 'index'
			]
		);

		$router->get('/tin-tuc',
			[
				'module' => 'admin',
				'controller'=> 'home',
				'action'	=> 'news'
			]
		);
		$router->get('/tin-tuc/{id}',
			[
				'module' => 'admin',
				'controller'=> 'home',
				'action'	=> 'detailNews'
			]

		);
		//$router->routeres: trỏ đến biến routers["controller","action"] in class Router
	 	//$this->routers : có được các link và các controller/action tương ứng
		
		$this->routers = $router->routers;

	}




}




