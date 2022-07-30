<?php
    include "server.php";

    if (isset($_POST['edit'])) {
        $id = mysqli_real_escape_string($connect, $_POST['menu_id']);

        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);

        $queryedit = "UPDATE menu SET name = '$name', price = '$price' WHERE id = $id";
        $resultedit = mysqli_query($connect, $queryedit) or die("try");

        if ($resultedit) {
            echo "<script>alert('แก้ไขสำเร็จ!!'); window.location = '../menu.php'</script>";
        }
    }



?>