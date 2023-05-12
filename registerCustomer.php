<?php

include './Admin/_stream/config.php';



include './_sections/_header.php';

?>


<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>



<section class="ftco-section contact-section">
    <div class="container">
    <h3>Registration (Booking)</h3>
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
                        <input type="text"  data-inputmask="'mask': '039999999999'" required="" class="form-control contact" placeholder="Contact Number" maxlength = "11" >
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
                        <input type="text"  data-inputmask="'mask': '9999999999999'" required="" class="form-control contact" placeholder="CNIC Number" maxlength = "13" >
                    </div>

                    <div class="form-group col-md-3">
                        <label>CNIC Image Front</label>
                        <input type="file" class="form-control" name="cnic_front"  required="" />
                    </div>

                    <div class="form-group col-md-3">
                        <label>CNIC Image Back</label>
                        <input type="file" class="form-control" name="cnic_back"  required="" />
                    </div>
                </div>


               

                <hr />
                
                <div class="form-group">
                    <input type="submit" value="Register" class="btn btn-primary py-3 px-5">
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
