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
		edituser | thai-dessert
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include "php/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
            <div class="card my-3">
                    <div class="card-header text-center"> แก้ไขผู้ใช้งาน </div>
                    <div class="card-body">
                        <?php
                            if (isset($_GET['id'])) {
                                $id = mysqli_real_escape_string($connect, $_GET['id']);
                                $query = "SELECT * FROM users WHERE id = $id";
                                $result = mysqli_query($connect, $query);

                                if (mysqli_num_rows($result)) {
                                    $user = mysqli_fetch_array($result);
                        ?>
                        <form action="php/edit_user_db.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                            <label for="food">username</label>
                            <input type="text" name="username" value="<?php echo $user['username']?>" class="form-control my-2">
                            <label for="price">password</label>
                            <input type="text" name="password" value="<?php echo $user['password']?>" class="form-control my-2">
                            <button type="submit" class="btn btn-success mt-2 w-100" name="edit"> แก้ไขข้อมูล </button>
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