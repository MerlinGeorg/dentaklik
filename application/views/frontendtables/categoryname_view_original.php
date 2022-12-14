<?php 

foreach ($categories as $row){

            $catid = base64_encode($row->cat_id);
            $places1 = base64_encode($latitsec);
            $places2 = base64_encode($longitsec);




       ;?>
  
      
            <li>
                <a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"   class="parent"  ><?php echo $row->cat_name; ?></a>
            <?php
               
             if(!empty($row->subs)){?>
                 <ul>
                <?php foreach($row->subs as $scategory){ 
                    $subid = base64_encode($scategory->sub_id);?>  
                    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $scategory->sub_name; ?></a></li>
            <?php 
                }?>
                </ul>
            <?php }?>
            </li>
        <!-- </ul> -->
        <?php }?>
      