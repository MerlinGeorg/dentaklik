        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Brand Name</th>
                      <th>Brand Image</th>
                      <th>Brand Status</th>
                      <th>Operations</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	foreach($br as $row){
                      ?>

                  		  <tr>
                           <td><?php echo $row->brand_name?></td>
		                      
		                      <td><a href="<?php echo base_url();?>/imageupload/<?php echo $row->brand_image?>"> <img  style="width:100px;height:50px;" src="<?php echo base_url();?>/imageupload/<?php echo $row->brand_image?>"></img></a></td>
             <?php             
             if($_SESSION['adminusertp'] != 'agent')
             {
              ?>
                          <td>
                          <center>
                            <?php if($row->brand_status == 0){?>
                            <button class="btn btn-success btn-xs" onclick="changepriority('<?php echo $row->brand_id;?>','0');">Approved</button>
                          <?php } 
                           else{ ?> 
                          <button class="btn btn-danger btn-xs" onclick="changepriority('<?php echo $row->brand_id;?>','1');">Waiting</button>
                         <?php } ?>
                         </center>
                        </td>

                          <td>
                            <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  
                              onclick="editbrand('<?php echo $row->brand_id;?>');"><i class="icon ion-edit"></i></button>
                              <button class="btn btn-danger btn-xs" onclick="deletebrand('<?php echo $row->brand_id;?>','<?php echo $row->brand_image;?>');"><i class="icon ion-close"></i></button>
                              </div>   
                          </td>

              <?php
              }
              else
              {  ?>
                       <td>
                          <center>
                            <?php if($row->brand_status == 0){?>
                            <button class="btn btn-success btn-xs">Approved</button>
                          <?php } 
                           else{ ?> 
                          <button class="btn btn-danger btn-xs">Waiting</button>
                         <?php } ?>
                         </center>
                        </td> 
                 <?php         
                 if($_SESSION['vendor_id'] == $row->brand_agent_id)
                  { ?>


                          <td>
                            <center>
                            <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  
                              onclick="editbrand('<?php echo $row->brand_id;?>');"><i class="icon ion-edit"></i></button>
                              <button class="btn btn-danger btn-xs" onclick="deletebrand('<?php echo $row->brand_id;?>','<?php echo $row->brand_image;?>');"><i class="icon ion-close"></i></button>
                              </div> 
                              </center>  
                          </td>

              <?php
              }
              else
              { ?>
                <td>
                  <center>
                <button class="btn btn-danger btn-xs">Not Available</button>
                </center>
                </td>
                <?php
              }
              }
              ?>
                       
		                     
             
                        
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
               