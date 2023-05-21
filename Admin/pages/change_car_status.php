<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $id = $_GET['id'];

    $getStatus = mysqli_query($connect, "SELECT * FROM `vehicle_list` WHERE vlist_id = '$id'");
    $fetch_getStatus = mysqli_fetch_assoc($getStatus);
    $status = $fetch_getStatus['vehicle_status'];

    if ($status === '0') {
        $updateQuery = mysqli_query($connect, "UPDATE vehicle_list SET vehicle_status = '1' WHERE vlist_id = '$id'");
    }elseif ($status === '1') {
        $updateQuery = mysqli_query($connect, "UPDATE vehicle_list SET vehicle_status = '0' WHERE vlist_id = '$id'");
    }

    if ($updateQuery) {
        header("LOCATION: vehicles_list.php");
    }

?>