<script type="text/javascript">
  $( document ).ready(function() {
          
           $("#weekly-slider").owlCarousel({
                  items : 3,
     loop  : true,
     margin : 30,
    
     smartSpeed :900,
      navClass : ['owl-prev','owl-next'],
     navText : ["<div class='owl-controls'><div class='owl-buttons'><div class='owl-prev'>prev</div><div class='owl-next'>next</div></div></div>"]

                });
           
      });
   function imagefill(id,name){
              var data = '<a class="thumbnail"  title="'+name+'"><img src="<?php echo base_url(); ?>/imageupload/'+id+'" title="'+name+'" alt="'+name+'" /></a>';
               $('.imagereachtofill').html(data);
        
            }
</script>
<div class="container">

  <ul class="breadcrumb">
    <?php 
    $catid = base64_encode($singleprodcategoryname->cat_id); ?>
    <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" ><?php echo $singleprodcategoryname->cat_name;?></a></li>
    <?php if(!empty($singleprodcategoryname->sub_id)){
      $subid = base64_encode($singleprodcategoryname->sub_id);?>
    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" ><?php echo $singleprodcategoryname->sub_name; ?></a></li> <?php } ?>

  </ul>

  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">
        <div class="column-block categorynamesidefill">
           <div class="columnblock-title">Categories</div>
          <div class="category_block">
            <ul class="box-category treeview-list treeview">
          
          <?php 
    
foreach ($categoriesdesc as $rowdesc){
        // foreach($categorynamestest as $row){
            
$catid = base64_encode($rowdesc->cat_id);

       ;?>
            <li><a class="activSub" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" ><?php echo $rowdesc->cat_name; ?></a>
            <?php
               
             if(!empty($rowdesc->subs)){?>
                 <ul>
                <?php foreach($rowdesc->subs as $scategory){ 
                    $subid = base64_encode($scategory->sub_id);?>  
                    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $scategory->sub_name; ?></a></li>
            <?php 
                }?>
                
              </ul>
            <?php }?>
             </li>
          <?php }?>
           </ul>
          </div>
       
      </div>
    </div>
    <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="thumbnails ">

           <?php
            $searchStringf = ',';
                $prodimgf = '';
                if( strpos($row->prod_image, $searchStringf) !== false ) {
                    $eximagef = explode(',', $row->prod_image);
                        ?>
                         <div class="imagereachtofill"><a class="thumbnail"  title="lorem ippsum dolor dummy"><img src="<?php echo base_url(); ?>/imageupload/<?php echo $eximagef[0];?>" title="<?php echo $row->prod_name;?>" alt="<?php echo $eximagef[0];?>" /></a></div>
                <?php } 
                else{
                  $prodimgf = $row->prod_image;?>
                         <div class="imagereachtofill"><a class="thumbnail"  title="lorem ippsum dolor dummy"><img src="<?php echo base_url(); ?>/imageupload/<?php echo $row->prod_image;?>" title="<?php echo $row->prod_name;?>" alt="<?php echo $prodimgf;?>" /></a></div>
                <?php } 
           ?>

           
            <!-- <div class="col-xs-12"> -->
               
            <div id="weekly-slider" class="row owl-carousel product-sliderdesc">
             <?php
                $searchString = ',';
                $prodimg = '';
                if( strpos($row->prod_image, $searchString) !== false ) {
                  
                        $eximage = explode(',', $row->prod_image);
                        for($k = 0; $k<count($eximage); $k++){?>
                        <div class="item">
                          <div class="image-additional"><a style="cursor: pointer;" class="thumbnail" onclick="imagefill('<?php echo $eximage[$k];?>','<?php echo $row->prod_name;?>')" title="lorem ippsum dolor dummy"> <img src="<?php echo base_url(); ?>/imageupload/<?php echo $eximage[$k];?>" title="<?php echo $row->prod_name;?>" alt="<?php echo $row->prod_name;?>" /></a></div>
                        </div>
                <?php } }
                else{
                  $prodimg = $row->prod_image;?>
                     <div class="item">
                          <div class="image-additional"><a style="cursor: pointer;" class="thumbnail" onclick="imagefill('<?php echo $prodimg;?>','<?php echo $row->prod_name;?>')" title="lorem ippsum dolor dummy"> <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" title="<?php echo $row->prod_name;?>" alt="<?php echo $row->prod_name;?>" /></a></div>
                        </div>
                <?php } 
             ?>
              
              
           
<!--               <div class="item">
                <div class="image-additional"><a class="thumbnail  " href="image/product/product5.jpg" title="lorem ippsum dolor dummy"> <img src="image/product/pro-5-220x294.jpg" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" /></a></div>
              </div>
              <div class="item">
                <div class="image-additional"><a class="thumbnail  " href="image/product/product6.jpg" title="lorem ippsum dolor dummy"> <img src="image/product/pro-6-220x294.jpg" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" /></a></div>
              </div>
              <div class="item">
                <div class="image-additional"><a class="thumbnail  " href="image/product/product7.jpg" title="lorem ippsum dolor dummy"> <img src="image/product/pro-7-220x294.jpg" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" /></a></div>
              </div> -->

            </div>
               <!-- </div> -->
             
          </div>
        </div>
        <div class="col-sm-6">
          <h1 class="productpage-title"><?php echo $row->prod_name;?></h1>
    <!--       <div class="rating product"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="review-count"> <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a></span>
            <hr>
          
            <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" ></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
           
          </div> -->
          <ul class="list-unstyled productinfo-details-top">
            <li>
              
              <?php if($row->prod_disc > 0){?>
              <h2 class="price product-price">Rs.<?php echo number_format($row->prod_sell_price+$row->prod_tax,2); ?>,<?php echo $row->prod_uom;?></h2>
              <span class="price-old"><strike>Rs.<?php echo number_format($row->prod_rate+$row->prod_tax,2); ?> </strike></span>
              <span>You Save <?php echo $row->prod_disc;?>%</span>
            </p>
              <?php }else{?>
                  <h2 class="productpage-price">Rs.<?php echo $row->prod_disc_price; ?></h2>
              <?php }?>
              
            </li>
            <!-- <li><span class="productinfo-tax">Ex Tax: 100.00</span></li> -->
          </ul>
          <hr>
          <ul class="list-unstyled product_info">
            <!-- <li>
              <label>Brand:</label>
              <span> <a href="#">Apple</a></span></li> -->

              <li>
                
              <label><b>Quantity:</b></label>
              <span> <?php echo $row->prod_uom; ?></span></li>
              <li>
              <label><b>Store : </b></label>
              <span> <?php echo $row->store_name; ?></span></li> 
              <label><b>Details : </b></label>
              <span> <?php echo $row->prod_descr; ?></span></li>
            <!-- <li>
              <label><b>Product Code:</b></label>
              <span> <?php echo $row->prod_code; ?></span></li> -->
           
              <!-- <label><b>Availability:</b></label> -->
              <!-- <span> <?php echo $row->prod_deactive; ?></span></li> -->
          </ul>
          <hr>

          
          <div id="product">
            <div class="form-group">
              <!-- <label class="control-label qty-label" for="input-quantity">Qty</label> -->
              <input type="hidden" name="quantity" value="1" size="2" id="input-quantity" class="form-control productpage-qty" />
              <!-- <input type="hidden" name="product_id" value="48" /> -->
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" class="btn btn-primary wishlist" title="Add to Wish List" onclick="addtowishlist('<?php echo $row->prod_id?>');" ><i class="fa fa-heart-o"></i></button>
                
                <?php if($row->prod_deactive == 0){?>
                                   <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');">Add to Cart</button>
                          <?php }else{?>
                            <div class="outofstockdesc">Out of stock</div>
                          <?php }?>
                <!-- <button type="button" data-toggle="tooltip" class="btn btn-default compare" title="Compare this Product" ><i class="fa fa-exchange"></i></button> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
