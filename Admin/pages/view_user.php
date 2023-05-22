<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $email = $_GET['email'];
    $getUserData = mysqli_query($connect, "SELECT customers.*, area.area_name FROM `customers` 
                                INNER JOIN area ON area.id = customers.loc_id
                                WHERE customers.email = '$email'");

    $fetch_getUserData = mysqli_fetch_assoc($getUserData);



    include('../_partials/header.php');
?>

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">User Info</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $fetch_getUserData['name'] ?></td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $fetch_getUserData['email'] ?></td>
                                </tr>

                                <tr>
                                    <th>CNIC #</th>
                                    <td><?php echo $fetch_getUserData['cnic'] ?></td>
                                </tr>

                                <tr>
                                    <th>Location</th>
                                    <td><?php echo $fetch_getUserData['area_name'] ?></td>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <td><?php echo $fetch_getUserData['address'] ?></td>
                                </tr>

                                <tr>
                                    <th>Contact</th>
                                    <td>0<?php echo $fetch_getUserData['contact'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">CNIC Details</h4>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <?php
                                $imgCnicFront = $fetch_getUserData['cnic_front_path'];
                                $explodeCnicFront = explode("./Admin/", $imgCnicFront);
                                $CnicFrontImgPath = $explodeCnicFront[1];
                                ?>
                                <img src="../<?php echo $CnicFrontImgPath ?>" class="img-responsive img-thumbnail" style="width: 70vh" alt="">
                            </div>

                            <div class="col-md-6 text-center">
                                <?php
                                $imgCnicBack = $fetch_getUserData['cnic_back_path'];
                                $explodeCnicBack = explode("./Admin/", $imgCnicBack);
                                $CnicBackImgPath = $explodeCnicBack[1];
                                ?>
                                <img src="../<?php echo $CnicBackImgPath ?>" class="img-responsive img-thumbnail" style="width: 70vh" alt="">
                            </div>
                        </div>
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