<x-layout>

  <!-- Title page -->
  <section class="bg-img1 txt-center p-lr-15 p-t-92">
    <h2 class="ltext-201 cl2 txt-center">
      Favorite Products
    </h2>
  </section>

  <!-- breadcrumb -->
  <div class="container m-t-50">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
      <a href="{{url('/home')}}" class="stext-109 cl8 hov-cl1 trans-04">
        Home
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>
      <span class="stext-109 cl4">
        Favorite
      </span>
    </div>
  </div>

  <div class="bg0 m-t-100 p-b-140">
    <div class="container">


      <div class="row isotope-grid">

        @foreach($wishlists as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item category_id{{$product->productId->category_id}}">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              @foreach($product->productId->images->where('is_primary','1') as $image)
              <img src="{{ asset('user/images/product/'.$image->path)}}" alt="{{$product->productId->name}}">
              @endforeach

              <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn2 p-lr-15 trans-04 js-show-modal1"
                data-product="{{ json_encode($product->productId) }}">
                Quick View
              </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="{{url('product/'.$product->productId->name.'/'.$product->productId->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  {{$product->productId->name}}
                </a>

                <span class="stext-105 cl3">
                  ${{ number_format($product->productId->price, 2) }}
                </span>
              </div>

              <div class="block2-txt-child2 flex-r p-t-3">
                @if($wishlists->where('product_id',$product->productId->id)->first())
                <a href="{{url('/remove-from-wishlist/'.$product->productId->id)}}" class="dis-block cl13 hov-cl1 trans-04 p-l-22 p-r-11">
                  <i class=" zmdi zmdi-favorite"></i>
                </a>
                @else
                <a href="{{url('/add-to-wishlist/'.$product->productId->id)}}" class="dis-block cl4 hov-cl1 trans-04 p-l-22 p-r-11">
                  <i class=" zmdi zmdi-favorite-outline"></i>
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <!-- Modal1 -->
        <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
          <div class="overlay-modal1 js-hide-modal1"></div>

          <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
              <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="{{asset('user')}}/images/icons/icon-close.png" alt="CLOSE">
              </button>

              <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                  <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                      <div class="wrap-slick3-dots"></div>
                      <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                      <div class="slick3 gallery-lb product-gallery" id="">
                        <div class="item-slick3" data-thumb="">
                          <div class="wrap-pic-w pos-relative">
                            <img class="product-image" src="" alt=" IMG-PRODUCT">

                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
                              <i class="fa fa-expand"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                  <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14 product-name">
                    </h4>

                    <span class="mtext-106 cl2 product-price">
                    </span>

                    <p class="stext-102 cl3 p-t-23 product-short-description">
                    </p>

                    <div class="p-t-33">
                      <form action="{{url('/add-to-cart')}}" method="post">
                        @csrf
                        <div class="flex-w flex-r-m p-b-10">
                          <div class="size-204 flex-w flex-m respon6-next">
                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                              <div class="btn-num-product-down cl8 hov-btn2 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                              </div>

                              <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                              <div class="btn-num-product-up cl8 hov-btn2 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                              </div>
                              <input class="product-id" type="hidden" name="product_id">

                            </div>

                            <button class="flex-c-m stext-101 cl0 size-101 bg10 bor2 hov-btn2 p-lr-15 trans-04 js-addcart-detail">
                              Add to cart
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Pagination -->
      <div class="flex-c-m flex-w w-full p-t-45">
        {{ $wishlists->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
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