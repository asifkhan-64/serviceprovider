<?php include './_sections/_header.php'; ?>

<section class="ftco-section loginForm ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">
                <div class="row no-gutters">
                    <div class="col-md-3  align-items-center" style="width: 100% !important"></div>
                    
                    <div class="col-md-6  align-items-center" style="width: 100% !important">
                        <form method="POST" class="request-form ftco-animate bg-primary">
                            <h2 class="text-center">Login to your account!</h2>
                            <hr class="my-4" style="background-color: white !important;" />
                            <div class="form-group">
                                <label for="" class="label">Email</label>
                                <!-- <input type="text" id="location" required="" class="form-control"> -->
                                <input type="email" name="pickup" required="" placeholder="Enter your Email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Password</label>
                                <input type="password"  name="dropoff" placeholder="Enter Password" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submitData" value="Sign In" class="btn btn-secondary py-3 px-4">
                            </div>

                            <hr class="my-4" style="background-color: white !important;" />
                            
                            <h6 class="text-center text-white">Don't have an account?</h6>

                            <hr class="my-4" style="background-color: white !important;" />

                            <a href="registerCustomer.php" style="width: 48%" class="btn btn-dark py-3 px-4">Sign up for booking</a>
                            &nbsp;&nbsp;
                            <a href="registerOwner.php" style="width: 48%" class="btn btn-dark py-3 px-4">Sign up as Car Owner</a>
                        </form>
                    </div>

                    <div class="col-md-3 align-items-center" style="width: 100% !important"></div>
                </div>
            </div>
        </div>
</section>

<?php include './_sections/_footer.php'; ?>
