<x-layout>
  <section class="bg0 p-t-200 p-b-120">
    <div class="container">
      <div class="bg0 bor2">
        <h1 class="ltext-203 cl8 txt-center p-t-50">
          My Account {{$customer->id}}
        </h1>

        <div class="row p-all-40">
          <div class="order-md-2 col-md-7 col-lg-8 p-b-30">

            <div class="tab01">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item p-b-10">
                  <a class="nav-link mtext-106 hov1 bor3 active" data-toggle="tab" href="#all" role="tab">All</a>
                </li>

                <li class="nav-item p-b-10">
                  <a class="nav-link mtext-106 hov1 bor3" data-toggle="tab" href="#to_receive" role="tab">To Receive</a>
                </li>

                <li class="nav-item p-b-10">
                  <a class="nav-link mtext-106 hov1 bor3" data-toggle="tab" href="#completed" role="tab">Completed</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content p-t-43">
                <!-- - -->
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                  <div class="row bg2 m-t-10 bor2">
                    <div class="col-sm-10 col-md-8 col-lg-8 m-lr-auto p-tb-15">
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">{{$customer->email}}</div>
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">x{{$customer->age}}</div>
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-4 m-lr-auto p-tb-15">
                      <div class="ltext-101 cl2 flex-c ">{{$customer->phone}}</div>
                    </div>
                  </div>
                  <div class="row bg2 m-t-10 bor2">
                    <div class="col-sm-10 col-md-8 col-lg-8 m-lr-auto p-tb-15">
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">{{$customer->email}}</div>
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">x{{$customer->age}}</div>
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-4 m-lr-auto p-tb-15">
                      <div class="ltext-101 cl2 flex-c ">{{$customer->phone}}</div>
                    </div>
                  </div>
                  <div class="row bg2 m-t-10 bor2">
                    <div class="col-sm-10 col-md-8 col-lg-8 m-lr-auto p-tb-15">
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">{{$customer->email}}</div>
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">x{{$customer->age}}</div>
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-4 m-lr-auto p-tb-15">
                      <div class="ltext-101 cl2 flex-c ">{{$customer->phone}}</div>
                    </div>
                  </div>
                  <div class="row bg2 m-t-10 bor2">
                    <div class="col-sm-10 col-md-8 col-lg-8 m-lr-auto p-tb-15">
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">{{$customer->email}}</div>
                      <div class="mtext-108 cl2 w-full p-l-15 m-tb-5">x{{$customer->age}}</div>
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-4 m-lr-auto p-tb-15">
                      <div class="ltext-101 cl2 flex-c ">{{$customer->phone}}</div>
                    </div>
                  </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="to_receive" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                      to receive
                    </div>
                  </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="completed" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                      completed
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="order-md-1 col-11 col-md-5 col-lg-4 p-b-30 p-lr-100">
            <div class="hov-img0 bor0 bor10">
              <img src="{{asset('user/images/banner-01.jpg')}}" alt="IMG">
            </div>
            <div class="flex-c m-t-30">
              <a href="{{url('/account/edit-profile')}}" class="mtext-106 cl6 hov-cl1">Edit Profile</a>
            </div>
            <form method="POST" action="{{url('/logout')}}" class="flex-c m-t-30">
              @csrf
              <button type="submit" class="bg2 cl2 bor2 hov-btn1 p-lr-15">Logout</button>
            </form>

          </div>
        </div>


      </div>
    </div>
  </section>
</x-layout>