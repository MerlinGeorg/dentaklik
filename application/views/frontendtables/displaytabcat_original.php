
<div  class="tab-content" style="margin-bottom: 20px">
          <div class="box">
            <div  class="row owl-carousel product-slider">
            	<?php 
              

            $places1 = base64_encode($places_a);
            $places2 = base64_encode($places_b);

              foreach($tabproducts as $row){

          $catid = base64_encode($row->cat_id);
            
                ?>
             
               
                   
              <div class="item" >
                <div class="product-thumb transition" style="margin:0 10px;">
                  <div class="<?php echo base_url(); ?>/templategrocery/image product-imageblock"> <a style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"  ><img style="height: 300px" src="<?php echo base_url(); ?>/imageupload/<?php echo $row->cat_image;?>" alt="<?php echo $row->cat_name;?>" title="<?php echo $row->cat_name;?>" class="img-responsive homeimage" /> </a>
                    
                  </div>
                  <div class="caption product-detail" style="border-top: 1px solid black;background: linear-gradient(180deg, rgb(125, 180, 50) 100%, rgb(141, 196, 69) 0%);opacity:0.9;height: 50px;text-align: center;border-radius: 5px">
                    <h1 style="margin: 10px 0 5px"><a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" title="<?php echo $row->cat_name;?>"><?php echo $row->cat_name;?></a></h1>
                   <!--  <p class="price product-price"><?php 
                         echo "Rs.".$row->prod_disc_price;
                        ?><?php if($row->prod_disc != 0){ ?><span class="price-old"><?php echo $row->prod_addedcomm; ?></span><?php }?> -->
                
                  </div>
                  <div class="button-group">
                    <!-- <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button> -->
                    <!-- <button type="button" class="addtocart-btn" onclick="addtocart('<?php echo $row->prod_id?>','1','<?php echo $row->prod_disc_price?>','<?php echo $row->prod_disc?>','<?php echo $row->prod_unique_id?>');" >Add To Cart</button> -->
                    <!-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button> -->
                  </div>
                </div>
              </div>
            	<?php }?>

            </div>
          </div>
        </div>