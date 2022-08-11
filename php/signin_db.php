<?php
    include "server.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $querylogin = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $resultlogin = mysqli_query($connect, $querylogin);

    while ($row = $resultlogin->fetch_assoc()) {
        $_SESSION['username'] = $row['username'];
    }
    if (mysqli_num_rows($resultlogin)) {
        echo "<script>alert('ยินดีต้อนรับค่ะ'); window.location = '../index.php'</script>";
    } else {
        echo "<script>alert('username or password incorrect'); window.location = '../index.php'</script>";
    }

?>