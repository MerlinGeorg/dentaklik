  
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <!-- <li><a href="shopping-cart.html">Shop</a></li> -->
                    <li>Register</li>
                </ul>
        </div>
    </div>
    
    
        
      <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            
            <div class="ps-section__header">
                    <h1>Register</h1>
                </div>
            
         <div class="col-lg-8 col-md-10 col-sm-10 col-12 tz-blog-content offset-lg-2  offset-md-1 offset-sm-1">



<form id="order_review2" style="margin-top:15px;" method="post">
<div class="shop-billing-fields">
    
<div class="form-row form-row-first cutom_select">
<label for="billing_last_name" class="">Country/Region <span class="required">*</span></label>
    
    <select class="input-text" name="ucountry" id="ucountry">
	
	<option value="Kuwait">Kuwait</option>
	<option value="India">India</option>
	<option value="Georgia">Georgia</option>
	<option value="Germany">Germany</option>
	<option value="France">France</option>
	<option value="UAE">UAE</option>
	<option value="England">England</option>
	
	
</select>
</div>    
 
<!-- trade role hided -->        
<div class="form-row form-row-last" style="display: none;">
<div class="form-row p-0">  
<label for="billing_last_name" class=""> 
Please Select Trade Role <span class="required">*</span></label>
</div>  
   <div class="form-row">  
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
    <label class="custom-control-label" for="customRadio">Buyer</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
    <label class="custom-control-label" for="customRadio2">Seller</label>
  </div>
    
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx">
    <label class="custom-control-label" for="customRadio3">Both</label>
  </div>
    </div>
    
    </div> 
  <!-- trade role hided -->   
    <div class="clear"></div>
    
    
    
<div class="form-row  form-row-first">
<label for="billing_first_name" class=""> Full Name <span class="required">*</span></label>
<input type="text" class="input-text " name="fullname" id="fullname" placeholder=" " value="" required="required">
</div>
    
<div class="form-row form-row-last">

<label for="billing_last_name" class="">Mobile<span class="required">*</span></label>
<input type="text" onchange="checkmobno();" class="input-text " name="mobno" id="mobno" placeholder="mobile number" value="" required="required">
<span id="moberrorspan" style="color: red"></span>

</div>
    

<div class="form-row form-row-first">
<label for="billing_last_name" class="">Create Password <span class="required">*</span></label>
<input type="password" class="input-text " name="pswd" id="pswd" placeholder="" value="" required="required">
     <button class="pass-show-btn" type="button">Show</button>
</div>
    
<div class="form-row form-row-last">
<label for="billing_last_name" class="">Confirm Password <span class="required">*</span></label>
<input type="password" class="input-text " name="cpswd" id="cpswd" placeholder="" value="" onchange="checkpass();" required="required">
 <button class="pass-show-btn" type="button">Show</button>  
 <span id="cpasserorspan" style="color:red "></span>  
</div>      
    
    
<div class="form-row form-row-first">
<label for="billing_last_name" class="">Email <span class="required">*</span></label>
<input type="email" class="input-text " name="umail" id="umail" placeholder="" value="" required="required"> 
<button class="pass-sms-btn" type="button" onclick="checkmailsendcode();">SEND CODE</button>
<span id="mailerrorspan"></span>    
</div>
    
<div class="form-row form-row-last">
<label for="billing_last_name" class="">Verification code <span class="required">*</span></label>
<input type="text" class="input-text " name="vcode" id="vcode" placeholder="" value="" required="required">
</div>    
  

<div class="form-row col-md-9">
    
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkout-create-acc" required="required">
<label class="custom-control-label" for="checkout-create-acc">By creating an account, I agree to Dentaklik's <a href="term-condition.html" data-toggle="modal" data-target=".bs-example-modal-lg"><u>terms &amp; conditions</u></a></label>
</div>
    

</div>
    
    <div class="form-row form-row-first">
       <button type="submit" id="uregsub" class="place-bt place-bt2 placeholdr"><strong>REGISTER</strong></button> 
    </div>
    
    <div class="form-row form-row-last">
    <p class="mt-5">Already have an account? <a href="<?php echo base_url(); ?>index.php/Register_user/loginpage"><u>Sign in >></u></a>
</p>    
    </div>
    
<div class="clear"></div>

</div>
</form>

</div>
    </div>   
        
        </div>


   