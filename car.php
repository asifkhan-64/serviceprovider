<?php 

  include './_sections/_header.php'; 

?>

<style>
  img:hover {
    transition: transform .5s ease;
  }
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Our Fleet <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Choose Your Car</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">

    <?php
    $getCars = mysqli_query($connect, "SELECT vehicle_images.*, vehicle_list.vehicle_price, vehicle_list.vehicle_id, vehicles.vehicle_name, vehicles.vehicle_model FROM `vehicle_images`
    INNER JOIN vehicle_list ON vehicle_list.vlist_id = vehicle_images.list_id
    INNER JOIN vehicles ON vehicles.veh_id = vehicle_list.vehicle_id
    GROUP BY vehicle_images.list_id");

      while ($RowGetCars = mysqli_fetch_assoc($getCars)) {
        echo '
        <div class="col-md-4">
          <div class="car-wrap rounded ftco-animate">
          <a href="getCarData.php?id='.$RowGetCars['list_id'].'">
            <div class="img rounded d-flex align-items-end customHover" style="background-image: url(./Admin/assets/'.$RowGetCars['img_path'].');">
            </div>
            <div class="text">
                <h2 class="mb-0">'.$RowGetCars['vehicle_name'].'</h2>
                <div class="d-flex mb-3">
                    <span class="cat" style="color: black">'.$RowGetCars['vehicle_name'].' - '.$RowGetCars['vehicle_model'].'</span>
                    <p class="price ml-auto">PKR '.$RowGetCars['vehicle_price'].' <span style="color: black">/day</span></p>
                </div>
            </div>
          </a>
          </div>
        </div>
        ';
      }
    ?>

      

    </div>
  </div>
</section>

<?php include './_sections/_footer.php'; ?>
