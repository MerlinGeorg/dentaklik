      <h1 style="padding-bottom: 20px;">Wish List</h1>
      <form enctype="multipart/form-data" method="post" action="">
        <div class="table-responsive">
        	<?php if(!empty($wishlistitems)){?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">Product Code</td>
                <td class="text-right">Price</td>
                <td class="text-right"></td>
                 <td class="text-right"></td>
              </tr>
            </thead>
            <tbody>
            	<?php 
            	$totalprice = 0;
            	foreach($wishlistitems as $row){
                 $id = base64_encode($row->prod_id);
                  $searchString = ',';
                    $prodimg = '';
                    if( strpos($row->prod_image, $searchString) !== false ) {
                        $eximage = explode(',', $row->prod_image);
                            $prodimg = $eximage[0];
                    } 
                    else{
                      $prodimg = $row->prod_image;
                    }
                    ?>
              <tr>
                <td class="text-center"><a style="cursor:pointer;"  href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2?>" ><img class="img-thumbnail" title="<?php echo $row->prod_name;?>" alt="<?php echo $row->prod_name;?>" style="width:50px;height: 59px;" src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>"></a></td>
                <td class="text-left"><a style="cursor: pointer;"href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2?>"   ><?php echo $row->prod_name;?></a></td>
                
                <td class="text-left"><?php echo $row->prod_code;?></td>
                <td class="text-right">KWD <?php echo number_format($row->prod_sell_price+$row->prod_tax,2);?></td>
             <td  class="text-right" style="text-align: center !important;"> 
             
              <?php if($row->prod_deactive == 0){?>
                                    <button type="button" class="btn btn-primary" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');">Add To Cart</button>
                          <?php }else{?>
                            <div class="outofstockwish" style="text-align: center !important; color: red;">Out of stock</div>
                          <?php }?>
            </td>
              <td class="text-right" style="text-align: center !important;"> <button  class="btn btn-primary" title="" data-toggle="tooltip" type="button"  onclick = "deletewishlist('<?php echo $row->wishlists_id;?>')"><i class="fa fa-times-circle"></i></button></div></td>
               </tr>
          <?php }?>
            </tbody> 
          </table>
      <?php }else{
      	echo "Your wish list is empty.";
      }?>
        </div>
      </form>
  <!--     <h2>What would you like to do next?</h2>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
      <div id="accordion" class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#collapse-coupon">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div class="panel-collapse collapse" id="collapse-coupon">
            <div class="panel-body">
              <label for="input-coupon" class="col-sm-3 control-label">Enter your coupon here</label>
              <div class="input-group">
                <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                <span class="input-group-btn">
                <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                </span></div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-voucher">Use Gift Voucher <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div class="panel-collapse collapse" id="collapse-voucher">
            <div class="panel-body">
              <label for="input-voucher" class="col-sm-3 control-label">Enter your gift voucher code here</label>
              <div class="input-group">
                <input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">
                <span class="input-group-btn">
                <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
                </span> </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#collapse-shipping">Estimate Shipping &amp; Taxes <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div class="panel-collapse collapse" id="collapse-shipping">
            <div class="panel-body">
              <p>Enter your destination to get a shipping estimate.</p>
              <form class="form-horizontal">
                <div class="form-group required">
                  <label for="input-country" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-country" name="country_id">
                      <option value=""> --- Please Select --- </option>
                      <option value="244">Aaland Islands</option>
                     
                    </select>
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-zone" class="col-sm-2 control-label">Region / State</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-zone" name="zone_id">
                      <option value=""> --- Please Select --- </option>
                      <option value="3513">Aberdeen</option>
                     
                    </select>
                  </div>
                </div>
                <div class="form-group required">
                  <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="" name="postcode">
                  </div>
                </div>
                <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-quote" value="Get Quotes">
              </form>
            </div>
          </div>
        </div>
      </div>
      <br> -->
      <?php if(!empty($shopitems)){?>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="text-right"><strong>Sub-Total:</strong></td>
                <td class="text-right"><?php echo $totalprice;?></td>
              </tr>
              <tr>
                <td class="text-right"><strong>Eco Tax (2.00):</strong></td>
                <td class="text-right">2.00</td>
              </tr>
              <tr>
                <td class="text-right"><strong>VAT (20%):</strong></td>
                <td class="text-right">42.00</td>
              </tr>
              <tr>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="text-right"><?php echo $totalprice + 2 + 42;?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  <?php }?>
      <div class="buttons">
        <div class="pull-left"><a class="btn btn-primary" href="<?php echo base_url(); ?>">Continue Shopping</a></div>
        <?php if(!empty($shopitems)){?>
        <div class="pull-right"><a class="btn btn-primary"  href="<?php echo base_url(); ?>index.php/checkout">Checkout</a></div>
    <?php }?>
      </div>
