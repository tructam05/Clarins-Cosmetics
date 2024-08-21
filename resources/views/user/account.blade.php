<x-layout>
  <section class="bg0 p-t-200 p-b-120">
    <div class="container">
      <div class="bg8 bor2">
        <h1 class="ltext-203 cl8 txt-center p-t-50">
          My Account
        </h1>

        <div class="row p-all-80">
          <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
            <div class="container-menu-desktop">
              <ul class="main-menu ">
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
          </div>

          <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
            <div class="">
              <div class="hov-img0 bor0">
                <img src="{{asset('user')}}/images/La-plus-proche-de-ses-clients.jpg" alt="IMG">
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
</x-layout>