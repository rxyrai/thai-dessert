<?php

    session_start();

    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "thai-dessert";

    $connect = mysqli_connect($server, $user, $password, $dbname);
    if (!$connect) {
        die("failed to connect");
    }


?>