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
		editmenu | thai-dessert
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
            <div class="card my-3">
                    <div class="card-header text-center"> แก้ไขเมนู </div>
                    <div class="card-body">
                        <?php
                            if (isset($_GET['id'])) {
                                $id = mysqli_real_escape_string($connect, $_GET['id']);
                                $query = "SELECT * FROM menu WHERE id = $id";
                                $result = mysqli_query($connect, $query);

                                if (mysqli_num_rows($result)) {
                                    $menu = mysqli_fetch_array($result);
                        ?>
                        <form action="php/edit_db.php" method="post">
                            <input type="hidden" name="menu_id" value="<?= $menu['id']; ?>">
                            <label for="food">ชื่ออาหาร</label>
                            <input type="text" name="name" value="<?php echo $menu['name']?>" class="form-control my-2">
                            <label for="price">ราคา (บาท)</label>
                            <input type="text" name="price" value="<?php echo $menu['price']?>" class="form-control my-2">
                            <button type="submit" class="btn btn-success mt-2 w-100" name="edit"> แก้ไขเมนู </button>
                        </form>
                        <?php } } ?>
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