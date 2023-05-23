<?php

    include './Admin/_stream/config.php';

    $getFooterContactDetails = mysqli_query($connect, "SELECT * FROM contact_details WHERE c_id = '1'");
    $fetchDetails = mysqli_fetch_assoc($getFooterContactDetails);

?>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">
                        <a href="index.php" class="logo">Service<span>Provider</span></a>
                    </h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="<?php echo $fetchDetails['twitter'] ?>"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="<?php echo $fetchDetails['facebook'] ?>"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="<?php echo $fetchDetails['instagram'] ?>"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="py-2 d-block">Home</a></li>
                        <li><a href="about.php" class="py-2 d-block">About</a></li>
                        <li><a href="services.php" class="py-2 d-block">Services</a></li>
                        <li><a href="car.php" class="py-2 d-block">Our Fleet</a></li>
                        <!-- <li><a href="contact.php" class="py-2 d-block">Contact</a></li> -->
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text" style="color: white"><?php echo $fetchDetails['address'] ?></span></li><br>
                            <li><a href="tel://+92<?php echo $fetchDetails['contact'] ?>"><span class="icon icon-phone"></span><span class="text">+92<?php echo $fetchDetails['contact'] ?></span></a></li>
                            <li><a href="mailto:<?php echo $fetchDetails['email'] ?>"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="056c6b636a457c6a7077616a68646c6b2b666a68"><?php echo $fetchDetails['email'] ?></span></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved 
                </p>
            </div>
        </div>
    </div>
</footer>

<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJW8JYN6tTm2kZqsAdZJcEi5x09XWYSA0&libraries=places"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6451588231ebfa0fe7fb9b23/1gves3ghv';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
</script>
<!--End of Tawk.to Script-->

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.location').select2();
    });
</script>

</body>
</html>