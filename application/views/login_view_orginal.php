<div class="loginaccount">
<div class="container log">
 <!--  <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
    <li><a  href="<?php echo base_url(); ?>index.php/login">Login</a></li>
  </ul> -->
  <div class="row">
    <div class="col-sm-3 hidden-xs column-left" id="column-left">
      <div class="column-block">
        <!-- <div class="columnblock-title">Account</div> -->
        <div class="account-block" style="margin: 20px;">
          <div class="list-group"> <a  class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a> 
           <!--  <a class="list-group-item" href="#">Register</a> 
            <a class="list-group-item" href="#">Forgotten Password</a> -->
             <a class="list-group-item" href="<?php echo base_url();?>index.php/login/myaccount">My Account</a> 
           <!--  <a class="list-group-item" href="#">Address Book</a> --> 
            <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a> <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
            <!-- <a class="list-group-item" href="download">Downloads</a> <a class="list-group-item" href="#">Reward Points</a> <a class="list-group-item" href="#">Returns</a> <a class="list-group-item" href="#">Transactions</a> <a class="list-group-item" href="#">Newsletter</a><a class="list-group-item last" href="#">Recurring payments</a> --> 
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-9" id="content">
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h2>New Customer</h2>
            <p><strong>Register Account</strong></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a class="btn btn-primary regisacc"    style="cursor: pointer;">Continue</a>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h2>Returning Customer</h2>
            <p><strong>I am a returning customer</strong></p>
            <!-- <form enctype="multipart/form-data" method="post" action="login.html"> -->
              <div class="form-group">
                <label for="input-email" class="control-label">E-Mail Address</label>
                <input type="email" class="form-control loginemail " id="input-email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="username" value="" name="loginemail" required="required">
              </div>
              <div class="form-group">
                <label for="input-password" class="control-label">Password</label>
                <input type="password" class="form-control loginpassword" id="input-password" placeholder="Password" value="" name="loginpassword" required="required">
                <a  onclick="forgotpassword();" style="cursor:pointer;">Forgotten Password</a>
                <!-- <input type="hidden" name="userid" value=""/> -->
                <!-- <a href="forgetpassword.html">Forgotten Password</a> -->
              </div>

              <button class="btn btn-primary" onclick="loginuser();">Login</button>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- new forgot password start -->
<div class="forgotpwd" style="display: none;">
  <div class="container reg">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
        <!-- <li><a href="register.html">Register</a></li> -->
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
                <div class="columnblock-title">Account</div>
               <div class="account-block">
          <div class="list-group"> <a  class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a> 
           <!--  <a class="list-group-item" href="#">Register</a> 
            <a class="list-group-item" href="#">Forgotten Password</a> -->
             <a class="list-group-item" href="<?php echo base_url();?>index.php/login/myaccount">My Account</a> 
           <!--  <a class="list-group-item" href="#">Address Book</a> --> 
            <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a> <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
            <!-- <a class="list-group-item" href="download">Downloads</a> <a class="list-group-item" href="#">Reward Points</a> <a class="list-group-item" href="#">Returns</a> <a class="list-group-item" href="#">Transactions</a> <a class="list-group-item" href="#">Newsletter</a><a class="list-group-item last" href="#">Recurring payments</a> --> 
          </div>
        </div>
            </div>
        </div>
        <div id="content" class="col-sm-9 " >

      <h1>Forgot Your Password?</h1>
      <p>Enter the e-mail address associated with your account. Click 'Send' to have your password e-mailed to you.</p>
      <form class="form-horizontal" method="POST" action="" id="sendm">
        <fieldset>
          <legend>Your E-Mail Address</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="emailsend">E-Mail Address</label>
            <div class="col-sm-10">
              <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="emailsend"  placeholder="E-Mail Address" id="emailsend" class="form-control" required="required" />
            </div>
          </div>
        </fieldset>
        <div class="buttons clearfix">
          <div class="pull-left"><a onclick="backfgpwd();" style="cursor: pointer;"class="btn btn-default">Back</a></div>
          <div class="pull-right">
          

          <input class="btn btn-primary " type="submit"    value="Send" /> 
            <!-- <button   onclick="sendm();" class="btn btn-primary" >Send</button> -->
          </div>
        </div>
      </form>
    </div>
    </div>
</div>
</div>
<!-- new forgo pasword end -->

<div class="registeraccount" style="display: none; ">
  <div class="container reg" style="margin: 20px;">
    <ul class="breadcrumb">
       <!--  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li> -->
        <!-- <li><a href="register.html">Register</a></li> -->
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
              <!--   <div class="columnblock-title">Account</div> -->
               <div class="account-block">
          <div class="list-group"> <a  class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a> 
           <!--  <a class="list-group-item" href="#">Register</a> 
            <a class="list-group-item" href="#">Forgotten Password</a> -->
             <a class="list-group-item" href="<?php echo base_url();?>index.php/login/myaccount">My Account</a> 
           <!--  <a class="list-group-item" href="#">Address Book</a> --> 
            <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a> <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
            <!-- <a class="list-group-item" href="download">Downloads</a> <a class="list-group-item" href="#">Reward Points</a> <a class="list-group-item" href="#">Returns</a> <a class="list-group-item" href="#">Transactions</a> <a class="list-group-item" href="#">Newsletter</a><a class="list-group-item last" href="#">Recurring payments</a> --> 
          </div>
        </div>
            </div>
        </div>
        <div class="col-sm-9" id="content">
            <h1>Register Account</h1>
            <p>If you already have an account with us, please login at the <a href="login">login page</a>.</p>
            <!-- <form class="form-horizontal" enctype="multipart/form-data" method="post" action="register.html"> -->
               <form class="form-horizontal" method="POST" action="" id="Formreg">
                <fieldset id="account">
                    <legend>Your Personal Details</legend>
                    <div style="display: none;" class="form-group required">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="1" name="customer_group_id" >
                                    Default</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder="Full name" value="" pattern="[a-zA-Z0-9\s]+" name="userfullname" required="required">
                        </div>
                    </div>
                   <!--  <div class="form-group required">
                        <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="" name="lastname">
                        </div>
                    </div> -->
                    <div class="form-group required">
                        <label for="input-emails" class="col-sm-2 control-label emaillabelcheck">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control emailchecks emailcheckexist" id="input-emails" placeholder="Unique"  pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="username" autocomplete="off" required="required">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone"  name="userphone" required="required" pattern="[0-9]+" minlength="7">
                        </div>
                        <input type="hidden" value="user" name="userlevel">
                    </div>
                    <!-- <div class="form-group">
                        <label for="input-fax" class="col-sm-2 control-label">Fax</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-fax" placeholder="Fax" value="" name="fax">
                        </div>
                    </div> -->
                </fieldset>

                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label for="input-passwords" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-passwords" placeholder="Password"  name="userpassword" pattern="[a-zA-Z0-9]+" minlength="6" required="required">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-passwords" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-passwordss" placeholder="Confirm Password"  name="userconfirmpassword" pattern="[a-zA-Z0-9]+" minlength="6" required="required">
                        </div>
                    </div>
                    <!-- <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm"  name="userpasswordconfirm">
                        </div>
                    </div> -->
                </fieldset>
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
                <div class="buttons">
                    <div class="pull-right">I have read and agree to the <a class="agree" href="#"><b>Privacy Policy</b></a>
                        <input type="checkbox"  value="1" name="agree" class="checkagree">
                        &nbsp;
                        <input type="hidden" name="userid" value=""/>
                        <input class="btn btn-primary " id = "agrbtn" type="submit"    value="save" />
                        <!-- <a class="btn btn-primary logis"   type="submit" style="cursor: pointer;">
                        Continue</a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

    $( document ).ready(function() {
        if($('.checkagree').is(":checked"))   
        $("#agrbtn").show();
      // $('#agrbtn').attr("disabled", true);
    else
        $("#agrbtn").hide();
      // $('#agrbtn').attr("disabled", false);
      });
     $(".checkagree").click(function(){
            if($('.checkagree').is(":checked"))   
        $("#agrbtn").show();
      // $('#agrbtn').attr("disabled", true);
    else
        $("#agrbtn").hide();
      // $('#agrbtn').attr("disabled", false);
        });
     $("#Formreg").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        $.ajax({
            async: true,
            method: "POST",
            url: "<?php echo base_url('index.php/user/insertonlyuser');?>/",
            data: form.serialize(), // serializes the form's elements.
           success: function(data){         
            if(data == 'success'){
              $(".registeraccount").hide();
              $(".loginaccount").show();
              notifygrocery('Data Added','success');
            }else  if(data == 'password'){
              notifygrocery('Wrong password','info');
            }else{
              notifygrocery('Something Wrong','info');
            }
            
             
            }
        });
        
     
    });
    $(".regisacc").click(function () {
        $(".registeraccount").show();
         $(".loginaccount").hide();
        
    });
    $(".logis").click(function () {
        $(".registeraccount").hide();
         $(".loginaccount").show();
        
    });
    function forgotpassword(){

      $(".forgotpwd").show();
      $(".loginaccount").hide();
      
    }
    function backfgpwd(){
      $(".forgotpwd").hide();
      $(".loginaccount").show();
    }
    $("#sendm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        $.ajax({
            async: true,
            method: "POST",
            url: "<?php echo base_url('index.php/login/sendm');?>/",
            data: form.serialize(), // serializes the form's elements.
           success: function(data){
             if(data == 'success'){
            //   $(".registeraccount").hide();
            //   $(".loginaccount").show();
                notifygrocery('Mail Send','success');
            }else if('wrongmail'){
               notifygrocery('Incorret Mail','info');
            }else{
              notifygrocery('Incorret Mail','info');
            }
            
             
            }
        });
        
     
    });
  // function sendm(){
  //   $.ajax({
  //           async: true,
  //           method: "POST",
  //           url: "<?php echo base_url('index.php/login/sendm');?>/",
  //           data: {username:$('#emailsend').val()}, // serializes the form's elements.
  //          success: function(data){
  //            alert(data);
  //           // if(data == 'success'){

  //           // //  window.location.replace("<?php echo base_url('index.php/cart');?>/");
  //           // // }else{
  //           // //   notifygrocery('Invalid Login','info');
  //           // //   // window.location.replace("<?php echo base_url('index.php/login');?>/");
  //           // // }             
  //           // }
  //         }
  //       });
  // }
  function loginuser() {
        $.ajax({
            async: true,
            method: "POST",
            url: "<?php echo base_url('index.php/login/checklogin');?>/",
            data: {username:$('.loginemail').val(),password:$('.loginpassword').val()}, // serializes the form's elements.
           success: function(data){
            // alert(data);
            if(data == 'success'){

             window.location.replace("<?php echo base_url('index.php/cart');?>/");
            }else{
              notifygrocery('Invalid Login','info');
              // window.location.replace("<?php echo base_url('index.php/login');?>/");
            }             
            }
        });
      }
    
$('body').on('input','.emailchecks',function(e){
     var emailvalue = this.value;
   
    $.ajax({
        method: "POST",
           url: "<?php echo base_url();?>index.php/user/emailcheckexist",
           data:{emailvalue:emailvalue},
           success: function(resp){
           
            if(resp == 'success'){
              $(':input[type="submit"]').prop('disabled', true);
              jQuery('.emaillabelcheck').css('color', 'red');
              jQuery('.emailcheckexist').css('color', 'red');
            }else{
              $(':input[type="submit"]').prop('disabled', false);
               jQuery('.emaillabelcheck').css('color', 'black');
               jQuery('.emailcheckexist').css('color', 'black');
            }
 
           }
         });

    
});
</script>