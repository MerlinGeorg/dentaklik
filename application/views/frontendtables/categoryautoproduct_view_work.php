<?php 
$categoryname = '';

foreach($categories as $catkey=>$catrow) {

  $pp = 1;
  ?>

<section class="padding-bottom">

<header class="section-heading heading-line">
  <h4 class="title-section text-uppercase"><?php echo $catrow->cat_name;?></h4>
</header>


<div class="card card-home-category">
<div class="row no-gutters">
  <div class="col-md-3">
  
  <div class="home-category-banner bg-light-orange">
    <h5 class="title">Best trending clothes only for summer</h5>
    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
    <a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
    <img src="<?php echo base_url(); ?>/imageupload/<?php echo $catrow->cat_image;?>" class="img-bg">
  </div>

  </div> <!-- col.// -->
  <div class="col-md-9">
<ul class="row no-gutters bordered-cols">
   <?php  $categoryname = $catrow->cat_name; ?>

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
  <li class="col-6 col-lg-3 col-md-4">
<a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="item"> 
  <div class="card-body">
    <h6 class="title"><?php echo $row->prod_name;?>  </h6>
    <img style="width: 120px; height: 120px;" class="img-sm float-right" src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" alt="<?php echo $row->prod_name;?>"> 
    <p class="text-muted"><i class="fas fa-rupee-sign"></i> <?php echo "Rs.".number_format($row->prod_sell_price+$row->prod_tax,2); ?></p>
  </div>

<!-- buttons -->
<?php if($row->prod_deactive == 0){?>
    
     <input type="hidden" class="form-control" value="1" id="quantity" name="quantity">
      <div class="form-group">
      <a href="#" style="margin-left: 20px; padding: 0.45rem 0.55rem; font-weight: 400;" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');"  class="btn  btn-primary"> 
        <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
      </a>
   <!--    <a href="#"  style="float: right; margin-right: 10px; padding: 0.45rem 0.55rem; font-weight: 400;" class="btn btn-light">
       <i class="fas fa-shopping-cart"></i> <span class="text">Buy Now </span>  
      </a> -->
    </div>
   
<?php }else{?>
  <p style="color: red; text-align: center;"><b>Out of stock</b></p>
<?php }?>
   <!-- buttons -->


    </a>
  </li>
 <?php }} } ?>
</ul>
  </div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- card.// -->

</section>
 <?php  }?>