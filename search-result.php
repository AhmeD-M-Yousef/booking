<?php  include "include/header.php";
session_start();

// print_r($_SESSION);
 ?>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg search-result" data-setbg="img/bg.jpg">
        <div class="container hero-text text-white">
            <h2>Search Results</h2>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Filter Search Section Begin -->
    <div class="filter-search search-opt">

    <?php include "include/search.php";?>
    </div>
    <!-- Filter Search Section End -->
    <!-- Map Section Begin -->
    <div class="map-section">
        <div class="container-fluid">
            <div class="row">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107002.020096289!2d-96.80666618302782!3d33.06138629992991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c21da13c59513%3A0x62aa036489cd602b!2sPlano%2C+TX%2C+USA!5e0!3m2!1sen!2sbd!4v1558246953339!5m2!1sen!2sbd" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section End -->
    <!-- Hotel Room Section Begin -->
    <?php if(isset($_POST['submit'])){ ?>
    <section  class="hotel-rooms spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-45">
                    <div class="found-items">
                      <?php
                      include 'admin/function/connect.php';

                      // $gov     = $_SESSION['location'];
                      // $prop    = $_SESSION['prop_type'];
                      // $com     = $_SESSION['com_id'];
                      // $m_price = $_SESSION['min_price'];
                      // $max_p   = $_SESSION['max_price'];
                      // $r_num   = $_SESSION['room'];

                      $location   = $_POST['location'];
                      $prop_type  = $_POST['prop_type'];
                      $com_id     = $_POST['com_id'];
                      $min_price  = $_POST['min_price'];
                      $max_price  = $_POST['max_price'];
                      $room_nums  = $_POST['room'];



                      $TrueGov  = $location == 0 ? 'gov_id > 0' : 'gov_id =' . $_POST['location'];
                      $TrueProp = $prop_type == 0 ?  'prop_type > 0' : 'prop_type =' . $_POST['prop_type'];
                      $TrueCom  = $com_id == 0 ?  'com_id > 0' : 'com_id =' . $_POST['com_id'];

                      if($room_nums == 0){
                        $TrueRoom =  'room_number > 0' ;
                      }elseif($room_nums == 4) {
                        $TrueRoom =  'room_number >= 4' ;
                      }else{
                        $TrueRoom =  'room_number =' . $room_nums;
                      }

                      $select_search = "SELECT * FROM property WHERE $TrueGov AND $TrueProp AND $TrueCom AND price >= $min_price AND price <= $max_price AND $TrueRoom ";
                      $result_search = $connect->query($select_search);
                      $counter       = $result_search->num_rows;



                      ?>

                        <h4>We found <span><?php echo $counter; ?></span> properties</h4>

                        <select class="date-select">
                            <option value="0">Date New to Old</option>
                            <option value="1">Old</option>
                            <option value="2">New</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php


                  foreach ($result_search as $row_search){
                    $row_images = $row_search['img'];
                    $row_explods = explode(',',$row_images);
                    $loca_id     = $row_search['gov_id'];
                    $com_id     = $row_search['com_id'];


              ?>

                <div class="col-lg-4 col-md-4 col-md-6">
                    <div class="room-items">
                        <div class="room-img set-bg" data-setbg="admin/image/<?php echo $row_explods[1] ; ?>">
                            <a href="#" class="room-content">
                                <i class="flaticon-heart"></i>
                            </a>
                        </div>
                        <div class="room-text">
                            <div class="room-details">
                                <div class="room-title">
                                  <?php
                                  // to shorten the name
                                  $names_show = $row_search['name'];
                                  $first10Characters = substr($names_show, 0, 30);
                                  ?>
                                   <h5><?php echo $first10Characters ?><?php if(strlen($names_show)>30){echo " ...";}  ?></h5>
                                    <?php
                                    $select_govern = "SELECT * FROM governorate WHERE id = '$loca_id'";
                                    $result_govern = $connect->query($select_govern);
                                    $row_govern    = $result_govern->fetch_assoc();
                                    ?>
                                    <a href="#"><i class="flaticon-placeholder"></i> <span><?php echo $row_govern['name'] ; ?></span></a>
                                    <a href="#" class="large-width"><i class="flaticon-cursor"></i>
                                      <?php
                                      $select_coms = "SELECT * FROM company WHERE id = '$com_id'";
                                      $result_coms = $connect->query($select_coms);
                                      $row_coms    = $result_coms->fetch_assoc();
                                      ?>

                                      <span style="color:#b1743b"><?php echo $row_coms['name'] ; ?></span>
                                      <i style="position: relative;color:#8ad144;left: 18px;top: 1px;margin-left: -12px;" class="fa fa-bookmark"></i><span>Show on Map</span></a>

                                    </a>

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
                                        <p>Beds</p>
                                        <img src="img/rooms/bed.png" alt="">
                                        <span> <?php  echo $row_search['room_number'] ?> </span>
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
                                <span>$<?php  echo $row_search['price'] ?></span>
                            </div>
                            <a href="single-property.php?prop=<?php echo $row_search['id']  ?>" class="site-btn btn-line">View Property</a>
                        </div>
                    </div>
                </div>
              <?php  } ?>
            </div>
        </div>
    </section>
  <?php }else{
        ?>
        <section style="background-color:aliceblue;" class="hotel-rooms spad-2">
        <div style="font-size: 200px;
    text-align: center;" class="found-items">
            404
        </div>
        <div style="font-size: 27px;
    text-align: center;" class="found-items">
            Use search bar Above :)
        </div>
            </section>
<?php  } ?>
    <!-- Hotel Room Section End -->
    <!-- Footer Section Begin -->

    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>
<?php include "include/footer.php"; ?>
</body>

</html>
