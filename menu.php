<?php include "php/server.php"; 

if (isset($_GET["logout"])) {
    session_destroy();
    echo "<script>alert('ไว้เจอกันใหม่นะคะ'); window.location = 'index.php'</script>";
  }

  //menu
  $querycall = "SELECT * FROM menu";
  $resultcall = mysqli_query($connect, $querycall);

  //del
  if (isset($_GET['del'])) {
      $id = $_GET['del'];

      $querydel = "DELETE FROM menu WHERE id = $id";
      $resultdel = mysqli_query($connect, $querydel) or die('try');

      if ($resultdel) {
          echo "<script>alert('ลบเมนูสำเร็จ!!'); window.location = 'menu.php'</script>";
      }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thai-dessert</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "php/navbar.php"; ?>
<div class="container mt-3">
    <div class="row">
        <div class="<?php if (isset($_SESSION['username'])) { echo 'col-md-12';}  else {echo 'col-md-8';}?>">

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
            
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ชื่อเมนู</th>
                      <th scope="col">ราคา (บาท)</th>
                    <?php if(isset($_SESSION['username'])) { ?>
                      <th scope="col">ลบเมนู</th>
                      <th scope="col">แก้ไขเมนู</th>
                      <th scope="col">เวลาที่แก้ไขล่าสุด</th>
                    <?php } ?>
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
                            <td><a href="menu.php?del=<?php echo $row['id'] ?>" class="btn btn-danger">ลบ</a></td>
                            <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">แก้ไข</a></td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                    </tbody>
                    <?php } } } ?>


                  <!-- all menu -->
                  <?php 
                    if (isset($_POST['all_search'])) {
                        while ($row = $resultcall->fetch_assoc()) { ?>
                  <tbody>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                    <?php if(isset($_SESSION['username'])) { ?>
                        <td><a href="menu.php?del=<?php echo $row['id'] ?>" class="btn btn-danger">ลบ</a></td>
                        <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">แก้ไข</a></td>
                        <td><?php echo $row['time']; ?></td>
                    <?php } ?>
                    </tr>
                  </tbody>
                    <?php } } ?>
                </table>
			</div>
        
            <?php if (!isset($_SESSION['username'])) {  ?>
            <div class="col-md-4"><div class="card">
                <div class="card-header" style="text-align: center;">
                    เข้าสู่ระบบ
                </div>
                <div class="card-body">
                    <form action="php/signin_db.php" method="post">
                        <p class="form-label">username</p>
                        <input type="text" name="username" id="" placeholder="ใส่ username" required class="form-control">
                        <p class="form-label">password</p>
                        <input type="password" name="password" id="" placeholder="ใส่ password" required class="form-control">
                        <input type="submit" name="submit" value="sign in" class="btn btn-success w-100 mt-2">
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

    <script src="js/bootstrap.js"></script>
</body>
</html>