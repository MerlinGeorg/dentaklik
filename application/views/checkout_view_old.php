
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



<div class="container" style="margin: 20px;">
  <!-- <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/cart">Shopping Cart</a></li>
    <li><a href="<?php echo base_url(); ?>index.php/checkout">Checkout</a></li>
  </ul> -->
 <!--  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">
        <div class="column-block">
          <div class="columnblock-title">Categories</div>
<div class="category_block">
            <ul class="box-category treeview-list treeview">
          
          <?php 
    
foreach ($categoriesdesc as $rowdesc){
        // foreach($categorynamestest as $row){
            
$catid = base64_encode($rowdesc->cat_id);

       ;?>
            <li><a class="activSub" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>" ><?php echo $rowdesc->cat_name; ?></a>
            <?php
               
             if(!empty($rowdesc->subs)){?>
                 <ul>
                <?php foreach($rowdesc->subs as $scategory){ 
                    $subid = base64_encode($scategory->sub_id);?>  
                    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>"><?php echo $scategory->sub_name; ?></a></li>
            <?php 
                }?>
                
              </ul>
            <?php }?>
             </li>
          <?php }?>
           </ul>
          </div>
        </div>
      </div>
    </div> -->  
    <div class="col-sm-2">
    </div>
   <div class="col-sm-9" id="content">
      <h1>Checkout</h1>
      <div id="accordion" class="panel-group">
      
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle collapsed addresslink" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-address" aria-expanded="false"> Step 1: Delivery Details <i class="fa fa-caret-down"></i></a></h4>
          </div>
            <div id="collapse-shipping-address" role="heading" class="panel-collapse collapse" aria-expanded="false">
        
                <br>
                <div id="shipping-new" >
                <div class="radio">
                 <input type="radio" checked="checked" value="existingaddr" name="payment_address" data-id="payment-existingaddr"><label>&nbsp;Home Address</label>
               </div>
                 <div id="payment-existingaddr">
                   <form class="form-horizontal" method="POST" action="" id="Formhomeaddress">
                    <input type="hidden" name="homekm" id="homekm">
                    <input type="hidden" 
                    <?php if(!empty($reshome)){?>
                      value="<?php echo $reshome->address_id; ?>"
                    <?php }else{?>
                      value=""
                    <?php }?> id="existingaddrid">
                <fieldset id="addresshome">
                    <legend>Home Address</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">Full name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="homename" placeholder="Full Name" value="<?php if (isset($reshome)) echo $reshome->address_name; ?>" name="homename">
                        </div>
                    </div>
                  
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="homeaddress" placeholder="Address"  value="<?php if (isset($reshome)) echo $reshome->address_addr; ?>" name="homeaddress" required="required" />
                        </div>
                    </div>
                   
                    <div class="form-group required">
                        <label for="input-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php if (isset($reshome)) echo $reshome->address_city; ?>" id="homecity" placeholder="City"  name="homecity">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="homepincode" placeholder="Post Code" value="<?php if (isset($reshome)) echo $reshome->address_pincode; ?>" name="homepincode">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="landmarks" class="col-sm-2 control-label" id="landmarks">Nearest Landmark</label>
                        <div class="col-sm-10">
                           
                            <input type="text" class="form-control" name="landmark2" id="autocomplete2" required="required" value="<?php if (isset($reshome)) echo $reshome->address_nearest_location; ?>">
                            <input type="hidden" class="form-control" name="addrlat2" id="addrlat2" value="<?php if (isset($reshome)) echo $reshome->address_lat; ?>">
                            <input type="hidden" class="form-control" name="addrlong2" id="addrlong2" value="<?php if (isset($reshome)) echo $reshome->address_long; ?>">

                          
                        </div>
                    </div>

                </fieldset>


                <div class="buttons">
                    <div class="pull-right">
                        <input class="btn btn-primary " type="submit"    value="continue" />
                    </div>
                </div>
             </form>
              </div>
                 <br>
                <!-- new one start -->
                <div class="radio">
                 <input type="radio" value="newddr" name="payment_address" data-id="payment-newaddr"><label>&nbsp;Other</label>
               </div>
                 <div id="payment-newaddr" style="display: none;">
               <form class="form-horizontal" method="POST" action="" id="Formotheraddress">
                <input type="hidden" name="otherkm" id="otherkm">
                 <input type="hidden" <?php if(!empty($resother)){?>
                      value="<?php echo $resother->address_id; ?>"
                 <?php }else{?>
                      value=""
                  <?php }?> id="newaddrid">
                                <fieldset id="addressother">
                    <legend>Address</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">Full name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="othername" placeholder="Full Name" value="<?php  if (isset($resother)) echo $resother->address_name; ?>" name="othername">
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="otheraddress" placeholder="Address"  value="<?php if (isset($resother)) echo  $resother->address_addr; ?>" name="otheraddress" required="required" />
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label for="input-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="othercity" placeholder="City"  name="othercity" value="<?php if (isset($resother)) echo $resother->address_city; ?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="otherpincode" placeholder="Post Code" value="<?php  if (isset($resother)) echo $resother->address_pincode; ?>" name="otherpincode">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="landmarks3" class="col-sm-2 control-label" id="landmarks3">Nearest Landmark</label>
                        <div class="col-sm-10">
                           
                            <input type="text" class="form-control" name="landmark3" id="autocomplete3" required="required" value="<?php if (isset($resother)) echo $resother->address_nearest_location; ?>">
                            <input type="hidden" class="form-control" name="addrlat3" id="addrlat3" value="<?php if (isset($resother)) echo $resother->address_lat; ?>">
                            <input type="hidden" class="form-control" name="addrlong3" id="addrlong3" value="<?php if (isset($resother)) echo $resother->address_long; ?>">

                           
                        </div>
                    </div>

                </fieldset>

                   <div class="buttons">
                    <div class="pull-right">
                   
                     
                        <input class="btn btn-primary " type="submit"    value="continue" />
                      
                </div>
               </form>
              </div>
                <!-- new one end -->
               
        
                </div>
            </div>
          </div>
        </div>
      </div>
    
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle collapsed paymentlink" data-parent="#accordion" data-toggle="collapse" href="#" aria-expanded="false">Step 2: Payment Method <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div id="collapse-payment-method" role="heading" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">
              <p>Please select the preferred payment method to use on this order.</p>
                <input type="radio" required="required" checked="checked"  onclick="payment_mode();"  value="0" name="payment_mode" id="payment_mode_cash" data-id="payment-existingc">&nbsp;Cash on delivery</label>
                <br>
                <label>
                    <input type="radio" required="required" value="1" onclick="payment_mode();"  id="payment_mode_online" name="payment_mode" data-id="payment-newc">&nbsp;Credit Card/Bank</label>
                <div id="payment-existingc">
                  <div class="buttons">
                    <div class="pull-right">
                        <input class="btn btn-primary paymentbtn" type="button" onclick="payment_mode();" value="continue" />

                        <input  type="hidden" value="0" name="payment_mode" id="payment_mode" />
                        
                    </div>
                </div>
                </div>
                
                  
               
               
                <div id="payment-newc"  style="display: none;">
                 
                   <div class="buttons">
                    <div class="pull-right">
                     
                       
                     
                        <input class="btn btn-primary paymentbtn" type="button"     value="continue" />
                     
                    </div>
                </div>
                </div>
             </div>
            <input type="hidden" id="getaddressid">
             
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle checkoutlink" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-confirm" aria-expanded="true" >Step 3: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div id="collapse-checkout-confirm" role="heading" class="panel-collapse collapse in itemsfill" aria-expanded="true" style="" >

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
                notifygrocery('data saved','success');
                 
                $("a.paymentlink").attr("href", "#collapse-payment-method");
                $('#collapse-shipping-address').attr("class", "panel-collapse collapse hide");
                $("a.paymentlink").attr("class", "accordion-toggle paymentlink");
                $("a.paymentlink").attr("aria-expanded", "true");
                $('#collapse-payment-method').attr("class", "panel-collapse collapse show");


                

               }else{
                notifygrocery('Error','danger');
                 
               }

              // show response from the php script.            
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
                notifygrocery('data saved','success');

                $("a.paymentlink").attr("href", "#collapse-payment-method");
                $('#collapse-shipping-address').attr("class", "panel-collapse collapse hide");
                $("a.paymentlink").attr("class", "accordion-toggle paymentlink");
                $("a.paymentlink").attr("aria-expanded", "true");
                $('#collapse-payment-method').attr("class", "panel-collapse collapse show");
               }else{
                notifygrocery('Error','danger');
                 
               }

              // show response from the php script.            
              }
             });
      });
 var kmchoose="";

  function payment_mode()
  {

    if(document.getElementById('payment_mode_online').checked)
    {
        document.getElementById('payment_mode').value = 1;
    }
    else
    {
        document.getElementById('payment_mode').value = 0;
    }



  }

  function orderconfirm(){


   var latits = "10.530345";
   var longts = "76.214729";
   var chseaddr = $('#getaddressid').val();
   var total = document.getElementById('total').value;

    if(addrselected == "home")
    {
        kmchoose = $('#homekm').val();
     }
     else
     {
         kmchoose = $('#otherkm').val();
     }

    var payment_mode = document.getElementById('payment_mode').value
    //gateway
    if(payment_mode == 1)
    {
        window.location.href="<?php echo base_url('index.php/checkout/knet_payment');?>"+"?address="+chseaddr+"&km="+kmchoose+"&total="+total;

    }
    //gateway


    //cash on delivery
    else
    {


                $.ajax({
                    
                    method: "POST",
                    url: "<?php echo base_url('index.php/checkout/orderconfirm');?>/",
                     data: {latits:latits,longts:longts,addr:chseaddr,kmchoose:kmchoose},
                    
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
  $( document ).ready(function() {

  });
  $('#autocomplete2').on('input', function() {
  
    var address = document.getElementById('autocomplete2');

    var autocomplete = new google.maps.places.Autocomplete(address);
    
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      // $('#fillocation').val(place.formatted_address);
      // document.getElementById("fillocation2").innerHTML = place.formatted_address.substring(0,63);
      sessionStorage.setItem("locates", place.formatted_address);
      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();
      // document.getElementById('lat').value = latitude;
      // document.getElementById('lon').value = longitude;
      
      // sessionStorage.setItem("latit", latitude);
      // sessionStorage.setItem("longt", longitude);
      $('#addrlat2').val(latitude);
      $('#addrlong2').val(longitude);
      checklandmark(latitude,longitude);
      
      // getdistance();
    });
  });
    $('#autocomplete3').on('input', function() {  
  
    var address = document.getElementById('autocomplete3');

    var autocomplete = new google.maps.places.Autocomplete(address);
    
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      // $('#fillocation').val(place.formatted_address);
      // document.getElementById("fillocation2").innerHTML = place.formatted_address.substring(0,63);
      // sessionStorage.setItem("locates", place.formatted_address);
      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();
      // document.getElementById('lat').value = latitude;
      // document.getElementById('lon').value = longitude;
      
      // sessionStorage.setItem("latit", latitude);
      // sessionStorage.setItem("longt", longitude);
      $('#addrlat3').val(latitude);
      $('#addrlong3').val(longitude);
      checklandmark(latitude,longitude);
      
      // getdistance();
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
