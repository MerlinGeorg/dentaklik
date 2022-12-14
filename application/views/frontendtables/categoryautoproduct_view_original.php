
         
<?php 
$categoryname = '';

foreach($categories as $catkey=>$catrow) {
  $pp = 1;
  ?>
  <!-- <div class="col-sm-12"> -->

    <a href="<?php echo base_url();?>index.php/category?category=<?php echo base64_encode($catrow->cat_id);?>&place1=<?php echo $places1?>&place2=<?php echo $places2?>" style="cursor:pointer;"><h3 class="productblock-title"><?php echo $catrow->cat_name;?></a></h3>
  <!-- </div> -->
  <!-- <div class="col-sm-12"> -->
   
  <!-- </div> -->


          <div class="box">

           <div id="Weekly-slider<?php echo$catkey;?>" class="row owl-carousel product-slider autoslide">
           
              <?php 
              $categoryname = $catrow->cat_name; 
             ?>


              <?php if(!empty($categoryproductsauto->result())){ 
                
              	foreach($categoryproductsauto->result() as $prodkey=>$row){
                 
              		if($row->prod_cat_id == $catrow->cat_id){
                    $id = base64_encode($row->prod_id);
                    $searchString = ',';
                    $prodimg = '';
                    if( strpos($row->prod_image, $searchString) !== false ) {
                        $eximage = explode(',', $row->prod_image);
                            $prodimg = $eximage[0];
                    } 
                    else{
                      $prodimg = $row->prod_image;
                    }?>
                  <div class="item product-slider-item">
                    <div class="product-thumb transition" >
                      <div class="image product-imageblock"> <a style="cursor: pointer;" href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" > <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" alt="<?php echo $row->prod_name;?>" title="<?php echo $row->prod_name;?>" class="img-responsive homeimage" /> </a>
                        <div class="button-group">
                          <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" onclick="addtowishlist('<?php echo $row->prod_id?>');" ><i class="fa fa-heart-o"></i></button>
                          
                          <!-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button> -->
                           <?php if($row->prod_deactive == 0){?>
                                   <button type="button" class="addtocart-btn" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');" >Add To Cart</button>
                          <?php }else{?>
                            <div class="outofstock">Out of stock</div>
                          <?php }?>
                        </div>
                      </div>
                      <div class="caption product-detail">
                        <h4 class="product-name"><a title="<?php echo $row->prod_name; ?>"><?php echo $row->prod_name;?></a></h4>
                        <p class="price product-price"><?php

                         echo "Rs.".number_format($row->prod_sell_price+$row->prod_tax,2);
                        ?><?php if($row->prod_disc != 0){ ?><span class="price-old"><?php echo number_format($row->prod_rate+$row->prod_tax,2); ?></span><?php }?> </p>
                       <!-- <span class="price-tax">Ex Tax: $210.00</span> -->
                        </p>
                      </div>
                      <div class="button-group">
                        <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                        <button type="button" class="addtocart-btn" >Add To Cart</button>
                        <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
              <?php }} }else {?>
                  <div class="col-md-12">PRODUCTS NOT AVAILABLE IN YOUR LOCATION</div>
              <?php }?>
            </div>
             </div>
         <?php  }?>

       