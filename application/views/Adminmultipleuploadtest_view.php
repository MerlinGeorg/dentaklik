

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Category Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Category</button>
              </div>
            </div>
          </div>
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
          <div class="modal-body">
           <form method="POST"  id="idFormCategory" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Category Name</h4>
                     
                       <input class="form-control" type="text" name="categoryname" id="categoryname">
                     
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Category Image</h4>
                      <!-- <input class="form-control" type="file" placeholder="emailid" required="required" name="userfile" id="categoryimage"> -->
                      <input class="form-control" type="file"  name="files" id="categoryimage"  />
                     <!--  <input class="form-control" type="file"  name="files[]" id="categoryimage" multiple="multiple" /> -->
                      <input type="hidden" name="imagehid" id="imagehid">
                      <div id="imagefill"></div>
                      
                    </div>
                    <input type="hidden" name="categoryid" id="categoryid">
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

     <script type="text/javascript">
      $( document ).ready(function() {
          getcategory();

      });
      function getcategory(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admincategory/getcategory');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
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
         $('#modalcaption').text("Add Category");
        $('#userfile').val('');
         $('#categoryid').val('');
        $('#categoryname').val('');
         $('#categoryimage').val('');
          $("#categoryimage").prop('required',true);
         $('#imagefill').html('');
         $('#imagehid').val('');
          getcategory();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#idFormCategory").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Adminmulti/insert_category');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
                console.log(data);
                notifyresult(data,'warning');
               
               // if(data == "success"){
               //    notifyresult('Data Saved','success');
               //    $('#trackermodal').modal('hide');
               //     getcategory();
               // }else{
               //    notifyresult('Error','danger');
               //    $('#trackermodal').modal('hide');
               // }

              // show response from the php script.            
              }
             });
      });
      
      function editcategory(id){
        $('#modalcaption').text("Edit Category");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admincategory/editcategory');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
               $("#categoryimage").prop('required',false);
              $('#categoryid').val(res.categoryid);
              $('#categoryname').val(res.categoryname);
             $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/imageupload/'+res.categoryimage+'">')
              
              $('#imagehid').val(res.categoryimage);
            }
        });
      }
      
      function deletecategory(id,img){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminmultiuploadtest/deletecategory');?>/",
              data: {id:id,imagename:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                   getcategory();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }
    </script>
   
   