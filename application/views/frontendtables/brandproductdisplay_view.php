<!-- <div id="content" class="col-sm-9"> -->
  <?php 
  if($gettype == 'list'){
    $typeview = 'product-layout product-list col-xs-12';
  }else{


  // if($gettype == 'grid'){
    $typeview = 'product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12';
  }
  // } 
  ?>

<?php foreach($getbrdproduct as $row){
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
  

    
      <div class="grid-list-wrapper">
        <div class = "<?php echo $typeview;?>">
          <div class="product-thumb">
            <div class="image product-imageblock"> <a style="cursor: pointer;"href="<?php echo base_url();?>index.php/home/getproductsdetails?product=<?php echo $id;?>" > <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" alt="<?php echo $row->prod_name;?>" title="<?php echo $row->prod_name;?>" class="img-responsive" style="width: 220px;height:294px;"/> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" onclick="addtowishlist('<?php echo $row->prod_id?>');" ><i class="fa fa-heart-o"></i></button>
                
                <?php if($row->prod_deactive == 0){?>
                                   <button type="button" class="addtocart-btn" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_disc?>');">Add to Cart</button>
                          <?php }else{?>
                            <div class="outofstock">Out of stock</div>
                          <?php }?>
                <!-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button> -->
              </div>
            </div>
            <div class="caption product-detail">
              <a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');" >
              <h4 class="product-name"> <a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');" title="<?php echo $row->prod_name;?>"> <?php echo $row->prod_name;?></a> </h4>
              <p class="product-desc"> <?php echo $row->prod_descr;?>.</p>
              <p class="price product-price">Rs.<?php echo $row->prod_disc_price;?><?php if($row->prod_disc != 0){ ?><span class="price-old"><?php echo $row->prod_addedcomm; ?></span><?php }?>
              <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div> -->
            </a>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
              
              <?php if($row->prod_deactive == 0){?>
                                   <button type="button" class="addtocart-btn" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_disc?>');">Add to Cart</button>
                          <?php }else{?>
                            <div class="outofstock">Out of stock</div>
                          <?php }?>
              <!-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button> -->
            </div>
          </div>
        </div>
      </div>
  <?php }?>
      <!-- <div class="category-page-wrapper">
        <div class="result-inner">Showing 1 to 8 of 10 (2 Pages)</div>
        <div class="pagination-inner">
          <ul class="pagination">
            <li class="active"><span>1</span></li>
            <li><a href="category.html">2</a></li>
            <li><a href="category.html">&gt;</a></li>
            <li><a href="category.html">&gt;|</a></li>
          </ul>
        </div>
      </div> -->
    <!-- </div>
  </div>
</div>