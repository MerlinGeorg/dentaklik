<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

    <?php 
    
foreach ($categoriesdesc as $rowdesc){
            $places1 = base64_encode($place1);
            $places2 = base64_encode($place2);
$catid = base64_encode($rowdesc->cat_id);
 }?>

 <!-- load the cart content -->
  <div class="shoppingitemfill" id="content" >
  </div>
 <!-- load the cart content -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<!-- <section class="section-name border-top padding-y">
<div class="container">
<h6>Payment and refund policy</h6>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>
</section> -->
<!-- ========================= SECTION  END// ========================= -->

   

   
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

