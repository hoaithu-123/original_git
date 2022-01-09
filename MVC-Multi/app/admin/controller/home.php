<?php
require_once APP_PATH . "/app/config/controller.php";
	class Home extends Controller{
		public function index(){
			$data = "hello Home";
			// $this->loadModel("home");
			 echo $this->dataModel->getValue() ."</br>";



			$this->index->Render("home/index", $data);

		}
		public function news(){
			echo "đã truy cập được action : News của trang tin-tức";
		}
		public function detailNews($id){
			echo "đã truy cập được action : detailNews của trang tin-tức" . $id;
		}



		
	}

?>