<?php if(!empty($orderdetails))
{
?>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">
<div class="row">
  <main class="col-md-12">
<div class="card">

   <?php 
          $totalprice = 0;
          $tax = 0;
          
          foreach($orderdetails as $kk=>$row){
           $grandtotal = 0;
          
          $delivcharg = 0; 
            
            ?>
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">  Order id : <?php echo $row->dc_order_id;?></th>
  <th scope="col" width="200">Date</th>
  <th scope="col" width="200">Quantity</th>
  <th scope="col" width="200">Price</th>
  <th scope="col"  width="200">Status</th>
</tr>
</thead>
<tbody>
                 <?php
                 foreach($row->allitems as $row){
                  if($row->order_status == 0 && $row->dc_cancel_order == 1){
                  }else{
                    if($row->order_status == 1 && $row->dc_cancel_order == 1)
                    {
                      $delivcharg = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                    }
                    else{
                        if($row->dc_cancel_order == 0 ){
                        $grandtotal = $grandtotal + $row->dc_prod_actualstoreprice ;
                        $delivcharg = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      }
                      


                      }
                    }  
                    
                   $id = base64_encode($row->cart_product_id);
                   $searchString = ',';
                      $prodimg = '';
                  if( strpos($row->dc_prod_image, $searchString) !== false ) {
                      $eximage = explode(',', $row->dc_prod_image);
                      $prodimg = $eximage[0];
                  } 
                  else{
                    $prodimg = $row->dc_prod_image;
                  }
                
                 ?>
<tr>
  <td>
    <figure class="itemside">
      <div class="aside"><a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>"><img src="<?php echo base_url(); ?>imageupload/<?php echo $prodimg;?>" class="img-sm"></a></div>
      <figcaption class="info">
        <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2;?>" class="title text-dark"><?php echo $row->dc_prod_name;?></a>
        <p class="text-muted small"><?php echo $row->dc_prod_measure;?> <br> 
          <?php if (!empty($row->brand_name))
          {
            ?>
            Brand: <?php echo $row->brand_name;?>
            <?php
          }
          ?>

          </p>
      </figcaption>
    </figure>
  </td>
   <td>
      <figcaption class="info">
   <?php 
                $date=date_create($row->dc_date);
                 $timeord=date_create($row->dc_time);
                echo '<b>Order Date : </b><br>'.date_format($date,"M j Y")." ".date_format($timeord,"g:i A");
                if( $row->order_status == 1){
                  $dateship=date_create($row->dc_shipped_date);
                  $timeship=date_create($row->dc_shipped_time);
                  echo '</br>'.'<b>Shipped Date :</b><br>'.date_format($dateship,"M j Y")." ".date_format($timeship,"g:i A"); 
                }
                if($row->dc_status == 1 && $row->order_status == 1 && $row->dc_cancel_order == 0){
                  $date2=date_create($row->dc_delivery_date);
                  $timedeliv=date_create($row->dc_delivery_time);
                  echo '</br>'.'<b>Delivery Date :</b><br>'.date_format($date2,"M j Y")." ".date_format($timedeliv,"g:i A"); 
                }
                ?>
       
    </figure>
  </td>
  <td> 
    <input type="text" style="width: 50%; text-align: center;" class="form-control quantity" size="1" value="<?php echo $row->dc_prod_quantity;?>" name="quantity"  disabled="disabled">
  </td>
  <td> 
    <div class="price-wrap"> 
      <var class="price"><?php 
              $totalprice = $row->dc_prod_commoffer;
              echo number_format($row->dc_prod_actualstoreprice , 2); ?></var> 
     <!--  <small class="text-muted"> $315.20 each </small>  -->
    </div> <!-- price-wrap .// -->
  </td>
 <?php if($row->dc_status == 0 && $row->order_status == 0 ){?>
               
<td>
     <div class="price-wrap"> 
      <var class="price">
        <?php if($row->dc_cancel_order == 0){?>
                 <p style="color: orange; text-transform: uppercase;  letter-spacing: 1px;">Ordered</p>
                <?php }else{?>
                  <p style="color: red; text-transform: uppercase; letter-spacing: 1px;">Cancelled</p>
                  <?php }?>
              <?php }?>
              <?php if($row->dc_status == 0 && $row->order_status == 1){?>
                <?php if($row->dc_cancel_order == 0){?>
                <p style="color: blue; text-transform: uppercase; letter-spacing: 1px;">Shipped</p>
                  <?php }else{?>
                    <p style="color: red; text-transform: uppercase; letter-spacing: 1px;">Cancelled</p>
                  <?php }?>
              <?php }?>
              <?php if($row->dc_status == 1 && $row->order_status == 1 && $row->dc_cancel_order == 0){?>
                 <p style="color: green; text-transform: uppercase; letter-spacing: 1px;">Delivered</p>
              <?php }?>
               <?php if($row->dc_status == 1 && $row->order_status == 1 && $row->dc_cancel_order == 1){?>
                 <p style="color: red; text-transform: uppercase; letter-spacing: 1px;">Cancelled</p>
              <?php }?>
              </var>
              </div>        
  </td>
</tr>
 <?php }?>

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><strong>Delivery Charge : </strong></td>
    <td><strong><?php echo "KWD ".number_format($delivcharg,2);?></strong></td>
</tr>

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><strong>Grand Total:</strong></td>
    <td><strong><?php echo "KWD ".number_format($grandtotal+$delivcharg,2);?></strong></td>
</tr>

</tbody>
</table>
<div class="border-top"></div>
<?php
}
?>

<div class="card-body">
  <a href="<?php echo base_url(); ?>" class="btn btn-primary float-md-right"> Continue shopping <i class="fa fa-chevron-right"></i> </a>
</div>  
</div> <!-- card.// -->


  </main> <!-- col.// -->
  
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<?php
}
?>





<script type="text/javascript">
 function cancelorder(id){
  var result = confirm("Are you sure you want to cancel order?");
if (result) {
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/Orderhistory/cancelorder');?>/",
      data:{id:id},
      success: function(data){
      if(data == 'success'){
          
           notifygrocery('item cancelled','success')
           orderhistory();
           // getshoppingitems();
           
        }else{
          notifygrocery('item cancelled failed','danger')
        }
      }
     });
   }
  }
  function orderhistory(){
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/Orderhistory/orderhistorydisplay');?>/",
      data:{places1:'<?php echo $places1;?>',places2:'<?php echo $places2;?>'},
      success: function(data){
     
           $('.orderhistoryfill').html(data);     
       }
   
     });
  }
</script>


