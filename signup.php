<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup | thai-dessert</title>
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
                    <div class="card-header text-center"> สร้างบัญชีใหม่ </div>
                    <div class="card-body">
                        <form action="php/signup_db.php" method="post">
                            <label for="username">username</label>
                            <input type="text" name="username" placeholder="enter username" class="form-control">
                            <label for="password">password</label>
                            <input type="password" name="password" placeholder="enter password" class="form-control">
                            <div class="text-muted mt-1"> มีบัญชีแล้ว? <a href="signin.php">เข้าสู่ระบบ</a> </div>
                            <button type="submit" class="btn btn-success mt-2 w-100"> สร้างบัญชี </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
</body>
</html>