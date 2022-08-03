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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
		<img src="img/thai-dessert.png" width="45px" height="45px">
	</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">เพิ่มเมนู</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="menu.php">เมนู</a>
        </li>
        
      </ul>
	  <?php if($_SESSION['username'] == 'admin') { ?>
	  <form class="d-flex me-2">
		<a href="useredit.php" class="btn btn-outline-success">แก้ไขผู้ใช้งาน</a>
	  </form>
	  <?php } ?>
      <form class="d-flex">
        <a class="btn btn-outline-danger" href="index.php?logout='0'">ออกระบบ</a>
      </form>
    </div>
  </div>
</nav>

	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
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
			<div class="col-md-3">
				
			</div>
		</div>
	</div>

	<!-- add script ได้ตัวเดียว -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>