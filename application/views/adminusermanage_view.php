

        <div class="page-header ">

          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">User Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
               <?php if($_SESSION['adminusertp'] != 'agent'){ ?>
                <button class="btn btn-success"
                onclick="clearall();">Add Vendor</button>
              <?php }
              else
              {
                ?>
                <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo $_SESSION['vendor_id']; ?>">
                <?php
              }
              ?>
              </div>
            </div>
          </div>

        </div>

        <div class="container-fluid ">
          <!-- new one start -->
         
          <div class="panel-wrapper" style="display: none;" id="addeditform">
           
            <div class="panel">

              <div class="panel-heading">
                <h4 class="panel-title"><div id="formheading"></div></h4>
                  <form method="POST"  id="idFormnew" >
                                <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Full Name</h4>
                      <input class="form-control focus " type="text" required="required" name="userfullname" pattern="[a-zA-Z\s]+" title="only characters allowed" id="userfullname">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title emailchecklabel">User Name(Email Id)</h4>
                      <input class="form-control emailcheck " type="text" placeholder="emailid" required="required" name="username" id="username" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autocomplete="off">
                    </div>
                    
                  </div>
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Password</h4>
                      <input class="form-control" type="password" required="required" name="userpassword" id="userpassword"  minlength="6" title="enter atleast 6 characters" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Address</h4>
                      <input class="form-control"  name="useraddress" required="required"  pattern="[a-zA-Z0-9\s]+" type="text" id="useraddress" title="special characters not allowed"></input>
                    </div>
                    
                    <input type="hidden" id = 'userid' name="userid"/>
                  </div>
                <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">City</h4>
                      <input class="form-control"  pattern="[a-zA-Z0-9\s]+" name="usercity" type="text" title="special characters not allowed" required="required" id="usercity">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Pincode</h4>
                      <input class="form-control" name="userpincode" type="text" required="required" id="userpincode" pattern="[0-9]+" title="only numbers allowed">
                    </div>
                    
                  </div>
                <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Phone</h4>
                      <input class="form-control" name="userphone" type="text" required="required" id="userphone" pattern="[0-9]+" title="only numbers allowed" minlength="7">
                    </div>
                    <!-- <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Level</h4> -->
                    <!--   <select class="form-control c-select" name="userlevel" required="required" id="userlevel" data-plugin="selectpicker"> -->
                        <!-- <option value="">select</option> -->
                        <!-- <option value="admin" data-subtext="(High priority)">Admin</option> -->
                        <!-- <option value="agent" selected="selected"> Delivery Boy</option> -->
                        <!-- <option value="dealer">Dealer</option> -->
                        <input type="hidden" name="userlevel" id="userlevel" value="agent">

                      <!-- </select> -->
                  <!--   </div> -->
                 <!-- <input type="file" multiple = "multiple" name="image_file[]" id="image_file"  /> -->
                     
                
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title" id="userstorelabel">Store</h4>
                      <select class="form-control c-select" name="userstore" required="required" id="userstore" data-plugin="selectpicker" onchange="mystore()">
                        <option value="0">select</option>
                        <?php foreach($stores as $store){?>
                          <option value="<?php echo $store->store_id?>"><?php echo $store->store_name;?></option>
                        <?php }?>
                        <!-- <option value="admin" data-subtext="(High priority)">Admin</option> -->
                        <!-- <option value="agent">Agent</option> -->
                        <!-- <option value="dealer">Dealer</option> -->

                      </select>
                    </div>
                 <!-- <input type="file" multiple = "multiple" name="image_file[]" id="image_file"  /> -->
                     
                     
                 
                  </div>

                <div class="row m-b-2">
                  <div class="form-group col-sm-4">
                    </div>
                  
                    <div class="form-group col-sm-2">
                      
                      <!-- <input class="form-control tn btn-primary btn-lg" type="submit" > -->
                      <button type="submit" class="form-control tn btn-success btn-lg" name="save" id="savebutn" value="save">Save</button>
                    </div>
                    <!-- <div class="form-group col-sm-2">
                      
                      <button class="form-control tn btn-danger btn-lg" type="reset" value="reset">Reset</button>

                    </div> -->
                    <?php if($_SESSION['adminusertp'] == 'admin'){ ?>
                    <div class="form-group col-sm-2">
                        <a style="cursor: pointer;" class="form-control tn btn-danger btn-lg" onclick="cancelform();"><center>Cancel</center></a>                 
                    </div>
                   <?php }
                    else
                    {
                      ?>
                       <div class="form-group col-sm-2">
                        <a style="cursor: pointer;" href="<?php echo base_url();?>index.php/adminhome" class="form-control tn btn-danger btn-lg"><center>Cancel</center></a>                 
                       </div>
                       <?php
                    }
                    ?>
                  <div class="form-group col-sm-4">
                    </div>
                    
                </div>
                 </form>
                <!-- here -->
              </div>
            </div>
          </div>
          <!-- new one end -->

          <div class="panel-wrapper" id="displaytable">
            <div class="panel" >
            <!-- NEW ONE START -->
               <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#demotab-1" onclick="checkuser('dboy');" aria-controls="demotab-1" role="tab" data-toggle="tab" aria-expanded="true">AGENTS</a></li>
                <?php if($_SESSION['adminusertp'] == 'admin'){?>
                <li class="nav-item"><a class="nav-link" href="#demotab-2" onclick="checkuser('customer');" aria-controls="demotab-2" role="tab" data-toggle="tab" aria-expanded="false">CUSTOMERS</a></li>
              <?php }
              ?>
               
              </ul>
              <!-- NEW ONE END -->
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextend" >
   
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
        </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->
<div class="modal fade-scale" id="trackermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block-header bg-success" id="modalcaption"></div>
          <div class="modal-body">

        </div>
      </div>
    </div>

     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <?php if($_SESSION['adminusertp'] != 'agent'){ ?>
      <script type="text/javascript">
      $( document ).ready(function() {
          getusers();
      });
     </script>
      <?php }
      else
      {
      ?>
      <script type="text/javascript">
      $( document ).ready(function() {
          var vendor_id = document.getElementById("vendor_id").value;
          edituser(vendor_id);
      });
      </script>
      <?php
      }
      ?>



     <script type="text/javascript">
      var usertype = 'dboy';
      // $( document ).ready(function() {
      //     getusers();
      // });
      function checkuser(user){
        usertype = user;
        getusers();
      }
      var chk = 0;
      function getusers(){

           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/getusers');?>/",
                data: {usertype:usertype}, // serializes the form's elements.
               success: function(data){
                //alert(data);
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                // $('#uploaded_image').html(data);  
                // if(chk == 0){
                  
                // var table = $('#tablefill');
                //   table.DataTable({
                //   paging: true,
                //   searching: true,
                //   ordering: true,
                //   autoWidth: false,
                //   info: false,
                //   stateSave: false,
                //   responsive: true
                //   });
                
                // }
                
                // var table = $('#tablefill').DataTable();
                
              // show response from the php script.            
              }
             });
      }
    $('body').on('input','.emailcheck',function(e){
     var emailvalue = this.value;
     if($('#userid').val() == ""){
           $.ajax({
        method: "POST",
           url: "<?php echo base_url();?>index.php/user/emailcheckexist",
           data:{emailvalue:emailvalue},
           success: function(resp){
           
            if(resp == 'success'){
              $(':input[type="submit"]').prop('disabled', true);
              jQuery('.emailcheck').css('color', 'red');
              jQuery('.emailchecklabel').css('color', 'red');
            }else{
              $(':input[type="submit"]').prop('disabled', false);
               jQuery('.emailcheck').css('color', 'black');
               jQuery('.emailchecklabel').css('color', 'black');
            }
 
           }
         });
     }else{
      
          $.ajax({
        method: "POST",
           url: "<?php echo base_url();?>index.php/user/emailcheckexistupd",
           data:{emailvalue:emailvalue,userid:$('#userid').val()},
           success: function(resp){
           
            if(resp == 'success'){
              $(':input[type="submit"]').prop('disabled', true);
              jQuery('.emailchecklabel').css('color', 'red');
              jQuery('.emailcheck').css('color', 'red');
            }else{
              $(':input[type="submit"]').prop('disabled', false);
               jQuery('.emailchecklabel').css('color', 'black');
               jQuery('.emailcheck').css('color', 'black');
            }
 
           }
         });

     }


    
});
      function clearall(){
        jQuery('.emailcheck').css('color', 'black');
        jQuery('.emailchecklabel').css('color', 'black');
        $('#addeditform').fadeIn( "slow", function() {
        });
        // $( "#addeditform" ).fadeOut( "slow", function() {
        // });
        $( "#displaytable" ).hide();
        $('#modalcaption').text("Add Delivery Boy");
        $('#userfullname').val('');
        $('#username').val('');
        $('#userpassword').val('');
        $('#useraddress').val('');
        $('#userphone').val('');
        // $('#userlevel').selectpicker('val', '');
        $('#userstore').selectpicker('val', '');
        $('#userid').val('');
          $('#usercity').val('');
          $('#userpincode').val('');

        getusers();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      
      function cancelform(){
        $('#addeditform').hide();
        // $( "#addeditform" ).fadeOut( "slow", function() {
        // });
        $( "#displaytable" ).fadeIn( "slow", function() {
        });
      }
      $("#idFormnew").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/insertuser');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               if(data == "success"){
                  notifyresult('Data Saved','success');
                  // $('#trackermodal').modal('hide');
                  getusers();
                  $('#addeditform').hide();
        
                  $( "#displaytable" ).fadeIn( "slow", function() {
                  });
               }else{
                  notifyresult('Error','danger');
                  // $('#trackermodal').modal('hide');
               }

              // show response from the php script.            
              }
             });
      });
      
      function edituser(id){
     
        $(':input[type="submit"]').prop('disabled', false);
               jQuery('.emailcheck').css('color', 'black');
               jQuery('.emailchecklabel').css('color', 'black');
        $('#modalcaption').text("Edit Delivery Boy");
         $( "#addeditform" ).fadeIn( "slow", function() {
        });
         // $( "#addeditform" ).fadeIn();
         $('#displaytable').hide();
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/user/edituser');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
               $('#userstore').selectpicker('val', res.userstore);

              $('#userfullname').val(res.userdisplayname);
              $('#username').val(res.username);
              $('#userpassword').val(res.userpwd);
              $('#useraddress').val(res.useraddress);
              $('#userphone').val(res.userphone);
              $('#userlevel').selectpicker('val', res.usertype); 
              $('#userid').val(res.userid);
              $('#usercity').val(res.usercity);
              $('#userpincode').val(res.userpincode);
               

            }
        });
      }
      
      function deleteuser(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/user/deleteuser');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getusers();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }

      
      function verifyuser(id,st){
        var result = confirm("Are you want to change status?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/user/verifyuser');?>/",
              data: {id:id,st:st}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Status Changed','success');
                  getusers();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }
      

      // function mystore(){
      //     $.ajax({
      //         method: "POST",
      //         url: "<?php echo base_url('index.php/user/checkstoreexist');?>/",
      //         data: {userstore:$('#userstore').val(),mode:$('#userid').val()}, // serializes the form's elements.
      //        success: function(data){
      //         if(data == "success"){ 
      //             $(':input[type="submit"]').prop('disabled', false);
      //             jQuery('#userstore').css('color', 'black');
      //             jQuery('#userstorelabel').css('color', 'black');
      //          }else{
      //             $(':input[type="submit"]').prop('disabled', true);
      //             jQuery('#userstore').css('color', 'red');
      //             jQuery('#userstorelabel').css('color', 'red'); 
      //          }
      //       }
      //   });        
      // }
    </script>
   
