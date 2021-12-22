<!DOCTYPE html>

<html class="no-js" lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Palm Alliance Management</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Font
  ================================================== -->

    <link rel="stylesheet" href="assets/cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- SELECTBOX
  ================================================== -->
    <link rel="stylesheet" type="text/css" href="assets/css/fancySelect.css" media="screen" />

    <!-- SLIDER REVOLUTION 4.x SCRIPTS
  ================================================== -->
    <link rel="stylesheet" type="text/css" href="assets/css/extralayers.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/settings.css" media="screen" />

    <!-- OWL CAROUSEL
  ================================================== -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.css">
    <!-- SCROLL BAR MOBILE MENU
  ================================================== -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />
    <!-- MAIN STYLE
  ================================================== -->
  <link rel="stylesheet" href="assets/css/skippr.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- color scheme -->
    <link rel="stylesheet" href="assets/switcher/demo.css" type="text/css">
    <link rel="stylesheet" href="assets/switcher/colors/index.html" type="text/css" id="colors">
    <!-- Favicons
  ================================================== -->
    <link rel="shortcut icon" href="assets/images/fav-icon.png">


</head>

<body>


   <!-- Overlay Mobile Menu Click -->
   <div class="mobile-menu-first">
    <div id="mobile-menu" class="mobile-menu-light">
      <div class="mCustomScrollbar light" data-mcs-theme="minimal-dark">
          <div class="header-mobile-menu hmm-v1">

          </div> <!-- Mobile Menu -->
          <ul>

              <li class="has-sub"><a href="#">About Us </a>
                <ul class="navi-level-2">
                    <li><a href="overview">Overview</a></li>
                    <li><a href="investment">Our Investment Approach</a></li>
                    <li><a href="contact">Contact Us</a></li>

                </ul>
            </li>
            <li class="has-sub"><a href="#">Our Approach </a>
                <ul class="navi-level-2">
                    <li><a href="diversity-and-inclusion">Diversity And Inclusion</a></li>
                    <li><a href="esg">ESG</a></li>
                    <li><a href="responsible-investing">Responsible Investing</a></li>
                    <li><a href="corporate">Corporate Responsibility</a></li>
                    <li><a href="sustainability">Sustainability</a></li>
                </ul>
            </li>
             <li class="has-sub"><a href="#">Our Business</a>
                <ul class="navi-level-2">
                    <li><a href="real-estate">Real Estate</a></li>
                    <li><a href="infrastructure">Infrastructure</a></li>
                    <li><a href="renewable-power">Renewable Power</a></li>
                    <li><a href="private-equity">Private Equity</a></li>
                    <li><a href="insurance-solutions">Insurance-Solutions</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="contact">Contact Us </a> </li>
            <li class="has-sub"><a href="{{ route('login') }}">Login </a> </li>
            <li class="has-sub"><a href="{{ route('register') }}">Register </a> </li>

          </ul>

      </div> <!-- /#rmm   -->
    </div>
</div><!-- End Mobile Menu -->

        {{-- <div class="top-bar top-bar-dark">
            <div class="container">
                <div class="left-top-bar">
                    <p class="hidden-xs">We are help you with all your financial</p>
                    <div class="popover-container visible-xs">
                        <button type="button" class="btn btn-popover popover-dark" data-container="body"
                            data-toggle="popover" data-placement="bottom" title="0112-826-2789"
                            data-content="contact@site.com">
                            <span class="lnr lnr-phone-handset"></span>
                        </button>
                        <button type="button" class="btn btn-popover popover-dark" data-container="body"
                            data-toggle="popover" data-placement="bottom" title="8th floor, 379 Hudson St"
                            data-content="New York, NY 10018">
                            <span class="lnr lnr-map-marker"></span>
                        </button>
                        <button type="button" class="btn btn-popover popover-dark" data-container="body"
                            data-toggle="popover" data-placement="bottom" title="07:30 am – 06:00 pm"
                            data-content="Every Day">
                            <span class="lnr lnr lnr-clock"></span>
                        </button>
                    </div>
                </div>
                <div class="right-top-bar">
                   <div class="row text-center">

                @if (Route::has('login'))
                @auth
                            <div class="col-md-5">
                                @can('is-admin')
                                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                @endcan

                                @can('is-user')
                                <a href="{{ route('user.dashboard.index') }}">Account</a>
                                @endcan
                            </div>
                            <div class="col-md-2">|</div>
                            <div class="col-md-5">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-sm text-gray-700 underline">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                                    @csrf
                                </form>
                            </div>
                        @else
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="{{ route('login') }}">Login</a>
                                    </div>
                                    <div class="col-md-2">|</div>
                                    <div class="col-md-5">
                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 underline">Register</a>
                                        @endif
                                    </div>
                                </div>

                        @endauth
                @endif

                   </div>
                </div>
            </div>
        </div> <!-- End Top bar --> --}}

        <header id="sticked-menu" class="header header-v3">
            <div class="container">
                <div class="top-header">
                    <div class="logo">
                        <div class="mm-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i><span class="mm-label">Menu</span>
                        </div> <!-- End button mobile menu -->
                        <a href="/"><img src="assets/images/Header/logo.png" class="img-responsive" alt="Image"></a>
                    </div><!-- End Logo -->
                    <div class="navi-right">

                    </div> <!-- End Navi Right -->
                </div><!-- End Top Header -->

            </div> <!-- End Container -->
            <div class="section-navi">

                <div class="container">
                    <nav class="navi-desktop-site navi-desktop-site-1 hidden-sm hidden-xs reform-header">
                        <div class="logo ">
                            <div class="mm-toggle visible-xs visible-sm">
                                <i class="fa fa-bars"></i><span class="mm-label">Menu</span>
                            </div> <!-- End button mobile menu -->
                            <a href="/"><img src="assets/images/Header/logo.png" class="img-responsive" alt="Image"></a>
                        </div><!-- End Logo -->
                        <ul class="navi-level-1 uppercase links">
                            <li class="has-sub"><a href="#">About Us <i class="fa fa-angle-down"></i></a>
                                <ul class="navi-level-2">
                                    <li><a href="overview">Overview</a></li>
                                    <li><a href="investment">Our Investment Approach</a></li>
                                    <li><a href="contact">Contact Us</a></li>

                                </ul>
                            </li>
                            <li class="has-sub"><a href="#">Our Approach <i class="fa fa-angle-down"></i></a>
                                <ul class="navi-level-2">
                                    <li><a href="diversity-and-inclusion">Diversity And Inclusion</a></li>
                                    <li><a href="esg">ESG</a></li>
                                    <li><a href="responsible-investing">Responsible Investing</a></li>
                                    <li><a href="corporate">Corporate Responsibility</a></li>
                                    <li><a href="sustainability">Sustainability</a></li>
                                </ul>
                            </li>
                             <li class="has-sub"><a href="#">Our Business <i class="fa fa-angle-down"></i></a>
                                <ul class="navi-level-2">
                                    <li><a href="real-estate">Real Estate</a></li>
                                    <li><a href="infrastructure">Infrastructure</a></li>
                                    <li><a href="renewable-power">Renewable Power</a></li>
                                    <li><a href="private-equity">Private Equity</a></li>
                                    <li><a href="insurance-solutions">Insurance-Solutions</a></li>
                                </ul>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                @can('is-admin')
                                <li ><a href="{{ route('admin.dashboard.index') }}">Dashboard </a> </li>
                                @endcan

                                @can('is-user')
                                <li ><a href="{{ route('user.dashboard.index') }}">Account </a> </li>
                                @endcan
                            @else
                                <li class="has-sub"><a href="#">Client Access <i class="fa fa-angle-down"></i></a>
                                    <ul class="navi-level-2">
                                        <li><a href="login">Client Sign In</a></li>
                                        <li><a href="register">Client Sign Up</a></li>
                                    </ul>
                                </li>
                                @endauth
                            @endif
                            <li ><a href="contact">Contact Us </a> </li>
                        </ul>
                    </nav> <!-- End Navi Desktop Site -->
                </div> <!-- End Container  -->
            </div><!-- End Section navi -->
        </header> <!-- END HEADER -->
        <script src="assets/js/vendor/jquery.min.js"></script>

        <main>
            @yield('content')
        </main>


        <!-- Footer -->
        <div class="footer-side">
            <div class="container">
               <div class="row">
                   <div class="col-lg-7 col-md-12 p-2">
                    <h1>Palm Alliance Management is where you belong</h1>
                    <p>Wonderful people. Exception results. Now is a great time to join Palm Alliance Community</p>
                    <br>
                    <a href="register">Get Started</a>
                   </div>
               </div>
            </div>
        </div>
        <footer class=" bg-dark footer">
            <div class="container">
                <div class="row">
                    <div class="footer-row">
                        <div class="row text1">
                            <div class="col-lg-2 col-md-12">
                                <a href="/"><img src="assets/images/Header/logo.png" class="img-responsive text-center" alt="Image"></a>
                            </div>
                            <div class="col-lg-10 col-md-12  ">
                                <h2>Palm Alliance Management</h2>
                                <p>PAM is a forward thinking independent, privately-owned wealth management firm offering family office, goals-based planning and investment management services to high-net-worth individuals and families, practice professionals, and business owners.</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row text1">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">
                                <p>(302) 389-5302</p>
                                <p>support@palmalliance.com</p>
                            </div>
                            <div class="col-md-3">
                                <p><span>1201 N Orange St, Midtown Ste 100</span></p>
                                <p><span>Wilmington, Delaware</span></p>
                            </div>
                            <div class="col-md-3">

                            </div>
                        </div>

                    </div> <!-- End footer row -->
                    <div class="col-md-12 footer-link">
                        <p>How PAM calculates "better returns". Unless otherwise specified, all return figures shown above are for illustrative purposes only, and are not actual customer or model returns. Actual returns will vary greatly and depend on personal and market conditions. The information on this site is intended solely for the benefit of firms and companies seeking private equity investment capital by providing general information on our services and philosophy. The material on this site is for informational purposes only and does not constitute an offer or solicitation to purchase any investment solutions or a recommendation to buy or sell a security nor is it to be construed as legal, tax or investment advice. Unless otherwise indicated, any information available through this site is as of the date indicated therein and may not be updated or otherwise revised to reflect information that subsequently becomes available. PAM is under no obligation to update the information contained on this site. Additionally, the material on this site does not constitute a representation that the solutions described therein are suitable or appropriate for any person and PAM does not accept any liability with respect to the information. By using this site you agree to the Terms of Use.</p>
                        <p>Copyright © 2016  All rights reserved.</p>

                    </div>
                </div><!-- End Row -->

            </div><!-- End container -->
        </footer><!-- End  -->




    <a id="to-the-top" style="display: block;"><i class="fa fa-angle-up"></i></a> <!-- Back To Top -->
    <!-- SCRIPT
        ================================================== -->
        <script>
            window.__lc = window.__lc || {};
            window.__lc.license = 13218747;
            ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
        </script>
    <script src="assets/js/vendor/jquery.min.js"></script>
    <script src="assets/js/skippr.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins/easing.js"></script>
    <script src="assets/js/plugins/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/plugins/fancySelect.js"></script>
    <script src="assets/js/plugins/custom.js"></script>

    <!-- Switcher
        ================================================== -->
    <script src="assets/switcher/demo.js"></script>
    <!-- Mobile Menu
        ================================================== -->
    <script src="assets/js/plugins/jquery.mobile-menu.js"></script>
    <script src="assets/js/plugins/sticky.min.js"></script>
    <!-- Revo Lib
        ================================================== -->
    <script type="text/javascript" src="assets/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Custom Revoslider -->
    <script src="assets/js/plugins/revoslider-custom.js"></script>
    <!-- Counter Up
        ================================================== -->
    <script src="assets/js/plugins/jquery.animateNumber.min.js"></script>
    <script src="assets/js/plugins/custom-counterup.js"></script>
    <!-- Initializing the isotope
        ================================================== -->
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="assets/js/plugins/custom-isotope.js"></script>
    <!-- Initializing Owl Carousel
        ================================================== -->
    <script src="assets/js/plugins/owl.carousel.js"></script>
    <script src="assets/js/plugins/custom-owl.js"></script>
    <!-- Progress Bar Chart
        ================================================== -->
    <script src="assets/js/plugins/bootstrap-progressbar.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-210288096-1">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-210288096-1');
    </script>
</body>


</html>
