
<div id = "fillproddesc">
<div class="container">
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/cart?place1=<?php echo $place1;?>&place2=<?php echo $place2;?>">Shopping Cart</a></li>
  </ul>
  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">
        <div class="column-block">
          <div class="columnblock-title">Categories</div>
<div class="category_block">
            <ul class="box-category treeview-list treeview">
          
          <?php 
    
foreach ($categoriesdesc as $rowdesc){
            $places1 = base64_encode($place1);
            $places2 = base64_encode($place2);
$catid = base64_encode($rowdesc->cat_id);

       ;?>
            <li><a class="activSub" href="<?php echo base_url(); ?>index.php/category?category=<?php echo $catid?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" ><?php echo $rowdesc->cat_name; ?></a>
            <?php
               
             if(!empty($rowdesc->subs)){?>
                 <ul>
                <?php foreach($rowdesc->subs as $scategory){ 
                    $subid = base64_encode($scategory->sub_id);?>  
                    <li><a href="<?php echo base_url(); ?>index.php/category?subcategory=<?php echo $subid;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><?php echo $scategory->sub_name; ?></a></li>
            <?php 
                }?>
                
              </ul>
            <?php }?>
             </li>
          <?php }?>
           </ul>
          </div>
        </div>

      </div>
    </div>


    <div class="col-sm-9 shoppingitemfill" id="content" >


    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
          getshoppingitems();
      });
  function getshoppingitems(){
    var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
    $.ajax({
                
                method: "POST",
                url: "<?php echo base_url('index.php/cart/getshoppingcartitems');?>/",
                data: {place1:latits,place2:longts}, // se
               success: function(data){
                // alert(data);
                $('.shoppingitemfill').html(data);
                }
             });
  }
  
  function deleteitemcart(id){
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/cart/deletcartitem');?>/",
      data:{cartid:id},
      success: function(data){
      if(data == 'success'){
          
           notifygrocery('item removed','success')
           getshoppingitems();
           countcart();
        }else{
          notifygrocery('item removed failed','danger')
        }
      }
     });
  }
  

</script>

