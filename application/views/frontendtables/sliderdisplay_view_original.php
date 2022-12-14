<?php 
if(!empty($sliders)){?>
<div  class="row owl-carousel  home-slider">
<?php foreach($sliders as $slider){

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
		      	}else{
			      		$links = '#';
			      	}?>
       <div class="item">
        	<a href="<?php echo base_url(); ?>index.php/<?php echo $links?>"><img src="<?php echo base_url(); ?>imageupload/<?php echo $slider->banner_slider_image;?>" alt="" class="img-responsive " style="width:100%;height:500px;"/></a> </div>
    <?php }}?>
</div>
</br>
    <?php }?>