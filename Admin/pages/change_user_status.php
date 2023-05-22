<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $email = $_GET['email'];

    $getStatus = mysqli_query($connect, "SELECT * FROM customers WHERE email = '$email'");
    $fetch_getStatus = mysqli_fetch_assoc($getStatus);
    $status = $fetch_getStatus['login_status'];

    if ($status === '1') {
        $updateQuery = mysqli_query($connect, "UPDATE customers SET login_status = '2' WHERE email = '$email'");
    }elseif ($status === '2') {
        $updateQuery = mysqli_query($connect, "UPDATE customers SET login_status = '1' WHERE email = '$email'");
    }

    if ($updateQuery) {
        header("LOCATION: users_list.php");
    }

?>