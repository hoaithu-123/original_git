<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>class/construct</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		abstract class Car{
			public $name ;
			public $brand ;
			public static $type = "abc";

			public function A()
			{
				echo "Name: ". $this->name . "</br>";
				echo "Brand: ". $this->brand . "</br>";
				echo "Type: " .self::$type ."</br>";
			}
			abstract public function B();
			// function __construct(){
			// 	$this->name = "kilinux";
			// 	$this->brand = "KIV";
			// }
			function __construct($name = "kilinux", $brand = "KIV"){
				$this->name = $name;
				$this->brand = $brand;
			}

		}
		$kiv = new Car();
		$kiv->A();

		class Ford extends Car{
			function __construct(){
				$this->name = "Ranger";
				$this->brand = "Ford";
			}
			function B(){
				return true;
			}

		}
		$ford = new Ford();
		$ford->A();
		//biến static gọi trực tiếp không cần qua OJB
		
	?>
</body>
</html>