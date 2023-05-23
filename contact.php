<?php 
  include './Admin/_stream/config.php';

  $getContactDetails = mysqli_query($connect, "SELECT * FROM contact_details");
  $fetch_getContactDetails = mysqli_fetch_assoc($getContactDetails);

  include './_sections/_header.php'; 
?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Contact Us</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-4">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-map-o"></span>
              </div>
              <p><span>Address:</span> <?php echo $fetch_getContactDetails['address'] ?></p>
            </div>
          </div>

          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-mobile-phone"></span>
              </div>
              <p><span>Phone:</span> <a href="tel:<?php echo "0".$fetch_getContactDetails['contact'] ?>"><?php echo "0".$fetch_getContactDetails['contact'] ?></a></p>
            </div>
          </div>

          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-envelope-o"></span>
              </div>
              <p><span>Email:</span> <a href="mailto:<?php echo $fetch_getContactDetails['email'] ?>"><span class="__cf_email__" data-cfemail="f59c9b939ab58c9a8087869c8190db969a98" style="color: black"><?php echo $fetch_getContactDetails['email'] ?></span></a></p>
            </div>
          </div>


          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-globe"></span>
              </div>
              <p><span>Social Media:</span>
              <hr>
              <div class="row" style="font-size: 24px">
                <div class="col-md-4"><a href="<?php echo $fetch_getContactDetails['twitter'] ?>"> <span class="icon-twitter"></span></a></div>
                <div class="col-md-4"><a href="<?php echo $fetch_getContactDetails['facebook'] ?>"><span class="icon-facebook"></span></a></div>
                <div class="col-md-4"><a href="<?php echo $fetch_getContactDetails['instagram'] ?>"><span class="icon-instagram"></span></a></div>
              </div>
              
            </p>
            </div>
          </div>


        </div>
      </div>
    <div class="col-md-8 block-9 mb-md-5">
    <form action="#" class="bg-light p-5 contact-form">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Your Name">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Your Email">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Subject">
    </div>
    <div class="form-group">
    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
    </div>
    <div class="form-group">
    <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
    </div>
    </form>
    </div>
    </div>

  </div>
</section>
<?php include './_sections/_footer.php'; ?>
