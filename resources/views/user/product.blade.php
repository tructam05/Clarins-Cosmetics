<x-layout>
  <!-- Product -->
  <div class="bg0 m-t-100 p-b-140">
    <div class="container">
      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <a href="{{url('/product')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
            All Products
          </a>
          @foreach($categories as $category)
          <a href="{{url('/category/'.$category->name.'/'.$category->id)}}" class="stext-106 cl8 hov1 bor3 trans-04 m-r-20 m-tb-5">
            {{$category->name}}
          </a>
          @endforeach


        </div>

        <div class="flex-w flex-c-m m-tb-10">
          <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn2 trans-04 m-r-8 m-tb-4 js-show-filter">
            Sort By Price
          </div>

          <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn2 trans-04 m-tb-4 js-show-search">
            Search
          </div>
        </div>

        <!-- Search product -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
          <div class="bor8 dis-flex p-l-15">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
              <i class="zmdi zmdi-search"></i>
            </button>

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
          </div>
        </div>

        <!-- Filter -->
        <div class="dis-none panel-filter w-full  ">
          <div class="wrap-filter flex-r bg-none w-full p-lr-110 p-lr-15-sm ">
            <div class=" p-lr-15 bg8 bor20">
              <ul>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04 cl2">
                    Low to High
                  </a>
                </li>

                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04 cl2">
                    High to Low
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row isotope-grid">

        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item category_id{{$product->category_id}}">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              @foreach($product->images->where('is_primary','1') as $image)
              <img src="{{ asset('user/images/product/'.$image->path)}}" alt="{{$product->name}}">
              @endforeach

              <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn2 p-lr-15 trans-04 js-show-modal1"
                data-product="{{ json_encode($product) }}">
                Quick View
              </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="{{url('product/'.$product->name.'/'.$product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  {{$product->name}}
                </a>

                <span class="stext-105 cl3">
                  ${{ number_format($product->price, 2) }}
                </span>
              </div>

              <div class="block2-txt-child2 flex-r p-t-3">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                  <img class="icon-heart1 dis-block trans-04" src="{{asset('user')}}/images/icons/icon-heart-01.png" alt="ICON">
                  <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('user')}}/images/icons/icon-heart-02.png" alt="ICON">
                </a>
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
                          </div>

                          <button class="flex-c-m stext-101 cl0 size-101 bg10 bor2 hov-btn2 p-lr-15 trans-04 js-addcart-detail">
                            Add to cart
                          </button>
                        </div>
                      </div>
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
        {{ $products->links('pagination::bootstrap-4') }}
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
    $('.product-price').text(product.price.toLocaleString('en-US', {
      style: 'currency',
      currency: 'USD'
    }));
    $('.product-short-description').text(product.short_description);
    console.log(product)
    const productImages = product.images; // Mảng chứa các đối tượng hình ảnh
    // Cập nhật nội dung của slider Slick
    $('.product-gallery').slick('unslick'); // Hủy Slick trước khi cập nhật
    $('.product-gallery').html(''); // Xóa nội dung hiện tại
    $.each(productImages, function(index, image) {
      $('.product-gallery').append(`
      <div class="item-slick3" data-thumb="{{ asset('user/images/product/${image.path}') }}">
        <div class="wrap-pic-w pos-relative">
          <img src="{{ asset('user/images/product/${image.path}') }}" alt=" IMG-PRODUCT">
          </div>
      </div>
    `);
    });
    // Tạo lại các phần tử điều khiển
    $('.product-gallery').parent().find('.wrap-slick3-dots').empty();
    $('.product-gallery').parent().find('.wrap-slick3-arrows').empty();

    // Tạo lại dots
    $('.product-gallery').slick('getSlick').options.dots = true;
    $('.product-gallery').slick('getSlick').options.customPaging = function(slick, index) {
      var portrait = $(slick.$slides[index]).data('thumb');
      return '<img src="' + portrait + '"/><div class="slick3-dot-overlay"></div>';

    };

    // Tạo lại arrows
    $('.product-gallery').parent().append('<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>');
    $('.product-gallery').slick('slickAdd', '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>', 0);
    $('.product-gallery').slick('slickAdd', '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>', $('.product-gallery').slick('getSlick').slideCount - 1);


    $('.product-gallery').slick('refresh');
  });

  $('.js-hide-modal1').on('click', function() {
    $('.js-modal1').removeClass('show-modal1');
  });
</script>