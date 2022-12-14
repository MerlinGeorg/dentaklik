 <h1>Order History</h1>
  <?php if(!empty($orderdetails)){?>
      <div id="accordion" class="panel-group">




         <!-- loopstart -->
         <?php 
          $totalprice = 0;
          $tax = 0;
          
          $delivcharg = 0;
          foreach($orderdetails as $kk=>$row){
            $grandtotal = 0;
            $delivcharg = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge;
            
            ?>
        <div class="panel panel-default">
       
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-confirm<?php echo $kk;?>" aria-expanded="true">
            <div class="col-md-12">
              <div class="col-md-4">
            Order id : <?php echo $row->dc_order_id ; ?>
          </div>
          <div class="col-md-4">
           <?php $date=date_create($row->dc_date);
            $timeord=date_create($row->dc_time);
            echo 'Ordered'.' : ' .date_format($date,"D M j")."(".date_format($timeord,"g:i A").")";?>
          </div>
           <div class="col-md-3">
            <!-- Status : 
            <?php
             if($row->dc_cancel_order == 1 ){ 
              echo 'Cancelled';
            }else{
            if($row->dc_status == 0 && $row->order_status == 0){ echo 'Ordered';}
            if($row->dc_status == 0 && $row->order_status == 1){ echo 'Shipped';}
            if($row->dc_status == 1 && $row->order_status == 1){ echo 'Delivered';}
             }
            ?> -->
          </div>
          <div class="col-md-1">
            <i class="fa fa-caret-down"></i>
          </div>
        </div>
          <br></a></h4>
          </div>
          <div id="collapse-checkout-confirm<?php echo $kk;?>" role="heading" class="panel-collapse collapse in" aria-expanded="true" style="">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-center"></td>
                      
                      <td class="text-left">Name</td>
                      <td class="text-left">Date</td>
                      
                      <td class="text-left">Quantity</td>

                     
                      <td class="text-right">Total</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td class="text-left"><a href="http://localhost/opc001/index.php?route=product/product&amp;product_id=46">Sony VAIO</a></td>
                      <td class="text-left">Product 19</td>
                      <td class="text-right">1</td>
                      <td class="text-right">$1,000.00</td>
                      <td class="text-right">$1,000.00</td>
                    </tr> -->
                    
                    <!-- other one start -->
                       <tr>
                <?php

                 foreach($row->allitems as $row){
                  if($row->dc_cancel_order == 0){
                    $grandtotal = $grandtotal + $row->dc_prod_actualstoreprice ;
                  }
                  
                   $id = base64_encode($row->cart_product_id);
                   $searchString = ',';
                      $prodimg = '';
                  if( strpos($row->dc_prod_image, $searchString) !== false ) {
                      $eximage = explode(',', $row->dc_prod_image);
                      $prodimg = $eximage[0];
                  } 
                  else{
                    $prodimg = $row->dc_prod_image;
                  }
                
                    ?>
                <td class="text-center"><a style="cursor:pointer;" href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"  ><img class="img-thumbnail" title="<?php echo $row->dc_prod_name;?>" alt="<?php echo $row->dc_prod_name;?>" style="width:50px;height: 59px;" src="<?php echo base_url(); ?>imageupload/<?php echo $prodimg;?>"></a></td>
                
                <td class="text-left"><a style="cursor: pointer;" href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"  ><?php echo $row->dc_prod_name.','.$row->dc_prod_measure;?></a></td>

                <td class="text-left"><?php 
                $date=date_create($row->dc_date);
                 $timeord=date_create($row->dc_time);
                echo '<u><b>Ordered</b></u><br>'.date_format($date,"D M j")."(".date_format($timeord,"g:i A").")";
                if( $row->order_status == 1){
                  $dateship=date_create($row->dc_shipped_date);
                  $timeship=date_create($row->dc_shipped_time);
                  echo '</br>'.'<u><b>Shipped</b></u><br>'.date_format($dateship,"D M j")."(".date_format($timeship,"g:i A").")"; 
                }
                if($row->dc_status == 1 && $row->order_status == 1){
                  $date2=date_create($row->dc_delivery_date);
                  $timedeliv=date_create($row->dc_delivery_time);
                  echo '</br>'.'<u><b>Delivered</b></u><br>'.date_format($date2,"D M j")."(".date_format($timedeliv,"g:i A").")"; 
                }
                ?></td> 
                <td class="text-left"><div style="max-width: 200px;" class="input-group btn-block">
                  <!-- new one stat -->
                
                                 

                                  <input type="text" class="form-control quantity" size="1" value="<?php echo $row->dc_prod_quantity;?>" name="quantity" maxlenght="3"  disabled="disabled">
                                 


             
                </td>
                
               
              <td class="text-right"><?php 
              $totalprice = $row->dc_prod_commoffer ;
              $tax = $row->dc_prod_tax ;
              
              echo number_format($row->dc_prod_actualstoreprice , 2); ?></td>
              
              <td class="text-right">
              <?php if($row->dc_status == 0 && $row->order_status == 0 ){?>
               
                <?php if($row->dc_cancel_order == 0){?>
                   <div class="col-md-12">
                  <div class="col-md-8">
                  <button  style="pointer-events: none;" class="btn btn-danger" title="" data-toggle="tooltip" type="button"  >Ordered</i></button>
                </div>
                <!-- <div class="col-md-3">
                  <button  class="btn btn-primary" title="cancel order" data-toggle="tooltip" type="button"  onclick = "cancelorder('<?php echo $row->dc_id;?>')" ><i class="fa fa-times-circle"></i></button> 
                </div> -->
                <?php }else{?>
                    <a  class="btn btn-danger" title="" data-toggle="tooltip" type="button"  >Cancelled</i></a>
                  <?php }?>
              </div>
              <?php }?>
              <?php if($row->dc_status == 0 && $row->order_status == 1){?>
                <div class="col-md-12">
                  
                <?php if($row->dc_cancel_order == 0){?>
                <div class="col-md-8">
                  <button  style="pointer-events: none;" class="btn btn-primary" title="" data-toggle="tooltip" type="button"  >Shipped</i></button>
                </div>
                <!-- <div class="col-md-4">
                  <button  class="btn btn-primary" title="cancel order" data-toggle="tooltip" type="button"  onclick = "cancelorder('<?php echo $row->dc_id;?>')" ><i class="fa fa-times-circle"></i></button>
                  </div> -->
                  <?php }else{?>
                    <a  class="btn btn-primary" title="" data-toggle="tooltip" type="button"  >Cancelled</i></a>
                  <?php }?>
                  </div>
              <?php }?>
              <?php if($row->dc_status == 1 && $row->order_status == 1){?>
                <div><a  class="btn btn-success" title="" data-toggle="tooltip" type="button"  >Delivered</i></a></div>
              <?php }?>
                        
              </td>
           
               </tr>
             <?php }?>

                    <!-- other one end -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-right" colspan="5"><strong>Delivery Charge : </strong></td>
                      <td class="text-right"><?php echo number_format($delivcharg,2);?></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="5"><strong>Grand Total:</strong></td>
                      <td class="text-right"><?php 
                      // $maintotal = number_format($grandtotal ,2) + number_format($delivcharg,2);
                      echo number_format($grandtotal+$delivcharg,2);?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- <div class="buttons">
                <div class="pull-right">
                  <input type="button" data-loading-text="Loading..." class="btn btn-primary" id="button-confirm" value="Confirm Order">
                </div>
              </div> -->
            </div>
          </div>
       
        </div>
         <?php }?>
          <!-- loopend -->
          <?php }else{
        echo "No items to show.";
      }?>
      <div class="buttons">
        <div class="pull-left"><a class="btn btn-default" href="<?php echo base_url(); ?>">Continue Shopping</a></div>
      </div>
      </div>
