
<div class="container" align="center" style="">
  <div style="width: 400px;height: 450px;border: 1px solid black;text-align: center;border-radius: 20px;margin-top: 40px;background: #7ab72838" align="center">
  <div class="row">
        <form method="POST"  id="idFormcare" enctype="multipart/form-data" accept-charset="utf-8">
        <fieldset>
          <h3 style="margin-top: 20px">Care Mail</h3>
          <div class="form-group required">
            <!-- <label for="input-name" class="col-sm-2 control-label">Your Name</label> -->
           
            <div class="col-sm-10">
              <input type="text" style="background: #ef8829;border-top-right-radius: 10px " class="form-control changes" placeholder="Your Name*" id="input-name"  value="" name="name" required="required">
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
            <!-- <label for="input-phone" class="col-sm-2 control-label">Shope Name</label> -->
             <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="Issue*" id="input-issue" value="" name="names" pattern="[a-zA-Z\s]+" required="required">

            </div>
            
          </div>
          

          <div class="form-group required">
            <!-- <label for="input-enquiry" name="enquiry" class="col-sm-2 control-label">Shope Adress</label> -->
            <div class="col-sm-10">
              <textarea class="form-control" style="border-bottom-right-radius:10px" id="input-description" placeholder="Description*" rows="4" name="description"  required="required"></textarea>
            </div>
          </div>
          <div class="form-group required" >

            <div class="col-sm-10" >
              <input type="file" title="select attachment file related to the issue" class="form-control" placeholder="attachment" style="border-bottom-right-radius:10px" id="attach"  name="care_file" value="">
               <label class="pull-left" style="text-align: left;margin-left: 10px">Attachment
            </label>
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
  
  $("#idFormcare").submit(function(e) {

        
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Care_mail/caremail');?>/",
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
                alert(data);
               if(data == "success"){
                  notifygrocery('Mail send','success');
                  $('#input-emails').val('');
                  $('#input-issue').val('');
                  $('#input-name').val('');
                  $('#input-description').val('');
                  $('#input-phone').val('');
                  $('#attach').val('');
               }else{
                  notifygrocery('Something wrong','danger');
               }

              // show response from the php script.            
              }
             });
      });

</script>