        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Store name</th>
                      
                      <th>Store Address</th>
                      <th>Store City</th>
                      <th>Store Pincode</th>
                      <!-- <th>Store Latitude</th>
                      <th>Store Longitude</th> -->
                      <th>Operations</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    
                    foreach($stor as $row){?>
                        <tr>
                           <td><?php echo $row->store_name?></td>
                           <td><?php echo $row->store_address?></td>
                           <td><?php echo $row->store_city?></td>
                           <td><?php echo $row->store_pincode?></td>
                           <!-- <td><?php echo $row->store_lat?></td>
                           <td><?php echo $row->store_lon?></td> -->
                           <td>
                            <div class="media-right">
                              <button class="btn btn-success btn-xs" 
                              onclick="editstore('<?php echo $row->store_id;?>');"><i class="icon ion-edit editclick"></i></button>
                              <button class="btn btn-danger btn-xs" onclick="deletestore('<?php echo $row->store_id;?>');"><i class="icon ion-close"></i></button>
                              </div>   
                          </td>
                        </tr>
                    <?php }?>  
                  </tbody>
                </table>
               