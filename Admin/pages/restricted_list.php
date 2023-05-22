<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Users List</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Users Details</h4>
                       
                        <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>CNIC</th>
                                    <th>Location</th>
                                    <th>Verfication Status</th>
                                    <th>Login Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $retUsers = mysqli_query($connect, "SELECT customers.*, area.area_name FROM `customers` 
                                INNER JOIN area ON area.id = customers.loc_id
                                WHERE customers.verification_status = '1' AND customers.login_status = '2'");

                                $iteration = 1;

                                while ($rowRetUsers = mysqli_fetch_assoc($retUsers)) {
                                    echo '
                                    <tr>
                                        <td>'.$iteration++.'</td>
                                        <td>'.$rowRetUsers['name'].'</td>
                                        <td>0'.$rowRetUsers['contact'].'</td>
                                        <td>'.$rowRetUsers['cnic'].'</td>
                                        <td>'.$rowRetUsers['area_name'].'</td>';

                                        if ($rowRetUsers['verification_status'] == 0) {
                                            echo '<td style="font-size: 18px" class="text-center"><span class="badge badge-secondary">Un-Verified</span> </td>';
                                        }else {
                                            echo '<td style="font-size: 18px" class="text-center"><span class="badge badge-primary">Verified</span></td>';
                                        }

                                        
                                        echo '<td style="font-size: 18px"><span class="badge badge-danger">Restricted</span></td>';
                                        


                                        echo '
                                        
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