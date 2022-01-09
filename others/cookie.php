<?php
	setcookie("username", "hoaithu", time() + 30);
	


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cookie</title>
</head>
<body>
	<?php
		//Use cookie: lưu client ->gửi những thông thông tin ng lên server
		//EX: ng dung vào giỏ hàng, chọn những sp yêu thích -> bận vc, log out
		// lần sau vào, cookie tự động upload thông tin đó vào trang web server
		//cookie: từ client sent server, có thời gian hiệu lực là = 30s
		//lần 1: refresh cookie ghi được ở client gửi lên server, đồng thời set lại cookie một lần nữa, 
		// Nếu trong vail -> hiển thị Cookie, nếu không return array();
		// lần 2: refresh cookie -> trong tg vail(30s) ->giống lần 1
		// muốn xóa bỏ: set past time
		print_r($_COOKIE);

	?>
	
</body>
</html>



