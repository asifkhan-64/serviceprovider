<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $email = $_GET['email'];

    $getStatus = mysqli_query($connect, "SELECT * FROM login_user WHERE email = '$email'");
    $fetch_getStatus = mysqli_fetch_assoc($getStatus);
    $status = $fetch_getStatus['status'];

    if ($status === '0') {
        $updateQuery = mysqli_query($connect, "UPDATE login_user SET status = '1' WHERE email = '$email'");
    }elseif ($status === '1') {
        $updateQuery = mysqli_query($connect, "UPDATE login_user SET status = '2' WHERE email = '$email'");
    }elseif ($status === '2') {
        $updateQuery = mysqli_query($connect, "UPDATE login_user SET status = '0' WHERE email = '$email'");
    }

    if ($updateQuery) {
        header("LOCATION: owner_list.php");
    }

?>