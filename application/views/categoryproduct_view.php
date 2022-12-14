<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

    <?php if(!empty($singlecategoryname->cat_id)){
    $catid = base64_encode($singlecategoryname->cat_id); ?>
    <?php } ?>
    <?php if(!empty($singlecategoryname->sub_cat_id)){
      $subid = base64_encode($singlecategoryname->sub_id);?>
   <?php } ?>
   <?php if(!empty($singlecategoryname->brand_id)){
    $catid = base64_encode($singlecategoryname->brand_id); ?>
    <?php } 
      
           $places1 = base64_encode("10.530345");
            $places2 = base64_encode("76.214729");
     
    ?>

<section>
  <div class="container-fluid">
    <div class="row">
     <div class="col-md-3" style="margin-bottom: 20px;">
        <main class="card">
          <div class="card-body">
        <h6>CATEGORIES</h6>
    
        <nav class="nav-home-aside">
          <ul class="menu-category">
              <?php 
              foreach ($categoriesname as $rowdesc){           
              $catid = base64_encode($rowdesc->cat_id);
              $categoryname = $rowdesc->cat_name;
               if($categoryname == "Deals and offers" || $categoryname == "Recommended items")
               {
               }
               else
               {
              ?>
            <li class="has-submenu"><a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>"><?php echo $rowdesc->cat_name; ?></a>
            <?php
             if(!empty($rowdesc->subs)){?>
              <ul class="submenu">
                <?php foreach($rowdesc->subs as $scategory){ 
                    $subid = base64_encode($scategory->sub_id);?>  
                <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>"><?php echo $scategory->sub_name; ?></a></li>
                <?php 
                }
                ?>
              </ul>
            <?php }?>
            </li>
          <?php 
            }
            }?>
          </ul>
        </nav> 
    </div>
 </main>
    
</div> 

      <div class="col-md-9">
      <div class="col-12" style="padding-bottom: 20px;">

 <?php if(!empty($sub_category)){ ?>   
          <main class="card">
          <div class="card-body"  style="padding: 0px;">
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php 
    $i =0;
    foreach($sub_category as $slider){
    ?>
    <?php if($i == 0) {
    ?>
    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
    <?php }
    else { ?>
    <li data-target="#carousel1_indicator" data-slide-to="<?php echo $i;?>"></li>
    <?php }
     $i = $i+1;
     }
     ?>
  </ol>
  <div class="carousel-inner">
    <?php $j =0;
   foreach($sub_category as $slider){
    ?>
    <?php 
      if($j == 0)
      {
        ?>
    <div class="carousel-item active">
    <img src="<?php echo base_url(); ?>imageupload/<?php echo $slider->sub_image;?>" alt="First slide" style="height: 230px;"> 
    </div>
    <?php }
    else { ?>
    <div class="carousel-item">
    <img src="<?php echo base_url(); ?>imageupload/<?php echo $slider->sub_image;?>" style="height: 230px;">
    </div>
    <?php }
     $j = $j+1;
     }
     ?>
  </div>
  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div> 
</div>
</main>
</div>

 <?Php } ?> 

<?php $count = count($brand_image);?>
<?php if($count > 1){ ?>
      <div class="col-12" style="padding-bottom: 20px;">
    
        <main class="card">
          <div class="card-body">
        <section class="customer-logos slider">
         <?php 
            foreach ($brand_image as $brand){
              if(!empty($brand->brand_image))
              {
                ?>
                <div class="slide"><img src="<?php echo base_url(); ?>imageupload/<?php echo $brand->brand_image;?>"></div>
             <?php
              }
              }?>
         </section>
         </div>
         </main>
      </div>
      <?Php } ?> 
    </div>
  </div>
</section>





  <!-- this div contains the original product list -->
 <div class="row fillcategorylist">
   <?php foreach($getproducts as $row){
    $id =base64_encode($row->prod_id);
    $searchString = ',';
     $prodimg = '';
                    if( strpos($row->prod_image, $searchString) !== false ) {
                        $eximage = explode(',', $row->prod_image);
                            $prodimg = $eximage[0];
                    } 
                    else{
                      $prodimg = $row->prod_image;
                    }?> 
 <input type="hidden" class="cprodid"  value="<?php echo $row->prod_id?>"/>
 <input type="hidden" class="cquantity"  value="1"/>
 <input type="hidden" class="cprice"  value="<?php echo $row->prod_addedcomm?>"/>
 <input type="hidden" class="cprodisc"  value="<?php echo $row->prod_disc?>"/>
  <div class="col-md-3">
    <figure class="card card-product-grid" style="display: block;">
       <i class="far fa-heart" style="float: right; margin-top: 10px; margin-right: 10px; cursor: pointer;" onclick="addtowishlist('<?php echo $row->prod_id?>');"></i>
   <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>" style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');">
    
      <div class="img-wrap"> 
        <!-- <span class="badge badge-danger"> NEW </span> -->
        <img src="<?php echo base_url(); ?>imageupload/<?php echo  $prodimg;?>" alt="<?php echo $row->prod_name;?>">
       </div> <!-- img-wrap.// -->
       <figcaption class="info-wrap">
          <a href="#" onclick="prodesc('<?php echo $row->prod_id;?>');" class="title mb-2" style="min-height: 45px;"><?php echo $row->prod_name;?></a>

          <div class="price-wrap">
            <span class="price"><?php echo "KWD ".number_format($row->prod_sell_price+$row->prod_tax,2); ?></span> 
            <?php if($row->prod_disc != 0){ ?>
              <small class="text-muted">&nbsp;&nbsp;<?php echo number_format($row->prod_rate+$row->prod_tax,2); ?></small>
              <?php }?>
          </div>  <!-- price-wrap.// -->

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
          <a href="#" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_addedcomm?>','<?php echo $row->prod_tax?>','<?php echo $row->prod_unique_id?>');"  class="btn  btn-primary">
          <!-- style="float: inline-end;"  -->
          <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
         </a>
         </div>
        <?php }else{?>
        <p align="center" class="btn" style="color: red; display: block;">Out of stock<p>
         <?php }?>
          <!-- <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" onclick="addtowishlist('<?php echo $row->prod_id?>');" ><i class="fa fa-heart-o"></i></button> -->
      </figcaption>
    </a>
    </figure>
  </div> <!-- col.// -->
   <?php }?>
 
</div> <!-- row end.// -->


<!-- <nav class="mb-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->


<div class="box text-center">
 <!--  <p>Did you find what you were looking for？</p>
  <a href="#" class="btn btn-light">Yes</a>
  <a href="#" class="btn btn-light">No</a> -->
   <center><button class="btn btn-primary" onclick="loadmore();">Load More</button></center> 
</div>

</div> <!-- container .//  -->
</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script>

$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>

<script type="text/javascript">
  var gtype = '';
      $( document ).ready(function() {
       
          getcategory('grid','8');
          gtype = 'grid';
          // $(".grid").addClass("active");
      });
      
      function getcategorysort(limits){
        var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
      
        var mainid = '<?php echo $mainid;?>';
        var subids = '<?php echo $subids;?>';
        var bid = '<?php echo $bid;?>';
        var offer = '<?php echo $offer;?>';
        // var mode = getmode;tab-latest
        // var limits = $('#input-limit').val();
        var sorts = $('#input-sort').val();
         $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/category/getcategory');?>/",
              data: {gettype:gtype,mainid:mainid,subid:subids,limits:limits,sorts:sorts,bid:bid,latit:latits,longt:longts,offer:offer}, // serializes the form's elements.
             success: function(data){
              $('.fillcategorylist').html(data);
                }

           });
      }
      function getcategory(gettype,limits){
        if(gettype == 'grid'){
          $(".grid").addClass("active");
          $(".list").removeClass("active");
        }
        if(gettype == 'list'){
          $(".list").addClass("active");
          $(".grid").removeClass("active");
        }
        gtype = gettype;
        var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
      
        var mainid = '<?php echo $mainid;?>';
        var subids = '<?php echo $subids;?>';
        var bid = '<?php echo $bid;?>';
        var offer = '<?php echo $offer;?>';
        // var mode = getmode;tab-latest
        // var limits = $('#input-limit').val();
        var sorts = $('#input-sort').val();
         $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/category/getcategory');?>/",
              data: {gettype:gettype,mainid:mainid,subid:subids,limits:limits,sorts:sorts,bid:bid,latit:latits,longt:longts,offer:offer}, // serializes the form's elements.
             success: function(data){
              $('.fillcategorylist').html(data);
                }

           });
      }
      var i = 2;
       function loadmore(){
        var j = 8 * i;
          getcategorysort(j);
          i++;
       }     


       // function prodesc(id){
              
      //         $.ajax({
      //                  async: false,
      //                 method: "POST",
      //                 url: "<?php echo base_url('index.php/home/getproductsdetails');?>/",
      //                 data: {id:id}, // serializes the form's elements.
      //                success: function(data){
      //                 $('#fillproddesc').html(data);
      //                 // $('#product-thumbnail').trigger('destroy.owl.carousel');
      //                 //  $("#product-thumbnail").owlCarousel({
      //                 //   items: 0,
      //                 //   nav : true
      //                 // });
      //               $("#product-thumbnail").owlCarousel({
      //                   margin:10,
      //                   loop:true,
                        
      //                   items:4,
      //                   margin:0,
      //                   width:0
      //                });
                    

      //                   }

      //              });
      //       }
            // function imagefill(id,name){
            //   var data = '<a class="thumbnail"  title="'+name+'"><img src="<?php echo base_url(); ?>/imageupload/'+id+'" title="'+name+'" alt="'+name+'" /></a>';
            //    $('.imagereachtofill').html(data);
        
            // }
   

</script> 