
<div id = "fillproddesc">
<div class="container" style="margin: 20px;">

      </div>
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-9 shoppingitemfill" id="content" style="margin: 20px;">

    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
          getwishlistitems();
      });
  function getwishlistitems(){
    var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
    $.ajax({
                
                method: "POST",
                url: "<?php echo base_url('index.php/wishlist/getwishlistitems');?>/",
                data: {place1:latits,place2:longts}, // se
               success: function(data){
                // alert(data);
                $('.shoppingitemfill').html(data);
                }
             });
  }
  
  function deletewishlist(id){
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/wishlist/deletewishlist');?>/",
      data:{wishid:id},
      success: function(data){
      if(data == 'success'){
    
           notifygrocery('item removed','success');
           getwishlistitems();
           countwishlist();
        }else{
           notifygrocery('item removed failed','success')
        }
      }
     });
  }
  

</script>

