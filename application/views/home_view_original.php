<style type="text/css">
  
</style>
<!-- page content start -->
<div id="fillproddesc">
<div class="mainbanner sliderfill">
</div>
<div class="container" style="margin-top: -60px;">
  
  <div class="row">
    <div id="content" class="col-sm-12">
      <div class="customtab">
        <div id="tabs" class="customtab-wrapper">
          <ul class='customtab-inner'>
            <li class='tab'><a  style="cursor: pointer;" onclick="tabsortproducts('tab-latest');">Categories</a></li>
          
          </ul>

        </div>

        <div class="tabsortfill"></div>
        <div class=" bannerfill">
    </div>
        <div class=" productautomaticfil"> 
          
        </div>
       
    </br>
    </br>
     
    </div>
  </div>
</div>
<!-- page total close to fill -->
</div>
<link href="<?php echo base_url(); ?>/templategrocery/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<script src="<?php echo base_url(); ?>/templategrocery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>/templategrocery/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />

 <script type="text/javascript">

      $( document ).ready(function() {
        $('.owl-carousel').owlCarousel();
          var mode = 'tab-latest';
          tabsortproducts(mode);
          automaticproducts();
          getbanners();
          getsliders();
          
      });
      function automaticproducts(){
        var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
           $.ajax({
                 async: false,
                method: "POST",
                url: "<?php echo base_url('index.php/home/getcategoryautoproducts');?>/",
                data: {latits:latits,longts:longts}, // serializes the form's elements.
               success: function(data){
                $('.productautomaticfil').html(data);

                $(".autoslide").owlCarousel({
                  items: 4,
                  autoPlay : 5000,
                  navigation: true,
                  pagination : false,
                  stopOnHover : true,
                  navigationText: ["",""]
                });
               
              }

             });
      }
        function getbanners(){
            var latits = sessionStorage.getItem("latit");
            var longts = sessionStorage.getItem("longt");
         $.ajax({
               async: false,
              method: "POST",
              url: "<?php echo base_url('index.php/home/getbanners');?>/",
              data: {latits:latits,longts:longts}, // serializes the form's elements.
             success: function(data){
              $('.bannerfill').html(data);

                }
           });
        }
        
        function getsliders(){
            var latits = sessionStorage.getItem("latit");
            var longts = sessionStorage.getItem("longt");
         $.ajax({
               async: false,
              method: "POST",
              url: "<?php echo base_url('index.php/home/getsliders');?>/",
              data: {latits:latits,longts:longts}, // serializes the form's elements.
             success: function(data){
        
              $('.sliderfill').html(data);
              $(".home-slider").owlCarousel({
                  items: 1,
                  Nav : true,
                  autoPlay : 5000,
                  stopOnHover : true,
                  responsive : true,
                  itemsDesktop : [1199,1],
                  itemsDesktopSmall : [980,1],
                  itemsTablet: [768,1],
                  itemsMobile : [479,1]
                  
                });
              
                }
           });
        }
      function getweeklytopproducts(){
        var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
           $.ajax({
                 async: false,
                method: "POST",
                url: "<?php echo base_url('index.php/home/getproducts');?>/",
                data: {latits:latits,longts:longts}, // serializes the form's elements.
               success: function(data){
                $('.productdatafill').html(data);

   
                $("#Weekly-slider").owlCarousel({
                  items: 4,
                  autoPlay : 5000,
                  navigation: true,
                  pagination : false,
                  stopOnHover : true,
                  navigationText: ["",""]
                });
                
                  }

             });
      }
      
      function tabsortproducts(mode){
        var latits = sessionStorage.getItem("latit");
         var longts = sessionStorage.getItem("longt");
       
           $.ajax({
                 async: false,
                method: "POST",
                url: "<?php echo base_url('index.php/home/tabsortproducts');?>/",
                data: {mode:mode,latits:latits,longts:longts}, // serializes the form's elements.
               success: function(data){
                $('.tabsortfill').html(data);
               
                $(".product-slider").owlCarousel({
                  items: 4,
                  autoPlay : 5000,
                  navigation: true,
                  pagination : false,
                  stopOnHover : true,
                  navigationText: ["",""]
                });
               }

             });
      }
   

            function prodesc(id){
              

              $.ajax({
                       async: false,
                      method: "POST",
                      url: "<?php echo base_url('index.php/home/getproductsdetails');?>/",
                      data: {id:id}, // serializes the form's elements.
                     success: function(data){
                      
                    $('#fillproddesc').html(data);
                   
                    $(".rst").owlCarousel({
                        margin:10,
                        loop:true,
                        
                        items:4,
                        margin:0,
                        width:0
                     });
                    

                        }

                   });
            }
           
            function imagefill(id,name){
              var data = '<a class="thumbnail"  title="'+name+'"><img src="<?php echo base_url(); ?>/imageupload/'+id+'" title="'+name+'" alt="'+name+'" /></a>';
               $('.imagereachtofill').html(data);
        
            }

  
  </script>
