<?php

include './Admin/_stream/config.php';

$msg = '';

if (isset($_POST["logIn"])) {
    $email = $_POST['email'];
    
    $checkEmail = mysqli_query($connect, "SELECT COUNT(*) AS countedUsers FROM customers WHERE email = '$email'");
    $fetch_checkEmail = mysqli_fetch_assoc($checkEmail);
    $count = $fetch_checkEmail['countedUsers'];

    if ($count > 0) {
        // $to      = $email;
        // $subject = "Password Change - Service Provider Email Verification";
        // $message = 'Please click on the link to change your password: careskin.info/FYP/verification?email='.$email. "\r\n". '';
        // $from    = "testing@careskin.info";
        // $headers = "From: $from";

        // $mailConfirm = mail($to, $subject, $message, $headers);

        echo '
        <script>
            alert("Password reset instruction has been forwarded to your email! Please check inbox / spam. Thank You!");
        </script>
        ';
        if ($mailConfirm) {
            header("LOCATION: login.php");
        }
    }else {
        echo '
        <script>
            alert("Your password reset instruction has been forwarded to your email! Please check inbox / spam. Thank You!");
        </script>
        ';
        header("LOCATION: login.php");
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
                            <h2 class="text-center">Change Password!</h2>
                            <?php echo $msg ?>
                            <hr class="my-4" style="background-color: white !important;" />
                            <div class="form-group">
                                <label for="" class="label">Email</label>
                                <input type="email" name="email" required="" placeholder="Enter your Email" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="logIn" value="Submit" class="btn btn-secondary py-3 px-4">
                            </div>

                            <hr class="my-4" style="background-color: white !important;" />
                            
                            <div class="text-center">
                                <span style="color: white">Already have an account: </span><a href="login.php" style="color: maroon;"><u>Go to Sign-in!</u></a>
                            </div>

                        </form>
                    </div>

                    <div class="col-md-3 align-items-center" style="width: 100% !important"></div>
                </div>
            </div>
        </div>
</section>

<?php include './_sections/_footer.php'; ?>
