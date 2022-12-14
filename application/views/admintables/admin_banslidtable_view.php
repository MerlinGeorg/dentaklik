        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Banner/Slider</th>
                      
                      <th>Name</th>
                      <th>Offer</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Sub-category</th>
                      <th>Brand</th>
                      
                      <th>Display</th>
                   
                      
                      <th>Operations</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($bs as $row){?>
                  		  <tr>
                           <td><?php 
                           if($row->banner_slider_choose == 0){
                            echo "Banner"; 
                           } 
                           else {
                            echo "Slider";
                            }?></td>
                           <td><?php echo $row->banner_slider_name?></td>
                           <td><?php echo $row->banner_slider_offer?></td>
		                      
		                      <td><a href="<?php echo base_url();?>/imageupload/<?php echo $row->banner_slider_image?>"> <img  style="width:100px;height:50px;" src="<?php echo base_url();?>/imageupload/<?php echo $row->banner_slider_image?>"></img></a></td>
		                      
                           <td><?php echo $row->cat_name?></td>
                           <td><?php echo $row->sub_name?></td>
                           <td><?php echo $row->brand_name?></td>
                            <?php if($_SESSION['adminusertp'] == 'admin'){?>
                  
            
                           <td> <div class="media-right">

                          <?php
                           
                           $check = $row->banner_slider_status;
                           if($check==1)
                           {
                          ?>
                          <button class="btn btn-success btn-xs" onclick="priority_set('<?php echo $row->banner_slider_id;?>','low');" >Yes</button>

                            <?php
                            }
                            else
                            {  
                            ?>
                            <button class="btn btn-danger btn-xs" onclick="priority_set('<?php echo $row->banner_slider_id;?>','high');" >No</button>
                          <?php } ?>
                           </td>
                                   <?php }else{?>

                           <td> <div class="media-right">

                          <?php
                           
                           $check = $row->banner_slider_status;
                           if($check==1)
                           {
                          ?>
                          <div style = "cursor: default;" class="btn btn-success btn-xs"  >Yes</div>

                            <?php
                            }
                            else
                            {  
                            ?>
                            <div style = "cursor: default;" class="btn btn-danger btn-xs"  >No</div>
                          <?php } ?>
                           </td>

                        <?php }?>
                           <td>
		                        <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  
                              onclick="editbanslide('<?php echo $row->banner_slider_id?>');"><i class="icon ion-edit"></i></button>
		                          <button class="btn btn-danger btn-xs" onclick="deletebanslide('<?php echo $row->banner_slider_id?>','<?php echo $row->banner_slider_image?>');"><i class="icon ion-close"></i></button>
		                          </div>   
                     	 		</td>
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
               