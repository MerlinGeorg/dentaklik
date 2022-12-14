
<?php 
$i=0;
foreach ($categories as $row){

            $catid = base64_encode($row->cat_id);
            $places1 = base64_encode($latitsec);
            $places2 = base64_encode($longitsec);
            $categoryname = $row->cat_name;
            ?>

<?php
if($categoryname == "Deals and offers" || $categoryname == "Recommended items")
{

}
else
{            
if(!empty($row->subs)){?>
  <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"> 
            <?php if($i ==0)
            {
                ?>
            <i class="fa fa-bars text-muted mr-2"></i> 
                <?php
            }
            ?>
            <?php echo $row->cat_name; ?> </a>
          <div class="dropdown-menu">
             <?php foreach($row->subs as $scategory){ 
              $subid = base64_encode($scategory->sub_id);?>  
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $scategory->sub_name; ?></a>
            <?php
            }
            ?>
          </div>
        </li>
<?php
}
else
{
?>

        <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>">
            <?php if($i ==0)
            {
                ?>
            <i class="fa fa-bars text-muted mr-2"></i> 
                <?php
            }
            ?>
            <?php echo $row->cat_name; ?> </a>
        </li>
<?php
}
}
?>

         
<?php 
$i= $i+1;
}?>