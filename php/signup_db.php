<?php
    include "server.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $querysignup = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $resultsignup = mysqli_query($connect, $querysignup) or die('try');

    if ($resultsignup) {
        echo "<script>alert('สร้างบัญชีสำเร็จ!! กรุณาเข้าสู่ระบบ'); window.location= '../signin.php'</script>";
    }

?>