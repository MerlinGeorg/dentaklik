        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Category name</th>
                      <th>Subcategory name</th>
                      <th>Subcategory image</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                           <td><?php echo $row->cat_name?></td>
		                      <td><?php echo $row->sub_name?></td>
		                      <td><a href="<?php echo base_url();?>/imageupload/<?php echo $row->sub_image?>"> <img  style="width:100px;height:50px;" src="<?php echo base_url();?>/imageupload/<?php echo $row->sub_image?>"></img></a></td>
		                      <td>
		                        <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  onclick="editsubcategory('<?php echo $row->sub_id;?>');"><i class="icon ion-edit"></i></button>
		                          <button class="btn btn-danger btn-xs" onclick="deletesubcategory('<?php echo $row->sub_id;?>','<?php echo $row->sub_image;?>');"><i class="icon ion-close"></i></button>
		                          </div>   
                     	 		</td>
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
               