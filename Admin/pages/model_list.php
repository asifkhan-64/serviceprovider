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
        $vehicleName = $_POST['vehicleName'];
        $vehicleModel = $_POST['vehicleModel'];

        $countQuery = mysqli_query($connect, "SELECT COUNT(*)AS countedVehicles FROM vehicles WHERE vehicle_name = '$vehicleName' AND vehicle_model = '$vehicleModel'");
        $fetch_countQuery = mysqli_fetch_assoc($countQuery);


        if ($fetch_countQuery['countedVehicles'] == 0) {
            $insertQuery = mysqli_query($connect, "INSERT INTO vehicles(vehicle_name, vehicle_model)VALUES('$vehicleName', '$vehicleModel')");
            if (!$insertQuery) {
                $error = 'Vehicle Not Added! Try again!';
            }else {
                $added = '
                <div class="alert alert-primary" role="alert">
                                Vehicle Added!
                             </div>';
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
            <div class="col-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Vehicle</label>
                                <div class="col-sm-8">
                                    <input class="form-control" placeholder="Vehicle Name" type="text" id="example-text-input" name="vehicleName" required="">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Model</label>
                                <div class="col-sm-8">
                                    <input class="form-control" placeholder="i.e 2010 etc" type="number" id="example-text-input" name="vehicleModel" required="">
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <!-- <label for="example-password-input" class="col-sm-2 col-form-label"></label> -->
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
            <div class="col-8">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Vehicle Details</h4>
                       
                        <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Model</th>
                                    <th class="text-center"> <i class="fa fa-edit"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $retVehicles = mysqli_query($connect, "SELECT * FROM vehicles ORDER BY vehicle_name ASC");
                                $iteration = 1;

                                while ($rowVehicles = mysqli_fetch_assoc($retVehicles)) {
                                    echo '
                                    <tr>
                                        <td>'.$iteration++.'</td>
                                        <td>'.$rowVehicles['vehicle_name'].'</td>
                                        <td>'.$rowVehicles['vehicle_model'].'</td>
                                        <td class="text-center"><a href="vehicle_edit.php?id='.$rowVehicles['veh_id'].'" type="button" class="btn text-white btn-warning waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
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