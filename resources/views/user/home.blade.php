<x-layout>





  <!-- Slider -->
  <section class="section-slide m-t-80">
    <div class="wrap-slick1">
      <div class="slick1">
        <div class="item-slick1" style="background-image: url({{asset('user')}}/images/CBA_HP_Aspot-Desktop_DS&CREAMS_V2_2024.jpg);">
          <div class="container h-full">
            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
              <div class="layer-slick1 m-t-15 animated visible-false" data-appear="fadeInUp" data-delay="0">
                <h2 class="ltext-105 cl5  respon1">
                  Double Serum
                </h2>
              </div>
              <div class="layer-slick1 m-tb-15 animated visible-false" data-appear="fadeInDown" data-delay="800">
                <span class="ltext-101 cl5 p-t-19 p-b-43 respon2">
                  Global Age Control Serum
                </span>
              </div>

              <div class="layer-slick1 m-tb-15 animated visible-false" data-appear="zoomIn" data-delay="1600">
                <a href="{{url('/product/Double Serum Anti-Aging + Anti-Wrinkle Serum/21')}}" class="flex-c-m stext-101 cl0 size-101 bg10 bor2 hov-btn2 p-lr-15 trans-04">
                  Shop Now
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-img1 txt-center p-lr-15 p-t-92 p-b-30">
    <h2 class="ltext-201 cl2 txt-center">
      Your skin. Our expertise.
    </h2>
    <h4 class="mtext-105 cl2 txt-center p-tb-10">
      DISCOVER OUR PLANT-POWERED FORMULAS
    </h4>
  </section>
  <!-- Banner -->
  <div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
          <!-- Block1 -->
          <div class="block1 wrap-pic-w">
            <img src="{{asset('user')}}/images/CBA_HP_Highlights-268x476_FACE-02.jpg" alt="IMG-BANNER">

            <a href="{{url('category/Face Cleansers/1')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
              <div class="block1-txt-child1 flex-col-l">
                <span class="block1-name ltext-102 trans-04 p-b-8">
                  FACE CLEANSERS
                </span>
              </div>

              <div class="block1-txt-child2 p-b-4 trans-05">
                <div class="block1-link stext-101 cl0 trans-09">
                  Shop Now
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
          <!-- Block1 -->
          <div class="block1 wrap-pic-w">
            <img src="{{asset('user')}}/images/Highlight_MAKE_UP_GENERIC_2024_StillLifeFoundation.jpg" alt="IMG-BANNER">

            <a href="{{url('/category/Makeup/6')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
              <div class="block1-txt-child1 flex-col-l">
                <span class="block1-name ltext-102 trans-04 p-b-8">
                  MAKE-UP
                </span>
              </div>

              <div class="block1-txt-child2 p-b-4 trans-05">
                <div class="block1-link stext-101 cl0 trans-09">
                  Shop Now
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
          <!-- Block1 -->
          <div class="block1 wrap-pic-w">
            <img src="{{asset('user')}}/images/CBA_HP_Highlights-268x476_BODY-01.jpg" alt="IMG-BANNER">

            <a href="{{url('/category/Body/7')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
              <div class="block1-txt-child1 flex-col-l">
                <span class="block1-name ltext-102 trans-04 p-b-8">
                  BODY CARE
                </span>
              </div>

              <div class="block1-txt-child2 p-b-4 trans-05">
                <div class="block1-link stext-101 cl0 trans-09">
                  Shop Now
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="bg11 txt-center p-lr-15 p-tb-30 m-b-30">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-lg-8">
          <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
            <h3 class="mtext-111 cl2 p-b-40">
              {{$famous_product->name}}
            </h3>

            <span class="fs-25 cl13 ">
              <i class="zmdi zmdi-star"></i>
              <i class="zmdi zmdi-star"></i>
              <i class="zmdi zmdi-star"></i>
              <i class="zmdi zmdi-star"></i>
              <i class="zmdi zmdi-star"></i>
            </span>

            <p class="mtext-108 cl8 p-tb-40">
              {{$famous_product->short_description}}
            </p>
            <a href="{{url('/product/Hydra-Essentiel Hydrating Bi-Phase Serum/24')}}" class="flex-c-m stext-101 cl0 size-101 bg10 bor2 hov-btn2 p-lr-15 trans-04 m-lr-200 m-t-50">
              See for yourself
            </a>
          </div>
        </div>

        <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
          <div class=" ">
            <div class="hov-img0">
              @foreach($famous_product->images->where('is_primary','1') as $image)
              <img src="{{ asset('user/images/product/'.$image->path)}}" alt="{{$famous_product->name}}">
              @endforeach
            </div>
          </div>
        </div>
      </div>
  </section>


</x-layout>
<script>
  $('.js-show-modal1').on('click', function(e) {
    e.preventDefault();
    const product = $(this).data('product'); // get product object
    $('.js-modal1').addClass('show-modal1');
    $('.product-name').text(product.name);
    $('.product-id').val(product.id);
    $('.product-price').text(product.price.toLocaleString('en-US', {
      style: 'currency',
      currency: 'USD'
    }));
    $('.product-short-description').text(product.short_description);
    console.log(product)
    const productImages = product.images; // Arrays containing image objects
    // Update the contents of the Slick slider
    $('.product-gallery').slick('unslick'); // Cancel Slick before updating
    $('.product-gallery').html(''); // Delete current content
    $.each(productImages, function(index, image) {
      $('.product-gallery').append(`
      <div class="item-slick3" data-thumb="{{ asset('user/images/product/${image.path}') }}">
        <div class="wrap-pic-w pos-relative">
          <img src="{{ asset('user/images/product/${image.path}') }}" alt=" IMG-PRODUCT">
          </div>
      </div>
    `);
    });
    // Recreating control elements
    $('.product-gallery').parent().find('.wrap-slick3-dots').empty();
    $('.product-gallery').parent().find('.wrap-slick3-arrows').empty();

    // Recreating dots
    $('.product-gallery').slick('getSlick').options.dots = true;
    $('.product-gallery').slick('getSlick').options.customPaging = function(slick, index) {
      var portrait = $(slick.$slides[index]).data('thumb');
      return '<img src="' + portrait + '"/><div class="slick3-dot-overlay"></div>';

    };

    // Recreating arrows
    $('.product-gallery').parent().append('<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>');
    $('.product-gallery').slick('slickAdd', '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>', 0);
    $('.product-gallery').slick('slickAdd', '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>', $('.product-gallery').slick('getSlick').slideCount - 1);


    $('.product-gallery').slick('refresh');
  });

  $('.js-hide-modal1').on('click', function() {
    $('.js-modal1').removeClass('show-modal1');
  });
</script>