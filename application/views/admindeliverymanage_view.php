

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Delivery Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
               <!--  <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add delivery</button> -->
              </div>
            </div>
          </div>
        </div>


<!-- //firebase -->

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


























        <div class="container-fluid">
          <div class="panel-wrapper">
            <div class="panel" >
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextendcat" >
                <!-- <table class="table table-hover table-bordered  "  id="tablefill"> -->
<!--                   <thead>
                    <tr>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-right"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Airi</td>
                      <td>Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Brielle</td>
                      <td>Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Herrod</td>
                      <td>Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Rhona</td>
                      <td>Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Colleen</td>
                      <td>Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Sonya</td>
                      <td>Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Jena</td>
                      <td>Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Quinn</td>
                      <td>Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Charde</td>
                      <td>Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Haley</td>
                      <td>Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Tatyana</td>
                      <td>Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                  

                   
                  </tbody> -->
                <!-- </table> -->
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
          <!-- <div class="modal-body"> -->
           <!-- <form method="POST"  id="idFormdelivery" enctype="multipart/form-data" accept-charset="utf-8"> -->
             <!-- <div class="panel" > -->
              <div class="modal-body table-responsive" style="overflow-x:auto;" id="tablefillextendmodal" >
<!--                 <table class="table table-hover table-bordered  "  id="tablefill">
                  <thead>
                    <tr>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Salary</th>
                      <th>Action</th>
                       <th>Action</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-right"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                      <td>
                        <div class="media-right"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    
                    <tr>
                      <td>Rhona</td>
                      <td>Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Colleen</td>
                      <td>Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Sonya</td>
                      <td>Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Jena</td>
                      <td>Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Quinn</td>
                      <td>Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Charde</td>
                      <td>Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Haley</td>
                      <td>Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Tatyana</td>
                      <td>Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                  

                   
                  </tbody>
                </table> -->

              </div>
            <!-- </div> -->
                  
                     
                     
                 
                  <!-- </div> -->

          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">Close</button>
            <!-- <button class="btn btn-success"  type="submit" value = "save">Save</button> -->
            <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
        <!--    </form> -->
        </div>
      </div>
    </div>
     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <script type="text/javascript">
      $( document ).ready(function() {
          getdelivery();

      });

      function dboychoose(ord,dt,tm){

        document.getElementById('title').value = "New Order";
             
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admindelivery/dboyassign');?>/",
                data: {ord:ord,dt:dt,tm:tm,dboy:$('#dboy').val(),ddate:$('#ddate').val()},
               success: function(data){

             var result = JSON.parse(data);
            
             for (var i = 0; i < result['details'].length ; i++) {
             
             var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
             firebase_id = firebase_id.substring(1, firebase_id.length-1);

              var user_name = JSON.stringify(result['details'][i]['user_displayname']);
             user_name = user_name.substring(1, user_name.length-1);

            document.getElementById('message').value = user_name+", You have new order "+ord;
            
             document.getElementById('redId').value = firebase_id;

             $('#single_firebase').trigger('click');
                }
                  notifyresult('Data Saved','warn');
                  getdelivery();
               
              }


             });
      }
      function getdelivery(){

           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admindelivery/getdelivery');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // alert(data);
                // console.log(data);
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable();
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
      function clearall(){
         $('#modalcaption').text("Add Delivery");
        $('#image_file').val('');
         $('#deliveryid').val('');
        $('#deliveryname').val('');
         $('#deliveryimage').val('');
          $("#deliveryimage").prop('required',true);
         $('#imagefill').html('');
         $('#imagehid').val('');
          getdelivery();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#idFormdelivery").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admindelivery/insertdelivery');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               if(data == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                   getdelivery();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
               }

              // show response from the php script.            
              }
             });
      });
      
      function viewdelivery(id,dat,tim){
       
        $('#modalcaption').text("View Delivery");

        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/modalviewdelivery');?>/",
              data: {id:id,dat:dat,tim:tim}, // serializes the form's elements.
             success: function(data){
                $('#tablefillextendmodal').html(data);
                // getdelivery();
                $('#tablefillmodal').DataTable();
            }
        });
      }


      function deliverystatus(id,dat,tim,user_name,order_id){
         var result = confirm("Are you want to change status?");
          if (result) {

              document.getElementById('title').value = "Order Delivered";
              document.getElementById('message').value = "Dear "+user_name+", Thank you for shopping with us, Your order no "+order_id+" has been Delivered!";
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/deliverystatus');?>/",
              data: {id:id,dat:dat,tim:tim,order_id:order_id}, // serializes the form's elements.
             success: function(data){
           //   alert(data);
              var result = JSON.parse(data);
            //    alert(result['details'][0]['firebase_reg_id']);


             for (var i = 0; i < result['details'].length ; i++) {
             
             var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
             firebase_id = firebase_id.substring(1, firebase_id.length-1);
             document.getElementById('redId').value = firebase_id;

             $('#single_firebase').trigger('click');
                }

              getdelivery();
              notifyresult('Status Changed','success');
                
            }
        });
      }
      }



      function shippedstatus(id,dat,tim,user_name,order_id){
         var result = confirm("Are you want to change status?");
          if (result) {
            document.getElementById('title').value = "Out For Delivery";
            document.getElementById('message').value = "Dear "+user_name+", Your order no "+order_id+" is on its way!";
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/shippedstatus');?>/",
              data: {id:id,dat:dat,tim:tim,order_id:order_id}, // serializes the form's elements.
             success: function(data){
                var result = JSON.parse(data);
             //   alert(result);

               // //alert(result);
               for (var i = 0; i < result['details'].length ; i++) {
               
               var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
               firebase_id = firebase_id.substring(1, firebase_id.length-1);
               document.getElementById('redId').value = firebase_id;
               
               $('#single_firebase').trigger('click');
                  }

              getdelivery();
              cuntbadge();
              notifyresult('Status Changed','success');
                
            }
        });
      }
      }
      // function invoice(id,dat,tim){
      //    // var result = confirm("Are you want to change status?");
      //    //  if (result) {
      //   $.ajax({
      //         method: "POST",
      //         url: "<?php echo base_url('index.php/admindelivery/invoice');?>/",
      //         data: {id:id,dat:dat,tim:tim}, // serializes the form's elements.
      //        success: function(data){
      //        window.location.href = '/pdf/example.pdf';
              
              
                
      //       }
      //   });
      // // }
      // }
      function invoice(id,dat,tim){
         // var result = confirm("Are you want to change status?");
         //  if (result) {
    
            
             window.open("<?php echo base_url();?>index.php/admindelivery/prints?ci="+ id +"&d="+ dat + "&t="+ tim ,"_blank");
              
              
            
      // }
      }
      function deletedelivery(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/deletedelivery');?>/",
              data: {id:id,imagename:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                   getdelivery();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }
    </script>


 <script type="text/javascript">

    function cancelorder(id,ordid,dcdate,dctime){
      
  var result = confirm("Are you sure you want to cancel order?");
if (result) {
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/Orderhistory/cancelorder');?>/",
      data:{id:id,ordid:ordid},
      success: function(data){

       

       var result = JSON.parse(data);
       if(result['status'] == 'success'){
           if(result['order_cancel'] == "true")
           {
            document.getElementById('title').value = "Order Cancelled";
            
             for (var i = 0; i < result['details'].length ; i++) {
             
             var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
             firebase_id = firebase_id.substring(1, firebase_id.length-1);

              var user_name = JSON.stringify(result['details'][i]['user_displayname']);
             user_name = user_name.substring(1, user_name.length-1);

              document.getElementById('message').value = "Dear "+user_name+", Thank you for shopping with us, Your order no "+ordid+" has been Cancelled!";
            
             document.getElementById('redId').value = firebase_id;

             $('#single_firebase').trigger('click');
           }
       // notification_agent(data);
           }
           else
           {

           }

         
          notifyresult('item cancelled','success');
          viewdelivery(ordid,dcdate,dctime);
           // $('#trackermodal').modal('hide');
           // $('#trackermodal').modal('show');
           // getshoppingitems();
           
        }
        else{
          notifyresult('item cancelled failed','danger')
        }
      
      }
     });
   }

  }


//   function notification_agent(data)
//   {
//      var result = JSON.parse(data);

//       if(result['status'] == 'success'){

//          document.getElementById('title').value = "Order Cancelled";
//              for (var j = 0; j < result['agent_notification'].length ; j++) {
             
//              var firebase_id = JSON.stringify(result['agent_notification'][j]['firebase_reg_id']);
//              firebase_id = firebase_id.substring(1, firebase_id.length-1);

//               var user_name = JSON.stringify(result['agent_notification'][j]['user_displayname']);
//              user_name = user_name.substring(1, user_name.length-1);

//               document.getElementById('message').value = user_name+", Order no "+ordid+" has been Cancelled! Thank you for your services.";
            
//              document.getElementById('redId').value = firebase_id;

//              $('#single_firebase').trigger('click');
//            }

     
//   }
// }
 </script>          
               
   
   