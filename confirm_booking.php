<?php
    include './Admin/_stream/config.php';

    $alreadyAdded = '';
    $notAdded = '';

    $id = $_GET['id'];
    

if (isset($_POST["booked"])) {
    $name = $_POST['name'];
    $emailUser = $_POST['email'];
    $contact = $_POST['contact'];
    $booking_date = $_POST['booking_date'];
    $persons_booking = $_POST['persons_booking'];
    $days_booking = $_POST['days_booking'];
    $veh_list_id = $_POST['veh_list_id'];
    $veh_booker_id = $_POST['veh_booker_id'];

    $insertQuery = mysqli_query($connect, "INSERT INTO bookings(
        booking_date,
        persons_booking,
        days_booking,
        veh_list_id,
        veh_booker_id
    )VALUES(
        '$booking_date',
        '$persons_booking',
        '$days_booking',
        '$veh_list_id',
        '$veh_booker_id'
    )");

    if ($insertQuery) {
        $getCarData = mysqli_query($connect, "SELECT vehicle_list.*, vehicles.* FROM `vehicle_list`
        INNER JOIN vehicles ON vehicles.veh_id = vehicle_list.vehicle_id
        WHERE vehicle_list.vlist_id = '$veh_list_id'");
        $fetch_getCarData = mysqli_fetch_assoc($getCarData);

        $vehicle = $fetch_getCarData['vehicle_name']." - ".$fetch_getCarData['vehicle_model'];

        $emailOwner = $fetch_getCarData['user_email'];

        $maxIdQuery = mysqli_query($connect, "SELECT MAX(booking_id) AS book_id FROM `bookings` WHERE veh_booker_id = 'veh_booker_id'");
        $fetch_maxIdQuery = mysqli_fetch_assoc($maxIdQuery);
        $maxId = $fetch_maxIdQuery['book_id'];

        // $to      = $emailOwner;
        // $subject = "New Booking";
        // $message = 'Hello! Mr. ' .$name.', contact number '.$contact.' requested a booking, please check booking details in' ."\r\n". ': careskin.info/FYP/Admin/index.php. Booking request for a vehicle: '.$vehicle.'.';
        // $from    = "testing@careskin.info";
        // $headers = "From: $from";

        // $mailConfirm = mail($to, $subject, $message, $headers);

        // if ($mailConfirm) {
            // $to      = $emailOwner;
            // $subject = "Booking Details";
            // $message = 'Hello! Mr. ' .$name.'. Your booking for '.$vehicle.' request has been forwarded to vehicle owner and will contact you in time. If you have any query please feel free to contact our customer support team. Please check booking details in ' ."\r\n". ': careskin.info/FYP/booking_details.php?id='.$veh_list_id.'&reqId='.$maxId.'';
            // $from    = "testing@careskin.info";
            // $headers = "From: $from";

            // $mailConfirmUser = mail($to, $subject, $message, $headers);

            // if ($mailConfirmUser) {
                header("LOCATION: thankyou_booking.php");
            // }
        // }


    }
}

    include './_sections/_header.php';

    $getDataUser = mysqli_query($connect, "SELECT customers.*, area.area_name FROM customers
                                INNER JOIN area ON area.id = customers.loc_id
                                WHERE customers.email = '$email' AND customers.login_status = '1'");
    $fetch_getDataUser = mysqli_fetch_assoc($getDataUser);

?>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<section class="ftco-section contact-section">
    <div class="container">
    <h3>Confirm Booking</h3>
    <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 block-9 mb-md-5">
            <form method="POST" enctype="multipart/form-data" class="bg-light p-5 contact-form">
                <h4>Personal Details <span style="font-size: 14px; color: red"><i> (Personal Details can't be changed)</i></span></h4> <hr />
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" readonly="" class="form-control" name="name" value="<?php echo $fetch_getDataUser['name'] ?>" placeholder="Your Name" required="" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Contact</label>
                        <input type="text" readonly="" data-inputmask="'mask': '039999999999'" value="<?php echo "0".$fetch_getDataUser['contact'] ?>"  required="" name="contact" class="form-control contact" placeholder="Contact Number" maxlength = "11" >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" readonly="" class="form-control" name="email"  value="<?php echo $fetch_getDataUser['email'] ?>" placeholder="Email" required="" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <input type="text" readonly="" class="form-control" value="<?php echo $fetch_getDataUser['address'].", ".$fetch_getDataUser['area_name'] ?>" name="address" placeholder="Your Address" required="" />
                    </div>
                </div>

                <hr />

                <h4>Booking Details <span style="font-size: 14px; color: red"><i> (Enter your booking details)</i></span></h4>
                
                <hr />

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Booking Date</label>
                        <input type="date" class="form-control" name="booking_date" placeholder="Date" required="" />
                    </div>

                    <div class="form-group col-md-3">
                        <label>Persons</label>
                        <select name="persons_booking" class="form-control">
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

                    <div class="form-group col-md-3">
                        <label>Booking Duration</label>
                        <select name="days_booking" class="form-control">
                            <option value="1-Day">1 Day</option>
                            <option value="2-Days">2 Days</option>
                            <option value="3-Days">3 Days</option>
                            <option value="4-Days">4 Days</option>
                            <option value="5-Days">5 Days</option>
                            <option value="6-Days">6 Days</option>
                            <option value="7-Days">7 Days</option>
                            <option value="10-Days">10 Days</option>
                            <option value="15-Days">15 Days</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="veh_list_id" value="<?php echo $id ?>">
                <input type="hidden" name="veh_booker_id" value="<?php echo $fetch_getDataUser['customer_id'] ?>">

                <hr />
                
                <div class="form-group">
                    <input type="submit" value="Confirm Booking!" name="booked" class="btn btn-primary py-3 px-5">
                </div>
            </form>
        </div>
    </div>

  </div>
</section>


<?php include './_sections/_footer.php'; ?>
