<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<link rel="icon" href="<?php echo base_url(); ?>/front_end_assets/images/favicon.ico" type="image/x-icon"/>

<style type="text/css">
	
	.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}


.btn-check {
  background-color: #fd8304;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  /*width: 100%;*/
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn-check:hover {
  background-color: #ffab10;
}


.in-logo{

	
    margin-right: 7px;
    
    max-height: 45px;
    display: inline-block;
}

</style>
</head>
<body>

  <!--    <?php print_r($payment_details); ?>
            <?php print_r($product_details); ?> -->

    <?php if($payment_details->payment_status == 1)
    {
    ?>

	<div class="container" style="margin: 70px auto;">
    <div class="row">
        <div class="col-xs-12">

    		<div class="invoice-title">
    			
    				<img class="in-logo pull-left" src="<?php echo base_url(); ?>/front_end_assets/images/b2.png">
    				
    			
            
                    <h4 class="alert alert-success pull-right" role="alert">
                     <i class="fa fa-check" aria-hidden="true"></i> Payment Successful...!!!
                    </h4>
                 
    		</div>

    		<h3 class="text-center">Invoice</h3>




    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				
    				<strong>Invoice no:</strong> # <?php echo $payment_details->payment_receipt_no;?><br>
    				<strong>Order Id:</strong> <?php echo $payment_details->payment_order_id;?><br>	
    				
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
                    <strong>Payment Id:</strong> <?php echo $payment_details->payment_payment_id; ?><br>
        			<strong>Transaction Id:</strong> <?php echo $payment_details->payment_transaction_id; ?>
                    <br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong>
    					<?php echo $payment_details->payment_pay_type; ?><br>
                        <strong>Email:</strong>
    					<?php echo $payment_details->user_name; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong>
    					 <?php echo date('Y-m-d'); ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                <?php
    							foreach ($product_details as $row)
                                {
                                    ?>
                               
    							<tr>
    								<td><?php echo $row->dc_prod_name; ?></td>
                                    <td class="text-center">KWD <?php echo number_format(($row->dc_prod_actualstoreprice / $row->dc_prod_quantity),3,'.', '');?></td>
    								<td class="text-center"><?php echo $row->dc_prod_quantity; ?></td>
                                    <td class="text-right">KWD <?php echo number_format($row->dc_prod_actualstoreprice,3,'.', ''); ?></td>
    							</tr>
                                <?php
                                    }
                                ?>
                              

    						<!-- 	<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$670.99</td>
    							</tr> -->
    						<!-- 	<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$15</td>
    							</tr> -->
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><br><strong>Total</strong></td>
    								<td class="thick-line text-right"><br><strong>KWD <?php echo number_format($payment_details->payment_amount,3,'.', ''); ?><strong></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>

    		<a href="<?php echo base_url(); ?>index.php/home"><button  class="btn-check pull-right"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> Go to store</button></a>
    	</div>
    </div>
</div>

<?php
 }

//payment failed start

else
 {
 ?>

<div class="container" style="margin: 70px auto;">
    <div class="row">
        <div class="col-xs-12">

            <div class="invoice-title">
                
                    <img class="in-logo pull-left" src="<?php echo base_url(); ?>/front_end_assets/images/b2.png">
                    
                
            
                    <h4 class="alert alert-danger pull-right" role="alert">
                     <i class="fa fa-check" aria-hidden="true"></i> Payment Failed...!!!
                    </h4>
                 
            </div>

            <h3 class="text-center">Invoice</h3>




            <hr>
            <div class="row">
                <div class="col-xs-6">
                    
                  <address>
                        <strong>Payment Method:</strong>
                        <?php echo $payment_details->payment_pay_type; ?><br>
                        <strong>Email:</strong>
                        <?php echo $payment_details->user_name; ?>
                    </address>
                    
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                     <strong>Payment Id:</strong> <?php echo $payment_details->payment_payment_id; ?><br>
                    <strong>Payment Track Id:</strong> <?php echo $payment_details->payment_track_id; ?><br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong>
                         <?php echo date('Y-m-d'); ?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
  

            <a href="<?php echo base_url(); ?>index.php/home"><button  class="btn-check pull-right"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> Go to store</button></a>
        </div>
    </div>
</div>




<?php
 }
 ?>




</body>
</html>