<?php include "php/server.php"; 

if (isset($_GET["logout"])) {
    session_destroy();
    echo "<script>alert('ไว้เจอกันใหม่นะคะ'); window.location = 'index.php'</script>";
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