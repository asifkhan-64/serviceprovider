<?php

include './Admin/_stream/config.php';

$msg = '';

if (isset($_POST["logIn"])) {
    $email      =     $_POST['email'];
    $password   =     $_POST['password'];

    $select_user_query = "SELECT * FROM customers WHERE email='".$email."' AND password='".$password."'";
    $result_query = mysqli_query($connect, $select_user_query);

    $fetch_userQuery = mysqli_fetch_array($result_query);
        
    if (empty($fetch_userQuery)) {
        $msg = '<div class="alert alert-warning text-center " style="background:#D52520; color:white; border: none" role="alert">Enter a valid Login</div>';
    }else {
        $user_status = $fetch_userQuery['login_status'];
        if ($user_status == 1) {
        session_start();
        $_SESSION["user"] = $email;
        header("LOCATION:./index.php");
        }elseif ($user_status == 0) {
        $msg = ' <div class="alert alert-info text-center" style="color:green; border: none;" role="alert">
            Pending Approval!</div>';
        }elseif($user_status == 2) {
        $msg = ' <div class="alert alert-danger  text-center" style="background:#D52520; border: none; color:white;" role="alert">
            Access Denied. Account restricted!</div>';
        }
    }


    
}


include './_sections/_header.php';

?>

<section class="ftco-section loginForm ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">
                <div class="row no-gutters">
                    <div class="col-md-3  align-items-center" style="width: 100% !important"></div>
                    
                    <div class="col-md-6  align-items-center" style="width: 100% !important">
                        <form method="POST" class="request-form ftco-animate bg-primary">
                            <h2 class="text-center">Login to your account!</h2>
                            <?php echo $msg ?>
                            <hr class="my-4" style="background-color: white !important;" />
                            <div class="form-group">
                                <label for="" class="label">Email</label>
                                <input type="email" name="email" required="" placeholder="Enter your Email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Password</label>
                                <input type="password"  name="password" placeholder="Enter Password" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="logIn" value="Sign In" class="btn btn-secondary py-3 px-4">
                            </div>

                            

                            <hr class="my-4" style="background-color: white !important;" />

                            <span style="color: white">Click here to retrieve / reset password: </span><a href="forgot_password.php" style="color: maroon;"><u>Change Password</u></a>

                            <hr class="my-4" style="background-color: white !important;" />
                            
                            <h6 class="text-center text-white">Don't have an account?</h6>

                            <hr class="my-4" style="background-color: white !important;" />

                            <a href="registerCustomer.php" class=" btnClass btn btn-dark py-3 px-4">Sign up for booking</a>
                            &nbsp;&nbsp;
                            <a href="registerOwner.php" class=" btnClass btn btn-dark py-3 px-4">Sign up as Car Owner</a>
                        </form>
                    </div>

                    <div class="col-md-3 align-items-center" style="width: 100% !important"></div>
                </div>
            </div>
        </div>
</section>

<?php include './_sections/_footer.php'; ?>
