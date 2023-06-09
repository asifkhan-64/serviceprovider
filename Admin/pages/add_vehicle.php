<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $alreadyAdded = '';
    $added = '';
    $error= '';

    if (isset($_POST['addVehicle'])) {
        $user_email         = $_POST['user_email'];
        $vehicle_id         = $_POST['vehicle_id'];
        $vehicle_capacity   = $_POST['vehcile_capacity'];
        $vehicle_price      = $_POST['vehcile_price'];
        $vehicle_type       = $_POST['vehicle_type'];
        

        $insertQuery = mysqli_query($connect, "INSERT INTO `vehicle_list`(
            `user_email`,
             `vehicle_id`,
              `vehicle_capacity`,
               `vehicle_price`,
                `vehicle_type`
                ) VALUES (
                    '$user_email',
                     '$vehicle_id',
                      '$vehicle_capacity',
                       '$vehicle_price',
                        '$vehicle_type'
                     
            )");
        if (!$insertQuery) {
            $error = 'Vehicle Not Added! Try agian!';
        }else {
            header("LOCATION: vehicles_list.php");
        }
        
    }


    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Add Vehicle</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Vehicle Model</label>
                                <input type="hidden" value="<?php echo $_SESSION["user"] ?>" name="user_email">
                                <div class="col-sm-4">
                                    <?php
                                    $getVehicles = mysqli_query($connect, "SELECT * FROM vehicles");
                                    
                                    echo '<select class="form-control vehicle" name="vehicle_id">';
                                    while ($rowVehicles = mysqli_fetch_assoc($getVehicles)) {
                                        echo '<option value="'.$rowVehicles['veh_id'].'">'.$rowVehicles['vehicle_name'].' - '.$rowVehicles['vehicle_model'].'</option>';
                                    }
                                    echo '</select>';
                                    ?>
                                </div>


                                <label for="example-text-input" class="col-sm-2 col-form-label">Seat Capacity</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e: 4" type="number" id="example-text-input" name="vehcile_capacity" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Rent Price</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e: 4000" type="number" id="example-text-input" name="vehcile_price" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Registration Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control vehicle" name="vehicle_type">
                                        <option value="NCP">Non-Custom Paid</option>
                                        <option value="CP">Custom Paid</option>
                                    </select>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-12" align="right">
                                    <?php include('../_partials/cancel.php') ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="addVehicle">Add Vehicle</button>
                                </div>
                            </div>
                        </form>
                        <h5 align="center"><?php echo $error ?></h5>
                        <h5 align="center"><?php echo $added ?></h5>
                        <h5 align="center"><?php echo $alreadyAdded ?></h5>
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
<script type="text/javascript" src="../assets/js/select2.min.js"></script>
<script type="text/javascript">
$('.vehicle').select2({
  placeholder: 'No Mobile Phone Selected',
  allowClear:true
  
});
</script>
</body>

</html>