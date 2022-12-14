<?php if(!empty($banners) ){

	$bancount = count($banners);
	// $colclass = 'col-md-4';
	// $colsubclass = 'cms-banner-left';
      
      	
      	if($bancount % 3 == 0){
      		$colclass = 'col-md-4';
      	}elseif($bancount % 2 == 0){
      		
      		$colclass = 'col-md-6';
      		
	      	
      	}elseif ($bancount == 1) {
      		$colclass = 'col-md-12';
      	}
      	
      	else
      		// (($bancount % 3 != 0 && $bancount > 1) || ($bancount % 2 != 0 && $bancount > 1))
      	{
      		$bancountprime = $bancount - 1;
      		$colclass = 'col-md-12';
      		 $offer = '&place3='.base64_encode($banners[$bancountprime]->banner_slider_offer);
	      		if($banners[$bancountprime]->banner_slider_category != 0 && $banners[$bancountprime]->banner_slider_subcategory == 0 && $banners[$bancountprime]->banner_slider_brand == 0){
		      		$cid = base64_encode($banners[$bancountprime]->banner_slider_category);
		      	 	$links = 'category?category='.$cid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($banners[$bancountprime]->banner_slider_subcategory != 0 && !empty($banners[$bancountprime]->sub_id)){
		      		$cidsub = base64_encode($banners[$bancountprime]->banner_slider_subcategory);
		      	 	$links = 'category?subcategory='.$cidsub.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else{
			      		$links = '#';
			      	
		      	if($banners[$bancountprime]->banner_slider_brand != 0 && !empty($banners[$bancountprime]->brand_id)){
		      		$bid = base64_encode($banners[$bancountprime]->banner_slider_brand);
		      	 	$links = 'category?brand='.$bid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else{
			      		$links = '#';
			      	}
			      }?>

	      		<div class="<?php echo $colclass;?> "> <a  href="<?php echo base_url(); ?>index.php/<?php echo $links?>"><img style="width: 100%;height: 430px;" alt="#" src="<?php echo base_url(); ?>imageupload/<?php echo $banners[$bancountprime]->banner_slider_image;?>"></a> </div>
      	<?php  if($bancountprime % 3 == 0){
      			$colclass = 'col-md-4';
      			for($i=0;$i<$bancountprime;$i++){
			      $offer = '&place3='.base64_encode($banners[$i]->banner_slider_offer);
			      	
					      	if($banners[$i]->banner_slider_category != 0 && $banners[$i]->banner_slider_subcategory == 0 && $banners[$i]->banner_slider_brand == 0 ){
					      		$cid = base64_encode($banners[$i]->banner_slider_category);

					      	 	$links = 'category?category='.$cid.'&place1='.$places1.'&place2='.$places2.$offer;
					      	}else
					      	if($banners[$i]->banner_slider_subcategory != 0 && !empty($banners[$i]->sub_id)){
					      		$cidsub = base64_encode($banners[$i]->banner_slider_subcategory);
					      	 	$links = 'category?subcategory='.$cidsub.'&place1='.$places1.'&place2='.$places2.$offer;
					      	}else
					      	if($banners[$i]->banner_slider_brand != 0 && !empty($banners[$i]->brand_id)){
					      		$bid = base64_encode($banners[$i]->banner_slider_brand);
					      	 	$links = 'category?brand='.$bid.'&place1='.$places1.'&place2='.$places2.$offer;
					      	}else{
					      		$links = '#';
					      	}
					      	// if(!empty($links)){
					      	?>
				     
					      <div class="<?php echo $colclass;?> "> <a  href="<?php echo base_url(); ?>index.php/<?php echo $links?>"><img  style="width: 100%;height: 430px;" alt="#" src="<?php echo base_url(); ?>imageupload/<?php echo $banners[$i]->banner_slider_image;?>"></a> </div>
				      <?php 
				  		// }
			  		}

	      	}else{
	      	if($bancountprime % 2 == 0){
	      		$colclass = 'col-md-6';
      		      for($i=0;$i<$bancountprime;$i++){
			      
			      $offer = '&place3='.base64_encode($banners[$i]->banner_slider_offer);
			      	
					      	if($banners[$i]->banner_slider_category != 0 && $banners[$i]->banner_slider_subcategory == 0 && $banners[$i]->banner_slider_brand == 0){
					      		$cid = base64_encode($banners[$i]->banner_slider_category);

					      	 	$links = 'category?category='.$cid.'&place1='.$places1.'&place2='.$places2.$offer;
					      	}else
					      	if($banners[$i]->banner_slider_subcategory != 0 && !empty($banners[$i]->sub_id)){
					      		$cidsub = base64_encode($banners[$i]->banner_slider_subcategory);
					      	 	$links = 'category?subcategory='.$cidsub.'&place1='.$places1.'&place2='.$places2.$offer;
					      	}else
					      	if($banners[$i]->banner_slider_brand != 0 && !empty($banners[$i]->brand_id)){
					      		$bid = base64_encode($banners[$i]->banner_slider_brand);
					      	 	$links = 'category?brand='.$bid.'&place1='.$places1.'&place2='.$places2.$offer;
					      	}else{
					      		$links = '#';
					      	}
					      	// if(!empty($links)){
					      	?>
				     
					      <div class="<?php echo $colclass;?> "> <a  href="<?php echo base_url(); ?>index.php/<?php echo $links?>"><img  style="width: 100%;height: 430px;" alt="#" src="<?php echo base_url(); ?>imageupload/<?php echo $banners[$i]->banner_slider_image;?>" ></a> </div>
				      <?php 
				  		// }
			  		}
	      	}
	      }
      	}
      
      }
      	?>
     
      

     <?php if(!empty($banners)){
      foreach($banners as $banner){
      	 $offer = '&place3='.base64_encode($banner->banner_slider_offer);
	      	if($bancount % 3 == 0 || $bancount % 2 == 0 || $bancount == 1){
	      	
		      	if($banner->banner_slider_category != 0 && $banner->banner_slider_subcategory == 0  && $banner->banner_slider_brand == 0){
		      		$cid = base64_encode($banner->banner_slider_category);
		      	 	$links = 'category?category='.$cid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($banner->banner_slider_subcategory != 0 && !empty($banner->sub_id)){
		      		$cidsub = base64_encode($banner->banner_slider_subcategory);
		      	 	$links = 'category?subcategory='.$cidsub.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else
		      	if($banner->banner_slider_brand != 0 && !empty($banner->brand_id)){
		      		$bid = base64_encode($banner->banner_slider_brand);
		      	 	$links = 'category?brand='.$bid.'&place1='.$places1.'&place2='.$places2.$offer;
		      	}else{
			      		$links = '#';
			      	}
		      	?>
	     
		      <div class="<?php echo $colclass;?> "> <a  href="<?php echo base_url(); ?>index.php/<?php echo $links?>"><img style="width: 100%;height: 430px;" alt="#" src="<?php echo base_url(); ?>imageupload/<?php echo $banner->banner_slider_image;?>"></a> </div>
	      <?php }
	  		
  		}
	}?>