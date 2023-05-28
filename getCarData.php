<?php

    include './Admin/_stream/config.php';

    include './_sections/_header.php';

    $id = $_GET['id'];

    $getCarData = mysqli_query($connect, "SELECT vehicle_list.*, vehicles.vehicle_name, vehicles.vehicle_model, login_user.name, car_owner.loc_id, area.area_name FROM `vehicle_list`
                                INNER JOIN vehicles ON vehicles.veh_id = vehicle_list.vehicle_id
                                INNER JOIN login_user ON login_user.email = vehicle_list.user_email
                                INNER JOIN car_owner ON car_owner.email = vehicle_list.user_email
                                INNER JOIN area ON area.id = car_owner.loc_id
                                WHERE vehicle_list.vlist_id = '$id'");
                    
    $fetch_getCarData = mysqli_fetch_assoc($getCarData);


?>

<link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap"
    rel="stylesheet"
/>

<link
    href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap"
    rel="stylesheet"
/>

<link
    href="https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap"
    rel="stylesheet"
/>

<link rel="stylesheet" href="./Assets/fonts/icomoon/style.css" />

<link rel="stylesheet" href="./Assets/css/owl.carousel.min.css" />

<link rel="stylesheet" href="./Assets/css/animate.css" />

<link rel="stylesheet" href="./Assets/css/style.css" />

<div class="content">
    <div class="site-blocks-cover">
        <div class="img-wrap">
            <div class="owl-carousel slide-one-item hero-slider">
                <?php
                $getCarImages = mysqli_query($connect, "SELECT * FROM `vehicle_images` WHERE list_id = '$id'");
                while ($rowImages = mysqli_fetch_assoc($getCarImages)) {
                    echo '
                    <div class="slide">
                        <img
                        src="./Admin/assets/'.$rowImages['img_path'].'"
                        alt="Free Website Template by Free-Template.co"
                        />
                    </div>
                    ';
                }
                ?>
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto align-self-center">
                    <div class="intro">
                        <div class="heading">
                            <h1 class="text-black font-weight-bold"><?php echo $fetch_getCarData['vehicle_name']." - ".$fetch_getCarData['vehicle_model'] ?></h1>
                            <h3 class="text-black font-weight-bold"><?php echo $fetch_getCarData['vehicle_type']?></h3>
                        </div>

                        <div class="text sub-text">
                            <p>
                                <ul>
                                    <li style="color: black !important; font-size: 16px" class="text-black font-weight-bold">Price: Pkr. <?php echo $fetch_getCarData['vehicle_price'] ?> / Day</li>
                                    <li style="color: black !important; font-size: 16px" class="text-black font-weight-bold">Capacity: <?php echo $fetch_getCarData['vehicle_capacity'] ?> Persons</li>
                                    <li style="color: black !important; font-size: 16px" class="text-black font-weight-bold">Owner: <?php echo $fetch_getCarData['name'] ?></li>
                                    <li style="color: black !important; font-size: 16px" class="text-black font-weight-bold">Location: <?php echo $fetch_getCarData['area_name'] ?></li>
                                </ul>
                            </p>

                            <hr style="background-color: black" class="my-5" />

                            <p>

                            <?php
                            if (empty($_SESSION["user"])) {
                                echo '
                                    <a
                                        href="./login.php"
                                        class="btn btn-outline-success mx-3 btn-dark btn-md btn-pill customBtnClass"
                                        >Please Login!</a
                                    >
                                ';
                            }else {
                                $email = $_SESSION["user"];
                                $checkEmail = mysqli_query($connect, "SELECT COUNT(*) AS countedUsers FROM `customers` WHERE email = '$email'");
                                $fetch_checkEmail = mysqli_fetch_assoc($checkEmail);
                                $count = $fetch_checkEmail['countedUsers'];

                                if ($count == 0) {
                                    echo '
                                        <a
                                            href="./login.php"
                                            class="btn btn-outline-success mx-3 btn-dark btn-md btn-pill customBtnClass"
                                            >Please Login!</a
                                        >
                                    ';
                                }else {
                                    echo '
                                        <a
                                            href="confirm_booking.php?id='.$id.'"
                                            class="btn btn-outline-success mx-3 btn-dark btn-md btn-pill customBtnClass"
                                            >Confirm Booking!</a
                                        >
                                    ';
                                }
                            }
                            ?>

                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./Assets/js/jquery-3.3.1.min.js"></script>
<script src="./Assets/js/popper.min.js"></script>
<script src="./Assets/js/bootstrap.min.js"></script>
<script src="./Assets/js/owl.carousel.min.js"></script>
<script src="./Assets/js/main.js"></script>
<?php include './_sections/_footer.php'; ?>
