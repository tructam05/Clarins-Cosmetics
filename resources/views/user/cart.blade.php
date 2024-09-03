<x-layout>
  <!-- breadcrumb -->
  <div class="container m-t-100">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
      <a href="{{url('/home')}}" class="stext-109 cl8 hov-cl1 trans-04">
        Home
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>
      <span class="stext-109 cl4">
        Cart
      </span>
    </div>
  </div>


  <!-- Shoping Cart -->
  <form class="bg0 p-t-75 p-b-85" method="post" action="{{url('/cart/checkout')}}">
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
          <div class="m-l-25 m-r--38 m-lr-0-xl">
            <div class="wrap-table-shopping-cart">
              <table class="table-shopping-cart">
                <tr class="table_head">
                  <th></th>
                  <th class="column-1">Product</th>
                  <th class="column-2 p-l-50">Name</th>
                  <th class="column-3 p-l-40">Price</th>
                  <th class="column-4">Quantity</th>
                  <th class="column-5">Total</th>
                </tr>

                @foreach($cart->first()->cartDetails as $cart_detail)
                <tr class="table_row">
                  <td class="p-l-15">
                    <a href="{{url('/remove-from-cart/'.$cart_detail->id)}}" class="flex-c-m stext-101 cl3 size-104 bg2 bor2 hov-btn2 trans-04">Remove</a>
                  </td>
                  <td class="column-1">
                    <div class="how-itemcart1">
                      @foreach($cart_detail->product->images->where('is_primary',1) as $image)
                      <img src="{{asset('user/images/product/'.$image->path)}}" alt="IMG">
                      @endforeach
                    </div>
                  </td>
                  <td class="column-2"><a href="{{url('product/'.$cart_detail->product->name.'/'.$cart_detail->product->id)}}" class="cl2">{{$cart_detail->product->name}}</a></td>
                  <td class="column-3 p-l-40">${{number_format($cart_detail->product->price , 2)}}</td>
                  <td class="column-4">x{{$cart_detail->quantity}}</td>
                  <td class="column-5">${{number_format( $cart_detail->total , 2 )}}</td>
                </tr>
                @endforeach
              </table>
            </div>


          </div>
        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
          <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
            <h4 class="mtext-109 cl2 p-b-30">
              Cart Totals
            </h4>

            <div class="flex-w flex-t bor12 p-b-13">
              <div class="size-208">
                <span class="stext-110 cl2">
                  Subtotal:
                </span>
              </div>

              <div class="size-209">
                <span class="mtext-110 cl2">
                  ${{number_format( $cart->first()->cartDetails->sum('total') , 2)}}
                </span>
              </div>
            </div>

            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Detail:
                </span>
              </div>

              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">


                <div class="">
                  <span class="stext-112 cl8">
                    Payment
                  </span>

                  <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                    <select class="js-select2" name="payment">
                      <option value="Visa">Visa</option>
                      <option value="Paypal">Paypal</option>
                      <option value="Cash">Cash</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                  </div>

                </div>
              </div>
            </div>

            <div class="flex-w flex-t p-t-27 p-b-33">
              <div class="size-208">
                <span class="mtext-101 cl2">
                  Total:
                </span>
              </div>

              <div class="size-209 p-t-1">
                <span class="mtext-110 cl2">
                  ${{number_format( $cart->first()->cartDetails->sum('total') , 2)}}
                </span>
              </div>
            </div>

            <button class="flex-c-m stext-101 cl0 size-121 bg10 bor20 hov-btn2 p-lr-15 trans-04 pointer" type="submit">
              Proceed to checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-layout>