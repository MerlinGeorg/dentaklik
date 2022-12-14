<script type="text/javascript">
  
</script>
<div id="fillproddesc">
<div class="container">
  <ul class="breadcrumb">
    <?php if(!empty($singlecategoryname->cat_id)){
    $catid = base64_encode($singlecategoryname->cat_id); ?>
    <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>" >category (<?php echo $singlecategoryname->cat_name;?>)</a></li><?php } ?>
    <?php if(!empty($singlecategoryname->sub_cat_id)){
      $subid = base64_encode($singlecategoryname->sub_id);?>
    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>" >subcategory(<?php echo $singlecategoryname->sub_name; ?>)</a></li> <?php } ?>
   <?php if(!empty($singlecategoryname->brand_id)){
    $catid = base64_encode($singlecategoryname->brand_id); ?>
    <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/category?brand=<?php echo $catid?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>" >Brand(<?php echo $singlecategoryname->brand_name;?>)</a></li><?php } ?>
  </ul>
  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">
        <div class="column-block categorynamesidefill">
          <div class="columnblock-title">Categories</div>
          <div class="category_block">
            <ul class="box-category treeview-list treeview">
          
          <?php 
    
foreach ($categoriesname as $rowdesc){
        // foreach($categorynamestest as $row){
            
$catid = base64_encode($rowdesc->cat_id);

       ;?>
            <li><a class="activSub" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>" ><?php echo $rowdesc->cat_name; ?></a>
            <?php
               
             if(!empty($rowdesc->subs)){?>
                 <ul>
                <?php foreach($rowdesc->subs as $scategory){ 
                    $subid = base64_encode($scategory->sub_id);?>  
                    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>"><?php echo $scategory->sub_name; ?></a></li>
            <?php 
                }?>
                
              </ul>
            <?php }?>
             </li>
          <?php }?>
           </ul>
          </div>
          <!-- new onew -->
                    <div class="columnblock-title">Brands</div>
            <div class="category_block">
            <ul class="box-category treeview-list treeview">
          
          <?php 
        if(!empty($categorybrand)){
            foreach ($categorybrand as $brand){
          // foreach($categorynamestest as $row){
            $brdid = base64_encode($brand->brand_id);?>
            <li><a class="activSub" href="<?php echo base_url(); ?>index.php/category?brand=<?php echo $brdid?>&place1=<?php echo $lats;?>&place2=<?php echo $lons;?>" ><?php echo $brand->brand_name; ?></a> </li>
          <?php }
        }else{?>
            <li>No Brands</li>
        <?php }?>
           </ul>
          </div>
          <!-- new one end -->

        </div>

      </div>
    </div>
     <div id="content" class="col-sm-9 ">
        <center><h2 class="category-title"><?php
        if(empty($singlecategoryname->brand_id))
        {
           echo $singlecategoryname->cat_name;
         }else{
            echo $singlecategoryname->brand_name;
         }
        ?></h2></center>
        
      <div class="row category-banner">
       
      <div class="category-page-wrapper">
        <div class="col-md-6 list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="grid-view" onclick="getcategory('grid','8');" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
            <button type="button" id="list-view" onclick="getcategory('list','8');" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
          </div>
          <a href="#" id="compare-total"><?php if(!empty($singlecategoryname->sub_cat_id)){echo $singlecategoryname->sub_name;}?></a> </div>
        <!-- <div class="col-md-1 text-right page-wrapper">
          <label class="control-label" for="input-limit">Show :</label>
          <div class="limit">
            <select id="input-limit" class="form-control" onchange="getcategory('grid','0');">
              <option value="8" selected="selected">8</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
        </div> -->
        <div class="col-md-2 text-right sort-wrapper">
          <label class="control-label" for="input-sort">Sort By :</label>
          <div class="sort-inner">
            <select id="input-sort" class="form-control" onchange="getcategorysort('8');" style="width:156px;">
              <option value="latest" selected="selected">Default</option>
              <option value="nameasc">Name (A - Z)</option>
              <option value="namedesc">Name (Z - A)</option>
              <option value="priceasc">Price (Low &gt; High)</option>
              <option value="pricedesc">Price (High &gt; Low)</option>
             
            </select>
          </div>
        </div>
      </div>
      <br />
      <div class="fillcategorylist">
      <?php foreach($getproducts as $row){?> 
        <input type="hidden" class="cprodid"  value="<?php echo $row->prod_id?>"/>
                 <input type="hidden" class="cquantity"  value="1"/>
                  <input type="hidden" class="cprice"  value="<?php echo $row->prod_addedcomm?>"/>
                   <input type="hidden" class="cprodisc"  value="<?php echo $row->prod_disc?>"/>
    
      <div class="grid-list-wrapper">
        <div class = "product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image product-imageblock"> <a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');"> <img src="<?php echo base_url(); ?>imageupload/<?php echo $row->prod_image;?>" alt="<?php echo $row->prod_name;?>" title="<?php echo $row->prod_name;?>" class="img-responsive" style="width: 220px;height:294px;"/> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" onclick="addtocart();">Add to Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"> <a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');" title="<?php echo $row->prod_name;?>"> <?php echo $row->prod_name;?></a> </h4>
             <!--  <p class="product-desc"> <?php echo $row->prod_descr;?></p> -->
              <p class="price product-price"><?php

                         echo "Rs.".number_format($row->prod_sell_price+$row->prod_tax,2);
                        ?><?php if($row->prod_disc != 0){ ?><span class="price-old"><?php echo number_format($row->prod_rate+$row->prod_tax,2); ?></span><?php }?></p>
             
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn">Add to Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
      </div>
  <?php }?>

  </div>
     
    </div>
     <center><button class="btn btn-primary" onclick="loadmore();">Load More</button></center> 
  </div>
</div>

</div>

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