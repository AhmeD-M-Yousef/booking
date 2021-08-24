<?php

  if(isset($_GET['prop'])) {

  include "include/header.php";
      include 'admin/function/connect.php';

  $proerty_id = $_GET['prop'];
  $select_pro = "SELECT * FROM property WHERE id = '$proerty_id' ";
  $result_pro = $connect->query($select_pro);
  $row_pro    = $result_pro->fetch_assoc();
  $row_images = $row_pro['img'];
  $row_explod = explode(',',$row_images);



 ?>
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg single-property-r" data-setbg="img/bg.jpg">
        <div class="container hero-text text-white">
            <h2>Property Page</h2>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Filter Search Section Begin -->
    <div class="filter-search ">
    <?php include "include/search.php";   ?>
    </div>
    <!-- Filter Search Section End -->
    <!-- Single Property Section Begin -->

    <div class="single-property">
        <div class="container">
            <div class="row spad-p">
                <div class="col-lg-12">
                    <div class="property-title">
                        <h3><?php echo $row_pro['name']; ?></h3>
                        <?php
                        $locat_id = $row_pro['gov_id'];
                        $select_gove = "SELECT * FROM governorate WHERE id = '$locat_id'";
                        $result_gove = $connect->query($select_gove);
                        $row_gove    = $result_gove->fetch_assoc();
                        ?>
                        <a href="#"><i class="fa flaticon-placeholder"></i> <?php echo $row_gove['name']; ?>, 76 Guild Street, EC3P 3WF</a>
                    </div>
                    <div class="property-price">
                        <p>For Sale</p>
                        <span>$<?php echo $row_pro['price']; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="property-img owl-carousel">
                      <?php
                      foreach ($row_explod as $key_pro) { // looping the exploded array
                      ?>
                        <div class="single-img">
                            <img src="admin/image/<?php echo $key_pro; ?>" alt="">
                        </div>
                      <?php  } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Property End -->
    <!-- Single Property Deatails Section Begin -->
    <section class="property-details">
        <div class="container">
            <div class="row sp-40 spt-40">
                <div class="col-lg-8">
                    <div class="p-ins">
                        <div class="row details-top">
                            <div class="col-lg-12">
                                <div class="t-details">
                                    <div class="register-id">
                                        <p>Registered ID: <span><?php echo $row_pro['id']; ?></span></p>
                                    </div>
                                    <div class="popular-room-features single-property">
                                        <div class="size">
                                            <p>Lot Size</p>
                                            <img src="img/rooms/size.png" alt="">
                                            <i class="flaticon-bath"></i>
                                            <span>2561 sqft</span>
                                        </div>
                                        <div class="beds">
                                            <p>Rooms</p>
                                            <img src="img/rooms/bed.png" alt="">
                                            <span><?php echo $row_pro['room_number']; ?></span>
                                        </div>
                                        <div class="baths">
                                            <p>Baths</p>
                                            <img src="img/rooms/bath.png" alt="">
                                            <span>2</span>
                                        </div>
                                        <div class="garage">
                                            <p>Garage</p>
                                            <img src="img/rooms/garage.png" alt="">
                                            <span>1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="property-description">
                                    <h4>Description</h4>
                                    <p><?php echo $row_pro['description']; ?> </p>
                                </div>
                                <div class="property-features">
                                    <h4>Property Features</h4>
                                    <div class="property-table">
                                        <table>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Home theater</td>
                                                <td><img src="img/check.png" alt=""> Carpeting</td>
                                                <td><img src="img/check.png" alt=""> Attic fans</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Media room</td>
                                                <td><img src="img/check.png" alt=""> Concrete</td>
                                                <td><img src="img/check.png" alt=""> Ceiling fans</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Family room</td>
                                                <td><img src="img/check.png" alt=""> Bamboo</td>
                                                <td><img src="img/check.png" alt=""> Thermostats</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Gym/workout room</td>
                                                <td><img src="img/check.png" alt=""> Stone</td>
                                                <td><img src="img/check.png" alt=""> Single flush toilets</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Library</td>
                                                <td><img src="img/check.png" alt=""> Tile</td>
                                                <td><img src="img/check.png" alt=""> Window shutters</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Butler's pantry</td>
                                                <td><img src="img/check.png" alt=""> Laminate</td>
                                                <td><img src="img/check.png" alt=""> Solar heat</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Sunroom</td>
                                                <td><img src="img/check.png" alt=""> Cork</td>
                                                <td><img src="img/check.png" alt=""> Solar plumbing</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Downstairs's bedroom</td>
                                                <td><img src="img/check.png" alt=""> Vinyl / linoleum</td>
                                                <td><img src="img/check.png" alt=""> Solar Screens</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Basement</td>
                                                <td><img src="img/check.png" alt=""> Manufactured wood</td>
                                                <td><img src="img/check.png" alt=""> Storm windows</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Guest quarters</td>
                                                <td><img src="img/check.png" alt=""> Marble</td>
                                                <td><img src="img/check.png" alt=""> Tankless water heater</td>
                                            </tr>
                                            <tr>
                                                <td><img src="img/check.png" alt=""> Wine storage</td>
                                                <td><img src="img/check.png" alt=""> Wood</td>
                                                <td><img src="img/check.png" alt=""> Skylights or sky tubes</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="location-map">
                                    <h4>Location</h4>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107002.020096289!2d-96.80666618302782!3d33.06138629992991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c21da13c59513%3A0x62aa036489cd602b!2sPlano%2C+TX%2C+USA!5e0!3m2!1sen!2sbd!4v1558246953339!5m2!1sen!2sbd" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row pb-30">
                        <div class="col-lg-12">
                            <div class="contact-service">
                                <img src="img/single-property/small.png" alt="">
                                <p>Listed by</p>
                                <?php
                                $company_id = $row_pro['com_id'];
                                $select_comy = "SELECT * FROM company WHERE id = '$company_id'";
                                $result_comy = $connect->query($select_comy);
                                $row_comy    = $result_comy->fetch_assoc();
                                ?>
                                <h5><?php echo $row_comy['name'];?></h5>
                                <table>
                                    <tr>
                                        <td>Office : <span>1-139-954-3228</span></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile : <span>1-517-328-7751</span></td>
                                    </tr>
                                    <tr>
                                        <td>Fax : <span>1-458-284-9871</span></td>
                                    </tr>
                                    <tr>
                                        <td>WhatsApp : <span>1-812-117-2663</span></td>
                                    </tr>
                                    <tr>
                                        <td>Email : <span><?php echo $row_comy['email'];?></span></td>
                                    </tr>
                                </table>
                                <a href="#" class="site-btn list-btn">View More Listings</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <?php
                          $select_pr = "SELECT * FROM property ORDER BY RAND() LIMIT 1";
                          $result_pr = $connect->query($select_pr);
                          $row_pr    = $result_pr->fetch_assoc();
                          ?>
                            <div class="room-items">
                              <?php
                              $pr_image   = $row_pr['img'];
                              $im_explode = explode(",",$pr_image);
                              foreach ($im_explode as $key_im){
                              ?>
                                <div class="room-img set-bg" data-setbg="admin/image/<?php echo $im_explode[0]; ?>">
                              <?php } ?>
                                    <a href="#" class="room-content">
                                        <i class="flaticon-heart"></i>
                                    </a>
                                </div>
                                <div class="room-text">
                                    <div class="room-details">
                                        <div class="room-title">
                                            <h5><?php echo $row_pr['name']; ?></h5>
                                            <?php
                                            $gov_id = $row_pr['gov_id'];
                                            $select_go = "SELECT * FROM governorate WHERE id = '$gov_id'";
                                            $result_go = $connect->query($select_go);
                                            $row_go    = $result_go->fetch_assoc();
                                            ?>
                                            <a href="#"><i class="flaticon-placeholder"></i> <span><?php echo $row_go['name']; ?></span></a>
                                            <a href="#" class="large-width"><i class="flaticon-cursor"></i> <span>Show
                                                    on Map</span></a>
                                        </div>
                                    </div>
                                    <div class="room-features">
                                        <div class="room-info">
                                            <div class="size">
                                                <p>Lot Size</p>
                                                <img src="img/rooms/size.png" alt="">
                                                <i class="flaticon-bath"></i>
                                                <span>2561 sqft</span>
                                            </div>
                                            <div class="beds">
                                                <p>Rooms</p>
                                                <img src="img/rooms/bed.png" alt="">
                                                <span><?php echo $row_pr['room_number']; ?></span>
                                            </div>
                                            <div class="baths">
                                                <p>Baths</p>
                                                <img src="img/rooms/bath.png" alt="">
                                                <span>2</span>
                                            </div>
                                            <div class="garage">
                                                <p>Garage</p>
                                                <img src="img/rooms/garage.png" alt="">
                                                <span>1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="room-price">
                                        <p>For Sale</p>
                                        <span>$<?php echo $row_pr['price']; ?></span>
                                    </div>
                                    <a href="single-property.php?prop=<?php echo $row_pr['id']; ?>" class="site-btn btn-line">View Property</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Single Property Deatails Section End -->
    <!-- Footer Section Begin -->
        <?php include "include/footer.php"; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>


  <?php }else{
     header('location:index.php');
  } ?>

</body>

</html>
