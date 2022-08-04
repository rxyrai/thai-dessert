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
    $resultdel = mysqli_query($connect, $querydel) or die("try");
  }

	if(isset($resultdel)) {
		echo "<script>alert('ลบเมนูสำเร็จ!!'); window.location = 'menu.php'</script>";
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
<?php include "php/navbar.php"; ?>
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h5 class="text-center my-4">
					รายการอาหาร
        </h5>

          <!-- search -->
          <form action="menu.php" method="post">
            <div class="row">
              <div class="col-md-9">
                <input type="text" name="menu_search" placeholder="ค้นหาชื่อเมนูอาหาร" class="form-control mb-1" required>
              </div>
              <div class="col-md-3">
                <input type="submit" value="ค้นหา" name="search" class="btn btn-dark w-100">
              </div>
            </div>
          </form>


          <!-- all -->
          <form action="menu.php" method="post">
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
                            <th scope="col">ชื่อเมนู</th>
                            <th scope="col">ราคา(บาท)</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                            <th class="text center">เวลาที่แก้ไข</th>
                        </tr>
                    </thead>

                    <!-- search -->
                    <?php if(isset($_POST['search'])) {
                      $menu_name = $_POST['menu_search'];
                      $querysearch = "SELECT * FROM menu WHERE name LIKE '%$menu_name%' ORDER BY name ASC";
                      $resultsearch = mysqli_query($connect, $querysearch);

                      if (mysqli_num_rows($resultsearch)) {
                        while ($row = $resultsearch->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <!-- <td></td> -->
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                              <a href="menu-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td>
                              <a href="menu.php?del=<?php echo $row['id'];?>" class="btn btn-danger"> ลบ </a>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                              <a href="menu-edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning w-100">แก้ไข</a>
                            </td>
                            <td>
                              <a href="menu.php?del=<?php echo $row['id'];?>" class="btn btn-danger w-100"> ลบ </a>
                            </td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                    </tbody>
                    <?php } } ?>
                </table>
			</div>
	
		</div>
	</div>

	<!-- add script ได้ตัวเดียว -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
