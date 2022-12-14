<?php 
 $places1 = base64_encode("10.530345");
 $places2 = base64_encode("76.214729");
  if($gettype == 'list'){
    $typeview = 'product-layout product-list col-xs-12';
  }else{
    $typeview = 'product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12';
  }
  ?>
  <?php foreach($getfoods as $row){
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

<div class="col-md-3">
    <figure class="card card-product-grid" style="display: block;">
      <i class="far fa-heart" style="float: right; margin-top: 10px; margin-right: 10px; cursor: pointer;" onclick="addtowishlist('<?php echo $row->prod_id?>');"></i>
       <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>">
      <div class="img-wrap"> 
        <!-- <span class="badge badge-danger"> NEW </span> -->
        <img src="<?php echo base_url(); ?>imageupload/<?php echo $prodimg;?>" alt="<?php echo $row->prod_name;?>">
      </div> <!-- img-wrap.// -->
      <figcaption class="info-wrap">
          <a href="#" onclick="prodesc('<?php echo $row->prod_id;?>');" class="title mb-2" style="min-height: 45px;"><?php echo $row->prod_name;?></a>
          <div class="price-wrap">
            <span class="price"><?php echo "KWD ".number_format($row->prod_sell_price+$row->prod_tax,2); ?></span> 
            <?php if($row->prod_disc != 0){ ?>
              <small class="text-muted">&nbsp;&nbsp;<?php echo number_format($row->prod_rate+$row->prod_tax,2); ?></small>
              <?php }?>
          </div> <!-- price-wrap.// -->
          
<?php 
$rating = $row->prod_rating;
$rating_percent = ($rating/5)*100;
?>

<div class="rating-wrap my-3"  style="margin: 0px!important;">
  <ul class="rating-stars">
    <li style="width: <?php echo $rating_percent; ?>%" class="stars-active"> 
      <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
    </li>
    <li>
      <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
    </li>
  </ul>
</div> 
          
          <p class="mb-2"><?php echo $row->prod_uom; ?></p>
          
          <p class="text-muted "><?php if(!empty($row->brand_name)) 
          {
             echo $row->brand_name;
          }
          else
          {
            echo "N/A";
          }
          ?></p>
           
          <hr>
          
         <?php if($row->prod_deactive == 0){?>
          <div style="text-align: center;">
         <!--  <a href="#" class="btn btn-outline-primary"> <i class="fa fa-envelope"></i> Buy now </a>   -->
          <a href="#" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');"  class="btn  btn-primary"> <!-- style="float: inline-end;" -->
          <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
         </a>
       </div>
        <?php }else{?>
        <p align="center" class="btn" style="color: red; display: block;">Out of stock<p>
         <?php }?>
         <!--  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" onclick="addtowishlist('<?php echo $row->prod_id?>');" ><i class="fa fa-heart-o"></i></button> -->
      </figcaption>
      </a>
    </figure>
  </div> <!-- col.// -->