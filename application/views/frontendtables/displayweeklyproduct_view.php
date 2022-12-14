<div id="Weekly-slider" class="row owl-carousel product-slider">
              <?php if(!empty($displayweeklyproduct)){
              foreach($displayweeklyproduct as $row){
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

              
                  <div class="item product-slider-item">
                    <div class="product-thumb transition" >
                      <div class="image product-imageblock"> <a style="cursor: pointer;" href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" ><img  src="<?php echo base_url(); ?>/imageupload/<?php  echo $prodimg;?>" alt="<?php echo $row->prod_name;?>" title="<?php echo $row->prod_name;?>"  class="homeimage"/> </a>
                        <div class="button-group">
                          <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o" onclick="addtowishlist('<?php echo $row->prod_id?>');"></i></button>
                          <?php if($row->prod_deactive == 0){?>
                                  <button type="button" class="addtocart-btn" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');">Add To Cart</button>
                          <?php }else{?>
                            <div class="outofstock">Out of stock</div>
                          <?php }?>
                          
                          <!-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button> -->
                        </div>
                      </div>
                      <div class="caption product-detail">
                        <h4 class="product-name"><a title="<?php echo $row->prod_name; ?>"><?php echo $row->prod_name;?></a></h4>
                        <p class="price product-price"> <span class="price-new">KWD <?php 
                         echo $row->prod_disc_price;
                        ?></span> <?php if($row->prod_disc != 0){ ?><span class="price-old"><?php echo $row->prod_addedcomm; ?></span><?php }?> 
                       <!-- <span class="price-tax">Ex Tax: $210.00</span> -->
                        </p>
                      </div>
                      <div class="button-group">
                        <!-- <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button> -->
                        <button type="button" class="addtocart-btn" >Add To Cart</button>
                        <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                  </div>
              <?php }}else{?>
                  <div class="col-md-12">PRODUCTS NOT AVAILABLE IN YOUR LOCATION</div>
              <?php }?>
            </div>