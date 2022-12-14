<div style="background-image: url('<?php echo base_url(); ?>/imageupload/login_bg.png')">
<!-- login start -->
<div class="loginaccount">
<div class="container log">

  <div class="row">
    <div class="col-sm-3 hidden-xs column-left" id="column-left">
      <div class="column-block">
        <div class="account-block" style="margin: 20px;">
          <div class="list-group"> <a  class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a> 
             <a class="list-group-item" href="<?php echo base_url();?>index.php/login/myaccount">My Account</a>
            <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a> <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-1" id="content"></div>
    <div class="col-sm-5" id="content">
      <div class="row">
        <!-- login content -->


  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/shop_login_design/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/shop_login_design/css/main.css">
<!--===============================================================================================-->


  <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="margin: 20px; width: 500px;">
        <h1 class="login100-form-title p-b-37">
          Sign In
        </h1>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
          <input class="input100 loginemail" type="email" name="loginemail" id="input-email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="username or email" required="required">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100 loginpassword" type="password" name="loginpassword" id="input-password" placeholder="password" required="required">
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
          <button class="btn btn-primary"  onclick="loginuser();">
            Sign In
          </button>
        </div>
   
      <div class="text-center" style="margin: 5px;">
          <a  class = "hov1" onclick="forgotpassword();" style="cursor:pointer;">Forgotten Password</a>
        </div>
      <br>
         <div class="text-center">
          <a href="#" class="txt2 hov1 regisacc">
            Sign Up
          </a>
        </div>
   
      
    </div>

        <!-- login content-->
      
      </div>
    </div>
  </div>
</div>
</div>
<!-- login end -->


<!-- new forgot password start -->
<div class="forgotpwd" style="display: none;">
  <div class="container reg">
    <ul class="breadcrumb">
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
               <div class="account-block" style="margin: 20px;">
          <div class="list-group"> 
            <a  class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a> 
            <a class="list-group-item" href="<?php echo base_url();?>index.php/login/myaccount">My Account</a> 
            <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a> <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
           
        </div>
        </div>
        </div>
        </div>


        <div class="col-sm-1"></div>
        <div id="content" class="col-sm-6" style="margin: 20px;">


      
      <form class="form-horizontal" method="POST" action="" id="sendm">
          <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="margin: 20px; width: 500px;">
                <h4>Forgot Your Password?</h4>
                <p>Enter the e-mail address associated with your account. Click 'Send' to have your 
                    password e-mailed to you.</p>
                 <br>
          
                <div class="wrap-input100 validate-input m-b-25" >
                  <input class="input100" type="email" id="emailsend" name="emailsend"  placeholder="Enter you email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autocomplete="off" required="required">
                  <span class="focus-input100"></span>
                </div>

                 <div class="container-login100-form-btn">
                  <button class="btn btn-primary" type="submit" value="Send" >
                    Send
                  </button>
                </div>

                <!--  <div class="text-center" style="margin: 5px;">
                  <a  class = "hov1" onclick="backfgpwd();" style="cursor:pointer;">Go Back</a>
                  </div> -->

              </div>

               
                 
      </form>


    </div>
    </div>
    </div>
    </div>
<!-- new forgo pasword end -->

<!-- signup start -->
<div class="registeraccount" style="display: none; ">
  <div class="container reg">
    <ul class="breadcrumb">
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
               <div class="account-block" style="margin: 20px;">
          <div class="list-group"> <a  class="list-group-item" href="<?php echo base_url(); ?>index.php/login">Login</a> 
          
             <a class="list-group-item" href="<?php echo base_url();?>index.php/login/myaccount">My Account</a> 
            <a class="list-group-item" href="<?php echo base_url();?>index.php/wishlist">Wish List</a> <a class="list-group-item" href="<?php echo base_url();?>index.php/orderhistory">Order History</a> 
           
          </div>
        </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-6" id="content" style="margin: 20px;">

           
           
               <form class="form-horizontal" method="POST" action="" id="Formreg">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="margin: 20px; width: 500px;">
                <h1>Register Account</h1>
                 <p>If you already have an account with us, please<a href="login"> login
                 </a></p>
                 <br>
                <!-- <input type="hidden" value="1" name="store_id"> -->

                <div class="wrap-input100 validate-input m-b-20" style="margin: 10px;">
                  <label style="color: #666666;">Choose user type : </label>
                  <input type="radio" id="user" name="userlevel" value="user">
                  <label  style="color: #666666;" for="user">User</label>
                  <input type="radio" id="vendor" name="userlevel" value="agent">
                  <label   style="color: #666666;" for="vendor">Vendor</label>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                  <input class="input100 loginemail" type="text" name="userfullname" id="input-firstname" 
                  pattern="[a-zA-Z0-9\s]+" placeholder="Full name" required="required">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" >
                  <input class="input100 emailchecks emailcheckexist" type="email" name="username" id="input-emails" placeholder="Email" autocomplete="off" required="required">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25">
                  <input class="input100" type="text" name="userphone" id="input-telephone" placeholder="Telephone" pattern="[0-9]+" minlength="7" required="required">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" >
                  <input class="input100" type="password" name="userpassword" id="input-passwords" 
                  placeholder="Password" pattern="[a-zA-Z0-9]+" minlength="6" required="required">
                  <span class="focus-input100"></span>
                </div>

                 <div class="wrap-input100 validate-input m-b-25">
                  <input class="input100" type="password" name="userconfirmpassword" id="input-passwordss" 
                  placeholder="Confirm Password" pattern="[a-zA-Z0-9]+" minlength="6" required="required">
                  <span class="focus-input100"></span>
                </div>

                 <div class="wrap-input100" style="margin: 10px;">
                  <input type="checkbox"  value="1" name="agree" class="checkagree">
                  &nbsp; I have read and agree to the <a class="agree" href="<?php echo base_url(); ?>/index.php/Privacy_policy"><b>Privacy Policy</b></a>
                </div>
                 <input type="hidden" name="userid" value=""/>

             
             <br>

                <div class="container-login100-form-btn">
                  <button class="btn btn-primary" id = "agrbtn" type="submit" value="save">
                    Sign Up
                  </button>
                </div>
           
             
            </form>
        </div>
    </div>
</div>
</div>

<!-- signup end -->


</div>










<script type="text/javascript">

    $( document ).ready(function() {
        if($('.checkagree').is(":checked"))   
        $("#agrbtn").show();
      // $('#agrbtn').attr("disabled", true);
    else
        $("#agrbtn").show();
      // $('#agrbtn').attr("disabled", false);
      });
     $(".checkagree").click(function(){
            if($('.checkagree').is(":checked"))   
        $("#agrbtn").show();
      // $('#agrbtn').attr("disabled", true);
    else
        $("#agrbtn").show();
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
            //alert(data);
             if(data == 'success'){
            //   $(".registeraccount").hide();
            //   $(".loginaccount").show();
                notifygrocery('Email Send','success');
            }else if('wrongmail'){
               notifygrocery('Incorret Email','info');
            }else{
              notifygrocery('Incorret Email','info');
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
             //alert(data);
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