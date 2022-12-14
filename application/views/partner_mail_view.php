
<div class="container" align="center" style="">
	<div style="width: 400px;height: 400px;border: 1px solid black;text-align: center;border-radius: 20px;margin-top: 40px;background: #7ab72838" align="center">
	<div class="row">
		    <form method="POST"  id="idFormPartnerus" enctype="multipart/form-data" accept-charset="utf-8">
        <fieldset>
          <h3 style="margin-top: 20px">PARNTNER WITH US</h3>
          <div class="form-group required">
            <!-- <label for="input-name" class="col-sm-2 control-label">Your Name</label> -->
           
            <div class="col-sm-10">
              <input type="text" style="background: #ef8829;border-top-right-radius: 10px " class="form-control changes" placeholder="Shope Name*" id="input-sname" placeholder="Full Name" value="" name="Shopname" required="required">
            </div>
          </div>
          <div class="form-group required">
            <!-- <label for="input-phone" class="col-sm-2 control-label">Shope Name</label> -->
             <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="Owner Name*" id="input-names" value="" name="names" pattern="[a-zA-Z\s]+" required="required">

            </div>
            
          </div>
          <div class="form-group required">
            <!-- <label for="input-email" class="col-sm-2 control-label">E-Mail Address</label> -->
            <div class="col-sm-10">
              <input type="email" class="form-control" placeholder="E-Mail Address*" id="input-emails" value="" name="emails" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required="required">
            </div>
          </div>
          <div class="form-group required">
            <!-- <label for="input-phone" class="col-sm-2 control-label">Phone No</label> -->
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Phone No*" id="input-phone" placeholder="numbers only" value="" name="phone" pattern="[0-9]{10}" required="required">
            </div>
          </div>

          <div class="form-group required">
            <!-- <label for="input-enquiry" name="enquiry" class="col-sm-2 control-label">Shope Adress</label> -->
            <div class="col-sm-10">
              <textarea class="form-control" style="border-bottom-right-radius:10px" id="input-saddress" placeholder="Shope Adress*" rows="4" name="sadress"  required="required"></textarea>
            </div>
          </div>
          <div class="form-group required" >
            
            <div class="col-sm-10" style="margin-top: 10px">
              <input type="checkbox" class="" style="border-bottom-right-radius:10px" id="tcbox"  name="tcbox" value="Accept"  required="required"><span>&nbsp;I, Accept the Terms & Conditions<a href="<?php echo base_url(); ?>index.php/Terms_n_conditions">(Read)..</a></span>
            </div> 
          </div>
        </fieldset>
        <div class="buttons">
          <div class="center">
            <input type="submit" style="border-radius: 5px" value="Submit" class="btn btn-primary">
          </div>
        </div>
      </form>
	</div>
	</div>	
</div>	

<script type="text/javascript">
  
  $("#idFormPartnerus").submit(function(e) {

        
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Partnerus/partnermail');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,
                     beforeSend: function()
                      {
                          notifygrocery('Loading...','info');
                      }, 
               success: function(data){
                // alert(data);
               if(data == "success"){
                  notifygrocery('Thanks for your Interest,Our Support Team will contact you shortly','success');
                  $('#input-emails').val('');
                  $('#input-sname').val('');
                  $('#input-names').val('');
                  $('#input-saddress').val('');
                  $('#input-phone').val('');
                  $('#tcbox').val('');
               }else{
                  notifygrocery('Something wrong','danger');
               }

              // show response from the php script.            
              }
             });
      });

</script>