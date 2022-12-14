    
<?php if(!empty($cartitems)){?>
    <div class="container-check tog-check">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
      
      <?php 
                    $totalcheckoutprice = 0;
                    $taxchk = 0;
                    foreach($cartitems as $row){?>
                    <p><a style="cursor: pointer; font-size: 14px;" onclick="prodesc('<?php echo $row->prod_id?>')"><?php echo $row->prod_name;?></a> <span class="price" style="margin-left: 10px;font-size: 14px;">KWD <?php echo number_format(($row->prod_sell_price * $row->cart_quantity) + ( $row->prod_tax * $row->cart_quantity),2,'.', '');?></span></p>
                   
                    <?php
                    $totalcheckoutprice = $totalcheckoutprice + ( $row->prod_sell_price * $row->cart_quantity) + ($row->prod_tax * $row->cart_quantity); 
                  }?>
                  <input type="hidden" name="total" id="total" value="<?php
                      echo $totalcheckoutprice;?>">
       
      <hr>
      <p>Total <span class="price" style="color:black"><b>KWD <?php echo number_format($totalcheckoutprice,2,'.', '');?></b></span></p>
    </div>

    <?php } ?>