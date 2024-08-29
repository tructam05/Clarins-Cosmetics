<x-layout>
  <!-- breadcrumb -->
  <div class="container m-t-100">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
      <a href="{{url('/home')}}" class="stext-109 cl8 hov-cl1 trans-04">
        Home
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>

      <a href="{{url('/category/'.$category->name.'/'.$category->id)}}" class="stext-109 cl8 hov-cl1 trans-04">
        {{$category->name}}
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>

      <span class="stext-109 cl4">
        {{$product->name}}
      </span>
    </div>
  </div>


  <!-- Product Detail -->
  <section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
          <div class="p-l-25 p-r-30 p-lr-0-lg">
            <div class="wrap-slick3 flex-sb flex-w">
              <div class="wrap-slick3-dots"></div>
              <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

              <div class="slick3 gallery-lb">
                @foreach($product->images as $image)
                <div class="item-slick3" data-thumb="{{asset('user/images/product/'.$image->path)}}">
                  <div class="wrap-pic-w pos-relative">
                    <img src="{{asset('user/images/product/'.$image->path)}}" alt="IMG-PRODUCT">

                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('user/images/product/'.$image->path)}}">
                      <i class="fa fa-expand"></i>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-5 p-b-30">
          <div class="p-r-50 p-t-5 p-lr-0-lg">
            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
              {{$product->name}}
            </h4>

            <span class="mtext-106 cl2">
              ${{ number_format($product->price, 2) }}
            </span>

            <p class="stext-102 cl3 p-t-23">
              {{$product->short_description}}
            </p>

            <!--  -->
            <div class="p-t-33">
              <div class="flex-w flex-r-m p-b-10">
                <div class=" flex-w flex-m respon6-next">
                  <div class="flex-m bor9 p-r-10 m-r-11">
                    @if($wishlists->where('product_id',$product->id)->first())
                    <a href="{{url('/remove-from-wishlist/'.$product->id)}}" class="dis-block icon-header-item cl13 hov-cl1 trans-04 p-l-22 p-r-11">
                      <i class=" zmdi zmdi-favorite"></i>
                    </a>
                    @else
                    <a href="{{url('/add-to-wishlist/'.$product->id)}}" class="dis-block icon-header-item cl4 hov-cl1 trans-04 p-l-22 p-r-11">
                      <i class=" zmdi zmdi-favorite-outline"></i>
                    </a>
                    @endif
                  </div>
                  <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-minus"></i>
                    </div>

                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
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

      <div class="bor10 m-t-50 p-t-43 p-b-40">
        <!-- Tab01 -->
        <div class="tab01">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item p-b-10">
              <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
            </li>

            <li class="nav-item p-b-10">
              <a class="nav-link" data-toggle="tab" href="#information" role="tab">Ingredienst</a>
            </li>

            <li class="nav-item p-b-10">
              <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content p-t-43">
            <!-- - -->
            <div class="tab-pane fade show active" id="description" role="tabpanel">
              <div class="how-pos2 p-lr-15-md">
                <p class="stext-102 cl6">
                  {{$product->description}}
                </p>
              </div>
            </div>

            <!-- - -->
            <div class="tab-pane fade" id="information" role="tabpanel">
              <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                  {{$product->ingredients}}
                </div>
              </div>
            </div>

            <!-- - -->
            <div class="tab-pane fade" id="reviews" role="tabpanel">
              <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                  <div class="p-b-30 m-lr-15-sm">
                    <!-- Review -->
                    @foreach($reviews as $review)
                    <div class="flex-w flex-t p-b-68">
                      <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                        <img src="{{asset('/user/images/'.$review->customerId->avatar)}}" alt="AVATAR">
                      </div>

                      <div class="size-207">
                        <div class="flex-w flex-sb-m p-b-17">
                          <span class="mtext-107 cl2 p-r-20">
                            {{$review->customerId->name}}
                          </span>

                          <span class="fs-18 cl11">
                            <i class="zmdi {{($review->rating >= 1) ? 'zmdi-star' : 'zmdi-star-outline'}}"></i>
                            <i class="zmdi {{($review->rating >= 2) ? 'zmdi-star' : 'zmdi-star-outline'}}"></i>
                            <i class="zmdi {{($review->rating >= 3) ? 'zmdi-star' : 'zmdi-star-outline'}}"></i>
                            <i class="zmdi {{($review->rating >= 4) ? 'zmdi-star' : 'zmdi-star-outline'}}"></i>
                            <i class="zmdi {{($review->rating >= 5) ? 'zmdi-star' : 'zmdi-star-outline'}}"></i>
                          </span>
                        </div>

                        <p class="stext-102 cl6">
                          {{$review->content}}
                        </p>
                      </div>
                    </div>
                    @endforeach
                    <!-- Add review -->
                    <form class="w-full" action="{{url('/add-review/'.$product->id)}}" method="post">
                      @csrf
                      <h5 class="mtext-108 cl2 p-b-7">
                        Add a review
                      </h5>

                      <p class="stext-102 cl6">
                        Your email address will not be published. Required fields are marked *
                      </p>

                      <div class="flex-w flex-m p-t-50 p-b-23">
                        <span class="stext-102 cl3 m-r-16">
                          Your Rating
                        </span>

                        <span class="wrap-rating fs-18 cl11 pointer">
                          <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                          <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                          <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                          <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                          <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                          <input class="dis-none" type="number" name="rating">
                        </span>
                      </div>

                      <div class="row p-b-25">
                        <div class="col-12 p-b-5">
                          <label class="stext-102 cl3" for="review">Your review</label>
                          <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                        </div>
                      </div>

                      <button class="flex-c-m stext-101 cl0 size-112 bg10 bor2 hov-btn2 p-lr-15 trans-04 m-b-10" type="submit">
                        Submit
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>


  <!-- Related Products -->
  <section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
      <div class="p-b-45">
        <h3 class="ltext-106 cl5 txt-center">
          Related Products
        </h3>
      </div>

      <!-- Slide2 -->
      <div class="wrap-slick2">
        <div class="slick2">
          @foreach($sharedData['all_products']->where('category_id',$category->id) as $related_product)
          <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-pic hov-img0">
                @foreach($related_product->images->where('is_primary','1') as $image)
                <img src="{{ asset('user/images/product/'.$image->path)}}" alt="{{$product->name}}">
                @endforeach

                <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn2 p-lr-15 trans-04 js-show-modal1"
                  data-product="{{ json_encode($related_product) }}">
                  Quick View
                </a>
              </div>

              <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                  <a href="{{url('product/'.$related_product->name.'/'.$related_product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{$related_product->name}}
                  </a>

                  <span class="stext-105 cl3">
                    ${{ number_format($related_product->price, 2) }}
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
        </div>
      </div>
    </div>
  </section>
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