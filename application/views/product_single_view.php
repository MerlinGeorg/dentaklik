 

 <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>index.php/Home">Home</a></li>
                   <li><?php echo $proddetails->cat_name ?></li>
                <li><?php echo $proddetails->sub_name ?></li>
            </ul>
        </div>
    </div>
    
    
        
      <div class="ps-page--product">
        <div class="ps-container">
         <div class="ps-product--detail ps-product--fullwidth">    
            <div class="row">
            
            <div class="col-md-6">

    <div class="ps-product__thumbnail product-thumb" data-vertical="true">
    <figure>
     <div class="ps-wrapper">

     <div class="ps-product__gallery" data-arrow="true">

    <?php $images = $proddetails->prod_image; 

     if( strpos( $images,',') !== false ) 
     {
       $exp_images = explode(',', $images);

       for($i=0;$i<count($exp_images);$i++)
       {


    ?> 
     <div class="item"><a href="<?php echo base_url();?>imageupload/<?php echo $exp_images[$i] ?>"><img src="<?php echo base_url();?>imageupload/<?php echo $exp_images[$i] ?>" alt=""></a></div>
     
     <?php } 

    }
    else
    { ?>
     
     <div class="item"><a href="<?php echo base_url();?>imageupload/<?php echo $proddetails->prod_image ?>"><img src="<?php echo base_url();?>imageupload/<?php echo $proddetails->prod_image ?>" alt=""></a></div>

    <?php } ?> 
     <!-- <div class="item"><a href="img/products/recomnd/02.jpg"><img src="img/products/recomnd/02.jpg" alt=""></a></div>
     <div class="item"><a href="img/products/recomnd/03.jpg"><img src="img/products/recomnd/03.jpg" alt=""></a></div> -->


     </div>
     </div>
    </figure>
                                
    <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">

   <?php  if( strpos( $images,',') !== false ) 
     {
       $exp_images = explode(',', $images);

       for($i=0;$i<count($exp_images);$i++)
       {


    ?> 	

    <div class="item"><img src="<?php echo base_url();?>imageupload/<?php echo $exp_images[$i] ?>" alt=""></div>

    <?php } 

    }
    else
    { ?>
    <div class="item"><img src="<?php echo base_url();?>imageupload/<?php echo $proddetails->prod_image ?>" alt=""></div>
<?php } ?>
   <!--  <div class="item"><img src="img/products/recomnd/03.jpg" alt=""></div> -->


    </div>
    </div>
                
    </div>
    <div class="col-md-6">
    <div class="qd-price-info">
    <h1 class="qd-title"><?php echo $proddetails->prod_name ?></h1> 
    <h1 class="pdp-name"><?php echo $proddetails->prod_short_desc ?></h1>
                   
                   
                 <div class="pdp-discount-container">
                     <span class="pdp-price"><strong>€ <?php echo $proddetails->prod_sell_price ?></strong></span>
                   
                    <?php if($proddetails->prod_disc!='0') { ?>

                     <span class="pdp-mrp"><del>€ <?php echo $proddetails->prod_rate ?></del></span>
                     <span class="pdp-discount">(<?php echo $proddetails->prod_disc ?>% OFF)</span>
                     
                     <?php } ?> 

                </div> 
                   
                <div class="pdp-selling-price">
                
                <?php if($proddetails->prod_deactive=='0') { ?>

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
</figure>

<a class="ps-btn text-uppercase" href="#">
<i class="fa fa-cart-plus"></i> Add to cart</a>

<a class="ps-btn ps-bt-transperant" href="#"> <i class="icon-heart"></i>
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
                
                <p><?php echo $proddetails->prod_descr ?></p>
                </div>
            
                    </div>
                
                
                
                    
            </div>
                
                
                
             </div>
            
            <div class="ps-product__content ps-tab-root mb-5">
<ul class="ps-tab-list">

<li class="active"><a href="#tab-3">Vendor</a></li>
<li><a href="#tab-4">Reviews (1)</a></li>
<li><a href="#tab-5">Questions and Answers</a></li>

</ul>
<div class="ps-tabs">


<div class="ps-tab active" id="tab-3">
<h4>3M ESPE</h4>
<p>Digiworld US, New York’s no.1 online retailer was established in May 2012 with the aim and vision to become the one-stop shop for retail in New York with implementation of best practices both online</p><a href="#">More Products from gopro</a>
</div>

<div class="ps-tab" id="tab-4">
<div class="row">
<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
<div class="ps-block--average-rating">
<div class="ps-block__header">
<h3>4.00</h3>
<select class="ps-rating" data-read-only="true">
<option value="1">1</option>
<option value="1">2</option>
<option value="1">3</option>
 <option value="1">4</option>
<option value="2">5</option>
</select><span>1 Review</span>
</div>
<div class="ps-block__star"><span>5 Star</span>
<div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
</div>
<div class="ps-block__star"><span>4 Star</span>
<div class="ps-progress" data-value="0"><span></span></div><span>0</span>
</div>
<div class="ps-block__star"><span>3 Star</span>
<div class="ps-progress" data-value="0"><span></span></div><span>0</span>
</div>
<div class="ps-block__star"><span>2 Star</span>
<div class="ps-progress" data-value="0"><span></span></div><span>0</span>
</div>
<div class="ps-block__star"><span>1 Star</span>
<div class="ps-progress" data-value="0"><span></span></div><span>0</span>
</div>
</div>
</div>
<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
<form class="ps-form--review" action="index.html" method="get">
<h4>Submit Your Review</h4>
<p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
<div class="form-group form-group__rating">
<label>Your rating of this product</label>
<select class="ps-rating" data-read-only="false">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</div>
<div class="form-group">
<textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
</div>
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
<div class="form-group">
<input class="form-control" type="text" placeholder="Your Name">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
<div class="form-group">
<input class="form-control" type="email" placeholder="Your Email">
</div>
</div>
</div>
<div class="form-group submit">
<button class="ps-btn">Submit Review</button>
</div>
</form>
</div>
</div>
</div>

<div class="ps-tab" id="tab-5">
<div class="ps-block--questions-answers">
<h3>Questions and Answers</h3>
<div class="form-group">
<input class="form-control" type="text" placeholder="Have a question? Search for answer?">
</div>
</div>
</div>

</div>
</div>

  <div class="clear-fix"></div>           
             
            
            <div class="ps-section--default mt-55">
                <div class="ps-section__header">
                    <h3 class="text-uppercase">Related products</h3>
                </div>
               <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

<?php if(!empty($relatprod)) { 

    foreach ($relatprod as $row) {

    $id = base64_encode($row->prod_id);	
    	
    	?>                	
                        
    <div class="ps-product">
    <div class="ps-product__thumbnail"><a href="<?php echo base_url(); ?>index.php/Product_single?product=<?php echo $id ?>">

    	<?php

$image = $row->prod_image;

// echo $row->prod_rating; 
 
if( strpos( $image,',') !== false ) 
  {
   
     $exp_imagename = explode(',', $image);

     $imagename = $exp_imagename[0];

     // for($i=0;$i<count($exp_imagename);$i++)
     // {

     // }

?>
     
    	<img src="<?php echo base_url(); ?>imageupload/<?php echo $imagename ?>" alt="">
<?php }
else
	{ ?>

        <img src="<?php echo base_url(); ?>imageupload/<?php echo $row->prod_image ?>" alt="">
<?php } ?>        

    </a>
                               
                                
    </div>
    <div class="ps-product__container prodct-page">
    <div class="ps-product__content" data-mh="clothing"><p><a class="ps-product__title-small" href="<?php echo base_url(); ?>index.php/Product_single?product=<?php echo $id ?>"><?php echo $row->prod_name ?></a></p>
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
    <p class="product-card__boby__artnr"><?php echo $row->prod_code ?><span>|</span><?php echo $row->prod_uom; ?></p>
    <p class="ps-product__price sale">€ <?php echo $row->prod_sell_price ?></p>
    </div>
                                
                               
    </div>
    </div>
                        
   <?php  } 
   } 
   else 
   	{ ?>                     
          <h1 style=" text-align: center;">No products Available</h1>  
     <?php } ?>               
                         
                    </div>
                </div>
            </div>
        </div>
    </div>   