 <div class="menu__toggle"><span>  SHOP  <i class="fa fa-caret-down" aria-hidden="true"></i></span></div>
                        <div class="menu__content">
                         <ul class="menu--dropdown">
                               <div class="mega-menu">
                                     <div class="mega-menu__column">

<div class="row"> 

<?php 

// $rowcount = num_rows($tabproducts);
//  echo $rowcount; 
   foreach($tabproducts as $row){
            $catid = base64_encode($row->cat_id);
            // $categoryname = $row->cat_name;

            

 ?>              
                                          
<div class="col-md-6">
           <h4><?php echo $row->cat_name; ?></h4>
<ul class="mega-menu__list">

<?php foreach($row->subs as $scategory){ 
$subid = base64_encode($scategory->sub_id); ?>

 <li class="current-menu-item "><a href="<?php echo base_url(); ?>index.php/Shope_products?scid=<?php echo $subid ?>"><?php echo $scategory->sub_name; ?></a></li>
   
   <?php } ?>

</ul>
</div> 


<?php } ?>

</div>                                       
                                        </div>
                                                     
                                        
                                        
                                    </div>
                                
                                
                            </ul>  
                        </div>