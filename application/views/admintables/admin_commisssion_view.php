        <table class="table table-hover table-bordered  " id="tablefillcomm">
           <thead>
                    <tr>
                      <th>Store Name</th>
                      <th>Store Address</th>
                      <th>Commission</th>
                      <th>Store Price</th>
                      <th>Paid in <?php 
                      $monthNum  = $paymonth;
                      $dateObj   = DateTime::createFromFormat('m', $monthNum);
                      $monthName = $dateObj->format('F'); // March
                      echo $monthName."/".$payyear;?></th>
                      <th>Total Balance</th>
                      
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
                    if($commdata ->num_rows() > 0){
                      
                    foreach($commdata->result() as $row){
                      // $totcomm = $totcomm + $row->dc_prod_addcomm - $row->dc_prod_rate;
                      // $totstore = $totstore + $row->dc_prod_commoffer - ($row->dc_prod_addcomm - $row->dc_prod_rate) + $row->dc_prod_tax;
                      
                        
                    }
                      $commrow = $commdata->row();
                      ?>
                      <tr>
                        <td><?php echo $commrow->store_name?></td>
                        <td><?php echo $commrow->store_address?></td>

                    
                          <!-- <td><?php  echo number_format( $totstore,2, '.', ''); ?></td> -->
                          <td><?php
                            echo $commrow->actualcommiss;  
                            ?></td>
                            <td><?php
                            echo $commrow->actualstoreprice; ?></td> 
                          <td><?php
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
                          <!-- <td><?php  echo number_format($totcomm,2, '.', ''); ?></td> -->

                          
                          
                    </tr>
                    
                  <?php }?>
                   
                  </tbody>
                </table>