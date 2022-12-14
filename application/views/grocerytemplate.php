<!DOCTYPE HTML>
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>B2peak</title>


<link rel="icon" href="<?php echo base_url(); ?>/front_end_assets/images/favicon.ico" type="image/x-icon"/>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/front_end_assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="<?php echo base_url(); ?>/front_end_assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>/front_end_assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="<?php echo base_url(); ?>/front_end_assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="<?php echo base_url(); ?>/front_end_assets/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>/front_end_assets/css/responsive.css" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="<?php echo base_url(); ?>/front_end_assets/js/script.js" type="text/javascript"></script>

<!-- custom style -->
<link href="<?php echo base_url(); ?>/front_end_assets/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>/front_end_assets/css/responsive.css" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="<?php echo base_url(); ?>/front_end_assets/js/script.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>/front_end_assets/css/marquee.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/front_end_assets/css/example.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/front_end_assets/js/marquee.js"></script>


    <script>
      $(function (){

        $('.simple-marquee-container').SimpleMarquee();
        
      });

    </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});


</script>








<script src="<?php echo base_url(); ?>/templategrocery/javascript/notifygrocery.js"></script>
<script src="<?php echo base_url(); ?>/templategrocery/javascript/jquery1.12.1-ui.min.js" type="text/javascript"></script>






  <script type="text/javascript">

  function notifygrocery($msg,$level){
    $('.notifyjs-corner').empty();
          return $.notify($msg, {
              position: 'top center',
              hideDuration: '5',
              showAnimation: 'fadeIn',
              hideAnimation: 'fadeOut',
              className: $level
            });
        }
      </script>
<style type="text/css">
  #ui-id-1{
    z-index: 9999;
  }
  .notifyjs-corner{
    z-index: 9999 !important;
  }
   .outofstock {
    display: inline-block;
    padding: 8px 17px;
    font-weight: 500;
    float: none;
    width: auto;
    color: #ffffff;
    margin: 0 2px;
    background-color: #ddd;
} 
.outofstockdesc {
    display: inline-block;
    padding: 6px 15px;
    font-weight: 500;
    float: none;
    width: auto;
    color: #ffffff;
    margin: 0 2px;
    background-color: #ddd;
} 
.outofstockwish {
    display: inline-block;
    padding: 6px 6px;
    font-weight: 500;
    float: none;
    width: auto;
    color: #ffffff;
    margin: 0 2px;
    background-color: #ddd;
} 

.changes::-webkit-input-placeholder {
    /* WebKit, Blink, Edge */
    color: black;
}
.changes:-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    color: black;
    opacity: 1;
}
.changes::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    color: black;
    opacity: 1;
}
.changes:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: black;
}


    
</style>

<script type="text/javascript">
  $( document ).ready(function() {
    // var latss = sessionStorage.getItem("latit");
    // var longss = sessionStorage.getItem('longt');
    var latss = "10.530345";
    var longss = "76.214729"; 
    my_market();
    $("#searchtag").autocomplete({
   source: function(request, response) {
    
        $.ajax({
            url: "<?php echo base_url('index.php/Home/search_product');?>/",
            method:'post',
            dataType: "json",
            data: {
                term : request.term,
                place1 : latss,
                place2 : longss
            },
            success: function(data) {
                response(data);
                
            }
        });
    }

});
    $('#searchtag').on('autocompleteselect', function (e, ui) {
            doSearch(ui.item.value);
          });
//var currentlocation = sessionStorage.getItem("locates");

// if(currentlocation == null){
//   $('#myModal').modal({
//     backdrop: 'static',
//     keyboard: false  // to prevent closing with Esc button (if you want this too)
// });  
// }else{
//   document.getElementById("fillocation").innerHTML =currentlocation.substring(0,63);
// }

    var lats = "10.530345";//sessionStorage.getItem("latit");
    var longs = "76.214729"; //sessionStorage.getItem('longt'); 
                
          $.ajax({
                 
                method: "POST",
                url: "<?php echo base_url('index.php/home/getcategories');?>/",
                 data: {latitsec:lats,longtsec:longs},
               success: function(data){
                $('.categorynamefill').html(data);
                }
             });
          countcart();
          countwishlist();
          $('#searchtag').on('autocompleteselect', function (e, ui) {
            doSearch(ui.item.value);
          });
      });
  

function my_market()
      {
        $.ajax({
              async: false,
              method: "POST",
              url: "<?php echo base_url('index.php/home/my_market');?>/",
              data: {}, // serializes the form's elements.
              success: function(data){
              $('.my_market').html(data);

                }
           });

      }
function doSearch(term) {
    // var lats = sessionStorage.getItem("latit");
    // var longs = sessionStorage.getItem('longt'); 
     var lats = "10.530345";
    var longs = "76.214729"; 
    window.location.href = '<?php echo base_url(); ?>index.php/searches?searchs=' + term +'&place1=' + lats +'&place2=' + longs ; 
}

  function addtocart(prodid,quatnity,price,prodcomm,prodtax,punid){

    var qty = document.getElementById("quantity").value;

    $.ajax({
        
        method: "POST",
        url: "<?php echo base_url('index.php/cart/insertcart');?>/",
        data: {pid:prodid,quant:qty,price:price,prodcomm:prodcomm,prodtax:prodtax,punid:punid}, // serializes the form's elements.
       success: function(data){
          if(data == 'success'){
            // alert('Item added to cart')
            notifygrocery('Item added to cart','success');
            countcart();
          }else{
            window.location.replace('<?php echo base_url();?>index.php/login');
           
          }
        }
     });
  }
  
  function addtowishlist(prodid){
    $.ajax({
         
        method: "POST",
        url: "<?php echo base_url('index.php/cart/insertwishlist');?>/",
        data: {pid:prodid}, // serializes the form's elements.
       success: function(data){
          if(data == 'success'){
          
            notifygrocery('Item added to wishlist','success');
            countwishlist();
          }else{
            window.location.replace('<?php echo base_url();?>index.php/login');
          }
        }
     });
  }
  function countwishlist(){
    // var lats1 = sessionStorage.getItem("latit");
    // var longs1 = sessionStorage.getItem("longt");
     var lats1 = "10.530345";
    var longs1 = "76.214729"; 
    
    var ll = "<?php echo base_url(); ?>index.php/wishlist?place1=" +lats1+ "&place2=" + longs1 + "";
     var res = encodeURI(ll);
   $("#atagwishlist").attr("href",res);
   $.ajax({
         
        method: "POST",
        url: "<?php echo base_url('index.php/cart/countwishlist');?>/",
        data: '', // serializes the form's elements.
       success: function(data){
          document.getElementById("wishlisttotal").innerHTML = data;

        }
     });
}
function countcart(){
  // var lats2 = sessionStorage.getItem("latit");
  //   var longs2 = sessionStorage.getItem("longt");
    var lats2 = "10.530345";
    var longs2 = "76.214729"; 
    var ll2 = "<?php echo base_url(); ?>index.php/cart?place1=" +lats2+ "&place2=" + longs2 + "";
     var res2 = encodeURI(ll2);
   $("#atagcart").attr("href",res2);
   $.ajax({
         
        method: "POST",
        url: "<?php echo base_url('index.php/cart/countcart');?>/",
        data: {place1:lats2,place2:longs2}, // serializes the form's elements.
       success: function(data){

          document.getElementById("cart-totalcount").innerHTML = data;
        }
     });
}


</script>
<style type="text/css">
  a:hover{
  color : #ef8829;
 }
.modal-backdrop {
    z-index: 1040 !important;
}
.modal-dialog {
    margin: 2px auto;
    z-index: 1100 !important;
}

.pac-container {
    z-index: 10000 !important;
}

</style>
</head>
<body style="background-color: #F2F3F7 !important;">

  

  <header class="section-header">
<section class="header-main border-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-2 col-lg-3 col-md-12">
        <a href="<?php echo base_url(); ?>/" class="brand-wrap">
          <img class="logo" src="<?php echo base_url(); ?>/front_end_assets/images/b2.png">
        </a> <!-- brand-wrap.// -->
      </div>
      <div class="col-xl-6 col-lg-5 col-md-6">
        <form action="#" class="search-header">
          <div class="input-group w-100" >
              <input type="text" class="form-control search" placeholder="Search" style="margin-left: 10px;" >
              
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i> Search
                </button>
              </div>
            </div>
        </form> <!-- search-wrap .end// -->
      </div> <!-- col.// -->
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="widgets-wrap float-md-right">
          <div class="widget-header mr-3">
            <a href="<?php echo base_url(); ?>index.php/login/myaccount" class="widget-view">
              <div class="icon-area">
                <i class="fa fa-user"></i>
                <!-- <span class="notify">3</span> -->
              </div>
              <small class="text"><?php if(isset($_SESSION['grocuname'])){?> My Account <?php }else{?>  Sign In <?php }?></small>
            </a>
          </div>
          <div class="widget-header mr-3">
            <a href="#" class="widget-view">
              <div class="icon-area">
                <i class="fa fa-comment-dots"></i>
                <span class="notify">1</span>
              </div>
              <small class="text"> Notification </small>
            </a>
          </div>
          <div class="widget-header mr-3">
            <a href="<?php echo base_url();?>index.php/orderhistory" class="widget-view">
              <div class="icon-area">
                <i class="fa fa-store"></i>
              </div>
              <small class="text"> Orders </small>
            </a>
          </div>
          <div class="widget-header">
            <a id="atagcart" href="<?php echo base_url(); ?>index.php/cart" class="widget-view">
              <div class="icon-area">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <small class="text"> Cart </small>
            </a>
          </div>
           <?php if(isset($_SESSION['grocuname'])){?>
           <div class="widget-header">
            <a id="atagcart" href="<?php echo base_url(); ?>index.php/login/logout" class="widget-view">
              <div class="icon-area">
                <i class="fas fa-sign-out-alt"></i>
              </div>
              <small class="text"> Log Out </small>
            </a>
          </div>
           <?php }?>
                 
               
        </div> <!-- widgets-wrap.// -->
      </div> <!-- col.// -->
    </div> <!-- row.// -->
  </div> <!-- container.// -->
</section> <!-- header-main .// -->


<div id="scrl-ser">
  <div class="container" style="padding-top:1rem;">
    <div class="row align-items-center">
      <div class="col-xl-2 col-lg-3 col-md-12">
        <!-- <a href="http://bootstrap-ecommerce.com/" class="brand-wrap">
          <img class="logo" src="images/logo.png">
        </a> brand-wrap.// -->
      </div>
      <div class="col-xl-6 col-lg-5 col-md-6">
        <form action="#" class="search-header">
          <div class="input-group w-100">
            <!-- <select class="custom-select border-right"  name="category_name">
                <option value="">Products</option>
            </select> -->
              <input type="text" class="form-control search" placeholder="Search" style="margin-left: 10px;">
              
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i> Search
                </button>
              </div>
            </div>
        </form> <!-- search-wrap .end// -->
      </div> <!-- col.// -->
      <div class="col-xl-4 col-lg-4 col-md-6">
      
      </div> <!-- col.// -->
    </div> <!-- row.// -->
  </div> <!-- container.// -->
  </div>


<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav categorynamefill">
      
       
      </ul>
      <ul class="navbar-nav ml-md-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Get the app</a>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com/" data-toggle="dropdown">English</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Arabic</a>
      
          </div>
        </li>
     </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
</header> <!-- section-header.// -->




<!-- page content start -->
<?php $this->load->view($content);?>
<!-- page content end -->






<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary" style="background-color: #445268!important; text-transform: capitalize!important;">
  <div class="container">
    <section class="footer-top padding-y-lg text-white">
      <div class="row">
        <aside class="col-md col-6 my_market">
        </aside>
        <aside class="col-md col-6">
          <h6 class="title">Company</h6>
          <ul class="list-unstyled">
            <li> <a href="<?php echo base_url(); ?>index.php/home/Aboutus">About Us</a></li>
            <li> <a href="<?php echo base_url(); ?>index.php/home/terms">Terms and Conditions</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
         <h6 class="title">Help</h6>
          <ul class="list-unstyled">
            <li> <a href="<?php echo base_url(); ?>index.php/home/Contactus">Contact Us</a></li>
             <li> <a href="<?php echo base_url(); ?>index.php/home/help">Help & Service</a></li>
            <li> <a href="#">Money Refund</a></li>
            <li> <a href="#">Order Status</a></li>
            <li> <a href="#">Shipping Info</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
          <h6 class="title">Account</h6>
          <ul class="list-unstyled">
            <li> <a href="<?php echo base_url(); ?>index.php/login/myaccount"> User Login </a></li>
            <li> <a href="<?php echo base_url(); ?>index.php/login/myaccount"> User Register </a></li>
            <li> <a href="<?php echo base_url(); ?>index.php/login/myaccount"> Account Setting </a></li>
            <li> <a href="<?php echo base_url();?>index.php/orderhistory"> My Orders </a></li>
          </ul>
        </aside>
        <aside class="col-md">
          <h6 class="title">Social</h6>
          <ul class="list-unstyled">
            <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
            <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
            <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
            <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
          </ul>
        </aside>
      </div> <!-- row.// -->
    </section>  <!-- footer-top.// -->

    <section class="footer-bottom text-center" style="border-top: 1px solid #445268!important;">
  
        <p class="text-white" ><a onMouseOver="this.style.color='#ff6a00'" onMouseOut="this.style.color='#FFF'" class="footer" href="<?php echo base_url();?>index.php/Privacy_policy" style="color: white;">Privacy Policy</a> - <a onMouseOver="this.style.color='#ff6a00'" onMouseOut="this.style.color='#FFF'"href="<?php echo base_url(); ?>index.php/Terms_n_conditions" style="color: white;">Terms of Use</a> - User Information Legal Enquiry Guide</p>
        <p class="text-muted"> &copy 2020
         <a onMouseOver="this.style.color='#ff6a00'" onMouseOut="this.style.color='#969696'" href="http://e4technosolutions.com/" target="_blank" style="color: #969696;">E4 Techno Solutions,</a> All rights reserved B2PEAK</p>
        <br>
    </section>
  </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->












<script src="<?php echo base_url(); ?>/templategrocery/javascript/parally.js"></script> 
<script>
$('.parallax').parally({offset: -40});
</script>


<script>

$("#autocomplete").change(function(){
    $('#myModal').modal('hide');
   
    
});

   function initAutocomplete() {

    var address = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(address);
    
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      // $('#fillocation').val(place.formatted_address);
      document.getElementById("fillocation").innerHTML = place.formatted_address.substring(0,63);
      sessionStorage.setItem("locates", place.formatted_address);
      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();
      document.getElementById('lat').value = latitude;
      document.getElementById('lon').value = longitude;
      
       sessionStorage.setItem("latit", latitude);
        sessionStorage.setItem("longt", longitude);
      getdistance();
    });
    
    
  }
  function getdistance(){

    // var lt = $('#lat').val();
    // var lg = $('#lon').val();
    var lt = "10.530345";
    var lg = "76.214729"; 

sessionStorage.setItem("latit", lt);
        sessionStorage.setItem("longt", lg);

     $.ajax({
            
             method: "POST",
             url: "<?php echo base_url('index.php/home/getdistance');?>/",
             data: {lt:lt,lg:lg}, // serializes the form's elements.
            success: function(data){
               console.log(data);
               window.location.replace('<?php echo base_url();?>');
            }
          });
  }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8aqinnrTK_cNIbvjhcM_XyEhOBD6v41o&libraries=places,geometry&callback=initAutocomplete"
                ></script>

<script>
  // When the user scrolls down 20px from the top of the document, slide down the scrl-ser
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrl-ser").style.top = "0";
    } else {
    document.getElementById("scrl-ser").style.top = "-60px";
    }
  }
  </script>

</body>
</html>



