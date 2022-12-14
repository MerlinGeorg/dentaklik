<?php 
$categoryname = '';
$count = 0;
foreach($categories as $catkey=>$catrow) {
  $categoryname = $catrow->cat_name;
  if($categoryname == "Deals and offers")
  {
    
    ?> 

<section class="padding-bottom">
 <div class="card card-deal">
     <div class="col-heading content-body">
      <header class="section-heading">
       <h3 class="section-title"><?php echo $categoryname; ?></h3>
       <p>Today's Deals</p>
     </header><!-- sect-heading -->
     <div class="timer">
       <div> <span class="num" id="day">00</span> <small>Days</small></div>
       <div> <span class="num" id="hour">00</span> <small>Hour</small></div>
       <div> <span class="num" id="min">00</span> <small>Min</small></div>
       <div> <span class="num" id="second">00</span> <small>Sec</small></div>
     </div>
   </div> <!-- col.// -->
   <div class="row no-gutteKWD items-wrap">

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


    <div class="col-md col-6">
     <figure class="card-product-grid card-sm">
      <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="img-wrap"> 
       <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>"> 
      </a>
      <div class="text-wrap p-3">
        <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="title"><?php echo $row->prod_name;?> </a>
        <span class="badge badge-danger"> -<?php echo $row->prod_disc;?>% </span>
      </div>
   </figure>
 </div> <!-- col.// -->


 <?php }} } ?>


</div>
</div>

</section>

<?php
}
elseif($categoryname == "Recommended items")
{

?>



<section  class="padding-bottom-sm">

<header class="section-heading heading-line">
  <h4 class="title-section text-uppercase"><?php echo $categoryname; ?></h4>
</header>

<div class="row row-sm">

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


  <div class="col-xl-2 col-lg-3 col-md-4 col-6">
    <div href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="card card-sm card-product-grid">
      <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="img-wrap"> <img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>"> </a>
      <figcaption class="info-wrap">
        <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="title" style="min-height: 45px;"><?php echo $row->prod_name;?></a>
        <div class="price mt-1"><?php echo "KWD ".number_format($row->prod_sell_price+$row->prod_tax,2); ?></div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div> <!-- col.// -->

 <?php }} } ?>

</div> <!-- row.// -->
</section>



<?php
}
else
{
$catid = base64_encode($catrow->cat_id);
if($count < 4){ // to limit category count upto 4
?>

  <!-- normal product view -->
 <section class="padding-bottom">

<header class="section-heading heading-line">
  <h4 class="title-section text-uppercase"><?php echo $catrow->cat_name;?></h4>
</header>

<div class="card card-home-category">
<div class="row no-gutteKWD">
  <div class="col-md-3" style="padding-right: 0px;">
  <div class="home-category-banner bg-light-orange">
   <!--  <h5 class="title">Best trending clothes only for summer</h5>
    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
    <a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="btn btn-outline-primary rounded-pill">Shop Now</a>
    <img src="<?php echo base_url(); ?>/imageupload/<?php echo $catrow->cat_image;?>" class="img-bg">
  </div>
  </div> 
  <div class="col-md-9">
<ul class="row no-gutteKWD bordered-cols">
   <?php  $categoryname = $catrow->cat_name; ?>

 <?php if(!empty($categoryproductsauto->result())){ 

  $i = 0;
                
                foreach($categoryproductsauto->result() as $prodkey=>$row){

              
                  if($row->prod_cat_id == $catrow->cat_id){
                  if($i < 4)
                  {
                     // to limit number of products for each catefory on 9
                    //echo $i;
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

<?php if($row->prod_deactive == 0){?>
  <!-- product in stock -->
  <li class="col-6 col-lg-3 col-md-4">
    <i class="far fa-heart" style="float: right; margin-top: 10px; cursor: pointer;" onclick="addtowishlist('<?php echo $row->prod_id?>');"></i>
<a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="item"> 
  <div class="card-body">
    <h6 class="title"><?php echo $row->prod_name;?>  </h6>

    <img style="width: 110px; height: 110px; object-fit: fill;" class="img-sm float-right" src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" alt="<?php echo $row->prod_name;?>"> 
    <p class="text-muted" style="margin-bottom: 0px;"><?php echo "KWD ".number_format($row->prod_sell_price+$row->prod_tax,2); ?></p>

<?php 
$rating = $row->prod_rating;
$rating_percent = ($rating/5)*100;
?>

<div class="rating-wrap my-3" style="margin: 0px!important;">
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
  </div>

<!-- buttons -->
     <input type="hidden" class="form-control" value="1" id="quantity" name="quantity">
      <div class="form-group"> 
      <!--   <div style="text-align: center;"> -->
      <a href="#" style="padding: 0.45rem 0.55rem; font-weight: 400;" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');"  class="btn  btn-primary"> 
        <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
      </a>
     <!--  <a href="#"  class="btn  btn-primary" onclick="addtowishlist('<?php echo $row->prod_id?>');"  style="float: right; padding: 0.45rem 0.55rem; font-weight: 400;" class="btn btn-light">
       <i class="fas fa-heart"></i> <span class="text">Add to wishlist</span>  
      </a> -->
    <!--  </div> -->
    </div>
<!-- product in stock -->
<?php }else{
  $i--;?>
  <!-- out of stock -->
  <!-- <p style="color: red; text-align: center;"><b>Out of stock</b></p> -->
  <!-- out of stock -->
<?php }?>
   <!-- buttons -->


    </a>
  </li>
 <?php 
}
$i++;
}
}
}
?>
</ul>
  </div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- card.// -->
</section>
 <!-- normal product view -->
  <!-- end loop category count condition -->
<?php
}
?>
<!-- end loop category count condition -->
<?php
$count++;
}
?>
<!-- category loop end -->
 <?php  }
 ?>

 <script type="text/javascript">
// Set the date we're counting down to
var countDownDate = new Date("Jun 30, 2020 24:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, houKWD, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var houKWD = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("day").innerHTML = days;
  document.getElementById("hour").innerHTML = houKWD;
  document.getElementById("min").innerHTML = minutes;
  document.getElementById("second").innerHTML = seconds;
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
   document.getElementById("day").innerHTML = "00";
  document.getElementById("hour").innerHTML = "00";
  document.getElementById("min").innerHTML = "00";
  document.getElementById("second").innerHTML = "00";
  }
}, 1000);
</script>