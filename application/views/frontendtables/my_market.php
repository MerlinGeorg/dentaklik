 <aside class="col-md col-6 my_market">
          <h6 class="title">My Market</h6>
          <ul class="list-unstyled">
            <?php 
            foreach ($categorynames as $row){ 
            $catid = base64_encode($row->cat_id);
            $places1 = base64_encode("10.530345");
            $places2 = base64_encode("76.214729");
            ?>
            <li> <a href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $row->cat_name; ?></a></li>
          <?php } ?>
          </ul>
        </aside>