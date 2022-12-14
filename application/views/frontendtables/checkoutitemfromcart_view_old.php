   
            <div class="panel-body">
              <?php if(!empty($cartitems)){?>
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Product Name</td>
                      <td class="text-left">Model</td>
                      <td class="text-right">Quantity</td>
                      <td class="text-right">Unit Price(tax included)</td>
                      <td class="text-right">Total</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $totalcheckoutprice = 0;
                    $taxchk = 0;
                    
                      foreach($cartitems as $row){?>
                      <tr>
                        <td class="text-left"><a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id?>')"><?php echo $row->prod_name;?></a></td>
                        <td class="text-left"><?php echo $row->prod_code;?></td>
                        <td class="text-right"><?php echo $row->cart_quantity;?></td>
                        <td class="text-right"><?php echo number_format($row->prod_sell_price+$row->prod_tax,2);?></td>
                        <!-- <td class="text-right"><?php echo $row->prod_tax;?></td> -->
                        <td class="text-right"><?php 
                        $totalcheckoutprice = $totalcheckoutprice + ( $row->prod_sell_price * $row->cart_quantity) + ($row->prod_tax * $row->cart_quantity);
                         $taxchk = $taxchk + ( $row->prod_tax * $row->cart_quantity);
                        echo number_format(($row->prod_sell_price * $row->cart_quantity) + ( $row->prod_tax * $row->cart_quantity),2,'.', '') ;?></td>
                      </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-right" colspan="4">Delivery Charge :</td>
                      <td class="text-right"><?php
                      $kmcharge = round($kmcharge,0,PHP_ROUND_HALF_UP); 
                         if($kmcharge <= 2){
                          $totalkmcharge = 20;
                        }elseif($kmcharge <= 3){
                          $totalkmcharge = 40;
                        }elseif($kmcharge <= 5){
                           $totalkmcharge = 60;
                        }elseif($kmcharge <= 8){
                          $totalkmcharge = 80;
                        }else{
                          $totalkmcharge = 100;
                        }
                      echo number_format( $totalkmcharge,2,'.', '');?></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="4"><strong>Grand-Total:</strong></td>
                      <td class="text-right"><?php
                      echo number_format( $totalcheckoutprice + $totalkmcharge,2,'.', '');?></td>
                      <input type="hidden" name="total" id="total" value="<?php
                      echo number_format( $totalcheckoutprice + $totalkmcharge,2,'.', '');?>">
                    </tr>
                
                  </tfoot>
                </table>
              </div>
              <div class="buttons">
                <div class="pull-right">
                  <button  data-loading-text="Loading..." class="btn btn-primary" id="button-confirm" onclick="orderconfirm();">Confirm Order </button>
                </div>
              </div>
            <?php }?>
            </div>
  