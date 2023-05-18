<?php
  include("_stream/config.php");
  
  $valid_login = "";
  if (isset($_POST["change_session"])) {
        $user_email = $_POST["user_email"];

        $getUserData = mysqli_query($connect, "SELECT COUNT(*) CountedUsers FROM login_user WHERE email = '$user_email'");
        $fetch_getUserData = mysqli_fetch_assoc($getUserData);
        $counted = $fetch_getUserData['CountedUsers'];

        if ($counted > 0) {
            $to      = $user_email;
            $subject = "Password Change Request";
            $message = 'You have requested for a password change, click on the link to change your password: careskin.info/FYP/Admin/change_password.php?email=' .$user_email.'' ."\r\n". '';
            $from    = "testing@careskin.info";
            $headers = "From: $from";

            $mailConfirm = mail($to, $subject, $message, $headers);

            if ($mailConfirm) {
                echo '
                    <script>
                        alert("Please Check your email/spam to change your password! Password Change link has been forwarded via link");
                        window.location.href("index.php");
                    </script>';
                    
                // header("LOCATION: index.php");
            }
        }else {
            echo '
                <script>
                    alert("If your email is registered in our system, you will receive an email. Please Check your email/spam to change your password! Password Change link has been forwarded via link");
                    window.location.href("index.php");
                </script>';
            // header("LOCATION: index.php");
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
                                        <p class="text-center"><small>Please Enter your email address to change your password</small></p>
                                        <hr>
                                        
                
                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" name="user_email" type="email" required="" placeholder="Email">
                                                    </div>
                                                </div>               
                                                <div class="form-group text-center row m-t-20 mt-2">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="change_session">Submit</button>
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