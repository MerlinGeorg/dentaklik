<script type="text/javascript">
  
</script>
<div id="fillproddesc">

<div class="container" style="margin: 20px;">
  <!-- <ul class="breadcrumb">
    <?php $brndid = base64_encode($brandid); ?>
    <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/brand?brand=<?php echo $brndid;?>" >Brand(<?php echo $singlebrand->brand_name;?>)</a></li>
  </ul> -->
 <!--  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">
        <div class="column-block brandnamesidefill">
          <div class="columnblock-title">Brands</div>
          <div class="category_block">
            <ul class="box-category treeview-list treeview">
          
          <?php 
    
foreach ($brandnames as $rowdesc){
        // foreach($brandnamestest as $row){
            
$brdid = base64_encode($rowdesc->brand_id);

       ;?>
            <li><a class="activSub" href="<?php echo base_url(); ?>index.php/brand?brand=<?php echo $brdid?>" ><?php echo $rowdesc->brand_name; ?></a> </li>
            <?php }?>
           </ul>
          </div>

        </div>

      </div>
    </div> -->
    <div class="col-sm-2">
    </div>
     <div id="content" class="col-sm-9 ">
        <center><h2 class="category-title">Brands</h2></center>
      <div class="row category-banner">
        <!-- <div class="col-sm-12 brand-image"><img src="image/banners/brand-banner.jpg" alt="Desktops" title="Desktops" class="img-thumbnail" /></div> -->
       <!--  <div class="col-sm-12 brand-desc">Lorem ipsum dolomagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</div>
      </div> -->
      <div class="category-page-wrapper">
        <div class="col-md-6 list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="list-view" onclick="getbrand('list');" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" onclick="getbrand('grid');" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
          <a href="#" id="compare-total"><?php if(!empty($singlebrand->brand_id)){echo $singlebrand->brand_name;}?></a> </div>
        <div class="col-md-1 text-right page-wrapper">
          <label class="control-label" for="input-limit">Show :</label>
          <div class="limit">
            <select id="input-limit" class="form-control" onchange="getbrand('list');">
              <option value="8" selected="selected">8</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
        </div>
        <div class="col-md-2 text-right sort-wrapper">
          <label class="control-label" for="input-sort">Sort By :</label>
          <div class="sort-inner">
            <select id="input-sort" class="form-control" onchange="getbrand('list');">
              <option value="latest" selected="selected">Default</option>
              <option value="nameasc">Name (A - Z)</option>
              <option value="namedesc">Name (Z - A)</option>
              <option value="priceasc">Price (Low &gt; High)</option>
              <option value="pricedesc">Price (High &gt; Low)</option>
              <!-- <option value="DESC">Rating (Highest)</option>
              <option value="ASC">Rating (Lowest)</option>
              <option value="ASC">Model (A - Z)</option>
              <option value="DESC">Model (Z - A)</option> -->
            </select>
          </div>
        </div>
      </div>
      <br />
      <div class="fillbrandlist">
      <?php 

      foreach($brandsproduct as $key=>$row){?> 
        <input type="hidden" class="cprodid"  value="<?php echo $row->prod_id?>"/>
                 <input type="hidden" class="cquantity"  value="1"/>
                  <input type="hidden" class="cprice"  value="<?php echo $row->prod_addedcomm?>"/>
                   <input type="hidden" class="cprodisc"  value="<?php echo $row->prod_disc?>"/>
    
      <div class="grid-list-wrapper">
        <div class = "product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image product-imageblock"> <a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');"> <img src="<?php echo base_url(); ?>/imageupload/<?php echo $row->prod_image;?>" alt="<?php echo $row->prod_name;?>" title="<?php echo $row->prod_name;?>" class="img-responsive" style="width: 220px;height:294px;"/> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" onclick="addtocart();">Add to Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"> <a style="cursor: pointer;" onclick="prodesc('<?php echo $row->prod_id;?>');" title="<?php echo $row->prod_name;?>"> <?php echo $row->prod_name;?></a> </h4>
              <p class="product-desc"> <?php echo $row->prod_descr;?></p>
              <p class="price product-price"><span class="price-old">$272.00</span> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
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
  </div>
</div>
</div>
 <script type="text/javascript">
      // $( document ).ready(function() {
       
      //     getbrand('list');

      // });

      function getbrand(gettype){

        
        var brand = '<?php echo $brandid;?>';
        
    
        // var mode = getmode;tab-latest
        var limits = $('#input-limit').val();
        var sorts = $('#input-sort').val();
         $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/brand/brands');?>/",
              data: {gettype:gettype,brand:brand,limits:limits,sorts:sorts}, // serializes the form's elements.
             success: function(data){
              $('.fillbrandlist').html(data);
              
                }

           });
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