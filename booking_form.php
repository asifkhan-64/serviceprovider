<?php
    

    if(isset($_POST["btn"])) {
        if (empty($_POST['car_select'])) {
            $car_select = '';
        }else {
            $car_select = $_POST['car_select'];
        }

        $no_passengers = $_POST['no_passengers'];        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $additional_info = $_POST['additional_info'];

        $pickup = $_GET['pickup'];
        $dropoff = $_GET['dropoff'];
        $pickupdate = $_GET['pickupdate'];
        $hours = $_GET['hours'];
        $pickuptime = $_GET['pickuptime'];


        if (!empty($car_select)) {
            header('LOCATION: confirmDetails.php?pickup='.$pickup.'&dropoff='.$dropoff.'&pickupdate='.$pickupdate.'&hours='.$hours.'&pickuptime='.$pickuptime.'&car_select='.$car_select.'&first_name='.$first_name.'&last_name='.$last_name.'&email='.$email.'&phone='.$phone.'&additional_info='.$additional_info.'&no_passengers='.$no_passengers.'');
        }else {
            echo '<script>alert("Please Select Fleet! No Fleet Selected.")</script>';
        }
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

  /* @media only screen and (max-width: 425px) {
    .customclass {
        display: none !important;
    }
  } */
</style>




<form method="POST" enctype="multipart/form">
<section class="ftco-section bg-light">
  <div class="container">
    <h1 class="text-center">
        Please complete the form to place your order
    </h1>
    <hr class="mb-5" />
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">No. Of Passengers</label>
                <select name="no_passengers" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="First Name" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Phone" required />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Additional Information</label>
                <textarea name="additional_info" class="form-control" cols="10" rows="5" placeholder="Additional Information" required></textarea>
            </div>
        </div>
    </div>
  </div>
</section>


<section class="ftco-section bg-light" style="margin-top: -8.3%">
  <div class="container">
    <h2 class="text-center mb-3">
        Please Select Your Vehicle Choice
    </h2>
    <hr class="mb-5" />
    <div class="row">
      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-1.jpg"  id="ck20" name="car_select">
            <label class="custom-control-label" for="ck20">
                <img src="images/car-1.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-1.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-2.jpg"  id="ck21" name="car_select">
            <label class="custom-control-label" for="ck21">
                <img src="images/car-2.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-2.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-3.jpg"  id="ck22" name="car_select">
            <label class="custom-control-label" for="ck22">
                <img src="images/car-3.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-3.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-4.jpg"  id="ck23" name="car_select">
            <label class="custom-control-label" for="ck23">
                <img src="images/car-4.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-4.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-5.jpg"  id="ck24" name="car_select">
            <label class="custom-control-label" for="ck24">
                <img src="images/car-5.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-5.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-6.jpg"  id="ck25" name="car_select">
            <label class="custom-control-label" for="ck25">
                <img src="images/car-6.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-6.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-7.jpg"  id="ck26" name="car_select">
            <label class="custom-control-label" for="ck26">
                <img src="images/car-7.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-7.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-8.jpg"  id="ck27" name="car_select">
            <label class="custom-control-label" for="ck27">
                <img src="images/car-8.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-8.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" value="car-9.jpg"  id="ck28" name="car_select">
            <label class="custom-control-label" for="ck28">
                <img src="images/car-9.jpg" style="width: 107.5%; margin-left: -8%" alt="" class="img rounded d-flex align-items-end customHover">
                <input type="hidden" value="car-9.jpg" name="car" />
            </label>

            <div class="text">
                <h2 class="mb-0"><a>Range Rover</a></h2>
                <div class="d-flex mb-3">
                <span class="cat" style="color: black">Capacity: 8 - 10 Persons</span>
            </div>
                <span class="price">Price: AUD 500 /Hour</span>
            </div>
        </div>
      </div>
    </div>
    <hr class="mb-5" />
  
    <div class="text-center">
        <button type="submit" name="btn" class="btn btn-dark btn-lg p-4">Confirm Booking</button>
    </div>
  </div>

</section>

</form>

<?php include './_sections/_footer.php'; ?>
