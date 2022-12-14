        <table class="table table-hover table-bordered  " id="tablefillcomm2">
           <thead>
                    <tr>
                     <!--  <th>Store Name</th>
                      <th>Store Address</th>-->
                      <!-- <th>Commission</th> -->

                      <th>Total Price</th>
                      <th>Total Profit</th>

                     <!--  <th>Paid in <?php 
                      $monthNum  = $paymonth;
                      $dateObj   = DateTime::createFromFormat('m', $monthNum);
                      $monthName = $dateObj->format('F'); // March
                      echo $monthName."/".$payyear;?></th> -->
                     <!--  <th>Total Balance</th>
                      <th>Action</th> -->
                      
                      <!-- <th>Product Discount</th> -->
                      <!-- <th>Product Tax</th>
                      <th>Product Total Price</th>
                      -->

                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $totstore = 0.00;
                    $totcomm = 0.00;
                    $totprofit = 0;
                    $totprice = 0;
                if(!empty($commdata->result())){   
                  foreach($commdata->result() as $commrow){
                      if(!empty($commrow->store_id)){
                        if($commrow->order_status == 1 && $commrow->dc_status == 1 && $commrow->dc_cancel_order == 0){
                      $totprofit = $totprofit + ( $commrow->dc_prod_purchaserate - $commrow->dc_prod_actualstoreprice) + $commrow->dc_deliveryowner_charge;
                      $totprice = $totprice + $commrow->dc_prod_actualstoreprice;
                        }
                        if($commrow->order_status == 1 && $commrow->dc_status == 1 && $commrow->dc_cancel_order == 1){
                      $totprofit = $totprofit + $commrow->dc_deliveryowner_charge;

                        }
                      }  
                    }
                      // $commrow = $commdata->row();
                    
                          ?>
                          <tr>
                            <!-- <td><?php echo $commrow->store_name?></td>
                            <td><?php echo $commrow->store_address?></td>-->
                             <!-- <td><?php
                            echo $commrow->actualcommiss;  
                            ?></td>  -->
                            <td><?php
                            echo number_format($totprice,2); ?></td>
                            <td><?php
                            echo number_format($totprofit,2);  
                            ?></td>  
                            <!-- <td><?php
                            if(!empty($commrow->paid_amount)){
                              $pamnt = $commrow->paid_amount;
                              echo $pamnt;
                            }else{
                              $pamnt = 0;
                              echo "NOT PAID";
                            } 
                              
                            
                            ?></td>
                            <td><?php 
                            if(empty($commrow->paid_amount))
                              {
                                $bal = $commrow->totbalance->actualcommissall - $commrow->totbalance->paid_amount;
                                echo $bal;
                              }elseif($commrow->totbalance->actualcommissall == $commrow->paid_amount){
                                $bal = 0;
                               echo "0";
                              }else{
                                $bal = $commrow->totbalance->actualcommissall - $commrow->paid_amount;
                                echo  $bal;
                              }
                            ?></td>
                            <td><div class="media-right">
                              <button class="btn btn-success btn-xs"  onclick="paymodal('<?php echo $paymonth;?>','<?php echo $payyear;?>','<?php echo $commrow->store_id.'-'.$commrow->store_name;?>','<?php echo $bal;?>','<?php echo $pamnt?>');"   
                              >PAY</button></div>
                            </td> -->
                         </tr>
                    <?php
                     //  $totstore = $totstore + number_format($row->dc_prod_addcomm - $row->dc_prod_rate,2, '.', '');
                     // $totcomm = $totcomm + number_format($row->dc_prod_commoffer - ($row->dc_prod_addcomm - $row->dc_prod_rate) + $row->dc_prod_tax,2, '.', ''); 
                    //  }  
                    // }
                      // $commrow = $commdata->row();
                      ?>
<!--                       <tr>
                        <td><?php echo $commrow->store_name?></td>
                        <td><?php echo $commrow->store_address?></td>

                    
                          <td><?php  echo number_format( $totstore,2, '.', ''); ?></td>
                          <td><?php  echo number_format($totcomm,2, '.', ''); ?></td>
                          
                          
                    </tr> -->
                    
                  <?php }?>
                   
                  </tbody>
                </table>