<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $alreadyAdded = '';
    $added = '';
    $error= '';

    $id = $_GET['id'];
    $getData = mysqli_query($connect, "SELECT * FROM vehicle_list WHERE vlist_id = '$id'");
    $fetch_getData = mysqli_fetch_assoc($getData);

    if (isset($_POST['editVehicle'])) {
        $id                 = $_POST['id'];
        $vehicle_id         = $_POST['vehicle_id'];
        $vehicle_capacity   = $_POST['vehcile_capacity'];
        $vehicle_price      = $_POST['vehcile_price'];
        $vehicle_type       = $_POST['vehicle_type'];
        

        $updateQuery = mysqli_query($connect, "UPDATE `vehicle_list` 
            SET
             `vehicle_id` = '$vehicle_id',
              `vehicle_capacity` = '$vehicle_capacity',
               `vehicle_price` = '$vehicle_price',
                `vehicle_type` = '$vehicle_type'
                 WHERE vlist_id = '$id'
                ");
        if (!$updateQuery) {
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
                <h5 class="page-title">Edit Vehicle</h5>
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
                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                <div class="col-sm-4">
                                    <?php
                                    $getVehicles = mysqli_query($connect, "SELECT * FROM vehicles");
                                    $vehicle = $fetch_getData['vehicle_id'];
                                    
                                    echo '<select class="form-control vehicle" name="vehicle_id">';
                                    while ($rowVehicles = mysqli_fetch_assoc($getVehicles)) {
                                        if ($rowVehicles['veh_id'] === $vehicle) {
                                            echo '<option value="'.$rowVehicles['veh_id'].'" selected>'.$rowVehicles['vehicle_name'].' - '.$rowVehicles['vehicle_model'].'</option>';
                                        }else {
                                            echo '<option value="'.$rowVehicles['veh_id'].'" selected>'.$rowVehicles['vehicle_name'].' - '.$rowVehicles['vehicle_model'].'</option>';
                                        }
                                    }
                                    echo '</select>';
                                    ?>
                                </div>


                                <label for="example-text-input" class="col-sm-2 col-form-label">Seat Capacity</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e: 4" type="number" value="<?php echo $fetch_getData['vehicle_capacity'] ?>"  id="example-text-input" name="vehcile_capacity" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Rent Price</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e: 4000" type="number" value="<?php echo $fetch_getData['vehicle_price'] ?>"  id="example-text-input" name="vehcile_price" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Registration Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control vehicle" name="vehicle_type">
                                        <?php
                                        if ($fetch_getData['vehicle_type'] == 'NCP') {
                                            echo '
                                            <option value="NCP" selected>Non-Custom Paid</option>
                                            <option value="CP">Custom Paid</option>
                                            ';
                                        }elseif ($fetch_getData['vehicle_type'] == 'CP') {
                                            echo '
                                            <option value="NCP">Non-Custom Paid</option>
                                            <option value="CP" selected>Custom Paid</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-12" align="right">
                                    <?php include('../_partials/cancel.php') ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="editVehicle">Edit Vehicle</button>
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