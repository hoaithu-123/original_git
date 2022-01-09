<?php
require_once APP_PATH."/app/config/model.php";
	class HomeModel extends Model{
		public function __construct(){
			parent::__construct();
			$this->setTable("hoc_sinh");
		}
		public function getValue(){
			// $this->insert([
			// 	"hoTen" => "La Hoai Thu",
			// 	"ngaySinh" => "1999-12-04"
			// ]);

			// $this->update([
			// 	"hoTen" => "Lã Thị Hoài Thu"
			// ],"maSV = 6");

			// $result = $this->selectOne([
			// 	"column" => "*",
			// 	"condition" => "maSV = 1"
			// ]);
			// echo "<pre>";
			// echo print_r($result);die();

			// $result = $this->selectMulti([
			// 	"column" => "*",
			// 	"condition" => "maSV > 6"

			// ]);
			// echo "<pre>";
			// echo print_r($result);die();

			// $sql = "SELECT * FROM `hoc_sinh`";
			// $result = $this->query($sql);
			// echo "<pre>";
			// echo print_r($result);

			$name = "'acb' OR 'a'='a'";
			$result = $this->selectMulti([
			"column" => "*",
			"condition" => $name
			]);
			echo "<pre>";
			echo print_r($result);

		}
	}
?>