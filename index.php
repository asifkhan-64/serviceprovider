<?php 

include './Admin/_stream/config.php';

if (isset($_POST["submitData"])) {
    $pickup = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];
    $pickupdate = $_POST['pickupdate'];
    $hours = $_POST['hours'];
    $pickuptime = $_POST['pickuptime'];
    
    header('LOCATION: booking_form.php?pickup='.$pickup.'&dropoff='.$dropoff.'&pickupdate='.$pickupdate.'&hours='.$hours.'&pickuptime='.$pickuptime.'');
    
}

    include './_sections/_header.php';
?>

<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                    <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                    <a class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                    <a href="#bookingForm" class="btn btn-primary py-3 px-4">Send Inquiry</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top"  id="bookingForm">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <form method="POST" class="request-form ftco-animate bg-primary">
                            <h2>Make your booking</h2>
                            <div class="form-group">
                                <label for="" class="label">Pick-up location</label>
                                <input type="text" name="pickup" required="" placeholder="Enter Pick-up Location" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">No. of Passengers Seats</label>
                                <input type="number"  name="seats" placeholder="Number of Passengers" class="form-control" required="">
                            </div>

                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Pick-up date</label>
                                    <input type="text"  name="pickupdate"  class="form-control" id="book_pick_date" placeholder="Date" required="">
                                </div>

                                <div class="form-group ml-5">
                                    <label for="" class="label">Booking Duration</label>
                                    <select class="form-control"  name="days"  style="background-color: #1089ff !important;">
                                        <option value="1-Day">1 Day</option>
                                        <option value="2-Days">2 Days</option>
                                        <option value="3-Days">3 Days</option>
                                        <option value="4-Days">4 Days</option>
                                        <option value="5-Days">5 Days</option>
                                        <option value="6-Days">6 Days</option>
                                        <option value="7-Days">7 Days</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="" class="label">Pick-up time</label>
                                <input type="text" name="pickuptime" class="form-control" id="time_pick" placeholder="Time">
                            </div> -->
                            <div class="form-group">
                                <input type="submit" name="submitData" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Better Way to find Rent Cars</h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Select the Best Deal</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Our Rent Cars</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">

                    <?php

                    $getCars = mysqli_query($connect, "SELECT vehicle_images.*, vehicle_list.vehicle_price, vehicle_list.vehicle_id, vehicles.vehicle_name, vehicles.vehicle_model FROM `vehicle_images`
                    INNER JOIN vehicle_list ON vehicle_list.vlist_id = vehicle_images.list_id
                    INNER JOIN vehicles ON vehicles.veh_id = vehicle_list.vehicle_id
                    GROUP BY vehicle_images.list_id");

                    while ($rowCars = mysqli_fetch_assoc($getCars)) {
                        echo '
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(./Admin/assets/'.$rowCars['img_path'].');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0">'.$rowCars['vehicle_name'].'</h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat" style="color: black">'.$rowCars['vehicle_name'].' - '.$rowCars['vehicle_model'].'</span>
                                        <p class="price ml-auto">PKR '.$rowCars['vehicle_price'].' <span style="color: black">/day</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './aboutShortCode.php'; ?>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Our Latest Services</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Wedding Ceremony</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">City Transfer</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Airport Transfer</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Whole City Tour</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './testimonial.php'; ?>

<?php include './_sections/_footer.php';  ?>