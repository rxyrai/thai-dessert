<?php
	include "php/server.php";

	if (!$_SESSION['username']) {
		echo "<script>alert('กรุณาเข้าระบบก่อนนะคะ'); window.location = 'signin.php'</script>";
	}
  if ($_SESSION['username']!='admin') {
		echo "<script>alert('กรุณาเข้าระบบก่อนนะคะ'); window.location = 'signin.php'</script>";
	}
	if (isset($_GET["logout"])) {
		session_destroy();
		echo "<script>alert('ไว้เจอกันใหม่นะคะ'); window.location = 'signin.php'</script>";
	}

  //call user
  $queryuser = "SELECT * FROM users";
  $resultmenu = mysqli_query($connect, $queryuser);

  //delete user
  if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $querydel = "DELETE FROM users WHERE id = $id";
    $resultdel = mysqli_query($connect, $querydel) or die("try");
  }

	if(isset($resultdel)) {
		echo "<script>alert('ลบข้อมูลสำเร็จ!!'); window.location = 'useredit.php'</script>";
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		user | thai-dessert
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
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8">
				<h5 class="text-center my-4">
					รายการอาหาร
                </h5>

          <!-- search -->
          <form action="useredit.php" method="post">
            <div class="row">
              <div class="col-md-9">
                <input type="text" name="user_search" placeholder="ค้นหาชื่อผู้ใช้" class="form-control" required>
              </div>
              <div class="col-md-3">
                <input type="submit" value="ค้นหา" name="search" class="btn btn-dark w-100">
              </div>
            </div>
          </form>


          <!-- all -->
          <form action="useredit.php" method="post">
            <div class="row mt-2">
              <div class="col-md">
                <input type="submit" value="ค้นหาทั้งหมด" name="all_search" class="btn btn-light w-100">
              </div>
            </div>
          </form>

        
                <table class="table table-hover my-3">
                    <thead>
                        <tr>
                            <!-- <th scope="col"></th> -->
                            <th scope="col">username</th>
                            <th scope="col">password</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                            <th class="text center">เวลาที่แก้ไข</th>
                        </tr>
                    </thead>

                    <!-- search -->
                    <?php if(isset($_POST['search'])) {
                      $user_search = $_POST['user_search'];
                      $querysearch = "SELECT * FROM users WHERE username LIKE '%$user_search%' ORDER BY username ASC";
                      $resultsearch = mysqli_query($connect, $querysearch);

                      if (mysqli_num_rows($resultsearch)) {
                        while ($row = $resultsearch->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <!-- <td></td> -->
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>
                              <a href="user-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td>
                              <a href="useredit.php?del=<?php echo $row['id'];?>" class="btn btn-danger w-75"> ลบ </a>
                            </td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                    </tbody>
                    <?php } } } ?>

                    <!-- all search -->
                    <?php if(isset($_POST['all_search'])) {
                      while ($row = $resultmenu->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <!-- <td></td> -->
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>
                              <a href="user-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td>
                              <a href="useredit.php?del=<?php echo $row['id'];?>" class="btn btn-danger w-75"> ลบ </a>
                            </td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                    </tbody>
                    <?php } } ?>
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
