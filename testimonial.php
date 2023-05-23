<?php 

    include './Admin/_stream/config.php';

    $countLocationsQuery = mysqli_query($connect, "SELECT COUNT(*) AS countedLocations FROM area");
    $fetch_locations = mysqli_fetch_assoc($countLocationsQuery);
    $countLocation = $fetch_locations['countedLocations'];

    $countCarQuery = mysqli_query($connect, "SELECT COUNT(*) countedCars FROM `vehicle_list`");
    $fetch_cars = mysqli_fetch_assoc($countCarQuery);
    $countedCars = $fetch_cars['countedCars'];

    $countOwnersQuery = mysqli_query($connect, "SELECT COUNT(*) AS carOwners FROM `car_owner`");
    $fetch_owners = mysqli_fetch_assoc($countOwnersQuery);
    $carOwners = $fetch_owners['carOwners'];

    $countCustomersQuery = mysqli_query($connect, "SELECT COUNT(*) AS countedCustomers FROM `customers`");
    $fetch_customers = mysqli_fetch_assoc($countCustomersQuery);
    $countedCustomers = $fetch_customers['countedCustomers'];



?>

    <section class="ftco-counter ftco-section img" id="section-counter">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div
            class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate"
          >
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?php echo $countLocation ?>">0</strong>
                <span>Active <br />Locations</span>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate"
          >
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?php echo $countedCars ?>">0</strong>
                <span>Rent <br />Cars</span>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate"
          >
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?php echo $carOwners ?>">0</strong>
                <span>Car <br />Owners</span>
              </div>
            </div>
          </div>

          <div
            class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate"
          >
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?php echo $countedCustomers ?>">0</strong>
                <span>Happy <br />Customers</span>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>