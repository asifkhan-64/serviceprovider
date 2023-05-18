<?php
  include("_stream/config.php");
  
  $valid_login = "";

  $email = $_GET['email'];
  
  if (isset($_POST["change_password"])) {
        $user_password = $_POST["user_password"];

        $updatePassword = mysqli_query($connect, "UPDATE login_user SET password = '$user_password' WHERE email = '$email'");

        if ($updatePassword) {
            echo '
            <script>
                alert("Password changed successfully!");
            </script>
            ';
            header("LOCATION: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Service Provider</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="./assets/mobiles-removebg-preview.png">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg">
            
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card" >
                                    <div class="card-body">
                                        <h3 class="text-center mt-0 m-b-15">
                                            <a  class="logo logo-admin"><h3 style="font-family: Georgia; font-weight: 100">Service Provider</h3></a>
                                        </h3>
                
                                        <h4 class="text-muted text-center font-18"><b>Forgot Password</b></h4>
                                        <p class="text-center"><small>Password change request for email <q><?php echo $email ?></q></small></p>
                                        <hr>
                                        
                
                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" name="user_password" type="password" required="" placeholder="Please enter new password">
                                                    </div>
                                                </div>               
                                                <div class="form-group text-center row m-t-20 mt-2">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="change_password">Change Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <h5 align="center"><?php echo $valid_login ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

         <!-- Alertify js -->
        <script src="assets/plugins/alertify/js/alertify.js"></script>
         <script src="assets/pages/alertify-init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>


        

    </body>
</html>