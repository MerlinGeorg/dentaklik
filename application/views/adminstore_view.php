
  
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Store Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <!-- <button class="btn btn-success"
                             onclick="clearall();">Add Store</button> -->
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
                    <!-- from product other start -->
              <div class="panel-wrapper" style="display: none;" id="addeditform">
            <div class="panel">
              <div class="panel-heading">
                  <h4 class="panel-title"><div id="formheading"></div></h4>
                </div>
                <div class="panel-body">
                   <form method="POST"  id="idFormBrand" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Name</h4>
                      <input class="form-control"  pattern="[a-zA-Z0-9\s-]+" type="text" name="storename" id="storename" title="only charactes and numbers are allowed" required="required">
                    </div>
                    <!-- <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Brand Image</h4>
                       <input class="form-control" type="file" placeholder="emailid" required="required" name="image_file" id="categoryimage"> -->
                      <!-- <input class="form-control" type="file"  name="image_file" id="brandimage"  />
                      <input type="hidden" name="imagehid" id="imagehid">
                      <div id="imagefill"></div> -->
                      
                    <!-- </div> --> 

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Address</h4>
                      <input class="form-control"  name="storeaddress" id="storeaddress" type="text"  pattern="[a-zA-Z0-9\s-]+" title="only characters and numbers are allowed" required="required">
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store City</h4>
                      <input class="form-control" type="text" name="storecity" id="storecity"  pattern="[a-zA-Z0-9\s-]+"  title="only characters and numbers are allowed" required="required">
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Pincode</h4>
                      <input class="form-control" type="text" name="storepin" id="storepin"  pattern="[0-9]+" title="only numbers are allowed" required="required">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store GST Number</h4>
                      <input class="form-control" type="text" name="storegst" id="storegst"  pattern="[a-zA-Z0-9\s-]+" title="special characters are not allowed" required="required">
                    </div>

                    <div class="form-group col-sm-6">
                      <!-- <h4 class="demo-sub-title">Store Latitude</h4> -->
                      <input class="form-control" type="hidden" name="storelat" id="storelat" required="required">
                    </div>

                    <div class="form-group col-sm-6">
                      <!-- <h4 class="demo-sub-title">Store Longitude</h4> -->
                      <input class="form-control" type="hidden" name="storelong" id="storelong" required="required">
                    </div>
                    
                    <div class="form-group col-sm-12">
                      <!-- gmap start -->
    <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Autocomplete search
        </div>
        <div id="type-selector" class="pac-controls">
          <input type="hidden" name="type" id="changetype-all" checked="checked">
          <!-- <label for="changetype-all">All</label> -->

          <input type="hidden" name="type" id="changetype-establishment">
          <!-- <label for="changetype-establishment">Establishments</label> -->

          <input type="hidden" name="type" id="changetype-address">
          <!-- <label for="changetype-address">Addresses</label> -->

          <input type="hidden" name="type" id="changetype-geocode">
          <!-- <label for="changetype-geocode">Geocodes</label> -->
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="hidden" id="use-strict-bounds" value="">
          <!-- <label for="use-strict-bounds">Strict Bounds</label> -->
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter a location">
      </div>
    </div>
<div id="dvMap" style="height: 450px;
   width: 100%;"></div>
   <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
  <input type="hidden" id="latg" value="29.31166" name="lat_map" >
  <input type="hidden" id="lngg" value="47.481766" name="long_map">
                    </div>

                    <input type="hidden" name="storeid" id="storeid" >
                  </div>
                  <!-- newe one start-->
                                    <div class="row m-b-2">
                  <div class="form-group col-sm-4">
                    </div>
                  
                    <div class="form-group col-sm-2">
                      
                      <!-- <input class="form-control tn btn-primary btn-lg" type="submit" > -->
                      <button type="submit" class="form-control tn btn-success btn-lg" name="save" value="save">Save</button>
                    </div>
                    <!-- <div class="form-group col-sm-2">
                      
                      <button class="form-control tn btn-danger btn-lg" type="reset" value="reset">Reset</button>

                    </div> -->
                    <div class="form-group col-sm-2">
                        <a style="cursor: pointer;" class="form-control tn btn-danger btn-lg" onclick="cancelform();"><center>Cancel</center></a>                 
                  </div>
                  <div class="form-group col-sm-4">
                    </div>
                    
                </div>
                  <!-- new one end                      -->
                     
                 
                  </div>

         
           </form>
          </div>
               
                <!-- //fdsfsdf -->
                </div>
            </div>
          <!-- from product other end -->
          <div class="panel-wrapper" id="displaytable">
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
          <div class="modal-body">
           <form method="POST"  id="idFormBrand" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Name</h4>
                      <input class="form-control" type="text" name="storename" id="storename">
                    </div>
                    <!-- <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Brand Image</h4>
                       <input class="form-control" type="file" placeholder="emailid" required="required" name="image_file" id="categoryimage"> -->
                      <!-- <input class="form-control" type="file"  name="image_file" id="brandimage"  />
                      <input type="hidden" name="imagehid" id="imagehid">
                      <div id="imagefill"></div> -->
                      
                    <!-- </div> --> 

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Address</h4>
                      <textarea class="form-control" rows="3" name="storeaddress" id="storeaddress"></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store City</h4>
                      <input class="form-control" type="text" name="storecity" id="storecity">
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Pincode</h4>
                      <input class="form-control" type="text" name="storepin" id="storepin">
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Latitude</h4>
                      <input class="form-control" type="hidden" name="storelat" id="storelat">
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Store Longitude</h4>
                      <input class="form-control" type="hidden" name="storelong" id="storelong">
                    </div>


                    <input type="hidden" name="storeid" id="storeid" >
                  </div>
                  
                     
                     
                 
                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-success"  type="submit" value = "save">Save</button>
            <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
           </form>
        </div>
      </div>
    </div>
     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA8aqinnrTK_cNIbvjhcM_XyEhOBD6v41o&libraries=places"></script>
     <script type="text/javascript">
       var mapOptions = {
                center: new google.maps.LatLng(10.4255057, 76.33044159999997),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              };
      $( document ).ready(function() {

          getstore();

      });
      function getstore(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_store/getstore');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextendcat').html(data);
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
      function clearall(){
         // $('#modalcaption').text("Add Store");
          $('#formheading').text('Add Store');
        // $('#image_file').val('');
         $('#storeid').val('');
        $('#storename').val('');
         $('#storeaddress').val('');
          // $("#brandimage").prop('required',true);
          $('#storecity').val('');
         $('#storepin').val('');
         $('#storelat').val('');
         $('#storelong').val('');
         $('#storegst').val('');
         
         $( "#addeditform" ).fadeIn( "slow", function() {
        });
         // $( "#addeditform" ).fadeIn();
         $('#displaytable').hide();
          getstore();
          clearplaceMarker();
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
      $("#idFormBrand").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_store/insertstore');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               if(data == "success"){
                  notifyresult('Data Saved','success');
                  $('#addeditform').hide(); 
                  $( "#displaytable" ).fadeIn( "slow", function() {
                  });
                  // $('#trackermodal').modal('hide');
                   getstore();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
               }

              // show response from the php script.            
              }
             });
      });
      

      function deletestore(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_store/deletestore');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                   getstore();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }
    

                      function editstore(id){
        // $('#modalcaption').text("Edit Store");
        $('#formheading').text('Edit Store');
        $( "#addeditform" ).fadeIn( "slow", function() {
        });
         $('#displaytable').hide();
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_store/editstore');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
               
              $('#storeid').val(res.store_id);
              $('#storegst').val(res.storegst);
              $('#storename').val(res.store_name);
              $('#storeaddress').val(res.store_address);
              $('#storecity').val(res.store_city);
              $('#storepin').val(res.store_pincode);
              $('#storelat').val(res.store_lat);
              $('#storelong').val(res.store_lon);
             var latg = $('#storelat').val();
             var lng = $('#storelong').val();

              var latitlongit = new google.maps.LatLng(latg,lng);
              placeMarker(latitlongit);    
              

             
            }
        });
      }

        // window.onload = function () {
          // function init() {
    
             
function clearplaceMarker() {
 
    placeMarker();
  
}
           
            
            // var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            // map.addListener('click', function(e) {
            //     placeMarker(e.latLng, map);
            // });

var marker;


function placeMarker(location) {
  if ( marker ) {
    marker.setPosition(location);
  } else {
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
}


// function gojo(locs) {
//         placeMarker(locs);
//         }
google.maps.event.addListener(map, 'click', function (e) {
                // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                placeMarker(e.latLng);
                $('#storelat').val(e.latLng.lat());
                $('#storelong').val(e.latLng.lng());
                 
            });
        

// new section start
 var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);
 // var infowindow = new google.maps.InfoWindow();
 //        var infowindowContent = document.getElementById('infowindow-content');
 //        infowindow.setContent(infowindowContent);
 //        infowindow.close();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function(e) {
           // placeMarker(e.latLng);

                // $('#latg').val(e.latLng.lat());
                // $('#lngg').val(e.latLng.lng());
          // infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          $('#storelat').val(place.geometry.location.lat());
          $('#storelong').val(place.geometry.location.lng());
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          // infowindowContent.children['place-icon'].src = place.icon;
          // infowindowContent.children['place-name'].textContent = place.name;
          // infowindowContent.children['place-address'].textContent = address;
          // infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      

           // }
           
           // google.maps.event.addDomListener(window, "load", init);


    </script>

<!-- gmap tester end--> 
