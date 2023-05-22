<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $msg = '';

    $getDetails = mysqli_query($connect, "SELECT * FROM contact_details WHERE c_id = '1'");
    $fetch_getDetails = mysqli_fetch_assoc($getDetails);
    

    if (isset($_POST['updateDetails'])) {
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $twitter = $_POST['twitter'];


        $updateQuery = mysqli_query($connect, "UPDATE contact_details SET 
        `address`='$address',
        `contact`='$contact',
        `email`='$email',
        `facebook`='$facebook',
        `instagram`='$instagram',
        `twitter`='$twitter'
         WHERE c_id = '1'");

        if ($updateQuery) {
            header("LOCATION: updateDetails.php");
        }else {
            $msg = '
            <div class="alert alert-danger text-center">
                Details Not Updated
            </div>
            ';
        }
        
    }


    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Update Contact Details</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST">
                            <h6>Contact</h6> <hr />
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Office Address</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Address" type="text" value="<?php echo $fetch_getDetails['address'] ?>"  id="example-text-input" name="address" required="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Contact No.</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Contact" type="text" value="<?php echo $fetch_getDetails['contact'] ?>"  pattern="\d*" onkeypress="return isNumberKey(event)" maxlength="11" id="example-text-input" name="contact" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Email" type="text" value="<?php echo $fetch_getDetails['email'] ?>"  id="example-text-input" name="email" required="">
                                </div>
                            </div>

                            <hr>

                            <h6>Social Links</h6> <hr />
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Facebook</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Facebook Link Here" value="<?php echo $fetch_getDetails['facebook'] ?>"  type="text" id="example-text-input" name="facebook" required="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Instagram Link Here" value="<?php echo $fetch_getDetails['instagram'] ?>"  type="text" id="example-text-input" name="instagram" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Twitter</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Twitter Link Here" value="<?php echo $fetch_getDetails['twitter'] ?>"  type="text" id="example-text-input" name="twitter" required="">
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <!-- <label for="example-password-input" class="col-sm-2 col-form-label"></label> -->
                                <div class="col-sm-12" align="right">
                                    <?php include('../_partials/cancel.php') ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="updateDetails">Update Details</button>
                                </div>
                            </div>
                        </form>
                        <h5 align="center"><?php echo $msg ?></h5>
                    </div>
                </div>
            </div>
            
        </div> <!-- end row -->
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
</div> <!-- content -->
<?php include('../_partials/footer.php') ?>
</div>
<!-- End Right content here -->
</div>
<!-- END wrapper -->
<!-- jQuery  -->
<?php include('../_partials/jquery.php') ?>
<!-- Required datatable js -->
<?php include('../_partials/datatable.php') ?>
<!-- Datatable init js -->
<?php include('../_partials/datatableInit.php') ?>
<!-- Buttons examples -->
<?php include('../_partials/buttons.php') ?>
<!-- App js -->
<?php include('../_partials/app.php') ?>
<!-- Responsive examples -->
<?php include('../_partials/responsive.php') ?>
<!-- Sweet-Alert  -->
<?php include('../_partials/sweetalert.php') ?>
<script>
    function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
</script>
</body>

</html>