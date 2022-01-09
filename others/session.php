<?php
// session : là bộ nhớ tạm , lưu trữ tạm thời ở SERVER, 1 phiên là ng dùng hd trên trình duyệt đó
// Tác dụng: VD: xác định ng dùng truy cập trong một Browns, ng này lần trc vừa truy cập, giờ lại truy cập tiếp
//Cách hđ giống cookie

	

	session_start();
	print_r($_SESSION);
	$_SESSION['username'] = 'hoaithu';
	print_r($_SESSION);

	//uset($_SESSION['username']); Xóa session user
?>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SESSION</title>
	<link rel="stylesheet" href="">
</head>
<body>
	
</body>
</html>