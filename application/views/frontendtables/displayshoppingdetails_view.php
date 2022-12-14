<div class="row">
<main class="col-md-9">
<div class="card">
<?php 
              $totalprice = 0;
              $totalactualprice = 0;
              $tax = 0;
              $totaldiscount = 0;

if(!empty($shopitems)){?>
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
            <?php 
              $totalprice = 0;
              $totalactualprice = 0;
              $tax = 0;
              $totaldiscount = 0;
              $chkstor= 'false';
              foreach($shopitems as $row){
                if (strpos($stids, $row->prod_store_id) !== false) {
                     $chkstor= 'true';

                }
                $id = base64_encode($row->prod_id);
                 $searchString = ',';
                    $prodimg = '';
                    if( strpos($row->prod_image, $searchString) !== false ) {
                        $eximage = explode(',', $row->prod_image);
                            $prodimg = $eximage[0];
                    } 
                    else{
                      $prodimg = $row->prod_image;
                    }?>
<tbody>
<tr>
  <td>
    <figure class="itemside">
      <div class="aside"><img src="<?php echo base_url(); ?>/imageupload/<?php echo $prodimg;?>" class="img-sm"></div>
      <figcaption class="info">
        <a href="<?php echo base_url();?>index.php/home/productsdetails?product=<?php echo $id;?>&place1=<?php echo $places1;?>&place2=<?php echo $places2?>" class="title text-dark"><?php echo $row->prod_name;?></a>
        <p class="text-muted small">Code: <?php echo $row->prod_code;?><br>
          <?php  if($row->brand_name != "")
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
    <select class="form-control quantity" id="qty" name="quantity" onchange="btnqty('<?php echo $row->cart_id;?>','<?php echo $row->cart_quantity;?>','<?php echo $row->cart_price; ?>','<?php echo $row->cart_tax ; ?>');">
      <option value="<?php echo $row->cart_quantity;?>"><?php echo $row->cart_quantity;?></option>
      <?php 
      for($i=1;$i<10;$i++)
      {
        if($i == $row->cart_quantity)
        {

        }
        else
        {
          ?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>  
      <?php
        }
      }
      ?> 
    </select> 
  </td>
  <td> 
    <div class="price-wrap"> 
    <?php if($row->prod_deactive == 1){
     ?>
    <var class="price">Out of stock</var> 
     <?php }
     else
     {
     $totalprice = $totalprice + ( $row->prod_sell_price * $row->cart_quantity) + ($row->prod_tax * $row->cart_quantity);
     $totalactualprice = $totalactualprice + ( $row->prod_rate * $row->cart_quantity) + ($row->prod_tax * $row->cart_quantity);
     $totaldiscount = $totalactualprice - $totalprice;
     $tax = $tax + ( $row->prod_tax * $row->cart_quantity);
     ?>
    <var class="price">KWD <?php echo number_format(($row->prod_sell_price * $row->cart_quantity) + ( $row->prod_tax * $row->cart_quantity),2,'.', '') ; ?></var> 
     <small class="text-muted">KWD <?php echo number_format(($row->prod_rate * $row->cart_quantity) + ( $row->prod_tax * $row->cart_quantity),2,'.', '') ; ?></small> 
     <?php
     } 
     ?>
      
   
    </div> <!-- price-wrap .// -->
  </td>
  <td class="text-right"> 
  <a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip" onclick="addtowishlist('<?php echo $row->prod_id?>');"> <i class="fa fa-heart"></i></a> 
  <a href="#" class="btn btn-light" onclick = "deleteitemcart('<?php echo $row->cart_id;?>')"> Remove</a>
  </td>
</tr>
 <?php }?>
</tbody>
</table>
 <?php }else{
       
      }?>

<div class="card-body border-top">
  <?php if(!empty($shopitems))
  {
    ?>
      <a href="<?php echo base_url(); ?>index.php/checkout" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
      <a href="<?php echo base_url(); ?>" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
    <?php 
    }
    else
    {
       echo "Your shopping cart is empty.";
      ?>

       <a href="<?php echo base_url(); ?>"  class="btn btn-primary float-md-right">Continue shopping <i class="fa fa-chevron-right"></i> </a>
    <?php 
    }
    ?>

  
</div>  
</div> <!-- card.// -->



<div class="alert alert-success mt-3">
  <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
</div>

  </main> <!-- col.// -->
  <aside class="col-md-3">
    <div class="card mb-3">
      <div class="card-body">
      <form>
        <div class="form-group">
          <label>Have coupon?</label>
          <div class="input-group">
            <input type="text" class="form-control" name="" placeholder="Coupon code">
            <span class="input-group-append"> 
              <button class="btn btn-primary">Apply</button>
            </span>
          </div>
        </div>
      </form>
      </div> <!-- card-body.// -->
    </div>  <!-- card .// -->
    <?php if(!empty($shopitems)){?>
    <div class="card">
      <div class="card-body">
          <dl class="dlist-align">
            <dt>Total price:</dt>
            <dd class="text-right">KWD <?php echo number_format($totalactualprice,2,'.', '') ; ?></dd>
          </dl>
          <dl class="dlist-align">
            <dt>Discount:</dt>
            <dd class="text-right">KWD <?php echo number_format($totaldiscount,2,'.', '') ; ?></dd>
          </dl>
          <dl class="dlist-align">
            <dt>Total:</dt>
            <dd class="text-right  h5"><strong>KWD <?php echo number_format($totalprice,2,'.', '') ; ?></strong></dd>
          </dl>
          <hr>
          <p class="text-center mb-3">
            <img src="<?php echo base_url(); ?>/front_end_assets/images/misc/payments.png" height="26">
          </p>
          
      </div> <!-- card-body.// -->
    </div>  <!-- card .// -->
  <?php 
    } 
  else
    {
    ?>
     <div class="card">
          <div class="card-body">
              <dl class="dlist-align">
                <dt>Total price:</dt>
                <dd class="text-right">KWD <?php echo number_format($totalactualprice,2,'.', '') ; ?></dd>
              </dl>
              <dl class="dlist-align">
                <dt>Discount:</dt>
                <dd class="text-right">KWD <?php echo number_format($totaldiscount,2,'.', '') ; ?></dd>
              </dl>
              <dl class="dlist-align">
                <dt>Total:</dt>
                <dd class="text-right  h5"><strong>KWD <?php echo number_format($totalprice,2,'.', '') ; ?></strong></dd>
              </dl>
              <hr>
              <p class="text-center mb-3">
                <img src="<?php echo base_url(); ?>/front_end_assets/images/misc/payments.png" height="26">
              </p>
              
          </div> <!-- card-body.// -->
        </div>  <!-- card .// -->

   <?php   
    }
    ?>
  </aside> <!-- col.// -->
</div>





















  <script type="text/javascript">
        
   // function btnplus(cartid,quant,totamnt,taxs){
    //  quant++;
      // $.ajax({        
      //       method: "POST",
      //       url: "<?php echo base_url('index.php/cart/updatecartitem');?>/",
      //        data:{cartid:cartid,quant:quant,totamnt:totamnt,taxs:taxs},
      //       success: function(data){
      //       if(data == 'success'){
      //            getshoppingitems();
      //         }
      //       }
      //      });
    // }
    // function btnmius(cartid,quant,totamnt,taxs){
    //   if(quant > 1){
    //     quant--;
        
    //     $.ajax({        
    //         method: "POST",
    //         url: "<?php echo base_url('index.php/cart/updatecartitem');?>/",
    //         data:{cartid:cartid,quant:quant,totamnt:totamnt,taxs:taxs},
    //         success: function(data){
    //         if(data == 'success'){
    //              getshoppingitems();
    //           }
    //         }
    //        });
    //   }
    // }

        function btnqty(cartid,quant,totamnt,taxs){

        var quant = document.getElementById("qty").value;  

      //  alert(quant);
     
        $.ajax({        
            method: "POST",
            url: "<?php echo base_url('index.php/cart/updatecartitem');?>/",
            data:{cartid:cartid,quant:quant,totamnt:totamnt,taxs:taxs},
            success: function(data){
            if(data == 'success'){
                 getshoppingitems();
              }
            }
           });
      }
    



  </script>