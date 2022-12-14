<!DOCTYPE html>
<html lang="en-us">
  <head>
    <!-- Web config-->

    <!-- TABLE OF CONTENTS.
    Use search to find needed section.
    ===================================================================
    | 01. #CSS               | All CSS links and file paths           |
    | 02. #FAVICONS          | Favicon icon, app icons                |
    | 03. #BODY              | Body tag                               |
    | 04. #SIDEMENU          | Dashboard panel & left navigation      |
    | 05. #MAIN              | Dashboard right wrapper                |
    | 06. #VIEW              | Dashboard right wrapper inner wrapper  |
    | 07. #TOP               | Top header navigation                  |
    | 08. #TOP NAV           | Top header right navigation            |
    ===================================================================
    
    -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>B2peak</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

     <link rel="icon" href="<?php echo base_url(); ?>/front_end_assets/images/favicon.ico" type="image/x-icon"/>
    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    
    <!--
    link(rel='stylesheet' href='assets/stylesheets/ionicons.css')
    link(rel='stylesheet' href='assets/stylesheets/font-awesome.css')
    link(rel='stylesheet' href='assets/stylesheets/weather-icons.min.css')
    link(rel='stylesheet' href='assets/stylesheets/animate.css')
    link(rel='stylesheet' href='assets/stylesheets/glyphicon.css')
    
    -->

    <!--
    plugin
    link(rel='stylesheet' href='assets/stylesheets/plugin/bootstrap-table.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/nifty-modal.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.bootstrap-touchspin.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/select2.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/multi-select.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/ladda.min.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/daterangepicker.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.timepicker.css')
    link(rel="stylesheet" href="assets/stylesheets/plugin/jqvmap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-submenu.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/code.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.dataTables.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/dataTables.bootstrap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.gridster.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/summernote.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-markdown.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-select.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/asColorPicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-datepicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery-labelauty.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.carousel.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.theme.default.min.css")
    
    -->

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/demo.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick-theme.css"/>

     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/modernizr-custom.js"></script>

    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/respond.js"></script>
    <!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/lib/html5shiv.js"></script>
    <script src="assets/scripts/lib/respond.js"></script><![endif]-->
   
    <!-- Possible Classes
    ** Gradient style:
    * orchid
    * cadetblue
    * joomla
    * influenza
    * moss
    * mirage
    * stellar
    * servquick
    
    ** Flat style:
    * f-dark
    * f-dark-blue
    * f-blue
    * f-green
    
    ** Layout control
    * minibar
    * layout-drawer (changed the var on top)
    
    e.g
    <body class="moss layout-drawer">
    -->
  </head>
<style type="text/css">
  /*map searchbox start*/
     #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      /*html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }
*/
      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
         width: auto !important;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        /*background-color: #4d90fe;*/
        font-size: 25px;
        font-weight: 500;
        /*padding: 6px 12px;*/
      }
      .pac-item {
    width: inherit !important;
}
/*map searchbox end*/
</style>
  <body class="f-green stellar minibar" >

    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile">
              <div class="circle-box padding">
                <img src="<?php echo base_url(); ?>/templateadmin/assets/images/face/12.jpg" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b><?php echo strtoupper($_SESSION['admindisplay']);?></b><br><?php echo strtoupper($_SESSION['adminusertp']);?></div></li>
        </ul>
        
        <ul class="nav">
          
        
               
      <?php if($_SESSION['adminusertp'] == 'admin'){?>
        <li class="nav-item"><a class="nav-link"  href="<?php echo base_url();?>index.php/adminhome"><i class="icon ion-home"></i>
              <div class="menu-block-label">Home</div></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/admincategory"><i class="icon ion-network"></i>

              <div class="menu-block-label">Category management</div></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/adminsubcategory"><i class="icon ion-merge"></i>
              <div class="menu-block-label">Subcategory</div></a></li>
        
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/adminproducts"><i class="icon ion-outlet"></i>
              <div class="menu-block-label">Product management</div></a></li>
          <?php }?>
          
            <?php if($_SESSION['adminusertp'] == 'admin'){?> 
               <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Adminbrandmanage" ><i class="icon ion-ribbon-a"></i>
              <div class="menu-block-label">Brand Management</div></a></li>
        
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_store"><i class="icon ion-bag"></i>
              <div class="menu-block-label">Store Management</div></a></li>
          
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_bannerslide"><i class="icon ion-map"></i>
              <div class="menu-block-label">Banner/Slider</div></a></li>
           <?php }?>
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/user"><i class="icon ion-android-people"></i>
              <div class="menu-block-label">User management</div></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/admindelivery"><i class="icon ion-pizza"></i>
              <div class="menu-block-label">Delivery management</div></a></li>
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>

    </div>

    <!-- #MAIN-->
    <div class="main-wrapper">

      <!-- VIEW WRAPPER-->
      <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">
 
          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

            <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
            --><a class="topbar-wrapper-logo demo-logo" href="<?php echo base_url();?>Adminhome">Online Shop</a>
          </div>
          <!-- END NAV FOR MOBILE-->

          <!-- SEARCH-->
          <!-- <div class="topbar-wrapper-search">
            <form>
              <input class="form-control" type="search" placeholder="Search"><a class="topbar-togger topbar-togger-search js-close-search" href="#"><i class="icon ion-close"></i></a>
            </form>
          </div> -->
          <!-- END SEARCH-->

          <!-- TOP RIGHT MENU-->
          <ul class="nav navbar-nav topbar-wrapper-nav">
            <!-- <li class="nav-item"><a class="nav-link js-search-togger" href="#"><i class="icon ion-ios-search-strong"></i></a></li> -->

         
<!-- new one start -->
<li class="nav-item dropdown"><a class="nav-link" href="<?php echo base_url('index.php/admindelivery');?>"  aria-haspopup="true" aria-expanded="true" title="ORDERS"><i class="icon ion-android-notifications-none"></i><span class="badge badge-danger status" id="countbadge"></span></a>
            </li>
<!-- new one end -->
          
            <!-- <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="COLOR SWITCHER"><i class="icon ion-paintbucket"></i></a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="js-color-switcher demo-color-switcher">
                  <div class="dropdown-header">Flat</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="f-dark">
                      <div class="demo-skin-grid f-dark"></div></a><a class="list-inline-item" href="#" data-color="f-dark-blue">
                      <div class="demo-skin-grid f-dark-blue"></div></a><a class="list-inline-item" href="#" data-color="f-blue">
                      <div class="demo-skin-grid f-blue"></div></a><a class="list-inline-item" href="#" data-color="f-green">
                      <div class="demo-skin-grid f-green"></div></a><a class="list-inline-item" href="#" data-color="f-deep-taupe">
                      <div class="demo-skin-grid f-deep-taupe"></div></a>
                  </div>
                  <div class="dropdown-header">Gradient</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="orchid">
                      <div class="demo-skin-grid orchid"></div></a><a class="list-inline-item" href="#" data-color="cadetblue">
                      <div class="demo-skin-grid cadetblue"></div></a><a class="list-inline-item" href="#" data-color="joomla">
                      <div class="demo-skin-grid joomla"></div></a><a class="list-inline-item" href="#" data-color="influenza">
                      <div class="demo-skin-grid influenza"></div></a><a class="list-inline-item" href="#" data-color="moss">
                      <div class="demo-skin-grid moss"></div></a><a class="list-inline-item" href="#" data-color="mirage">
                      <div class="demo-skin-grid mirage"></div></a><a class="list-inline-item" href="#" data-color="stellar">
                      <div class="demo-skin-grid stellar"></div></a><a class="list-inline-item" href="#" data-color="servquick">
                      <div class="demo-skin-grid servquick"></div></a>
                  </div>
                </div>
              </div>
            </li> -->
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/adminlogin/adminlogout" title="LOGOUT"><i class="icon ion-android-exit"></i></a></li>
            <li class="nav-item"><a class="nav-link close-mobile-nav js-close-mobile-nav" href="#"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
          
          
        </div>
       <div id="preload">
            <ul class="loading">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
        <!-- <button class="btn btn-sm btn-primary m-b-1 js-top-center" type="button">top-center</button> -->
        <!--END TOP WRAPPER-->


        <!-- PAGE CONTENT HERE-->
     
        <?php $this->load->view($content);?>
  
        <!-- <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Dashboard<b>Online Shop</b></h4>
                  <div class="small text-muted">Make it Better</div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right">
                <div class="small text-muted m-b-1">Live Data</div><span data-plugin="peityBar" data-peity="{ &quot;fill&quot;: [&quot;#ccc&quot;], &quot;width&quot;: 50 }">0,3,6,5,2,3,7,3,5,2</span>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row panel-wrapper js-grid-wrapper">
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer"><a href="">
                <div class="widget widget-v bg-aqua">
                  <div class="w-main w-center bg-aqua-lighten"><i class="fa fa-download"></i></div>
                  <div class="w-section">
                    <div class="small">DOWNLOAD</div>
                    <div class="display-6">212 K</div>
                    <div class="small">+ 102 %</div>
                  </div>
                </div></a></div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid"><a href="">
                <div class="widget widget-v bg-primary">
                  <div class="w-main w-center bg-primary-lighten"><i class="fa fa-user"></i></div>
                  <div class="w-section">
                    <div class="small">USERS</div>
                    <div class="display-6">872 K</div>
                    <div class="small">- 2 %</div>
                  </div>
                </div></a></div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid"><a href="">
                <div class="widget widget-v bg-success">
                  <div class="w-main w-center bg-success-lighten"><i class="fa fa-shopping-cart"></i></div>
                  <div class="w-section">
                    <div class="small">ORDERS</div>
                    <div class="display-6">98 K</div>
                    <div class="small">+ 98 %</div>
                  </div>
                </div></a></div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid"><a href="">
                <div class="widget widget-v bg-warning">
                  <div class="w-main w-center bg-warning-lighten"><i class="fa fa-money"></i></div>
                  <div class="w-section">
                    <div class="small">PROFITS</div>
                    <div class="display-6">52.2 K</div>
                    <div class="small">+ 21 %</div>
                  </div>
                </div></a></div>
            <div class="col-xs-12 col-sm-6 js-grid">
              <div class="panel">
                <div class="list-group"><a class="list-group-item" href="#">Getting Started</a><a class="list-group-item" href="#">Bootstrap 4</a><a class="list-group-item" href="#">Build system</a><a class="list-group-item" href="#">Supported browsers</a></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 js-grid">
              <div class="panel">
                <div class="list-group"><a class="list-group-item" href="#">Community</a><a class="list-group-item" href="#">Suggested page</a><a class="list-group-item" href="#">Download AdminHero</a><a class="list-group-item" href="#">Other theme</a></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid">
              <div class="widget bg-dark"><a class="w-section w-center" style="background: url(assets/images/cd-1.jpg); background-size: cover;" href="#">
                  <div class="ion-ios-play fa-2x"></div>
                  <div class="w-pin-bottom-left small">465 watching now</div></a></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid">
              <div class="widget bg-dark"><a class="w-section w-center" style="background: url(assets/images/cd-2.jpg); background-size: cover;" href="#">
                  <div class="ion-ios-play fa-2x"></div>
                  <div class="w-pin-bottom-left small">465 watching now</div></a></div>
            </div>
            <div class="col-xs-12 col-md-6 js-grid">
              <div class="panel">
                <div class="image"><img class="img-fluid" src="<?php echo base_url(); ?>/templateadmin/assets/images/7.jpg" alt=""></div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>OrderDate</th>
                      <th>Region</th>
                      <th>Rep</th>
                      <th>Item</th>
                      <th>Units</th>
                    </tr>
                  </thead>
                  <tbody class="small">
                    <tr>
                      <td>1/6/2014</td>
                      <td>East</td>
                      <td>Jones</td>
                      <td>Pencil</td>
                      <td>95</td>
                    </tr>
                    <tr>
                      <td>1/6/2014</td>
                      <td>East</td>
                      <td>Jones</td>
                      <td>Pencil</td>
                      <td>95</td>
                    </tr>
                    <tr>
                      <td>2/9/2014</td>
                      <td>Central</td>
                      <td>Kivell</td>
                      <td>Binder</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td>2/26/2014</td>
                      <td>Central</td>
                      <td>Gill</td>
                      <td>Pen</td>
                      <td>27</td>
                    </tr>
                    <tr>
                      <td>3/15/2014</td>
                      <td>West</td>
                      <td>Sorvino</td>
                      <td>Pencil</td>
                      <td>56</td>
                    </tr>
                  </tbody>
                </table>
                <div class="bg-faded-darken p-a-1"><a class="btn btn-secondary" href="#">Download</a></div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 js-grid">
              <div class="panel">
                <div class="panel-body">
                  <div class="legend legend-inline" id="demo-bar-chart-legend"></div>
                  <canvas id="demo-bar-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 js-grid">
              <div class="widget widget-v">
                <div class="w-section w-main" style="background: url(assets/images/2.jpg); background-size: cover;">22</div>
                <div class="w-section">
                  <dl>
                    <dd><i class="fa fa-circle m-r-1 text-warning"></i>Meeting HK</dd>
                    <dd><i class="fa fa-money m-r-1 text-success"></i>Bank in</dd>
                  </dl>
                  <div class="w-pin-bottom-right"><a class="btn btn-sm btn-link">+ Add</a></div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 js-grid">
              <div class="widget">
                <div class="w-section">
                  <div class="media">
                    <div class="media-left"><img class="media-object" src="<?php echo base_url(); ?>/templateadmin/assets/images/face/0.jpg" alt="" width="60"></div>
                    <div class="media-body"><strong>Braydon Dominguez</strong>
                      <div class="small">bdominguez@netaddress.com</div>
                    </div>
                  </div>
                </div>
                <div class="w-section bg-faded">
                  <div class="row text-xs-center">
                    <div class="col-xs-4">
                      <div class="text-desc">Followers</div><b>1729</b>
                    </div>
                    <div class="col-xs-4">
                      <div class="text-desc">Following</div><b>212</b>
                    </div>
                    <div class="col-xs-4">
                      <div class="text-desc">Tweets</div><b>200</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 js-grid">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">Chat</div>
                </div>
                <div class="panel-body">
                  <div class="message-wrapper message-inbox">
                    <div class="message-wrapper-inner">
                      <div class="media">
                        <div class="media-left"><a class="circle-box" href=""><img src="<?php echo base_url(); ?>/templateadmin/assets/images/face/1.jpg" alt=""><span class="dot dot-online"></span></a></div>
                        <div class="media-body">
                          <div class="message-is">
                            <p>That did offers her took we to a had feedback not mostly than country.</p>
                          </div>
                        </div>
                      </div>
                      <div class="media owner">
                        <div class="media-left"><a class="circle-box" href=""><img src="<?php echo base_url(); ?>/templateadmin/assets/images/face/0.jpg" alt=""><span class="dot dot-online"></span></a></div>
                        <div class="media-body">
                          <div class="message-is">
                            <p>Phase it skyline is it prudently, can sense a another,</p>
                          </div>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left"><a class="circle-box" href=""><img src="<?php echo base_url(); ?>/templateadmin/assets/images/face/1.jpg" alt=""><span class="dot dot-online"></span></a></div>
                        <div class="media-body">
                          <div class="message-is">
                            <p>Counter. Derived his and watch than catch</p>
                          </div>
                        </div>
                      </div>
                      <div class="media owner">
                        <div class="media-left"><a class="circle-box" href=""><img src="<?php echo base_url(); ?>/templateadmin/assets/images/face/0.jpg" alt=""><span class="dot dot-online"></span></a></div>
                        <div class="media-body">
                          <div class="message-is">
                            <p>Phase it skyline is it prudently, can sense a another,</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <div class="form-group">
                        <input class="form-control" type="text">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <button class="btn btn-primary btn-block" type="button">SEND</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- END PAGE CONTENT-->

      <!-- </div> given from fill -->
      <!-- END VIEW WAPPER-->

    <!-- </div> given from fill -->
    <!-- END MAIN WRAPPER-->


    <!-- WEB PERLOAD-->
    <!-- <div id="preload">
      <ul class="loading">
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div> -->





    <!-- Lib-->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/tether.min.js"></script>


    <!-- Bootstrap js-->
    <!-- script(src="assets/bootstrap/js/bootstrap.min.js")-->

    <!-- Cookie js-->
    <!-- script(src="assets/scripts/plugins/js.cookie.js")-->

    <!-- Moment: Full featured date library for parsing, validating, manipulating, and formatting dates.-->
    <!-- script(src="assets/scripts/plugins/moment.min.js")-->

    <!-- Fastclick: Polyfill to remove click delays on browsers with touch UIs.-->
    <!-- script(src="assets/scripts/plugins/fastclick.js")-->

    <!-- Masonry: Grid layout library.-->
    <!-- script(src="assets/scripts/plugins/masonry.pkgd.min.js")-->

    <!-- Peity: is a simple jQuery plugin that converts an element's content into a simple <svg>.-->
    <!-- script(src="assets/scripts/plugins/jquery.peity.min.js")-->

    <!-- imagesloaded: Detect when images have been loaded.-->
    <!-- script(src="assets/scripts/plugins/imagesloaded.pkgd.js")-->

    <!-- MatchHeight: A responsive equal heights-->
    <!-- script(src="assets/scripts/plugins/jquery.matchHeight.js")-->

    <!-- Select2: JQuery based replacement for select boxes-->
    <!-- script(src="assets/scripts/plugins/select2.full.min.js")-->

    <!-- jQuery multiselect: jQuery plugin which is a drop-in replacement for the standard <select> element-->
    <!-- script(src="assets/scripts/plugins/jquery.multi-select.js")-->

    <!-- Bootstrap-tagsinput: jQuery tags input plugin based on Twitter Bootstrap.-->
    <!-- script(src="assets/scripts/plugins/bootstrap-tagsinput.js")-->

    <!-- Bootstrap-maxlength: Display the maximum lenght of the field-->
    <!-- script(src="assets/scripts/plugins/bootstrap-maxlength.min.js")-->

    <!-- Chartjs: Simple HTML5 Charts using the canvas element-->
    <!-- script(src="assets/scripts/plugins/Chart.min.js")-->
    <!-- script(src="assets/scripts/plugins/Chart.config.js")-->

    <!-- Bootstrap-touchspin: A mobile and touch friendly input spinner component for Bootstrap 3.-->
    <!-- script(src="assets/scripts/plugins/jquery.bootstrap-touchspin.min.js")-->

    <!-- Date Range Picker: A JavaScript component for choosing date ranges.-->
    <!-- script(src="assets/scripts/plugins/daterangepicker.js")-->

    <!-- jquery.timepicker: A lightweight, customizable javascript timepicker plugin.-->
    <!-- script(src="assets/scripts/plugins/jquery.timepicker.js")-->

    <!-- Bootstrap-submenu-->
    <!-- script(src="assets/scripts/plugins/bootstrap-submenu.js")-->

    <!-- Prismjs: Code syntax highlighting library-->
    <!-- script(src="assets/scripts/plugins/prism.js")-->

    <!-- bootstrap-table: An extended Bootstrap table-->
    <!-- script(src="assets/scripts/plugins/bootstrap-table.min.js")-->

    <!-- Grid layout-->
    <!-- script(src="assets/scripts/plugins/jquery.gridster.js")-->

    <!-- super simple slider-->
    <!-- script(src="assets/scripts/plugins/sss.min.js")-->

    <!-- Easy-pie-chart: Lightweight  pie charts-->
    <!-- script(src="assets/scripts/plugins/jquery.easypiechart.min.js")-->

    <!-- Summernote: Lightweight html5 editor-->
    <!-- script(src="assets/scripts/plugins/summernote.min.js")-->

    <!-- Bootstrap plugin for markdown editing-->
    <!-- script(src="assets/scripts/plugins/behave.js")-->
    <!-- script(src="assets/scripts/plugins/markdown.js")-->
    <!-- script(src="assets/scripts/plugins/to_markdown.js")-->
    <!-- script(src="assets/scripts/plugins/bootstrap-markdown.js")-->

    <!-- DataTables: It is a highly flexible HTML table.-->
    <!-- script(src="assets/scripts/plugins/jquery.dataTables.min.js")-->
    <!-- script(src="assets/scripts/plugins/dataTables.bootstrap.js")-->

    <!-- Ladda: Buttons with built-in loading indicators.-->
    <!-- script(src="assets/scripts/plugins/spin.min.js")-->
    <!-- script(src="assets/scripts/plugins/ladda.min.js")-->

    <!-- Counterup: Counts up to a targeted number when the number becomes visible.-->
    <!-- script(src="assets/scripts/plugins/waypoints.min.js")-->
    <!-- script(src="assets/scripts/plugins/jquery.counterup.min.js")-->

    <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
    <!-- script(src="assets/scripts/plugins/bootstrap-select.js")-->

    <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
    <!-- script(src="assets/scripts/plugins/bootstrap-datepicker.js")-->

    <!-- jQuery asColorPicker-->
    <!-- script(src="assets/scripts/plugins/jquery-asColor.js")-->
    <!-- script(src="assets/scripts/plugins/jquery-asGradient.js")-->
    <!-- script(src="assets/scripts/plugins/jquery-asColorPicker.js")-->

    <!-- Labelauty jQuery Plugin: checkboxes and radio buttons-->
    <!-- script(src="assets/scripts/plugins/jquery-labelauty.js")-->

    <!-- Simple upload ui-->
    <!-- script(src="assets/scripts/plugins/upload.js")-->

    <!-- parsleyjs: the ultimate JavaScript form validation library-->
    <!-- script(src="assets/scripts/plugins/parsley.min.js")-->

    <!-- Owl Carousel 2: Touch enabled jQuery plugin that lets you create a beautiful responsive carousel slider.-->
    <!-- script(src="assets/scripts/plugins/owl.carousel.js")-->

    <!-- Theme js-->
    <!-- Concat all plugins js-->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/theme/theme-plugins.js"></script>
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/theme/main.js"></script>
    <!-- Below js just for this demo only-->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/demo/demo-skin.js"></script>
    

   
<script type="text/javascript" src="<?php echo base_url(); ?>/templateadmin/assets/bootstrap/js/migratecodejquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.min.js"></script>

<!-- <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/demo/bar-chart.js"></script> -->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/plugins/notify.js"></script>
      <!-- // for pdf start -->
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
 <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
 
 
      <!-- // for pdf end -->
    <script type="text/javascript">
      $( document ).ready(function() {
       
        cuntbadge();
      });
      function cuntbadge(){
        $.ajax({
             async: true,
            method: "POST",
            url: "<?php echo base_url('index.php/Adminhome/cuntbadge');?>/",
            data: '', // serializes the form's elements.
           success: function(data){
              document.getElementById("countbadge").innerHTML = data;
            }
         });
      }
    	// $('.js-top-center').on('click', function() {
    		function notifyresult($msg,$level){
          $('.notifyjs-corner').empty();
    			return $.notify($msg, {
		          position: 'top center',
		          hideDuration: '5',
		          showAnimation: 'fadeIn',
		          hideAnimation: 'fadeOut',
		          className: $level
		        });
    		}
        
        
        
  

        // });
   
    </script>
    


    <!-- Below js just for this page only-->
   <!--  <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/demo/bar-chart.js"></script> -->
  </body>
  
</html>
