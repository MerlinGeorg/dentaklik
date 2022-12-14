<!DOCTYPE html>
<html lang="en">
<head>
<title>Asly</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="online shop" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?php echo base_url(); ?>/templategrocery/image/logo.ico" type="image/x-icon"/>
<link href="<?php echo base_url(); ?>/templategrocery/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="<?php echo base_url(); ?>/templategrocery/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="<?php echo base_url(); ?>/templategrocery/css/stylesheet.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/templategrocery/css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/templategrocery/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<link href="<?php echo base_url(); ?>/templategrocery/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />
<!-- errorpagecss -->

<script src="<?php echo base_url(); ?>/templategrocery/javascript/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/templategrocery/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/templategrocery/javascript/jstree.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/templategrocery/javascript/template.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>/templategrocery/javascript/common.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/templategrocery/javascript/global.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/templategrocery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/templategrocery/javascript/notifygrocery.js"></script>

<link href="<?php echo base_url(); ?>/templategrocery/css/uismoothness.css" rel="stylesheet">
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
    var latss = sessionStorage.getItem("latit");
    var longss = sessionStorage.getItem('longt');
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
var currentlocation = sessionStorage.getItem("locates");

if(currentlocation == null){
  $('#myModal').modal({
    backdrop: 'static',
    keyboard: false  // to prevent closing with Esc button (if you want this too)
});  
}else{
  document.getElementById("fillocation").innerHTML =currentlocation.substring(0,63);
}

    var lats = sessionStorage.getItem("latit");
    var longs = sessionStorage.getItem('longt'); 
                
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
  

function doSearch(term) {
    var lats = sessionStorage.getItem("latit");
    var longs = sessionStorage.getItem('longt'); 
    window.location.href = '<?php echo base_url(); ?>index.php/searches?searchs=' + term +'&place1=' + lats +'&place2=' + longs ; 
}

  function addtocart(prodid,quatnity,price,prodcomm,prodtax,punid){
    $.ajax({
        
        method: "POST",
        url: "<?php echo base_url('index.php/cart/insertcart');?>/",
        data: {pid:prodid,quant:quatnity,price:price,prodcomm:prodcomm,prodtax:prodtax,punid:punid}, // serializes the form's elements.
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
    var lats1 = sessionStorage.getItem("latit");
    var longs1 = sessionStorage.getItem("longt");
    
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
  var lats2 = sessionStorage.getItem("latit");
    var longs2 = sessionStorage.getItem("longt");
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
<body>


<div id="myModal" class="modal fade ext" role="dialog" style="z-index: 10000">
  <div class="modal-dialog">

    <div class="modal-content  " style="background-color: #b7e874;">
      <div class="modal-header " >
     
        <h4 class="modal-title" >Select your location</h4>
      </div>
      <div class="modal-body" style="background-color: #b7e874;border-bottom-right-radius: 6px;border-bottom-left-radius: 6px">
        <input type="text" class="form-control" id="autocomplete">
     
      </div>
    </div>

  </div>
</div>
<div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="<?php echo base_url(); ?>/templategrocery/image/loader.gif"  alt="#"/></div>
<header>
 <input type="hidden" id="lat">
 <input type="hidden" id="lon">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
           <div id="top-links" class="nav pull-left">
                     <ul class="list-inline">
                <li><a style="cursor: pointer;" data-toggle="modal"  data-target="#myModal" id="wishlist-total" title="My Account"><i class="fa fa-map-marker"></i><span id="fillocation" style="text-overflow: ellipsis;"></span></a></li>

                <li>
                  <i class="fa fa-phone" aria-hidden="true">+91(000)1234-1234</i>
                </li>
              </ul>
         
          </div>
          <script type="text/javascript">
            var lats1 = sessionStorage.getItem("latit");
    var longs1 = sessionStorage.getItem('longt'); 
          </script>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">

                <li><a href="<?php echo base_url(); ?>index.php/login/myaccount" id="wishlist-total" title="My Account"><i class="fa fa-user"></i><span><?php if(isset($_SESSION['grocuname'])){?> My Account <?php }else{?> Login<?php }?></span><span></span></a></li>
                <?php if(isset($_SESSION['grocuname'])){?>
                  <li><a href="<?php echo base_url(); ?>index.php/login/logout" id="wishlist-total" title="Log Out"><i class="fa fa-sign-out"></i><span>Log Out</span><span></span></a></li>
                <?php }?>
               
                <li><a id="atagwishlist"   title="Wish List"><i class="fa fa-heart"></i><span>Wish List</span>(<span id="wishlisttotal"></span>)</a></li>
              </ul>

              <div id="cart" class="btn-group btn-block">
          <a id="atagcart" style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/cart" class="btn btn-inverse btn-block btn-lg "> <span id="cart-total"><span class="cart-title">Cart</span>
         <span id="cart-totalcount"></span> item(s)
        </span> </a>
         
        </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</header>
<nav id="menu" class="navbar">
  <div class="nav-inner container">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse ">
      <!-- fill one start -->
      <div style="display: flex">
<div class="">
          <div id="logo"> <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/templategrocery/image/logo.png" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
        </div>


<ul class="main-navigation" style="margin-left: 0;margin-right: 0;padding-right: 0;padding-left: 0">
    
    
       
        <li><a href="<?php echo base_url(); ?>"   class="parent"  >Home</a> </li>

       
         <li><a disabled="disabled" href="#"   class="parent"  >Categories</a>
         <ul class="categorynamefill"> </ul>
    </li>
        
        <li><a href="<?php echo base_url(); ?>Aboutus">Aboutus</a></li>
         
        <li><a href="<?php echo base_url(); ?>Contactus" >Contact Us</a> </li>
      </ul>

      <div class="search-container">
   
      <input class="ser-txt" type="text" id="searchtag" placeholder="Search.." name="search">
      <button class="ser-btn" type="submit"><i class="fa fa-search fa-20"></i></button>
    
  </div>

      </div>

    </div>
  </div>
</nav>



<!-- page content start -->
<?php $this->load->view($content);?>
<!-- page content end -->

<footer>
  <div class="container">
    <div class="row">
      <div class="footer-top-cms">
        <div class="col-sm-7">
          <div class="newslatter">
          
          </div>
        </div>
        <div class="col-sm-5">
          <div class="footer-social">
            <h5>Social</h5>
            <ul>
              <li class="facebook"><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook" ></i></a></li>
              <li class="linkedin"><a href="http://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li class="twitter"><a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li class="gplus"><a href="http://googleplus.com" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li class="youtube"><a href="http://youtube.com" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">Information</h5>
        <ul class="list-unstyled ul-wrapper">
        <li><a href="<?php echo base_url(); ?>index.php/login/myaccount">Login</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/Partnerus">Partner with us</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/Care_mail">Have any Greveiance?</a></li>
         <li><a href="<?php echo base_url(); ?>index.php/Terms_n_conditions">Conditions of Use & Sales</a></li>
         <li><a href="<?php echo base_url(); ?>index.php/Privacy_policy">Privacy Policy</a></li>
          <li><a href="<?php echo base_url();?>Aboutus">About Us</a></li>
          <li><a href="<?php echo base_url();?>Contactus">Contact Us</a></li>
        </ul>
      </div>


      <div class="col-sm-3 footer-block">
        <div class="content_footercms_right">
          <div class="footer-contact">
            <h5 class="contact-title footer-title">Contact Us</h5>
            <ul class="ul-wrapper">
              <li><i class="fa fa-map-marker"></i><span class="location2"> Nuevo Informatica Pvt Ltd,<br>
                Kakkanad, Kerala 682021<br>
                </span></li>
              <li><i class="fa fa-envelope"></i><span class="mail2"><a href="http://www.nuevoinformatica.com" target="_blank">nuevoinformatica.com</a></span></li>
              <li><i class="fa fa-mobile"></i><span class="phone2">+91 99995-66-11-00</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a id="scrollup">Scroll</a> </footer>
<div class="footer-bottom">
  <div class="container">
    <div class="copyright">Powered By &nbsp;<a class="yourstore" href="http://www.lionode.com/">nuevoinformatica &copy; 2019 </a> </div>
    <div class="footer-bottom-cms">
      <div class="footer-payment">
        <ul>
          <li class="mastero"><a href="#"><img alt="" src="<?php echo base_url(); ?>/templategrocery/image/payment/mastero.jpg"></a></li>
          <li class="visa"><a href="#"><img alt="" src="<?php echo base_url(); ?>/templategrocery/image/payment/visa.jpg"></a></li>
          <li class="currus"><a href="#"><img alt="" src="<?php echo base_url(); ?>/templategrocery/image/payment/currus.jpg"></a></li>
          <li class="discover"><a href="#"><img alt="" src="<?php echo base_url(); ?>/templategrocery/image/payment/discover.jpg"></a></li>
          <li class="bank"><a href="#"><img alt="" src="<?php echo base_url(); ?>/templategrocery/image/payment/bank.jpg"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

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

    var lt = $('#lat').val();
    var lg = $('#lon').val();

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


</body>
</html>
