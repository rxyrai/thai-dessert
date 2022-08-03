<?php
    include "server.php";

    if (isset($_POST['edit'])) {
        $id = mysqli_real_escape_string($connect, $_POST['user_id']);

        $name = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        $queryedit = "UPDATE users SET username = '$name', password = '$password' WHERE id = $id";
        $resultedit = mysqli_query($connect, $queryedit) or die("try");

        if ($resultedit) {
            echo "<script>alert('แก้ไขสำเร็จ!!'); window.location = '../useredit.php'</script>";
        }
    }



?>