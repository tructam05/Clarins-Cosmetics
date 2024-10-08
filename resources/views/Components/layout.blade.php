<!DOCTYPE html>
<html lang="en">

<head>
  <title>CLARINS: Natural Beauty, Skincare and Make-up powered by plants.</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="{{asset('user')}}/images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/slick/slick.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/MagnificPopup/magnific-popup.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{asset('user')}}/css/main.css">
  <!--===============================================================================================-->
</head>

<body class="animsition">

  <!-- Header -->
  <header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-c-m h-full container">
          <div class="left-top-bar">
            Receive 3 free samples with any order + free shipping with any $50+ order
          </div>
        </div>
      </div>

      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

          <!-- Logo desktop -->
          <a href="{{url('/home')}}" class="logo">
            <img src="{{asset('user')}}/images/icons/logo-cba-70years.svg" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li>
                <a href="{{url('/home')}}">Home</a>
              </li>

              <li>
                <a href="{{url('/product')}}">Product</a>
                <ul class="sub-menu">
                  @foreach($sharedData['categories'] as $category)
                  <li><a href="{{url('/category/'.$category->name.'/'.$category->id)}}">{{$category->name}}</a></li>
                  @endforeach
                </ul>
              </li>

              <li>
                <a href="{{url('/about-us')}}">About</a>
              </li>

              <li>
                <a href="{{url('/contact')}}">Contact</a>
              </li>
            </ul>
          </div>

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <form action="{{url('/product/search')}}" method="get">
              <div class="bor8 dis-flex p-l-15">
                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                  <i class="zmdi zmdi-search"></i>
                </button>

                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
              </div>
            </form>

            <a href="{{url('/cart')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
              data-notify="{{(auth()->check() && $sharedData['cart']->where('customer_id',auth()->user()->id)->first() != null) ? $sharedData['cart']->where('customer_id',auth()->user()->id)->first()->cartDetails->count() : '0' }}">
              <i class="zmdi zmdi-shopping-cart"></i>
            </a>

            <a href="{{url('/wishlist')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
              data-notify="{{(auth()->check()) ? $sharedData['wishlists']->where('customer_id',auth()->user()->id)->count() : '0'}}">
              <i class="zmdi zmdi-favorite-outline"></i>
            </a>
            <a href="{{url('/account')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
              <i class="zmdi zmdi-account"></i>
            </a>
          </div>
        </nav>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->
      <div class="logo-mobile">
        <a href="{{url('/home')}}"><img src="{{asset('user')}}/images/icons/logo-cba-70years.svg" alt="IMG-LOGO"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <form action="{{url('/product/search')}}" method="get">
          <div class="bor8 dis-flex p-l-15">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
              <i class="zmdi zmdi-search"></i>
            </button>

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
          </div>
        </form>

        <a href="{{url('/cart')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
          <i class="zmdi zmdi-shopping-cart"></i>
        </a>

        <a href="{{url('/wishlist')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
          data-notify="{{(auth()->check()) ? $sharedData['wishlists']->where('customer_id',auth()->user()->id)->count() : '0'}}">
          <i class="zmdi zmdi-favorite-outline"></i>
        </a>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="topbar-mobile">
        <li>
          <div class="left-top-bar">
            Receive 3 free samples with any order + free shipping with any $50+ order
          </div>
        </li>


      </ul>

      <ul class="main-menu-m">
        <li>
          <a href="{{url('/home')}}">Home</a>
        </li>

        <li>
          <a href="{{url('/product')}}">Product</a>
        </li>

        <li>
          <a href="{{url('/about-us')}}">About</a>
        </li>

        <li>
          <a href="{{url('/contact')}}">Contact</a>
        </li>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="{{asset('user')}}/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>

  

  <!-- content -->
  {{ $slot }}

  <!-- Footer -->
  <footer class="bg2 p-t-75 p-b-32">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl5 p-b-30">
            Categories
          </h4>

          <ul>
            @foreach($sharedData['categories'] as $category)
            <li class="p-b-10">
              <a href="{{url('/category/'.$category->name.'/'.$category->id)}}" class="stext-107 cl10 hov-cl1 trans-04">
                {{$category->name}}
              </a>
            </li>
            @endforeach
          </ul>
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl5 p-b-30">
            CUSTOMER SERVICES
          </h4>

          <ul>
            <li class="p-b-10">
              <a href="{{url('/account')}}" class="stext-107 cl10 hov-cl1 trans-04">
                My Account
              </a>
            </li>

            <li class="p-b-10">
              <a href="{{url('/about-us')}}" class="stext-107 cl10 hov-cl1 trans-04">
                About Us
              </a>
            </li>

            <li class="p-b-10">
              <a href="{{url('/contact')}}" class="stext-107 cl10 hov-cl1 trans-04">
                Contact Us
              </a>
            </li>
          </ul>
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl5 p-b-30">
            GET IN TOUCH
          </h4>

          <p class="stext-107 cl10 size-201">
            (91) 79697 27777
            <br>
            (9.00am–5.00pm, Mon–Fri, excluding Public Holidays)
          </p>

          <div class="p-t-27">
            <a href="https://www.facebook.com/ClarinsUS/" class="fs-18 cl10 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-facebook"></i>
            </a>

            <a href="https://www.instagram.com/clarinsusa/" class="fs-18 cl10 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-instagram"></i>
            </a>

            <a href="https://www.youtube.com/channel/UC_7lNVaR-bVxeQwPRta5RyQ" class="fs-18 cl10 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-youtube"></i>
            </a>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl5 p-b-30">
            SIGN UP FOR OUR NEWSLETTER
          </h4>
          <div class="p-t-18">
            <button class="flex-c-m stext-101 cl0 size-103 bg10 bor20 hov-btn2 p-lr-15 trans-04">
              <a href="{{url('create-account')}}" class="stext-101 cl0 hov-cl1 trans-04">
                Sign Up
              </a>
            </button>
          </div>

        </div>
      </div>


    </div>
  </footer>


  <!-- Back to top -->
  <div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="zmdi zmdi-chevron-up"></i>
    </span>
  </div>

 


  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{asset('user')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/select2/select2.min.js"></script>
  <script>
    $(".js-select2").each(function() {
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{asset('user')}}/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/slick/slick.min.js"></script>
  <script src="{{asset('user')}}/js/slick-custom.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/parallax100/parallax100.js"></script>
  <script>
    $('.parallax100').parallax100();
  </script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
  <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled: true
        },
        mainClass: 'mfp-fade'
      });
    });
  </script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/isotope/isotope.pkgd.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/sweetalert/sweetalert.min.js"></script>
  <script>
    $('.js-addwish-b2').on('click', function(e) {
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function() {
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
      var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
      $(this).on('click', function() {
        swal(nameProduct, "is added to cart !", "success");
      });
    });
  </script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function() {
      $(this).css('position', 'relative');
      $(this).css('overflow', 'hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function() {
        ps.update();
      })
    });
  </script>
  <!--===============================================================================================-->
  <script src="{{asset('user')}}/js/main.js"></script>

</body>

</html>