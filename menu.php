<?php
	include "php/server.php";

	if (!$_SESSION['username']) {
		echo "<script>alert('กรุณาเข้าระบบก่อนนะคะ'); window.location = 'signin.php'</script>";
	}

	if (isset($_GET["logout"])) {
		session_destroy();
		echo "<script>alert('ไว้เจอกันใหม่นะคะ'); window.location = 'signin.php'</script>";
	}

  //call
  $querymenu = "SELECT * FROM menu";
  $resultmenu = mysqli_query($connect, $querymenu);

  //delete
  if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $querydel = "DELETE FROM menu WHERE id = $id";
    $resultrdel = mysqli_query($connect, $querydel) or die("try");

	if ($resultdel) {
       header("location : menu.php");
     } 
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		menu | thai-dessert
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
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8">
				<h5 class="text-center my-4">
					รายการอาหาร
        </h5>
        <form action="menu_search.php" method="post">
          <div class="row">
          <div class="col-md-10">
            <input type="text" name="search" placeholder="ค้นหาเมนู" class="form-control">
          </div>
          <div class="col-md-2">
            <input type="submit" value="ค้นหา" name="submit" class="btn btn-info w-100">
          </div>
          </div>
        </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <!-- <th scope="col"></th> -->
                            <th scope="col">ชื่อเมนู</th>
                            <th scope="col">ราคา(บาท)</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                            <th class="text center">เวลาที่แก้ไข</th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultmenu->fetch_assoc()) { ?>
                    <tbody>
                        <tr>
                            <!-- <td></td> -->
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                              <a href="menu-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td>
                              <a href="menu.php?del=<?php echo $row['id'];?>" class="btn btn-danger w-75"> ลบ </a>
                            </td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
			</div>
			<div class="col-md-2">
				
			</div>
		</div>
	</div>

	<!-- add script ได้ตัวเดียว -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
