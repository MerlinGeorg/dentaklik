 <li class="nav-item dropdown dropbtn">
     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="show_category"> 
            <i class="fa fa-bars text-muted mr-2"></i> 
             Categories</a>
             <div class="dropdown-menu dropdown-content" id="category_menu">

<?php 
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
?>
          
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $row->cat_name; ?>
            </a>
            
         
       

<?php
}
}
?>
 </div>
 </li>
 <li class="nav-item">
     <a class="nav-link"  href="<?php echo base_url(); ?>index.php/home/Aboutus"> 
             About Us</a>
    </li>

    <!--  <li class="nav-item dropdown dropbtn">
     <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="show_service" href="#"> 
             Services</a>
               <div class="dropdown-menu dropdown-content" id="display_service">
                 <a class="dropdown-item" href="#request">Submit RSQ
            </a>
           </div>
    </li> -->

     <li class="nav-item">
     <a class="nav-link" href="<?php echo base_url(); ?>index.php/home/Contactus"> 
             Contact Us</a>
    </li>

    <li class="nav-item">
     <a class="nav-link"  href="<?php echo base_url(); ?>index.php/home/terms"> 
             Terms and Conditions</a>
    </li>

    <li class="nav-item">
     <a class="nav-link"  href="<?php echo base_url(); ?>index.php/home/help"> 
             Help & Service</a>
    </li>


 <!-- <script type="text/javascript">
 $("#show_category").mouseover(function(){
    setTimeout(function(){
    $('#category_menu').attr("class", "dropdown-menu show");
    },0);
 });
  $("#show_service").mouseover(function(){
    setTimeout(function(){
    $('#display_service').attr("class", "dropdown-menu show");
    },0);
 });
   $("#show_category").mouseleave(function(){
    setTimeout(function(){
    $('#category_menu').attr("class", "dropdown-menu hide");
    },0);
 });
   $("#show_service").mouseleave(function(){
    setTimeout(function(){
    $('#display_service').attr("class", "dropdown-menu hide");
    },0);
 });
 $("#show_category").mouseout(function(){
    setTimeout(function(){
    $('#category_menu').attr("class", "dropdown-menu hide");
    },0);
 });
   $("#show_service").mouseout(function(){
    setTimeout(function(){
    $('#display_service').attr("class", "dropdown-menu hide");
    },0);
 });

</script> -->

<style>


.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>