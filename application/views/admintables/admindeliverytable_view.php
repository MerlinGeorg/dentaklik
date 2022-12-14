<table class="table table-hover table-bordered  " id="tablefillcat">
<thead>
        <tr>
          <th>Customer OrderId</th>
          <th>Customer name</th>
          <th>Customer address</th>
          <th>Customer phone no.</th>
          <th>Orderd Date And Time</th>
          <?php if($_SESSION['adminusertp'] == 'admin'){?>
            <th>Vendor</th>
            <th>Delivery Date</th>
          <?php }?>
          <th>View</th>
          <th>Print</th>
          <th>Shipped</th>
          <th>Delivered</th>
        </tr>
      </thead>
      <tbody>

        <?php 
        foreach($tabledata as $delivrow){ ?> 
        <tr>
        <td> 
            <?php echo $delivrow->dc_order_id;?>
          </td>
         <td> 
            <?php echo $delivrow->user_displayname;?>
          </td>
           <td> 
            <?php 
            echo $delivrow->address_addr .'<br>';
             echo 'City : '.$delivrow->address_city .'<br>';
             echo 'Landmark : '.$delivrow->address_nearest_location .'<br>';
            echo 'Pincode : '.$delivrow->address_pincode.'<br>';
             echo 'Mobile : '.$delivrow->user_phone ;
            ?>
          </td>
       <td>
        <?php 
            echo $delivrow->user_phone ;?>
          </td>
       </td>
          <td>
            <?php 
            $date=date_create($delivrow->dc_date);
            echo date_format($date,"d-m-Y");?>
            <?php 
            $time=date_create($delivrow->dc_time);
            echo date_format($time,"h:ia");?>
          </td>
         <?php if($_SESSION['adminusertp'] == 'admin'){?>
            <td><?php if(!empty($delivrow->dboy)){
              $delivboy = $delivrow->dboy;
              echo $delivboy->user_displayname;
            }else{
              echo "B2PEAK";
            }?></td>
          <?php }?> 
           <?php if($_SESSION['adminusertp'] == 'admin'){?>
            <td><?php if( $delivrow->dc_delivery_date != '0000-00-00'){
              $deldate=date_create($delivrow->dc_delivery_date);
              echo date_format($deldate,"d-m-Y");
            }else{
              echo "N/A";
            }?></td>
          <?php }?> 
          <td>
            <center>
              <button class="btn btn-primary btn-xs" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#trackermodal"  onclick="viewdelivery('<?php echo $delivrow->dc_order_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>');"><i class="icon ion-eye" ></i></button>
              
              </center>   
          </td>
          <td>
            <center>
          
              <button class="btn btn-primary btn-xs"   onclick="invoice('<?php echo $delivrow->dc_order_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>');"><i class="icon ion-printer"></i></button>
              
              </center>   
          </td>
          
          <td>
          <center>
            <?php if($delivrow->order_status == 0){ ?>
                <button class="btn btn-danger btn-xs" onclick="shippedstatus('<?php echo $delivrow->dc_user_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>','<?php echo $delivrow->user_displayname;?>','<?php echo $delivrow->dc_order_id;?>');">no</button>   
              <?php  }
              else{
                ?>
                <button class="btn btn-success btn-xs" >yes</button>
              <?php } ?>
              
              </center>  
          </td>
          <td>
          <center>
            <?php if($delivrow->dc_status == 0){ ?>
                <button class="btn btn-danger btn-xs" onclick="deliverystatus('<?php echo $delivrow->dc_user_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>','<?php echo $delivrow->user_displayname;?>','<?php echo $delivrow->dc_order_id;?>');">no</button>
              <?php  }else{?>
                <button class="btn btn-success btn-xs" >yes</button>
              <?php } ?>
              
              </center>  
          </td>
       </tr>
        <?php 
          }?>
  </tbody>
</table>




