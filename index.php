<?php

	include "php/server.php";


	if (!$_SESSION['username']) {
		echo "<script>alert('กรุณาเข้าระบบก่อนนะคะ'); window.location = 'signin.php'</script>";
	}

	if (isset($_GET["logout"])) {
		session_destroy();
		echo "<script>alert('ไว้เจอกันใหม่นะคะ'); window.location = 'signin.php'</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		index | thai-dessert
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- ตอนจะแทรก font ต้องทำการแทรก bootstrap ก่อนจึงจะสามารถ เปลี่ยนตัว font ได้ -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include "php/navbar.php" ?>
	<div class="container">
		<div class="row">
	
			<div class="col-md-12">
				<div class="text-center my-2">
					ยินดีต้อนรับ เข้าสู่ร้านขนมไทย
				</div>
				<div class="card">
					<div class="card-body">
						<div class="card-title"> ระบบร้านขนมไทย </div>
						<div class="card-text text-muted fs-7">
							เขียนขึ้นมาเพื่อที่จะได้จำโค้ดได้ ไม่มีเจตนารมณ์ในการเขียนเลยยยยยยยยยยยยย มีหัวข้ออะไรดีๆมาแนะนำบอกกันได้นะ ทำร้านขนมจนเบื่อแล้ว
						</div>
					</div>
				<img src="img/thai-2.png" alt="" class="card-img-bottom">
				</div>
			</div>

		</div>
	</div>

	<!-- add script ได้ตัวเดียว -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>