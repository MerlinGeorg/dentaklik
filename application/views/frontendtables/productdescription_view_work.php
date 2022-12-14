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
              var data = '<a href="#"><img  class="zoom" src="<?php echo base_url(); ?>/imageupload/'+id+'"/></a>';
               $('.imagereachtofill').html(data);
        
            }
</script>
<style>
* {
  box-sizing: border-box;
}

.zoom {
  transition: transform .2s;
  width: 400px;
  height: 400px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>

<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
       <?php $catid = base64_encode($singleprodcategoryname->cat_id); ?>
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $singleprodcategoryname->cat_name;?></a></li>
        <?php if(!empty($singleprodcategoryname->sub_id)){
        $subid = base64_encode($singleprodcategoryname->sub_id);?>
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $singleprodcategoryname->sub_name; ?></a></li><?php } ?>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $singleprodcategoryname->prod_name; ?></li>
    </ol>
  </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div class="container">

<!-- ============================ ITEM DETAIL ======================== -->
  <div class="row">
<aside class="col-md-6">
<div class="card">
<article class="gallery-wrap"> 
  <div class="img-big-wrap">
     <?php
            $searchStringf = ',';
                $prodimgf = '';
                if( strpos($row->prod_image, $searchStringf) !== false ) {
                    $eximagef = explode(',', $row->prod_image);
                        ?>
    <div class="imagereachtofill"> <a href="#"><img class ="zoom" src="<?php echo base_url(); ?>/imageupload/<?php echo $eximagef[0];?>"></a></div>
      <?php } 
                else{
                  $prodimgf = $row->prod_image;?>
    <div class="imagereachtofill"> <a href="#"><img class ="zoom" src="<?php echo base_url(); ?>/imageupload/<?php echo $row->prod_image;?>"></a></div>
                       <?php } 
           ?>

  </div> <!-- slider-product.// -->
  <div class="thumbs-wrap" data-effect="zoom">
    <?php
                $searchString = ',';
                $prodimg = '';
                if( strpos($row->prod_image, $searchString) !== false ) {
                  
                        $eximage = explode(',', $row->prod_image);
                        for($k = 0; $k<count($eximage); $k++){?>
    <a onclick="imagefill('<?php echo $eximage[$k];?>','<?php echo $row->prod_name;?>')" class="item-thumb"> <img class ="img-sm" src="<?php echo base_url(); ?>/imageupload/<?php echo $eximage[$k];?>"></a>

     <?php } } 
     else{
          $prodimg = $row->prod_image;?>
          <a onclick="imagefill('<?php echo $prodimg;?>','<?php echo $row->prod_name;?>')" class="item-thumb"> <img class ="img-sm" src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>"></a>
                      
                <?php } 
             ?>

  </div> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
</div> <!-- card.// -->
</aside>
<main class="col-md-4">
<article class="product-info-aside">

<h2 class="title mt-3"><?php echo $row->prod_name;?></h2>

<?php 
$rating = $row->prod_rating;
$rating_percent = ($rating/5)*100;
?>

<div class="rating-wrap my-3">
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
  <small class="label-rating text-muted">132 reviews</small>
  <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
</div> <!-- rating-wrap.// -->
 <?php if($row->prod_disc > 0)
 {
  ?>
<div class="mb-3"> 
  <var class="price h4">KWD <?php echo number_format($row->prod_sell_price+$row->prod_tax,2); ?></var> 
  <span class="text-muted">KWD <?php echo number_format($row->prod_rate+$row->prod_tax,2); ?></span> 
</div>
    <?php 
  }
  else
  {?>
   <var class="price h4">KWD <?php echo $row->prod_disc_price; ?></var> 
  <?php 
  }?>
<!-- price-detail-wrap .// -->

<p><?php echo $row->prod_short_desc; ?></p> 


<dl class="row">
  <?php if(!empty($singleprodcategoryname->brand_name))
  {
    ?>
     <dt class="col-sm-3">Brand</dt>
     <dd class="col-sm-9"><a href="#"><?php echo $singleprodcategoryname->brand_name; ?></a></dd>
    <?php
  }
  ?>

  <dt class="col-sm-3">Manufacturer</dt>
  <dd class="col-sm-9"><a href="#"><?php echo $row->store_name; ?></a></dd>

  <dt class="col-sm-3">Quantity</dt>
  <dd class="col-sm-9"><?php echo $row->prod_uom; ?></dd>

  <dt class="col-sm-3">Warranty</dt>
  <dd class="col-sm-9">2 year</dd>

  <dt class="col-sm-3">Delivery time</dt>
  <dd class="col-sm-9">3-4 days</dd>

  <dt class="col-sm-3">Availabilty</dt>
  <?php if($row->prod_deactive == 0){?>
  <dd class="col-sm-9">In Stock</dd>
  <?php }else{?>
  <dd class="col-sm-9">Out of stock</dd>
  <?php }?>
</dl>

  <div class="form-row  mt-4">
    <div class="form-group col-md flex-grow-0">
      <div class="input-group mb-3 input-spinner">
        <div class="input-group-prepend">
          <button class="btn btn-light" type="button" id="button-plus" onclick="btnplus()"> + </button>
        </div>
        <input type="text" class="form-control" value="1" id="quantity" name="quantity">
        <div class="input-group-append">
          <button class="btn btn-light" onclick="btnminus()" id="button-minus"> &minus; </button>
        </div>
      </div>
    </div> <!-- col.// -->
    </div>
    <div class="form-row">
    <div class="form-group col-md" >

      <a href="#" style="margin-right: 5px;" onclick="addtowishlist('<?php echo $row->prod_id?>');"  class="btn  btn-primary"> 
        <i class="fas fa-heart"></i><span class="text">Add to wishlist</span>
      </a>
       <?php if($row->prod_deactive == 0){?>
      <a href="#"  style="margin-left: 5px;" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');"  class="btn  btn-primary"> 
        <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
      </a>
       <?php } ?>
    <!--   <a href="#" class="btn btn-light">
       <i class="fas fa-shopping-cart"></i> <span class="text">Buy Now </span>  
      </a> -->
    </div>
  
     <!-- col.// -->
   </div> <!-- row.// -->
</article> <!-- product-info-aside .// -->
    </main> <!-- col.// -->

<!-- related products -->
<main class="col-md-2">

<div class="col-md d-none d-lg-block flex-grow-1">
      <aside class="special-home-right">
        <h6 class="bg-blue text-center text-white mb-0 p-2">Related Products</h6>

        <?php 
        $i = 0;
        foreach($related_products as $catkey=>$related_row) { 
          $id = base64_encode($related_row->prod_id);

                    $searchString = ',';
                    $prodimg = '';
                    if( strpos($related_row->prod_image, $searchString) !== false ) {
                        $eximage = explode(',', $related_row->prod_image);
                            $prodimg = $eximage[0];
                    } 
                    else{
                      $prodimg = $related_row->prod_image;
                    }
           
           if($i >= 5)
           {
              break;
           }
           else
           {
           ?>
        
      <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>">
    <div class="card-banner border-bottom">
          <div class="py-3" style="width:80%">
          <h6 class="title"><?php echo $related_row->prod_name;?></h6>
          <div class="text-muted"><?php echo "KWD ".number_format($related_row->prod_sell_price+$related_row->prod_tax,2); ?></div>
          </div> 
          <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" height="80" class="img-bg">
        </div>
      </a>
  
       <?php
       $i++;
     }
     }
     ?>
  
      </aside>



</main>
<!-- related products -->

  </div> <!-- row.// -->

<!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y card card-deal">
<div class="container">

<div class="row">
  <div class="col-md-12">
    <h5 class="title-description">Description</h5>
    <p><?php echo $row->prod_descr; ?></p>
  </div> <!-- col.// -->
  
  <!-- related products -->
  <aside class="col-md-12" style="margin: 20px 0px;">
    <h5 class="title-description">Related Products</h5>
    <br>
 <div class="row no-gutters items-wrap card card-deal">
     <?php 
        $i = 0;
        foreach($related_products as $catkey=>$related_row1) { 
          $id = base64_encode($related_row1->prod_id);

                    $searchString = ',';
                    $prodimg1 = '';
                    if( strpos($related_row1->prod_image, $searchString) !== false ) {
                        $eximage = explode(',', $related_row1->prod_image);
                            $prodimg1 = $eximage[0];
                    } 
                    else{
                      $prodimg1 = $related_row1->prod_image;
                    }
           
           if($i >= 5)
           {
              break;
           }
           else
           {
           ?>
   <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>">
    <div class="col-md col-6">
     <figure class="card-product-grid card-sm">
      <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="img-wrap"> 
       <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg1;?>"> 
      </a>
      <div class="text-wrap p-3">
        <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="title" style="min-height: 45px;"><?php echo $related_row1->prod_name;?></a>
        <span class="text-muted"> <?php echo "KWD ".number_format($related_row1->prod_sell_price+$related_row1->prod_tax,2); ?> </span>
      </div>
   </figure>
 </div> <!-- col.// -->
</a>
   <?php
       $i++;
     }
     }
     ?>
  </aside>
  <!-- related products --> 
</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


</body>
</html>

 <script type="text/javascript">
        
    function btnplus(){
      var qty = document.getElementById("quantity").value;
      qty++;
      document.getElementById("quantity").value = qty;
    }

    function btnminus(){
      var qty = document.getElementById("quantity").value;
      if(qty > 1){
        qty--;   
      }
       document.getElementById("quantity").value = qty;
    }
      </script>
