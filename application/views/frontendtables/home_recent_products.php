 <!-- <?php print_r($recent_product); ?> -->
 <?php  
 $places1 = base64_encode("10.530345");
 $places2 = base64_encode("76.214729");
 ?>
      <aside class="special-home-right">
        <h6 class="bg-blue text-center text-white mb-0 p-2">Recent Products</h6>

          <?php foreach($recent_product as $row){ 

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
        
        <div class="card-banner border-bottom">
          <div class="py-3" style="width:70%">
          <h6 class="card-title"><?php echo $row->prod_name;?></h6>
          <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo  $places1;?>&place2=<?php echo $places2;?>" class="btn btn-secondary btn-sm"> View more  </a>
          </div> 
          <img style="width: 25%;" src="<?php echo base_url(); ?>imageupload/<?php echo $prodimg;?>" height="80" class="img-bg">
        </div>

        <?php
        }
        ?>
  
      </aside>


  