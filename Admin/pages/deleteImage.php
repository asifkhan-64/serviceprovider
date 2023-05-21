<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $id = $_GET['id'];
    $urlId = $_GET['urlId'];

    $deleteQuery = mysqli_query($connect, "DELETE FROM `vehicle_images` WHERE img_id = '$id'");

    if ($deleteQuery) {
        header("LOCATION: add_vehicle_images.php?id=".$urlId."");
    }

?>