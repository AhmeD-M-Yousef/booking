<?php  include "include/header.php"; ?>
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg about-us" data-setbg="img/bg.jpg">
        <div class="container hero-text text-white">
            <h2>Contact</h2>
        </div>
    </section>
    <!-- Hero Section End -->
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
    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h4>Get in Touch</h4>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="name" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" class="subject" placeholder="Subject" required>
                                    <textarea placeholder="Message" class="message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                   <div class="col-lg-2">
                                     <button style="width:100%" class="site-btn c-btn  sendmessage">Send</button>
                                   </div>
                                    <br><br><br>
                                   <div class="hiddendiv col-lg-10"  >

                                   </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h4>Contact Details</h4>
                        <ul class="contact-addr">
                            <li><i class="flaticon-placeholder"></i><span>132 Liberty Streetelit, Plano, Texas</span>
                            </li>
                            <li><i class="flaticon-envelope"></i><span>hello@home.com</span></li>
                            <li><i class="flaticon-smartphone"></i><span>214-805-4428</span></li>
                        </ul>
                        <p>Monday ??? Friday: 9 am ??? 5 pm</p>
                        <p>Saturday: 9 am ??? 1pm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
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
    // contact us form
    $(document).on('click','.sendmessage',function(ev){
      ev.preventDefault();
      var name = $('.name').val();
      var email = $('.email').val();
      var subject = $('.subject').val();
      var message = $('.message').val();

      $.post('function/message.php',{name:name,email:email,subject:subject,message:message},function(data){
        if(data == 1 ){
          $('.hiddendiv').html('<div style="border-radius:4px;background-color:rgba(126,204,48,.9);color:white;padding-top:11px;padding-left:15px;font-size:18px;height:48px;"><i class="fa fa-fa"></i>  Message sent successfully</div>');
          $('.name').val("");
          $('.email').val("");
          $('.subject').val("");
          $('.message').val("");
        }
        if(data == 2 ){

          $('.hiddendiv').html('<div style="border-radius:4px;background-color:rgba(217, 30, 24,.8);color:white;padding-top:11px;padding-left:15px;font-size:18px;height:48px;"><i class="fa fa-fa"></i>  Please fill all fields !</div>');
        }
        if(data == 3 ){
          $('.hiddendiv').html('<div style="border-radius:4px;background-color:rgba(217, 30, 24,.8);color:white;padding-top:11px;padding-left:15px;font-size:18px;height:48px;"><i class="fa fa-fa"></i>  Please Insert Valid email address !</div>');
        }
        if(data == 4 ){
          $('.hiddendiv').html('<div style="border-radius:4px;background-color:rgba(217, 30, 24,.8);color:white;padding-top:11px;padding-left:15px;font-size:18px;height:48px;"><i class="fa fa-fa"></i>  Message already sent !</div>');

        }
      })

    })
    </script>
    <?php include "include/footer.php"; ?>
</body>

</html>
