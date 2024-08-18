<x-layout>
  <!-- Product -->
  <x-productList></x-productList>
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