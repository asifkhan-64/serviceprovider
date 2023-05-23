<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $email = $_SESSION["user"];

    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Vehicle List</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Vehicle Details</h4>
                       
                        <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vehicle Model</th>
                                    <th>Capacity</th>
                                    <th>Price</th>
                                    <th>Vehicle Type</th>
                                    <th>Status</th>
                                    <th class="text-center"> <i class="fa fa-picture-o"></i>
                                    <th class="text-center"> <i class="fa fa-edit"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $retVehicles = mysqli_query($connect, "SELECT vehicle_list.*, vehicles.* FROM `vehicle_list`
                                INNER JOIN vehicles ON vehicles.veh_id = vehicle_list.vehicle_id
                                WHERE vehicle_list.user_email = '$email'");

                                $iteration = 1;

                                while ($rowVehicles = mysqli_fetch_assoc($retVehicles)) {
                                    echo '
                                    <tr>
                                        <td>'.$iteration++.'</td>
                                        <td>'.$rowVehicles['vehicle_name'].' - '.$rowVehicles['vehicle_model'].'</td>
                                        <td>'.$rowVehicles['vehicle_capacity'].' Persons</td>
                                        <td>'.$rowVehicles['vehicle_price'].'</td>
                                        <td>'.$rowVehicles['vehicle_type'].'</td>';

                                        if ($rowVehicles['vehicle_status'] == 0) {
                                            echo '<td style="font-size: 18px"><a href="change_car_status.php?id='.$rowVehicles['vlist_id'].'"><span class="badge badge-secondary">Booked</span></a></td>';
                                        }elseif ($rowVehicles['vehicle_status'] == 1) {
                                            echo '<td style="font-size: 18px"><a href="change_car_status.php?id='.$rowVehicles['vlist_id'].'"><span class="badge badge-primary">Available</span></a></td>';
                                        }


                                        echo '

                                        <td class="text-center">
                                            <a href="add_vehicle_images.php?id='.$rowVehicles['vlist_id'].'" type="button" class="btn text-white btn-warning waves-effect waves-dark">Image +</a>
                                        </td>


                                        <td class="text-center">
                                            <a href="edit_vehicle.php?id='.$rowVehicles['vlist_id'].'" type="button" class="btn text-white btn-info waves-effect waves-light">Edit</a>
                                        </td>
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