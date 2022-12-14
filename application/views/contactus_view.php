
<style type="text/css">
  
  /*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
.contact .info-box {
  color: #444444;
  text-align: center;
  box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
  padding: 20px 0 30px 0;
  background-color: #fff;

}

.contact .info-box i {
  font-size: 32px;
  color: #ff6a00;
  border-radius: 50%;
  padding: 8px;
  border: 2px dotted #fef5f4;
}

.contact .info-box h3 {
  font-size: 20px;
  color: #777777;
  font-weight: 700;
  margin: 10px 0;
}

.contact .info-box p {
  padding: 0;
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.contact .php-email-form {
  box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
  padding: 30px;
  background-color: #fff;

}

.contact .php-email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

.contact .php-email-form input::focus, .contact .php-email-form textarea::focus {
  background-color: #4d31a9;
}

.contact .php-email-form input {
  padding: 20px 15px;
}

.contact .php-email-form textarea {
  padding: 12px 15px;
}

.contact .php-email-form button[type="submit"] {
  background: #ff6a00;
  border: 0;
  border-radius: 50px;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
}

.contact .php-email-form button[type="submit"]:hover {
  background: #e6573f;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


</style>








   <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact pb-5">
      <div class="container">
        <h2 class="text-center p-5">Contact Us</h2>
        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="fa fa-map-marker"></i>
              <h3>Our Address</h3>
              <p>Al-Wafaa Complex,Block 1 Building 35, Office No.8-9,
              Al-Dajeej, Farwaniya-Kuwait</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="fa fa-envelope"></i>
              <h3>Email Us</h3>
              <p>info@b2peak.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="fa fa-phone"></i>
              <h3>Call Us</h3>
              <p>
                <!-- <strong>Country:</strong> KUWAIT <br> -->
              <strong>Phone: </strong>+965-2434 1161</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">

            <div class="map">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js??key=AIzaSyA8aqinnrTK_cNIbvjhcM_XyEhOBD6v41o">
                 
                </script>

            <div style="overflow:hidden;height:auto;width:100%;">
                  <div id="gmap_canvas" style="height:25rem;width:100%;"></div>

                  <a class="google-map-code" href="http://www.pureblack.de/google-maps/" id="get-map-data">pureblack.de</a></div>
                <script type="text/javascript"> 
                function init_map(){
                  var myOptions = {zoom:14, scrollwheel:false,center:new google.maps.LatLng(29.263837,47.964549),mapTypeId: google.maps.MapTypeId.ROADMAP,mapTypeControl: true};
                  map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                  marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(29.263837,47.964549)});
                  infowindow = new google.maps.InfoWindow({content:"<b>B2PEAK Pvt Ltd</b>" });
                google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script></div>


            <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.8622498983023!2d76.2671298142847!3d10.432503968301386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7f09f796488cf%3A0x131ce9a414bf4f31!2sBraintech%20Computers!5e0!3m2!1sen!2sin!4v1591269316723!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->



<script type="text/javascript">
  
  $("#idFormContactus").submit(function(e) {

        
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Home/contactusmail');?>/",
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,
                     beforeSend: function()
                      {
                          notifygrocery('Loading...','info');
                      }, 
               success: function(data){
               if(data == "success"){
                  notifygrocery('Mail send','success');
                  $('#input-emails').val('');
                  $('#input-names').val('');
                  $('#input-enquirys').val('');
                 
               }else{
                  notifygrocery('Something wrong','danger');
               }

              // show response from the php script.            
              }
             });
      });

</script>