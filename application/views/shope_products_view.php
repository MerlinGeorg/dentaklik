
    
  


    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/Home">Home</a></li>
                   <li><?php echo $getthissub->cat_name ?></li>
                <li><?php echo $getthissub->sub_name ?></li>
            </ul>
        </div>
    </div>
    
    
        
     <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">

<!-- cats and sub cats -->

<aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
<?php 

// $rowcount = num_rows($tabproducts);
//  echo $rowcount; 
   foreach($getcatsandsub as $row){
            $catid = base64_encode($row->cat_id);
            // $categoryname = $row->cat_name;

 ?>        

<li class="current-menu-item menu-item-has-children"><span class="sub-toggle"><?php echo $row->cat_name; ?><i class="fa fa-angle-down"></i></span>
                


                <ul class="sub-menu">
   <?php foreach($row->subs as $scategory){ 
$subid = base64_encode($scategory->sub_id); ?>

 <li class="current-menu-item "><a href="<?php echo base_url(); ?>index.php/Shope_products?scid=<?php echo $subid ?>"><?php echo $scategory->sub_name; ?></a></li>

<?php } ?>
  
                                </ul>
                            </li>
 <?php } ?>                           
                        </ul>

                       
                    </aside>
<!-- cats and sub cats -->


                    <aside class="widget widget_shop">

    <!-- brand sorting  -->                   
                        <h4 class="widget-title">SHOP BY BRANDS</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                        <figure class="ps-custom-scrollbar" data-height="200">

                    <?php
                      $i=0;
                    
                     foreach($brands as $row) { 
                         if($i<15)
                     { 
                        ?>        
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" value="" id="brand<?php echo $i ?>" name="brand">
                                <label for="brand-1"><?php echo $row->brand_name ?></label>
                            </div>
                        <?php $i++;
                        } 
                     }?>    
                           
                        </figure>
     <!-- brand sorting  -->
     <!-- price sorting -->                   
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-slider" data-default-min="13" data-default-max="1300" data-max="1311" data-step="100" data-unit="$"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p>
                        </figure>
       <!-- price sorting -->                 
                        
                    </aside>


                </div>
                <div class="ps-layout__right">
                    
                    
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><?php echo $getthissub->sub_name ?></p>
                            <div class="ps-shopping__actions">
                                <select class="ps-select" data-placeholder="Sort Items">
                                    <option>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                
                            </div>
                        </div>


                        <div class="ps-tabs">
                        <div class="desk-hidden">
<div class="product-view-mode featured-view mt-b">
<a class="active" href="#" data-target="column_4"><span>3-col</span></a>
<a href="#" data-target="grid"><span>4-col</span></a>
</div>
</div>    
                            
    <div class="ps-tab active" id="tab-1">
    <div class="ps-shopping-product row column_4">
 
 <?php 

  if(!empty($getsubprod)) { 

    foreach ($getsubprod as $row) {

    $id = base64_encode($row->prod_id); 
        
            

  ?>                                 
                                        
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
    <div class="ps-product">
    <div class="ps-product__thumbnail"><a href="product-detail.html">
        <?php

$image = $row->prod_image;

// echo $row->prod_rating; 
 
if( strpos( $image,',') !== false ) 
  {
   
     $exp_imagename = explode(',', $image);

     $imagename = $exp_imagename[0];

?>   
        <img src="<?php echo base_url(); ?>imageupload/<?php echo $imagename ?>" alt="">
<?php }
else
    { ?>

        <img src="<?php echo base_url(); ?>imageupload/<?php echo $row->prod_image ?>" alt="">
<?php } ?>        


    </a>
    <ul class="ps-product__actions">

    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>

    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target=".pr<?php echo $row->prod_id ?>"><i class="icon-eye"></i></a></li>
                                                        
    </ul>
    </div>

    <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html"><?php echo $row->prod_name; ?></a>
    <div class="ps-product__content">
    <div class="ps-product__rating">
    <select class="ps-rating" data-read-only="true">
    <?php $rating = $row->prod_rating;


                         for($i=0;$i<5;$i++)
                         {
                              if($i<$rating)
                              {
                                        ?>         
                                            <option value="1"><?php echo $i ?></option>
                             <?php } else
                             { ?>  

                                   <option value="2"><?php echo $i ?></option>

                           <?php  }
                            } ?>      
    </select><span>01</span>
    </div>
    <p class="product-card__boby__artnr"><?php echo $row->prod_code; ?><span>|</span><?php echo $row->prod_uom; ?></p>
    <p class="ps-product__price">€ <?php echo $row->prod_sell_price ?></p>
    </div>
                                                    
                                                    <!--<div class="ps-product__content hover">
                                                        <p class="product-card__boby__artnr">P-04536  <span>|</span> 1 piece</p>
                                                        <p class="ps-product__price">KD 0.00</p>
                                                    </div>-->
                                                    
    </div>
    </div>
    </div>


    
    <!-- quick view model -->

    <div class="modal fade pr<?php echo $row->prod_id ?>" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>

                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images" data-arrow="true">


                                <div class="item">
<?php              if( strpos( $image,',') !== false ) 
  {
   
     $exp_imagename = explode(',', $image);

     $imagename = $exp_imagename[0];

?>   
        <img src="<?php echo base_url(); ?>imageupload/<?php echo $imagename ?>" alt="">
<?php }
else
    { ?>

        <img src="<?php echo base_url(); ?>imageupload/<?php echo $row->prod_image ?>" alt="">
<?php } ?>

                                </div>


                                
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <div class="qd-price-info">
               <h1 class="qd-title"><?php echo $row->prod_name ?></h1> 
                <h1 class="pdp-name"><?php echo $row->prod_short_desc ?></h1>
                   
                   
                 <div class="pdp-discount-container">
                     <span class="pdp-price"><strong>€ <?php echo $row->prod_sell_price ?></strong></span>

 <?php if($row->prod_disc!='0') { ?>

                     <span class="pdp-mrp"><del>€ <?php echo $row->prod_rate ?></del></span>
                     <span class="pdp-discount">(<?php echo $row->prod_disc ?>% OFF)</span>
                     
                     <?php } ?> 


                </div> 
                   
                <div class="pdp-selling-price">
                   
                <?php if($row->prod_deactive=='0') { ?>

                <p>Availability :<span class="pdp-vatInfo">In Stock</span></p>

            <?php } else
            { ?>
                <p>Availability :<span style="color: red">Not in Stock</span></p>
            <?php } ?>  


                   </div>   
                   
                </div>
                            <div class="ps-product__shopping">
<figure>
<div class="number-input md-number-input">
<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
<input class="quantity" min="0" name="quantity" value="1" type="number">
<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
</div>
</figure><a class="ps-btn ps-btn--black" href="#"><i class="fa fa-cart-plus"></i> Add to cart</a><a class="ps-btn" href="#"> <i class="icon-heart"></i>
WISHLIST</a>

</div>
                             <div class="pdp-productDescriptorsContainer">
                <h4 class="pdp-product-description-title">Delivery </h4>
                
                

                
                <div class="pdp-product-description-content">
                
                <p>Usually delivered in 2-4 days</p>
                </div>
            
                    </div>
                
                
                
                <div class="pdp-productDescriptorsContainer">
                <h4 class="pdp-product-description-title">Product Details </h4>
                
                
                
                <div class="pdp-product-description-content">
                
                <p><?php echo $row->prod_descr ?></p>
                </div>
            
                    </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

<!-- quick view model -->


                                        
   <?php }

   } 
   else
   { ?>                                     
    
    <h1>No products Available</h1>                                    
    <?php } ?>                     <!--                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-02.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Bego Gelovit 200 Duplicating Unit</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">M-10732  <span>|</span> 1 piece</p>
                                                        <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        
                                        
                                  <!--       <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-03.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">FINO QUICK PLUS Pin Base Plate, Small</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">M-10732  <span>|</span> 1 piece</p>
                                                         <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        
                                <!--         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-04.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Kettenbach Futar D Fast Bite Registration Material</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">P-24205  <span>|</span> 2 x 50 ml</p>
                                                        <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        
                                        
                          <!--               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-05.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Hager & Werken Algilock Cleaner Plus Alginate Remover</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">X-24375  <span>|</span> 1000 g</p>
                                                         <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                       
                                        
                                        
                                    <!--     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-06.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Biodenta PreFAB-4 Blank w. Screw, Straumann Bone Level</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr"> P-04536  <span>|</span> 1 piece</p>
                                                         <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        
                                        
                             <!--            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-07.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Ivoclar Vivadent IPS e.max CAD LT CAD/CAM Blocks, B 32</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">  M-0384  <span>|</span> 3 pieces</p>
                                                        <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        
                       <!--                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-08.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Erkodent Oxydens Clean Set Cleaning Set</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">  M-23911  <span>|</span> 1 set</p>
                                                        <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>  
                                            </div>
                                        </div> -->
                                        
                                        
                 <!--                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="product-detail.html"><img src="img/products/product/pr-09.jpg" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container prodct-page"><a class="ps-product__vendor" href="product-detail.html">Dentsply Sirona Triad Gel Orthodontic Resin, Clear</a>
                                                    <div class="ps-product__content">
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="product-card__boby__artnr">  H-14941  <span>|</span> 100 pairs</p>
                                                         <p class="ps-product__price">KD 0.00</p>
                                                    </div>  
                                                    
                                                    
                                                    
                                                </div>    
                                            </div>
                                        </div>  -->  
                                        
                                        
                                      
                                   
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                                <p class="ps-product__vendor">Sold by:<a href="#">ROBERT’S STORE</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$1310.00</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Young Shop</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$1150.00</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/2.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$42.99 - $60.00</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/3.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$125.30</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/4.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Global Office</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$55.99</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/5.jpg" alt=""></a>
                                            <div class="ps-product__badge">-37%</div>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/6.jpg" alt=""></a>
                                            <div class="ps-product__badge">-5%</div>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/7.jpg" alt=""></a>
                                            <div class="ps-product__badge">-16%</div>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Korea Long Sofa Fabric In Blue Navy Color</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price sale">$567.89 <del>$670.20 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/8.jpg" alt=""></a>
                                            <div class="ps-product__badge">-16%</div>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Unero Military Classical Backpack</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>02</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price sale">$35.89 <del>$42.20 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/9.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Rayban Rounded Sunglass Brown Color</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>02</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$35.89</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/10.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$29.39 - $39.99</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/11.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$13.43</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
  









        
  