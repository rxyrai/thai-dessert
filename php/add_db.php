<?php
    include "server.php";
    
        $name = $_POST['name'];
        $price = $_POST['price'];

        $queryadd = "INSERT INTO menu (name, price) VALUES ('$name', '$price')";
        $resultadd = mysqli_query($connect, $queryadd) or die("try");
        
        if ($resultadd) {
            echo "<script>alert('เพิ่มเมนูสำเร็จ!!'); window.location = '../menu.php'</script>";
        }

?>