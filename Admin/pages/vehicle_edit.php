<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $alreadyAdded = '';
    $added = '';
    $error= '';

    $getVehId = $_GET['id'];
    $getVehData = mysqli_query($connect, "SELECT * FROM vehicles WHERE veh_id = '$getVehId'");
    $fetch_getVehData = mysqli_fetch_assoc($getVehData);

    if (isset($_POST['updateVehicle'])) {
        $id = $_POST['id'];
        $vehicleName = $_POST['vehicleName'];
        $vehicleModel = $_POST['vehicleModel'];

        $countQuery = mysqli_query($connect, "SELECT COUNT(*)AS countedVehicles FROM vehicles WHERE vehicle_name = '$vehicleName' AND vehicle_model = '$vehicleModel'");
        $fetch_countQuery = mysqli_fetch_assoc($countQuery);


        if ($fetch_countQuery['countedVehicles'] == 0) {
            $insertQuery = mysqli_query($connect, "UPDATE vehicles SET vehicle_name = '$vehicleName', vehicle_model = '$vehicleModel' WHERE veh_id = '$id'");
            if (!$insertQuery) {
                $error = 'Vehicle Not Updated! Try again!';
            }else {
                header("LOCATION: model_list.php");
            }
        }else {
            $alreadyAdded = '<div class="alert alert-dark" role="alert">
                                Vehicle Already Added!
                             </div>';
        }
    }


    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Vehicle Model</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <input type="hidden" value="<?php echo $getVehId ?>" name="id">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Vehicle</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="Vehicle Name" value="<?php echo $fetch_getVehData['vehicle_name'] ?>" type="text" id="example-text-input" name="vehicleName" required="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label">Model</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="i.e 2010 etc" type="number" value="<?php echo $fetch_getVehData['vehicle_model'] ?>" id="example-text-input" name="vehicleModel" required="">
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <!-- <label for="example-password-input" class="col-sm-2 col-form-label"></label> -->
                                <div class="col-sm-12" align="right">
                                    <?php include('../_partials/cancel.php') ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="updateVehicle">Update Vehicle</button>
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
</body>

</html>