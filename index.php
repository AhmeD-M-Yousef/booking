<!DOCTYPE html>
<html>
<?php  include "include/header.php";
      include 'admin/function/connect.php';
?>
    <!-- Hero Section Begin -->
    <section class="hero-section home-page set-bg" data-setbg="img/bg.jpg">
        <div class="container hero-text text-white">
            <h2>Find your next</h2>
            <h1>dream home.</h1>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Filter Search Section Begin -->
    <div class="filter-search ">
    <?php include "include/search.php";   ?>
    </div>
    <!-- Filter Search Section End -->
    <!-- Hotel Room Section Begin -->
    <section class="hotel-rooms spad">
        <div class="container">
            <div class="row">
<?php
$select_properties = "SELECT * FROM property LIMIT 6";
$result_properties = $connect->query($select_properties);
foreach ($result_properties as $row_properties) {
$row_img = $row_properties['img'];
$row_ex = explode(',',$row_img);
?>
                <div class="col-lg-4 col-md-6">
                    <div class="room-items">
                        <div class="room-img set-bg" data-setbg="admin/image/<?php echo $row_ex[0] ?>">
                            <a href="#" class="room-content">
                                <i class="flaticon-heart"></i>
                            </a>
                        </div>
                        <div class="room-text">
                            <div class="room-details">
                                <div class="room-title">
                                  <?php
                                   $names_show = $row_properties['name'];
                                   $first10Characters = substr($names_show, 0, 30);
                                   ?>
                                    <h5><?php echo $first10Characters ?><?php if(strlen($names_show)>30){echo " ...";}  ?></h5>
                                    <?php
                                    $location_id = $row_properties['gov_id'];
                                    $select_governor = "SELECT * FROM governorate WHERE id = '$location_id'";
                                    $result_governor = $connect->query($select_governor);
                                    $row_governor    = $result_governor->fetch_assoc();
                                    ?>
                                    <a href="#"><i class="flaticon-placeholder"></i> <span><?php echo $row_governor['name'] ?></span></a>
                                    <a href="" class="large-width"><i class="flaticon-cursor"></i>
                                      <?php
                                      $coms_id = $row_properties['com_id'];
                                      $select_coms = "SELECT * FROM company WHERE id = '$coms_id'";
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
                                        <p>Rooms</p>
                                        <img src="img/rooms/bed.png" alt="">
                                        <span><?php echo $row_properties['room_number'] ?></span>
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
                                <span>$<?php echo $row_properties['price']?></span>
                            </div>
                            <a href="single-property.php?prop=<?php echo $row_properties['id']?>" class="site-btn btn-line">View Property</a>
                        </div>
                    </div>
                </div>
<?php  }  ?>

            </div>
        </div>
    </section>
    <!-- Hotel Room Section End -->
    <!-- Popular Room Section Begin -->
    <section class="popular-room set-bg p-in" data-setbg="img/bg-2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="slider-active owl-carousel">
<?php
$select_propert = "SELECT * FROM property WHERE price < 1500 LIMIT 2";
$result_propert = $connect->query($select_propert);
foreach ($result_propert as $row_propert) {
?>

                        <div class="popular-items">
                            <div class="popular-room-text">
                                <div class="popular-room-details">
                                    <div class="popular-room-title">
                                        <h5><?php echo $row_propert['name'] ?></h5>
                                        <?php
                                        $loc_id = $row_propert['gov_id'];
                                        $select_governora = "SELECT * FROM governorate WHERE id = '$loc_id'";
                                        $result_governora = $connect->query($select_governora);
                                        $row_governora    = $result_governora->fetch_assoc();
                                        ?>
                                        <a href="#"><i class="flaticon-placeholder"></i> <span><?php echo $row_governora['name'] ?></span></a>
                                        <a href="#"><i class="flaticon-cursor"></i> <span>Show on Map</span></a>
                                    </div>
                                </div>
                                <div class="popular-room-description">
                                    <div class="popular-room-desc">
                                        <p><?php echo $row_propert['description'] ?></p>
                                    </div>
                                </div>
                                <div class="popular-room-features">
                                    <div class="popular-room-info">
                                        <div class="size">
                                            <p>Lot Size</p>
                                            <img src="img/rooms/size.png" alt="">
                                            <i class="flaticon-bath"></i>
                                            <span>2561 sqft</span>
                                        </div>
                                        <div class="beds">
                                            <p>Rooms</p>
                                            <img src="img/rooms/bed.png" alt="">
                                            <span><?php echo $row_propert['room_number'] ?></span>
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
                                <div class="popular-room-price">
                                    <p>For Sale</p>
                                    <span>$<?php echo $row_propert['price'] ?></span>
                                    <span class="deal">Best Deal</span>
                                </div>
                                <a href="single-property.php?prop=<?php echo $row_propert['id'] ?>" class="site-btn btn-line">View Property</a>
                            </div>
                        </div>
<?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Room Section End -->
    <!-- Newslatter Section Begin -->
    <section style="height: 471px;" class="newslatter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="newslatter-text">
                        <img src="img/message.png" alt="">
                        <h4>Join our mailing to get weekly updates on <br>our exclusive deals.</h4>
                        <form>
                            <input class="emailaddress" type="text" placeholder="Email address">
                            <button  type="submit" class="site-btn news-btn subs_btn">Subscribe!</button>

                        </form>
<div class="showdiv" style="display:none">


                        <div class="backmessage"  style="color:white;
                                    position: relative;
                                    top: 30px;
                                    color: white;
                                    border: 2px white solid;
                                    display: inline-block;
                                    padding: 13px;
                                    border-radius: 16px;
                                    width: 455px;">
                         </div>


</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newslatter Section End -->
    <!-- Servies Section Begin -->
    <section class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-side">
                        <h2><span>Why choose homes?</span><br>Because we we are the best in <br>the business.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id est nec nisl tristique
                            dignissim semper sed diam. Donec vulputate neque in massa hendrerit, non dignissim ipsum
                            varius. Mauris dignissim libero ipsum, nec molestie nulla molestie at. Nam imperdiet
                            hendrerit finibus. Sed porttitor ultricies sagittis. Nullam lobortis nec quam vitae
                            venenatis. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-side">
                        <ul>
                            <li><img src="img/check.png" alt="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li><img src="img/check.png" alt="">Praesent tincidunt diam in ante faucibus tristique.</li>
                            <li><img src="img/check.png" alt="">Vivamus id nisl sed mi varius lobortis.</li>
                            <li><img src="img/check.png" alt="">Suspendisse sit amet erat placerat, molestie neque id
                            </li>
                            <li><img src="img/check.png" alt="">Fusce pretium libero sit amet ipsum posuere pretium.
                            </li>
                            <li><img src="img/check.png" alt="">Praesent tincidunt diam in ante faucibus tristique.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Servies Section End -->
    <section class="instagram">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Don’t forget to follow us on Instagram @homes</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section Begin -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
      // subscribe
      $(document).on('click','.subs_btn',function(e){
        e.preventDefault();
        var email = $('.emailaddress').val();
        $.post('function/subscribe.php',{email:email},function(data){
          if(data == 1){
            $('.showdiv').css('display','inline-block');
            $('.backmessage').show().html('subscribtion Done').fadeOut(5000);
            $('.emailaddress').removeClass('x').attr('placeholder','Enter your mail').val("");
          }
          if(data == 2){
            $('.emailaddress').addClass('x').attr('placeholder','Please Insert Your Email!').val('');
          }
          if(data == 3){
           $('.emailaddress').addClass('x').attr('placeholder','Mail subscribed befor').val('');
         }
         if(data == 4){
          $('.emailaddress').addClass('x').attr('placeholder','Please Insert Valid email address').val('');
        }


        })
      })



    </script>


<?php include "include/footer.php"; ?>
</body>

</html>
