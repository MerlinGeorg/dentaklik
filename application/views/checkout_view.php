<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<style>
body {
  font-family: Arial;
  font-size: 17px;
  /*padding: 8px;*/
}

* {
  box-sizing: border-box;
}

.row-check {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-check {
  background-color: #fff;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.row-check input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.row-check input[type=text]:focus {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #fe7200;
  border-radius: 3px;
}

.row-check label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn-check {
  background-color: #fd8304;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  /*width: 100%;*/
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn-check:hover {
  background-color: #ffab10;
}

.tog-check a {
  color: #2196F3;
  text-decoration: none;

}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row-check {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>



  <?php
        // Enabling error reporting
        error_reporting(-1);
        ini_set('display_errors', 'On');

        require_once __DIR__ . '/firebase.php';
        require_once __DIR__ . '/push.php';

        $firebase = new Firebase();
        $push = new Push();

        // optional payload
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';

        // notification title
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        
        // notification message
        $message = isset($_GET['message']) ? $_GET['message'] : '';
        
        // push type - single user / topic
        $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
        
        // whether to include to image or not
        $include_image = isset($_GET['include_image']) ? TRUE : FALSE;


        $push->setTitle($title);
        $push->setMessage($message);
        if ($include_image) {
            $push->setImage('http://api.androidhive.info/images/minion.jpg');
        } else {
            $push->setImage('');
        }
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);


        $json = '';
        $response = '';

        if ($push_type == 'topic') {
            $json = $push->getPush();
            $response = $firebase->sendToTopic('global', $json);
        } else if ($push_type == 'individual') {
            $json = $push->getPush();
            $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
            $response = $firebase->send($regId, $json);
        }
        ?>
        <div class="container" style="display: none;">
            <div class="fl_window">
                <div><img src="http://api.androidhive.info/images/firebase_logo.png" width="200" alt="Firebase"/></div>
                <br/>
                <?php if ($json != '') { ?>
                    <label><b>Request:</b></label>
                    <div class="json_preview">
                        <pre><?php echo json_encode($json) ?></pre>
                    </div>
                <?php } ?>
                <br/>
                <?php if ($response != '') { ?>
                    <label><b>Response:</b></label>
                    <div class="json_preview">
                        <pre><?php echo json_encode($response) ?></pre>
                    </div>
                <?php } ?>

            </div>

            <form class="pure-form pure-form-stacked" method="get">
                <fieldset>
                    <legend>Send to Single Device</legend>

                    <label for="redId">Firebase Reg Id</label>
                    <input type="text" id="redId" name="regId" class="pure-input-1-2" placeholder="Enter firebase registration id">

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="pure-input-1-2" placeholder="Enter title">

                    <label for="message">Message</label>
                    <textarea class="pure-input-1-2" rows="5" name="message" id="message" placeholder="Notification message!"></textarea>

                    <label for="include_image" class="pure-checkbox">
                        <input name="include_image" id="include_image" type="checkbox"> Include image
                    </label>
                    <input type="hidden" name="push_type" value="individual"/>
                    <button type="submit" id="single_firebase" class="pure-button pure-button-primary btn_send">Send</button>
                </fieldset>
            </form>
            <br/><br/><br/><br/>

            <form class="pure-form pure-form-stacked" method="get">
                <fieldset>
                    <legend>Send to Topic `global`</legend>

                    <label for="title1">Title</label>
                    <input type="text" id="title1" name="title" class="pure-input-1-2" placeholder="Enter title">

                    <label for="message1">Message</label>
                    <textarea class="pure-input-1-2" name="message" id="message1" rows="5" placeholder="Notification message!"></textarea>

                    <label for="include_image1" class="pure-checkbox">
                        <input id="include_image1" name="include_image" type="checkbox"> Include image
                    </label>
                    <input type="hidden" name="push_type" value="topic"/>
                    <button type="submit" class="pure-button pure-button-primary btn_send">Send to Topic</button>
                </fieldset>
            </form>
        </div>


<div class="row-check" style="margin: 20px;">
  <div class="col-75">
    <div class="container-check">

      <input  type="hidden" value="0" name="payment_mode" id="payment_mode" />
      
      <?php
      if (isset($_SESSION['grocuname'])) {
        $userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
          }
        ?>
      <input  type="hidden" value="<?php echo $userid; ?>" name="user_id" id="user_id" />

    <!-- home address -->

 <div id="shipping-new">
      <form method="POST" action="" id="Formhomeaddress">
        <div class="row-check">
          <div class="col-50">
            <h3>Billing Address</h3>
            <input type="hidden" name="homekm" id="homekm">
                    <input type="hidden" 
                    <?php if(!empty($reshome)){?>
                      value="<?php echo $reshome->address_id; ?>"
                    <?php }else{?>
                      value=""
                    <?php }?> id="existingaddrid">

            <label for="fname"> Choose Address</label>
            <label class="tog-check">
            <input type="checkbox" onclick="home();" class="home" checked="checked" name="sameadr"> <a id="bt" value="existingaddr" name="payment_address" class="forg-right">Home Delivery Address
            </a></label>
            <label class="tog-check">
            <input type="checkbox" class="other" onclick="other();" name="sameadr"> <a id="bt" value="newddr" name="payment_address" class="forg-right">Other Delivery Address
            </a></label>

            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="homename" value="<?php if (isset($reshome)) echo $reshome->address_name; ?>" name="homename" required="required" >
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" required="required" value="<?php echo $_SESSION['grocuname']; ?>">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="homeaddress" placeholder=""  value="<?php if (isset($reshome)) echo $reshome->address_addr; ?>" name="homeaddress" required="required">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" value="<?php if (isset($reshome)) echo $reshome->address_city; ?>" id="homecity" placeholder=""  name="homecity" required="required">

            <div class="row-check">
              <div class="col-50">
                <label for="state">Nearest Landmark</label>
                <input type="text" name="landmark2" id="autocomplete2" required="required" value="<?php if (isset($reshome)) echo $reshome->address_nearest_location; ?>">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="homepincode" placeholder="" value="<?php if (isset($reshome)) echo $reshome->address_pincode; ?>" name="homepincode">
              </div>
            </div>
          </div>

          
                            <input type="hidden" class="form-control" name="addrlat2" id="addrlat2" value="<?php if (isset($reshome)) echo $reshome->address_lat; ?>">
                            <input type="hidden" class="form-control" name="addrlong2" id="addrlong2" value="<?php if (isset($reshome)) echo $reshome->address_long; ?>">


          





          <div class="col-50">
            <h3>Payment Method</h3>
            <label for="fname">Please select a option</label>
            <input type="radio"  checked="checked"  onclick="payment_type();"  value="0" name="payment_mode" id="payment_mode_cash" data-id="payment-existingc">&nbsp;Cash on delivery</label>
            <br>
              <input type="radio"  value="1" onclick="payment_type();"  id="payment_mode_online" name="payment_mode" data-id="payment-newc">&nbsp;Credit Card/Bank</label>
            
          
          </div>
        </div>

      
       <!--  <label class="tog-check">
          <input type="checkbox" onclick="other();"  name="sameadr"> <a id="bt" value="newddr" name="payment_address" class="forg-right">Other Delivery address
        </a></label> -->
         <input type="hidden" id="getaddressid">
        <input type="submit" value="Continue to checkout" class="btn-check">
      </form>
    </div>



     <!-- other address -->



 <div id="payment-newaddr" style="display: none;">
      <form method="POST" action="" id="Formotheraddress">
        <div class="row-check">
          <div class="col-50">
            <h3>Billing Address</h3>
            <input type="hidden" name="otherkm" id="otherkm">
                 <input type="hidden" <?php if(!empty($resother)){?>
                      value="<?php echo $resother->address_id; ?>"
                 <?php }else{?>
                      value=""
                  <?php }?> id="newaddrid">

            <label for="fname"> Choose Address</label>
            <label class="tog-check">
            <input type="checkbox" onclick="home();" name="sameadr" class="home"> <a id="bt" value="existingaddr" name="payment_address" class="forg-right">Home Delivery Address
            </a></label>
            <label class="tog-check">
            <input type="checkbox" onclick="other();" checked="checked" class="other" name="sameadr"> <a id="bt" value="newddr" name="payment_address" class="forg-right">Other Delivery Address
          </a></label>

            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" placeholder="" id="othername" value="<?php  if (isset($resother)) echo $resother->address_name; ?>" name="othername" required="required" >
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" required="required" value="<?php echo $_SESSION['grocuname']; ?>">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="otheraddress" placeholder=""  value="<?php if (isset($resother)) echo  $resother->address_addr; ?>" name="otheraddress" required="required" required="required">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="othercity" placeholder=""  name="othercity" value="<?php if (isset($resother)) echo $resother->address_city; ?>" required="required">

            <div class="row-check">
              <div class="col-50">
                <label for="state">Nearest Landmark</label>
                 <input type="text"  name="landmark3" id="autocomplete3" required="required" value="<?php if (isset($resother)) echo $resother->address_nearest_location; ?>">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text"  id="otherpincode" placeholder="" value="<?php  if (isset($resother)) echo $resother->address_pincode; ?>" name="otherpincode">
              </div>
            </div>
          </div>

          
                            <input type="hidden" class="form-control" name="addrlat2" id="addrlat2" value="<?php if (isset($reshome)) echo $reshome->address_lat; ?>">
                            <input type="hidden" class="form-control" name="addrlong2" id="addrlong2" value="<?php if (isset($reshome)) echo $reshome->address_long; ?>">


          

          <div class="col-50">
            <h3>Payment Method</h3>
            <label for="fname">Please select a option</label>
            <input type="radio"  checked="checked"  onclick="payment_type1();"  value="0" name="payment_mode" id="payment_mode_cash1" data-id="payment-existingc">&nbsp;Cash on delivery</label>
            <br>
              <input type="radio"  value="1" onclick="payment_type1();"  id="payment_mode_online1" name="payment_mode" data-id="payment-newc">&nbsp;Credit Card/Bank</label>
             
          
          </div>
        </div>

      
       <!--  <label class="tog-check">
          <input type="checkbox" onclick="home();" name="sameadr"> <a id="bt" value="existingaddr" name="payment_address" class="forg-right">Home delivery address
        </a></label> -->
         <input type="hidden" id="getaddressid">
        <input type="submit" value="Continue to checkout" class="btn-check">
      </form>
    </div>



    </div>
  </div>
  <div class="col-25 itemsfill" id="test1">
    
  </div>
</div>


<script type="text/javascript">


function home()
{
  var x = document.getElementById("payment-newaddr");
  var y = document.getElementById('shipping-new');
  
    x.style.display = "none";
    y.style.display = "block";

     $('.home').prop('checked', true);  
    $('.other').prop('checked', false); 

}


function other() {
  var x = document.getElementById("payment-newaddr");
  var y = document.getElementById('shipping-new');
  
    x.style.display = "block";
    y.style.display = "none";

    $('.home').prop('checked', false);  
    $('.other').prop('checked', true);  
}

</script>


</body>
</html>


<script type="text/javascript">
  $( document ).ready(function() {

                $("a.addresslink").attr("class", "accordion-toggle addresslink");
                $("a.addresslink").attr("aria-expanded", "true");
                $('#collapse-shipping-address').attr("class", "panel-collapse collapse show");


                   var exisaddr = $('#existingaddrid').val();
                   $('#getaddressid').val(exisaddr);
                
                if($('#addrlat2').val() != '' || $('#addrlat2').val() != ''){
                  checklandmark($('#addrlat2').val(),$('#addrlong2').val());
                }else{
                   $(':input[type="submit"]').prop('disabled', true);
                }    // getitemsforcheckout();

                 getitemsforcheckout();

      });
  



  var addrselected = "";
  $("#Formhomeaddress").submit(function(e) {
    addrselected = "home";
         e.preventDefault(); // avoid to execute the actual submit of the form.
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/inserthomeaddress');?>/",
               data: form.serialize(), // serializes the form's elements.
               success: function(data){
               if(data == "success"){
                orderconfirm();
                // notifygrocery('address saved','success');
                 
                // $("a.paymentlink").attr("href", "#collapse-payment-method");
                // $('#collapse-shipping-address').attr("class", "panel-collapse collapse hide");
                // $("a.paymentlink").attr("class", "accordion-toggle paymentlink");
                // $("a.paymentlink").attr("aria-expanded", "true");
                // $('#collapse-payment-method').attr("class", "panel-collapse collapse show");


                

               }else{
                notifygrocery('Error','danger');
                 
               }           
              }
             });
      });


  $("#Formotheraddress").submit(function(e) {
        addrselected = "other";
         e.preventDefault(); // avoid to execute the actual submit of the form.
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/insertotheraddress');?>/",
               data: form.serialize(), // serializes the form's elements.
               success: function(data){
               if(data == "success"){
                orderconfirm();
                // notifygrocery('Address saved','success');

                // $("a.paymentlink").attr("href", "#collapse-payment-method");
                // $('#collapse-shipping-address').attr("class", "panel-collapse collapse hide");
                // $("a.paymentlink").attr("class", "accordion-toggle paymentlink");
                // $("a.paymentlink").attr("aria-expanded", "true");
                // $('#collapse-payment-method').attr("class", "panel-collapse collapse show");
               }else{
                notifygrocery('Error','danger');
                 
               }

              // show response from the php script.            
              }
             });
      });



 var kmchoose="";

  function payment_type()
  {
    if(document.getElementById('payment_mode_online').checked)
    {
        document.getElementById('payment_mode').value = 1;
        $('#payment_mode_cash').prop('checked', false);   
         $('#payment_mode_online').prop('checked', true);   
    }
    else
    {
        document.getElementById('payment_mode').value = 0;
         $('#payment_mode_online').prop('checked', false);
         $('#payment_mode_cash').prop('checked', true);   
    }

     //alert(document.getElementById('payment_mode').value);

  }

  function payment_type1()
  {
    if(document.getElementById('payment_mode_online1').checked)
    {
        document.getElementById('payment_mode').value = 1;
        $('#payment_mode_cash1').prop('checked', false);   
         $('#payment_mode_online1').prop('checked', true);   
    }
    else
    {
        document.getElementById('payment_mode').value = 0;
         $('#payment_mode_online1').prop('checked', false);
         $('#payment_mode_cash1').prop('checked', true);   
    }

    // alert(document.getElementById('payment_mode').value);

  }




  function orderconfirm(){


   var latits = "10.530345";
   var longts = "76.214729";
   var address_id = $('#getaddressid').val();
   var total = document.getElementById('total').value;

    if(addrselected == "home")
    {
        kmchoose = $('#homekm').val();
     }
     else
     {
         kmchoose = $('#otherkm').val();
     }


    var payment_mode = document.getElementById('payment_mode').value;
    var userid = document.getElementById('user_id').value;

   // alert(payment_mode);
    //gateway
    if(payment_mode == 1)
    {
     // alert("test_online");

        window.location.href="<?php echo base_url('index.php/checkout/knet_payment');?>"+"?address="+address_id+"&km="+kmchoose+"&total="+total+"&id="+userid+'';

    }
    //gateway


    //cash on delivery
    else
    {
    //  alert("test_cash");

                $.ajax({
                    
                    method: "POST",
                    url: "<?php echo base_url('index.php/checkout/orderconfirm');?>/",
                     data: {latits:latits,longts:longts,addr:address_id,kmchoose:kmchoose},
                    
                   success: function(data){
                     var result = JSON.parse(data);

                         for (var i = 0; i < result['details'].length ; i++) {

                        var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
                        firebase_id = firebase_id.substring(1, firebase_id.length-1);
                        var user = JSON.stringify(result['details'][i]['user_displayname']);
                         user = user.substring(1, user.length-1);

                          document.getElementById('redId').value = firebase_id;
                          document.getElementById('title').value = "Order Success";
                          document.getElementById('message').value = "Dear "+user+", Your purchase was success, Thank you for shopping with us!";
                           $('#single_firebase').trigger('click');
                            }

                    

                     if(result['status'] == 'success'){
                      notifygrocery('Your Order Confirmed','success');
                      deleteitemcartcheckout();
                      window.location.replace('<?php echo base_url();?>index.php/orderhistory');
                    }else{
                      notifygrocery('Your Order Not Confirmed','danger');
                    }
                    
                    }
                });

    }

   
  }


  function deleteitemcartcheckout(){
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/cart/deletecartitemcheckout');?>/",
      data:'',
      success: function(data){
      if(data == 'success'){
           
           getshoppingitems();
           countcart();
        }else{
           alert('error');
        }
      }
     });
  }
  function getitemsforcheckout(){
    var latits = sessionStorage.getItem("latit");
    var longts = sessionStorage.getItem("longt");
    if(addrselected == "home"){
        kmchoose = $('#homekm').val();
    }else{
        kmchoose = $('#otherkm').val();
    }
    $.ajax({
                
                method: "POST",
                url: "<?php echo base_url('index.php/checkout/getcartitemsforcheckout');?>/",
                data: {place1:latits,place2:longts,kmcharge:kmchoose}, // se
               success: function(data){
                // alert(data);
                $('.itemsfill').html(data);
                }
             });
  }

$('input[name=\'payment_mode\']').on('change', function() {
    if (this.value == 'new') {

    $('#payment-existingc').hide();
    $('#payment-newc').show();

    
    
  } else {
    
    $('#payment-existingc').show();
    $('#payment-newc').hide();
     // $("a.checkoutlink").attr("href", "#collapse-checkout-confirm");

  }
});
$('input[name=\'payment_address\']').on('change', function() {
    if (this.value == 'existingaddr') {
      var exisadd = $('#existingaddrid').val();
     $('#getaddressid').val(exisadd);
    $('#payment-existingaddr').show();
    $('#payment-newaddr').hide();

if($('#addrlat2').val() != '' || $('#addrlong2').val() != ''){
  checklandmark($('#addrlat2').val(),$('#addrlong2').val());
}
else
{

}    
} 
  else {
    var newaddr = $('#newaddrid').val();
     $('#getaddressid').val(newaddr);
    $('#payment-existingaddr').hide();
    $('#payment-newaddr').show();
    if($('#addrlat3').val() != '' || $('#addrlong3').val() != ''){
  checklandmark($('#addrlat3').val(),$('#addrlong3').val());
        } else{
          $(':input[type="submit"]').prop('disabled', true);   
        }
  }
});
$( ".paymentbtn" ).click(function() {
             
  getitemsforcheckout();

                $("a.checkoutlink").attr("href", "#collapse-checkout-confirm");
                $('#collapse-payment-method').attr("class", "panel-collapse collapse hide");
                $("a.checkoutlink").attr("class", "accordion-toggle checkoutlink");
                $("a.checkoutlink").attr("aria-expanded", "true");
                $('#collapse-checkout-confirm').attr("class", "panel-collapse collapse show in itemsfill");

});
</script>


<script type="text/javascript">



  $('#autocomplete2').on('input', function() {
  
    var address = document.getElementById('autocomplete2');

    var autocomplete = new google.maps.places.Autocomplete(address);
    
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      sessionStorage.setItem("locates", place.formatted_address);
      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();
      $('#addrlat2').val(latitude);
      $('#addrlong2').val(longitude);
      checklandmark(latitude,longitude);
    });
  });



    $('#autocomplete3').on('input', function() {  
  
    var address = document.getElementById('autocomplete3');

    var autocomplete = new google.maps.places.Autocomplete(address);
    
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();
      $('#addrlat3').val(latitude);
      $('#addrlong3').val(longitude);
      checklandmark(latitude,longitude);
    });
  
  });



 function checklandmark(latit2,longit2){
  var latits1 = sessionStorage.getItem("latit");
  var longts1 = sessionStorage.getItem("longt");
  $.ajax({
                
      method: "POST",
      url: "<?php echo base_url('index.php/checkout/getcartitemsforlandmark');?>/",
      data: {latits1:latits1,longts1:longts1,latit2:latit2,longit2:longit2}, // se
     success: function(data){
        
      if(data == 'falses'){
        alert('Delivery is not available in your area');
        $(':input[type="submit"]').prop('disabled', true);
      }else{
        $('#homekm').val(data);
        $('#otherkm').val(data);
        $(':input[type="submit"]').prop('disabled', false);
      }
    }
   });
 }
</script>

