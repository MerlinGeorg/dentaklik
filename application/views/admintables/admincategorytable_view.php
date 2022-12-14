
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      <th>Category name</th>
                      <th>Category image</th>
                      <th>Category icon</th>
                      <th>Category priority</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
		                      <td><?php echo $row->cat_name?></td>
		                      <td><a href="<?php echo base_url();?>/imageupload/<?php echo $row->cat_image?>"> <img  style="width:50px;height:50px;" src="<?php echo base_url();?>/imageupload/<?php echo $row->cat_image?>"></img></a></td>
                          <?php if(!empty($row->cat_icon)){?>
                          <td><a href="<?php echo base_url();?>/imageupload/<?php echo $row->cat_icon?>"> <img  style="width:50px;height:50px;" src="<?php echo base_url();?>/imageupload/<?php echo $row->cat_icon?>"></img></a></td>
                          <?php 
                          }
                          else
                          {
                            ?><td>N/A</td><?php
                          }
                          ?>
                          <td>
                          <center>
                            <?php if($row->cat_priority == 1){?>
                            <button class="btn btn-success btn-xs" onclick="changepriority('<?php echo $row->cat_id;?>','1');">High</button>
                          <?php } 
                           else{ ?> 
                          <button class="btn btn-danger btn-xs" onclick="changepriority('<?php echo $row->cat_id;?>','0');">Low</button>
                         <?php } ?>
                      </center></td>
                          <td>
		                        <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  onclick="editcategory('<?php echo $row->cat_id;?>');"><i class="icon ion-edit"></i></button>
		                          <button class="btn btn-danger btn-xs" onclick="deletecategory('<?php echo $row->cat_id;?>','<?php echo $row->cat_image;?>','<?php echo $row->cat_icon;?>');"><i class="icon ion-close"></i></button>
		                          </div>   
                     	 		</td>
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               