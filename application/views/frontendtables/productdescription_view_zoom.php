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
              var data = '<a href="#"><img src="<?php echo base_url(); ?>/imageupload/'+id+'"/></a>';
               $('.imagereachtofill').html(data);
        
            }
</script>



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
 <div class="imagereachtofill">
<div class="img-zoom-container">
<img id="myimage" src="<?php echo base_url(); ?>/imageupload/<?php echo $eximagef[0];?>" width="300" height="240">
<div id="myresult" class="img-zoom-result"></div>
</div> 
</div>
      <?php } else{
      $prodimgf = $row->prod_image;?>
<div class="imagereachtofill">   
<div class="img-zoom-container">
<img id="myimage" src="<?php echo base_url();?>/imageupload/<?php echo $row->prod_image;?>" width="300" height="240">
<div id="myresult" class="img-zoom-result"></div>
</div>
 <?php }  ?>

  </div> 
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
    <main class="col-md-6">
<article class="product-info-aside">

<h2 class="title mt-3"><?php echo $row->prod_name;?></h2>

<div class="rating-wrap my-3">
  <ul class="rating-stars">
    <li style="width:80%" class="stars-active"> 
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
  <var class="price h4">Rs <?php echo number_format($row->prod_sell_price+$row->prod_tax,2); ?></var> 
  <span class="text-muted">Rs <?php echo number_format($row->prod_rate+$row->prod_tax,2); ?></span> 
    <?php 
  }
  else
  {?>
   <var class="price h4">Rs <?php echo $row->prod_disc_price; ?></var> 
  <?php 
  }?>
</div> <!-- price-detail-wrap .// -->

<p><?php echo $row->prod_descr; ?></p>


<dl class="row">
  <dt class="col-sm-3">Manufacturer</dt>
  <dd class="col-sm-9"><a href="#"><?php echo $row->store_name; ?></a></dd>

  <dt class="col-sm-3">Quantity</dt>
  <dd class="col-sm-9"><?php echo $row->prod_uom; ?></dd>

  <dt class="col-sm-3">Guarantee</dt>
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
    <?php if($row->prod_deactive == 0){?>
    <div class="form-group col-md">
      <a href="#" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');"  class="btn  btn-primary"> 
        <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
      </a>
      <a href="#" class="btn btn-light">
       <i class="fas fa-shopping-cart"></i> <span class="text">Buy Now </span>  
      </a>
    </div>
   <?php } ?>
     <!-- col.// -->
  </div> <!-- row.// -->

</article> <!-- product-info-aside .// -->
    </main> <!-- col.// -->
  </div> <!-- row.// -->

<!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
<div class="container">

<div class="row">
  <div class="col-md-8">
    <h5 class="title-description">Description</h5>
    <p>
      Lava stone grill, suitable for natural gas, with cast-iron cooking grid, piezo ignition, stainless steel burners, water tank, and thermocouple. Thermostatic adjustable per zone. Comes complete with lava rocks. Adjustable legs. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. 
    </p>
    <ul class="list-check">
    <li>Material: Stainless steel</li>
    <li>Weight: 82kg</li>
    <li>built-in drip tray</li>
    <li>Open base for pots and pans</li>
    <li>On request available in propane execution</li>
    </ul>

    <h5 class="title-description">Specifications</h5>
    <table class="table table-bordered">
      <tr> <th colspan="2">Basic specs</th> </tr>
      <tr> <td>Type of energy</td><td>Lava stone</td> </tr>
      <tr> <td>Number of zones</td><td>2</td> </tr>
      <tr> <td>Automatic connection </td> <td> <i class="fa fa-check text-success"></i> Yes </td></tr>

      <tr> <th colspan="2">Dimensions</th> </tr>
      <tr> <td>Width</td><td>500mm</td> </tr>
      <tr> <td>Depth</td><td>400mm</td> </tr>
      <tr> <td>Height </td><td>700mm</td> </tr>

      <tr> <th colspan="2">Materials</th> </tr>
      <tr> <td>Exterior</td><td>Stainless steel</td> </tr>
      <tr> <td>Interior</td><td>Iron</td> </tr>

      <tr> <th colspan="2">Connections</th> </tr>
      <tr> <td>Heating Type</td><td>Gas</td> </tr>
      <tr> <td>Connected load gas</td><td>15 Kw</td> </tr>

    </table>
  </div> <!-- col.// -->
  
  <aside class="col-md-4">

    <div class="box">
    
    <h5 class="title-description">Files</h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>

    <h5 class="title-description">Videos</h5>
      

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="<?php echo base_url();?>/front_end_assets/images/posts/3.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">How to use this item</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="<?php echo base_url();?>/front_end_assets/images/posts/2.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="<?php echo base_url();?>/front_end_assets/images/posts/1.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>


    
  </div> <!-- box.// -->
  </aside> <!-- col.// -->
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

<script>
// Initiate zoom effect:
imageZoom("myimage", "myresult");
</script>
