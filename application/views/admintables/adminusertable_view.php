        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>

             <?php
             foreach($tabledata as $row1){
               $user = $row1->user_type == 'agent';
             }
             ?>
                    <tr>
                      <th>Full name</th>
                      <th>Phone</th>
                      <th>Username</th>
                      <?php if($user == "agent") { ?>
                      <th>Password</th>
                      <?php } ?>
                      <!-- <th>Level</th> -->
                      <th>Address</th>
                      <th>City</th>
                      <th>Pincode</th>
                      <?php if($user == "agent") { ?>
                      <th>Store</th>
                      <?php } ?>
                      <?php if($_SESSION['adminusertp'] == 'admin'){?>
                      <th>Verified</th>
                    <?php }?>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    

                    foreach($tabledata as $row){?>
                        <tr>
                          <td><?php echo $row->user_displayname?></td>
                          <td><?php echo $row->user_phone?></td>
                          <td><?php echo $row->user_name?></td>
                          <?php if($user == "agent") { ?>
                          <td><?php if($row->user_type == 'agent'){?>
                            <?php echo $this->encryption->decrypt($row->user_pwd)?>
                            <?php }else{
                              echo "N/A";}?>
                            </td>
                          <?php } ?>
                           <!-- <td><?php if($row->user_type == 'agent'){?>
                            <?php echo "Delivery Boy"?>
                            <?php }else{
                              echo "User";}?></td> -->
                          <td><?php 
                          if($row->user_type == 'agent'){
                            echo $row->user_address; }else{
                              echo $row->address_addr;
                            }?></td>
                          <td><?php 
                          if($row->user_type == 'agent'){
                            echo $row->user_city; }else{
                              echo $row->address_city;
                            }?></td>
                          <td><?php 
                          if($row->user_type == 'agent'){
                            echo $row->user_pincode; }else{
                              echo $row->address_pincode;
                            }
                          ?></td>
                          <?php if($user == "agent") { ?>
                          <td>
                            <?php if($row->user_type == 'agent'){?><?php echo $row->store_name?>
                              <?php }else{
                                echo "N/A";
                              }?>
                            </td>
                          <?php } ?>
                          <?php if($_SESSION['adminusertp'] == 'admin'){?>
                          <td><?php
                           if($row->user_type == 'agent'){
                          if($row->user_status == 1){?>
                            <center><button class="btn btn-success btn-xs"   onclick="verifyuser('<?php echo $row->user_id;?>','<?php echo $row->user_status;?>');">YES</button></center>
                            <?php }else{?>
                            <center><button class="btn btn-danger btn-xs"   onclick="verifyuser('<?php echo $row->user_id;?>','<?php echo $row->user_status;?>');">NO</button></center>
                          <?php }
                        }else{?>
                          <center><button class="btn btn-success btn-xs">YES</button></center> 
                        <?php }?>
                          </td>
                        <?php }?>
                          <td>
                            <div class="media-right">
                              <?php if($row->user_type == 'agent'){?>
                              <button class="btn btn-success btn-xs"   onclick="edituser('<?php echo $row->user_id;?>');"><i class="icon ion-edit"></i></button>
                          
                              <button class="btn btn-danger btn-xs" onclick="deleteuser('<?php echo $row->user_id;?>');"><i class="icon ion-close"></i></button>
                            <?php }?>
                              </div>   
                          </td>
                        </tr>
                    <?php }?>  
                  </tbody>
                </table>
               