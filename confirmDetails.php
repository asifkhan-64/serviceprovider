<?php
    if(isset($_POST["btn"])) {
        // $file = $_FILES['file'];
        $car_select = $_GET['car_select'];
        $car_select = $_GET['car_select'];

        print_r($file);
        $pickup = $_GET['pickup'];
        $dropoff = $_GET['dropoff'];
        $pickupdate = $_GET['pickupdate'];
        $hours = $_GET['hours'];
        $pickuptime = $_GET['pickuptime'];
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $additional_info = $_GET['additional_info'];
        $no_passengers = $_GET['no_passengers'];


    }

    include './_sections/_header.php';

?>

<style>
  img:hover {
    transition: transform .5s ease;
  }

 @media only screen and (min-width: 426px) {
    .customclass {
        display: none !important;
    }
  }

  form {
    color: black;
  }
  

  /* @media only screen and (max-width: 425px) {
    .customclass {
        display: none !important;
    }
  } */
</style>

<?php

    $pickup = $_GET['pickup'];
    $dropoff = $_GET['dropoff'];
    $pickupdate = $_GET['pickupdate'];
    $hours = $_GET['hours'];
    $pickuptime = $_GET['pickuptime'];
    $car_select = $_GET['car_select'];
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $additional_info = $_GET['additional_info'];
    $no_passengers = $_GET['no_passengers'];

?>




<form method="POST" enctype="multipart/form">
<section class="ftco-section bg-light">
  <div class="container">
    <h1 class="text-center">
        Personal Information
    </h1>
    <hr class="mb-5" />
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">No of Passengers: </label>
                <span><?php echo $no_passengers; ?></span>
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Pick-up Location: </label>
                <span><?php echo $pickup; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Drop-off Location: </label>
                <span><?php echo $dropoff; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Pickup Date: </label>
                <span><?php echo $pickupdate; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Hours: </label>
                <span><?php echo $hours; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Pickup Time: </label>
                <span><?php echo $pickuptime; ?></span>
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">First Name: </label>
                <span><?php echo $first_name; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Last Name: </label>
                <span><?php echo $last_name; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email: </label>
                <span><?php echo $email; ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Phone: </label>
                <span><?php echo $phone; ?></span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Additional Information: </label>
                <span>
                    <?php 
                    if (empty($additional_info)) {
                        echo 'No additional information!';
                    }else {
                        echo $additional_info;
                    }
                    ?>
                </span>
            </div>
        </div>
    </div>
  </div>
</section>


<section class="ftco-section bg-light" style="margin-top: -8.3%">
  <div class="container">
    <h2 class="text-center mb-3">
        Selected Vehicle
    </h2>
    <hr class="mb-5" />
    <div class="row">
      <div class="col-md-5">
        <div class="car-wrap rounded ftco-animate">
          <div class="img rounded d-flex align-items-end customHover" style="background-image: url(images/<?php echo $car_select ?>);">
          </div>
        </div>
      </div>
    </div>

    <input type="file" name="file" value="images/car-6.jpg" />

    <hr class="mb-5" />
    <div class="text-center">
        <button type="submit" name="btn" class="btn btn-dark btn-lg p-4">Confirm Booking Details</button>
    </div>
  </div>

</section>

</form>

<?php include './_sections/_footer.php'; ?>
