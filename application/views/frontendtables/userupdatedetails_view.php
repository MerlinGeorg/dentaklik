
  <div class="container reg" style="margin: 20px;">
    <ul class="breadcrumb">
      <!--   <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/login/myaccount">My Account</a></li> -->
        <!-- <li><a href="register.html">Register</a></li> -->
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
               <!--  <div class="columnblock-title">Account</div> -->
                <div class="account-block">
                    <div class="list-group"> 
                     <!--  <a class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a>  -->
                      <!-- <a class="list-group-item" href="#">Register</a> 
                      <a class="list-group-item" href="#">Forgotten Password</a>  -->
                      <a class="list-group-item" href="#">My Account</a>
                       <a class="list-group-item" href="<?php echo base_url();?>index.php/cart">Cart</a> 
                      <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
                      <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a>
                    <!-- <a class="list-group-item" href="#">Reward Points</a> 
                    <a class="list-group-item" href="#">Returns</a> 
                    <a class="list-group-item" href="#">Transactions</a> -->
                     </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="content">
            <h1>Manage Account</h1>
           <!--  <p>If you already have an account with us, please login at the <a href="login">login page</a>.</p> -->
            <!-- <form class="form-horizontal" enctype="multipart/form-data" method="post" action="register.html"> -->
               <form class="form-horizontal" method="POST" action="" id="Formusrupd">
                <fieldset id="account">
                    <legend>Your Personal Details</legend>
                    <div style="display: none;" class="form-group required">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="1" name="customer_group_id">
                                    Default</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder="Full name" value="<?php echo $resrow->user_displayname;?>" name="userfullname">
                        </div>
                    </div>
                   <!--  <div class="form-group required">
                        <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="" name="lastname">
                        </div>
                    </div> -->
                    <div class="form-group required">
                        <label for="input-emails" class="col-sm-2 control-label emaillabelcheckupd">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" value="<?php echo $resrow->user_name;?>" class="form-control emailcheckupd emailcheckexistupd" id="input-emails" placeholder="Unique"  name="username">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone"   value="<?php echo $resrow->user_phone;?>" name="userphone">
                        </div>
                        <input type="hidden" value="user" name="userlevel">
                    </div>
                    <?php if(isset($resrow)){?>
                        <div class="form-group required">
                          <label for="userconfirmpassword" class="col-sm-2 control-label">Old Password</label>
                          <div class="col-sm-10">
                              <input type="password" class="form-control" id="userconfirmpassword" placeholder="Password"  name="userconfirmpassword" required="required" >
                          </div>
                        </div>
                    <?php }?>
                    
                    <div class="form-group required">
                        <label for="input-passwords" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-passwords" placeholder="Password"  name="userpassword" required="required" >
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="input-fax" class="col-sm-2 control-label">Fax</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-fax" placeholder="Fax" value="" name="fax">
                        </div>
                    </div> -->
                </fieldset>
                <div class="buttons">
                    <!-- <div class="float-right"> -->
                        <!-- I have read and agree to the <a class="agree" href="#"><b>Privacy Policy</b></a>
                        <input type="checkbox"  value="1" name="agree">-->
                        &nbsp; 
                        <input type="hidden" id ="userid" name="userid" value="<?php echo $resrow->user_id;?>"/>
                        <input class="btn btn-primary " type="submit"    value="save" />
                        <!-- <a class="btn btn-primary logis"   type="submit" style="cursor: pointer;">
                        Continue</a> -->
                    </div>
                <!-- </div> -->
            </form>
           <!--  <form>
                <fieldset id="address">
                    <legend>Your Address</legend>
                    
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="input-address-1" placeholder="Address"  value="<?php echo $resrow->user_address;?>" name="useraddress" required="required" />
                        </div>
                    </div>
                   
                    <div class="form-group required">
                        <label for="input-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $resrow->user_city;?>" id="input-city" placeholder="City"  name="usercity">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="<?php echo $resrow->user_pincode;?>" name="userpincode">
                        </div>
                    </div>

                </fieldset>
         
       </form> -->
       <div id="payment-existingaddr">
                   <form class="form-horizontal" method="POST" action="" id="Formhomeaddress">
                <fieldset id="addresshome">
                    <legend>Home Address</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">Full name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="homename" placeholder="Full Name" value="<?php if (isset($reshomes)) echo $reshomes->address_name; ?>" name="homename">
                        </div>
                    </div>
                  
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="homeaddress" placeholder="Address"  value="<?php if (isset($reshomes)) echo $reshomes->address_addr; ?>" name="homeaddress" required="required" />
                        </div>
                    </div>
                   
                    <div class="form-group required">
                        <label for="input-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php if (isset($reshomes)) echo $reshomes->address_city; ?>" id="homecity" placeholder="City"  name="homecity">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="homepincode" placeholder="Post Code" value="<?php if (isset($reshomes)) echo $reshomes->address_pincode; ?>" name="homepincode">
                        </div>
                    </div>

                </fieldset>
                <div class="buttons">
                    <!-- <div class="pull-right"> -->
                     <!--  I have read and agree to the <a class="agree" href="#"><b>Privacy Policy</b></a>
                        <input type="checkbox"  value="1" name="agree"> -->
                        &nbsp;
                       
                      <!--   <input type="hidden" id ="mode" name="mode" value="fromcheckout"/> -->
                      
                        <input class="btn btn-primary " type="submit"    value="save" />
                        <!-- <a class="btn btn-primary logis"   type="submit" style="cursor: pointer;">
                        Continue</a> -->
                    <!-- </div> -->
                </div>
             </form>
              </div>

                               <div id="payment-newaddr"  >
               <form class="form-horizontal" method="POST" action="" id="Formotheraddress">
                                <fieldset id="addressother">
                    <legend>Other Address (optional)</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">Full name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="othername" placeholder="Full Name" value="<?php  if (isset($resothers)) echo $resothers->address_name; ?>" name="othername">
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="otheraddress" placeholder="Address"  value="<?php if (isset($resothers)) echo  $resothers->address_addr; ?>" name="otheraddress" required="required" />
                        </div>
                    </div>
                    
                    <div class="form-group required">
                        <label for="input-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="othercity" placeholder="City"  name="othercity" value="<?php if (isset($resothers)) echo $resothers->address_city; ?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="otherpincode" placeholder="Post Code" value="<?php  if (isset($resothers)) echo $resothers->address_pincode; ?>" name="otherpincode">
                        </div>
                    </div>

                </fieldset>
                              <div class="buttons">
                    <!-- <div class="pull-right"> -->
                     <!--  I have read and agree to the <a class="agree" href="#"><b>Privacy Policy</b></a>
                        <input type="checkbox"  value="1" name="agree"> -->
                        &nbsp;
                       
                      <!--   <input type="hidden" id ="mode" name="mode" value="fromcheckout"/> -->
                        <input class="btn btn-primary " type="submit"    value="save" />
                        <!-- <a class="btn btn-primary logis"   type="submit" style="cursor: pointer;">
                        Continue</a> -->
                    <!-- </div> -->
                <!-- </div> -->
                 </form>
              </div>
          </div>
                <!-- <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label for="input-passwords" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-passwords" placeholder="Password"  name="userpassword" required="required" >
                        </div>
                    </div> -->
                   <!--  <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm"  name="userpasswordconfirm">
                        </div>
                    </div> -->
         <!--        </fieldset> -->
                <!-- <fieldset>
                    <legend>Newsletter</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subscribe</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" value="1" name="newsletter">
                                Yes</label>
                            <label class="radio-inline">
                                <input type="radio" checked="checked" value="0" name="newsletter">
                                No</label>
                        </div>
                    </div>
                </fieldset> -->
                
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#Formusrupd").submit(function(e) {

         e.preventDefault(); // avoid to execute the actual submit of the form.
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/insertonlyuser');?>/",
               data: form.serialize(), // serializes the form's elements.
               success: function(data){
               if(data == "success"){
                  notifygrocery("data saved","success");
               }else if(data == "password"){
                  notifygrocery("old password does not match","danger");
               }else{
                notifygrocery("error","danger");
               }

              // show response from the php script.            
              }
             });
      });
      $("#Formhomeaddress").submit(function(e) {

         e.preventDefault(); // avoid to execute the actual submit of the form.
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/inserthomeaddress');?>/",
               data: form.serialize(), // serializes the form's elements.
               success: function(data){
               if(data == "success"){
                   notifygrocery("data saved","success");
               }else{
                  alert('Error');
               }

              // show response from the php script.            
              }
             });
      });
  $("#Formotheraddress").submit(function(e) {

         e.preventDefault(); // avoid to execute the actual submit of the form.
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/insertotheraddress');?>/",
               data: form.serialize(), // serializes the form's elements.
               success: function(data){
               if(data == "success"){
                   notifygrocery("data saved","success");
               }else{
                  alert('Error');
               }

              // show response from the php script.            
              }
             });
      });
    $('body').on('input','.emailcheckupd',function(e){
     var emailvalue = this.value;
    $.ajax({
        method: "POST",
           url: "<?php echo base_url();?>index.php/user/emailcheckexistupd",
           data:{emailvalue:emailvalue,userid:$('#userid').val()},
           success: function(resp){
           
            if(resp == 'success'){
              $(':input[type="submit"]').prop('disabled', true);
              jQuery('.emaillabelcheckupd').css('color', 'red');
              jQuery('.emailcheckexistupd').css('color', 'red');
            }else{
              $(':input[type="submit"]').prop('disabled', false);
               jQuery('.emaillabelcheckupd').css('color', 'black');
               jQuery('.emailcheckexistupd').css('color', 'black');
            }
 
           }
         });

    
});
</script>

