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