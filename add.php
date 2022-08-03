<?php
	include "php/server.php";
  include "php/navbar.php";

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
		addmenu | thai-dessert
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
            <div class="card my-3">
                    <div class="card-header text-center"> เพิ่มเมนู </div>
                    <div class="card-body">
                        <form action="php/add_db.php" method="post">
                            <label for="name">ชื่ออาหาร</label>
                            <input type="text" name="name" placeholder="เช่น ทองหยิบ" class="form-control my-2" required>
                            <label for="price">ราคา (บาท)</label>
                            <input type="text" name="price" placeholder="เช่น 12" class="form-control my-2" required>
                            <button type="submit" class="btn btn-success mt-2 w-100" name="add"> เพิ่มเมนู </button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="col-md-3">
				
			</div>
		</div>
	</div>

	<!-- add script ได้ตัวเดียว -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>