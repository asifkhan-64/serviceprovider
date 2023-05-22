<?php

include './Admin/_stream/config.php';

$msg = '';

$getEmial = $_GET['email'];

if (isset($_POST["changePassword"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $updatePassword = mysqli_query($connect, "UPDATE customers SET password = '$password' WHERE email = '$email'");

    if ($updatePassword) {
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
                            <p class="text-center">Please Enter a new password</p>
                            <?php echo $msg ?>
                            <hr class="my-4" style="background-color: white !important;" />
                            <div class="form-group">
                                <label for="" class="label">Password</label>
                                <input type="password" name="password" required="" placeholder="Enter your new password" class="form-control">
                                <input type="hidden" name="email" required="" value="<?php echo $getEmial ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="changePassword" value="Change Password" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3 align-items-center" style="width: 100% !important"></div>
                </div>
            </div>
        </div>
</section>

<?php include './_sections/_footer.php'; ?>
