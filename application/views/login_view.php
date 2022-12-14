<!-- login section -->
<div class="loginaccount">
<section class="section-content padding-y bg-lg">
<div class="container">

    <!-- /.login-logo -->
<!-- <div class="col-4"> -->
  <div class="card float-right">
    <div class="card-body login-card-body" style="box-shadow: 1px 2px 6px 2px #f9f6f6;">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

  
        <div class="input-group mb-3">
          <input type="email" class="form-control loginemail" name="loginemail" id="input-email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="Email or Member Id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control loginpassword" name="loginpassword" id="input-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button  onclick="loginuser();" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
     

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#" onclick="forgotpassword();">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center regisacc">Sign Up</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- </div> -->

<!-- /.login-box -->

</div>
</section>
</div>
<!-- login section -->


<!-- register section -->
<div class="registeraccount" style="display: none;">
<section class="section-content padding-y bg-lg-2">
<div class="container">


  <div class="card float-right">
    <div class="card-body login-card-body" style="box-shadow: 1px 2px 6px 2px #f9f6f6;">
   
      <form action="" method="post" id="Formreg">

        <h2>Register Account</h2>
        <p>If you already have an account with us, please <a href="login">login</a></p>

         <div class="form-group">
                  <label>Please select trade role</label>
                  <div class="row pl-3">
                         <div class="custom-control custom-radio col-4">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="userlevel" value="user" required="required">
                          <label for="customRadio1" class="custom-control-label">User</label>
                        </div>
                        <div class="custom-control custom-radio col-4">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="userlevel" value="agent" required="required">
                          <label for="customRadio2" class="custom-control-label">Vendor </label>
                        </div>

                     
                      </div>
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="userfullname" id="input-firstname" 
                  pattern="[a-zA-Z0-9\s]+" placeholder="Full Name" required="required">
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control emailchecks emailcheckexist" autocomplete="off" required="required" name="username" id="input-emails" placeholder="Email">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="userphone" id="input-telephone" pattern="[0-9]+" minlength="7" required="required" placeholder="Telephone">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control"  pattern="[a-zA-Z0-9]+" minlength="6" required="required" name="userpassword" id="input-passwords" placeholder="password">
                  </div>

                  <div class="form-group">
                    <input type="password"  name="userconfirmpassword" id="input-passwordss" class="form-control"  pattern="[a-zA-Z0-9]+" minlength="6" required="required" placeholder="Confirm Password">
                  </div>


      
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" name="agree" class="checkagree" value="1" >
              <label for="remember">
                I have read and agree to the <a href="<?php echo base_url(); ?>index.php/Privacy_policy">Privacy Policy</a>
              </label>
              <input type="hidden" name="userid" value=""/>
            </div>
          </div>
        
        </div>

        <div class="col-5 float-right text-right">
            <button type="submit" class="btn btn-primary" id="agrbtn" type="submit">Sign Up</button>
          </div>

      </form>

     
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- </div> -->

<!-- /.login-box -->


</div>
</section>
</div>
<!-- register section -->


<!-- forgot password -->
<div class="forgotpwd" style="display: none;">
<section class="section-content padding-y bg-lg">
<div class="container">

    <!-- /.login-logo -->
<!-- <div class="col-4"> -->
  <div class="card float-right">
    <div class="card-body login-card-body" style="box-shadow: 1px 2px 6px 2px #f9f6f6;">

 <form action="" method="post" id="sendm">

       <h2>Forgot Your Password?</h2>
        <p>Enter the email address associated with your account.</p>


  
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="emailsend" name="emailsend"  placeholder="Enter you email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autocomplete="off" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
         
          <!-- /.col -->
          <div class="col-3">
            <button  type="submit" value="Send" class="btn btn-primary btn-block">Send</button>
          </div>
          <!-- /.col -->
        </div>

      </form>
     

    </div>
    <!-- /.login-card-body -->
  </div>
<!-- </div> -->

<!-- /.login-box -->

</div>
</section>

</div>
<!-- forgot password -->


<script type="text/javascript">

    $( document ).ready(function() {
        if($('.checkagree').is(":checked"))   
        $("#agrbtn").show();
    else
        $("#agrbtn").show();
      });
     $(".checkagree").click(function(){
            if($('.checkagree').is(":checked"))   
        $("#agrbtn").show();
    else
        $("#agrbtn").show();
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
              document.getElementById("Formreg").reset();
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
             if(data == 'send'){
                notifygrocery('Email Send','success');
            }else if('wrongmail'){
               notifygrocery('Invalid Email','info');
            }else{
              notifygrocery('Error','danger');
            }
            
             
            }
        });
        
     
    });

  function loginuser() {
        $.ajax({
            async: true,
            method: "POST",
            url: "<?php echo base_url('index.php/login/checklogin');?>/",
            data: {username:$('.loginemail').val(),password:$('.loginpassword').val()}, 
           success: function(data){
            // alert(data);
            if(data == 'user'){
             //window.location.replace("<?php echo base_url('index.php/cart');?>/");
             window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
            }
            else if (data == 'agent')
            {
              window.location.href="<?php echo base_url();?>index.php/adminhome";
            }
            else{
              notifygrocery('Invalid Login','info');
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