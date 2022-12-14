        
        <table class="table table-hover table-bordered  " id="tablefillmodal">
           <thead>
                    <tr>
                      <th>Products</th>
                      <th>Quantity</th>
                      <!-- <th>Price</th> -->
                      

                     
                      <!-- <th>Price + Commission</th>
                      <th>Price + Commission + Discount</th> -->
                      <!-- <th>Product Discount</th> -->
                      <!-- <th>Tax</th> -->
                      <th>Total Price (tax included)</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $total = 0;
                    $deliverycharge=0;
                    foreach($tabledatamodal->result() as $row){
                      // if($row->dc_cancel_order == 0){
                      //     $total = $total + $row->dc_prod_actualstoreprice ;
                      //     $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      // }
                      // if($row->order_status == 1 && $row->dc_cancel_order == 1){
                         
                      //     $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      // }
                      //  if($row->order_status == 0 && $row->dc_cancel_order == 1){
                      //     $total = $total + 0;
                      //     $deliverycharge = 0 ;
                      // }

                       
                      // $total = $total +  ($row->dc_prod_tax * $row->cart_quantity) + ($row->dc_prod_commoffer * $row->cart_quantity)  ;
                      if($row->order_status == 0 && $row->dc_cancel_order == 1){
                  }else{
                    if($row->order_status == 1 && $row->dc_cancel_order == 1){
                      $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                    }else{


                      
                      if($row->dc_cancel_order == 0 ){
                        $total = $total + $row->dc_prod_actualstoreprice ;
                        $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      }
                      


                      }
                    }
                      ?>
                        <tr>
                          <td><?php echo $row->dc_prod_name.' ,'.$row->dc_prod_measure;?></td>
                           <td><?php echo $row->cart_quantity?></td>
                          <!-- <td><?php echo $row->dc_prod_commoffer;?></td> -->
                         
                         
                          <!-- <td><?php echo $row->dc_prod_tax;?></td> -->
                          <td><?php echo 
                          number_format($row->dc_prod_actualstoreprice,2);?></td>
                          <td><div class="form-group col-sm-2" style="margin-top: 14px;">
                      
                    <?php if($row->dc_cancel_order == 0){?>
                      <button class="btn btn-danger"   onclick = "cancelorder('<?php echo $row->dc_id;?>','<?php echo $row->dc_order_id;?>','<?php echo $row->dc_date;?>','<?php echo $row->dc_time;?>')" value = "cancel">Cancel</button>
                    <?php }else{
                      if($row->dc_cancel_order == 1 && $row->order_status == 1){?>
                      
                      <center><button class="btn btn-secondary-outline" style="cursor:text">Shipped</button></center>
                    <?php }?>
                      <center><button class="btn btn-secondary-outline" style="cursor:text">Cancelled</button></center>
                    <?php 
                  } ?>
                    
                  </div></td>
                           <!-- <td><?php echo $row->prod_disc?></td> -->
                            
                             
                              
                          <!-- <td>
                            <div class="media-right">
                              <button class="btn btn-success btn-xs"   onclick="edituser('<?php echo $row->dc_id;?>');"><i class="icon ion-edit"></i></button>
                              <button class="btn btn-danger btn-xs" onclick="deleteuser('<?php echo $row->user_id;?>');"><i class="ion-close"></i></button>
                              </div>   
                          </td> -->

                        </tr>
                    <?php }?>
                    <tr>
                      <td colspan="7" align="right"> Delivery Charge = <?php
                     
                      echo number_format($deliverycharge,2);?></td>
                    </tr>
                    <tr>
                      <td colspan="7" align="right">Grand Total = <?php 
                      echo number_format($total+$deliverycharge,2);?></td>
                    </tr>

                  </tbody>
                </table>
                <?php if($_SESSION['adminusertp'] == 'admin'){?>
                <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Choose Delivery Boy</h4>
                      <select class="form-control c-select" name="dboy"  id="dboy" data-plugin="selectpicker">
                        <option value="0">select</option>
                        <!-- <?php $boyid = $tabledatamodal->row();
                        if(!empty($tabledatamodal)){
                          $dboyid = $boyid->dc_agent_id;
                          if($dboyid > 0){
                            ?><option value="<?php echo $dboyid;?>">selected</option><?php
                          }
                        } ?> -->
                        
                     <?php $boyid = $tabledatamodal->row();
                    foreach($dboy as $boy){
                         
                      // if(!empty($tabledatamodal)){
                        $dboyid = $boyid->dc_agent_id;
                        if($dboyid == $boy->user_id){
                          ?><option value="<?php echo $boy->user_id;?>" selected><?php echo $boy->user_displayname;?></option><?php
                        }else{
                      // }
                      ?>
                      <option value="<?php echo $boy->user_id;?>" ><?php echo $boy->user_displayname;?></option>
                    
                    <?php }

                  } ?>
                         
                       
                      </select>

                    </div>
                    <div class="form-group col-sm-4">
                      <h4 class="demo-sub-title">Delivery Date</h4>
                      <div class="datepicker-wrapper open">
                        <input class="form-control"  type="date" value="<?php echo $boyid->dc_delivery_date;?>" id="ddate">
                      </div>
                    </div>
                    <div class="form-group col-sm-2" style="margin-top: 14px;">
                      <h4 class="demo-sub-title"></h4>
                    <button class="btn btn-success"   onclick="dboychoose('<?php echo $ord;?>','<?php echo $dat;?>','<?php echo $tim;?>');" value = "save">Save</button>
                  </div>
                <?php }?>
