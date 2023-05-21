<?php
    include('../_stream/config.php');
    session_start();
        if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $id = $_GET['id'];

    $msg = '';

    if (isset($_POST["uploadImg"])) {
        $id = $_POST['id'];

        // Car Image
        $carImage = $_FILES['car_image'];
        $carImageUpload = $carImage['name'];
        $carImageUpload = preg_replace("/\s+/", "", $carImageUpload);
        $tempcarImage = $carImage['tmp_name'];

        $file_extImage = pathinfo($carImageUpload,PATHINFO_EXTENSION);
        $carImageUpload = pathinfo($carImageUpload,PATHINFO_FILENAME);

        $newNameImage = $carImageUpload.date("miYisiY").'.'.$file_extImage;

        $imgPath = "../__uploadedFiles__/".$newNameImage;

        if (move_uploaded_file($tempcarImage, $imgPath)) {
            // echo "Done";
        }else{
            echo "Error File Uploading";
        }

        $isertImage = mysqli_query($connect, "INSERT vehicle_images(list_id, img_path)VALUES('$id', '$imgPath')");

        if ($isertImage) {
            $msg = '
            <hr />
            <div class="alert alert-primary text-dark">
                Vehicle Image Uploaded! 
            </div>
            ';
        }else {
            $msg = '
            <hr />
            <div class="alert alert-danger text-dark">
                Vehicle Image Uploaded! 
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
                <h5 class="page-title">Vehicle Details</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4 my-3"></div>
                                <div class="col-md-4 my-3 text-center">
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>"  required="" />
                                    <input type="file" class="form-control" name="car_image"  required="" />
                                    <hr>
                                    <button class="btn btn-primary" name="uploadImg" type="submit">Upload</button>
                                    <?php echo $msg ?>
                                </div>
                                <div class="col-md-4 my-3"></div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container fluid -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-title">Vehicle Images</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $getImages = mysqli_query($connect, "SELECT * FROM vehicle_images WHERE list_id = '$id'");
                            
                            $count = mysqli_num_rows($getImages);
                            if ($count > 0) {
                                while ($rowImages = mysqli_fetch_assoc($getImages)) {
                                    
                                    echo '
                                    <div class="col-md-4">
                                    <img src="'.$rowImages['img_path'].'" class="img img-responsive img-thumbnail" style="width: 100vh !important; height: 40vh !important" />
                                    <hr />
                                    <a href="deleteImage.php?id='.$rowImages['img_id'].'&urlId='.$id.'" style="width: 100%" class="btn btn-danger">Delete!</a>
                                    </div>
                                    ';
                                }
                            }else {
                                echo '
                                <div class="col-md-12">
                                    <div class="alert alert-danger text-dark text-center" style="font-size: 24px">
                                        No image found!!! 
                                    </div>
                                </div>';
                            }
                            ?>
                            
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