<?php
    include './Admin/_stream/config.php';

    $alreadyAdded = '';
    $notAdded = '';


if (isset($_POST["register"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    $loc_id = $_POST['loc_id'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];

    // CNIC Front Image Uploading
    $cnic_front= $_FILES['cnic_front'];
    $cnicFront= $cnic_front['name'];
    $cnicFront=preg_replace("/\s+/", "", $cnicFront);
    $tempCnicFront= $cnic_front['tmp_name'];

    $file_extCnicFront=pathinfo($cnicFront,PATHINFO_EXTENSION);
    $cnicFront=pathinfo($cnicFront,PATHINFO_FILENAME);

    $newNameCNICFront = $cnicFront.date("miYis").'.'.$file_extCnicFront;

    $cnic_front_path = "./Admin/__uploadedFiles__/".$newNameCNICFront;

    if (move_uploaded_file($tempCnicFront, $cnic_front_path)) {
        // echo "Done";
    }else{
        echo "Error File Uploading";
    }

    // CNIC Back Image Uploading
    $cnic_back= $_FILES['cnic_back'];
    $cnicBack= $cnic_back['name'];
    $cnicBack=preg_replace("/\s+/", "", $cnicBack);
    $tempCnicBack= $cnic_back['tmp_name'];

    $file_extCnicBack=pathinfo($cnicBack,PATHINFO_EXTENSION);
    $cnicBack=pathinfo($cnicBack,PATHINFO_FILENAME);

    $newNameCNICBack = $cnicBack.date("miYiss").'.'.$file_extCnicBack;

    $cnic_back_path = "./Admin/__uploadedFiles__/".$newNameCNICBack;

    if (move_uploaded_file($tempCnicBack, $cnic_back_path)) {
        // echo "Done";
    }else{
        echo "Error File Uploading";
    }


    $checkQuery = mysqli_query($connect, "SELECT COUNT(*) AS countedUsers FROM customers WHERE email = '$email' OR contact = '$contact' OR cnic = '$cnic'");
    $fetch_checkQuery = mysqli_fetch_assoc($checkQuery);
    $count = $fetch_checkQuery['countedUsers'];

    if ($count > 0) {
        $checkStatus = mysqli_query($connect, "SELECT verification_status FROM customers WHERE email = '$email' OR contact = '$contact' OR cnic = '$cnic'");
        $fetch_checkStatus = mysqli_fetch_assoc($checkStatus);
        $status = $fetch_checkStatus['verification_status'];

        $confirmationCode = random_int(100000, 999999);

        $updateVerificationCode = mysqli_query($connect, "UPDATE customers SET confirmation_code = '$confirmationCode' WHERE email = '$email' OR contact = '$contact' OR cnic = '$cnic'");

        // $to      = $email;
        // $subject = "Incomplte Verification - Service Provider Email Verification";
        // $message = 'Your Email Verification Code is ' .$confirmationCode.'' ."\r\n". '. Click here to complete your account verification: careskin.info/FYP/verification_customer.php?email='.$email. "\r\n". '';
        // $from    = "testing@careskin.info";
        // $headers = "From: $from";

        // $mailConfirm = mail($to, $subject, $message, $headers);

        if ($status === '0') {
            header("LOCATION: mail_verification_customer.php?email=".$email."");
        }else {
            $alreadyAdded = '
            <div class="alert alert-danger text-center">
                User already added with given details!
            </div>
            ';
        }
    }else {
        $confirmationCode = random_int(100000, 999999);
        
        
        $insertQuery = mysqli_query($connect, "INSERT INTO `customers`(
                `name`,
                `email`,
                `password`,
                `contact`,
                `loc_id`,
                `address`,
                `cnic`,
                `cnic_front_path`,
                `cnic_back_path`,
                `confirmation_code`
                ) VALUES (
                '$name',
                '$email',
                '$password',
                '$contact',
                '$loc_id',
                '$address',
                '$cnic',
                '$cnic_front_path',
                '$cnic_back_path',
                '$confirmationCode'
            )");
        if ($insertQuery) {
            // $to      = $email;
            // $subject = "Service Provider Email Verification";
            // $message = 'Your Email Verification Code is ' .$confirmationCode.'' ."\r\n". '. Click here to complete your account verification: careskin.info/FYP/verification_customer.php?email='.$email. "\r\n". '';
            // $from    = "testing@careskin.info";
            // $headers = "From: $from";

            // $mailConfirm = mail($to, $subject, $message, $headers);
            
            if($insertQuery) {
                header("LOCATION: mail_verification_customer.php?email=".$email."");
            }
        }else {
        $notAdded = '
        <div class="alert alert-danger text-center">
            User not added! Please try again!
        </div>
        ';
        }
    }
}

    include './_sections/_header.php';

?>


<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>



<section class="ftco-section contact-section">
    <div class="container">
    <a href=""  class="btn btn-info btn-lg p-4 my-3">Account info</a>
    <a  href="" class="btn btn-success btn-lg p-4 my-3">Booking History</a>
    <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 block-9 mb-md-5">
            <form method="POST" enctype="multipart/form-data" class="bg-light p-5 contact-form">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required="" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Contact</label>
                        <input type="text"  data-inputmask="'mask': '039999999999'" required="" name="contact" class="form-control contact" placeholder="Contact Number" maxlength = "11" >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Type Password" required="" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Select City</label>
                        
                        <?php
                        
                        echo '<select class="form-control location" name="loc_id" required>';
                        
                        $queryLocations = mysqli_query($connect, "SELECT * FROM area");

                        while ($rowAreas = mysqli_fetch_assoc($queryLocations)) {
                            echo '<option value='.$rowAreas['id'].'>'.$rowAreas['area_name'].'</option>';
                        }

                        echo '</select>';
                        
                        ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Your Address" required="" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>CNIC #</label>
                        <input type="text"  data-inputmask="'mask': '9999999999999'" required="" name="cnic" class="form-control contact" placeholder="CNIC Number" maxlength = "13" >
                    </div>

                    <div class="form-group col-md-3">
                        <label>CNIC Image Front</label>
                        <input type="file" class="form-control" name="cnic_front" required="" />
                    </div>

                    <div class="form-group col-md-3">
                        <label>CNIC Image Back</label>
                        <input type="file" class="form-control" name="cnic_back"  required="" />
                    </div>
                </div>

                <hr />
                
                <div class="form-group">
                    <input type="submit" value="Register" name="register" class="btn btn-primary py-3 px-5">
                </div>
            </form>
        </div>
    </div>

  </div>
</section>

<script>
    $(".contact").inputmask();

   </script>
<?php include './_sections/_footer.php'; ?>
