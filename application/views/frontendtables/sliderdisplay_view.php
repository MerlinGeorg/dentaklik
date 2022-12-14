<?php 
if(!empty($sliders)){?>
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
 <ol class="carousel-indicators">
	<?php 
	$i =0;
	foreach($sliders as $slider){

      if(!empty($slider->banner_slider_image)){
      	$offer = '&place3='.base64_encode($slider->banner_slider_offer);
      	if($slider->banner_slider_category != 0 && !empty($slider->cat_id)){
		      		$cid = base64_encode($slider->banner_slider_category);
		      	 	$links = 'category?category='.$cid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($slider->banner_slider_subcategory != 0 && !empty($slider->sub_id)){
		      		$cidsub = base64_encode($slider->banner_slider_subcategory);
		      	 	$links = 'category?subcategory='.$cidsub.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($slider->banner_slider_brand != 0 && !empty($slider->brand_id)){
		      		$bid = base64_encode($slider->banner_slider_brand);
		      	 	$links = 'category?brand='.$bid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}
		      	else
		      	{
			      	$links = '#';
			    }
	
		      	?>

    	<?php 
    	if($i == 0)
    	{
    		?>
    		<li data-target="#carousel1_indicator" data-slide-to="<?php echo $i;?>" class="active"></li>
    		<?php
    	}
    	else
    	{
    		?>
    		<li data-target="#carousel1_indicator" data-slide-to="<?php echo $i;?>"></li>
    		<?php
    	}
    	?>
    
   
    <?php }

     $i = $i+1;

} ?>
 </ol>
   
 <div class="carousel-inner">
<?php 
	$j =0;
	foreach($sliders as $slider){
		 if(!empty($slider->banner_slider_image)){
      	$offer = '&place3='.base64_encode($slider->banner_slider_offer);
      	if($slider->banner_slider_category != 0 && !empty($slider->cat_id)){
		      		$cid = base64_encode($slider->banner_slider_category);
		      	 	$links = 'category?category='.$cid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($slider->banner_slider_subcategory != 0 && !empty($slider->sub_id)){
		      		$cidsub = base64_encode($slider->banner_slider_subcategory);
		      	 	$links = 'category?subcategory='.$cidsub.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($slider->banner_slider_brand != 0 && !empty($slider->brand_id)){
		      		$bid = base64_encode($slider->banner_slider_brand);
		      	 	$links = 'category?brand='.$bid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}
		      	else
		      	{
			      	$links = '#';
			    }
	
		      	?>


    	<?php
    	if($j == 0)
    	{
    		?>
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>imageupload/<?php echo $slider->banner_slider_image;?>" alt="First slide"> 
    </div>
    	<?php
    	}
    	else
    	{
    		?>

    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>imageupload/<?php echo $slider->banner_slider_image;?>" alt="First slide"> 
    </div>

    	<?php
    	}
    	?>
    
     <?php }

     $j = $j+1;

} ?>

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

     <?php }?>