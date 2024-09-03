<x-layout>
  <div class="container m-t-100">
    <div class="main-body">

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{asset('user/images/'.$customer->avatar)}}" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>{{$customer->name}}</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="card m-tb-15">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$customer->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Age</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$customer->age}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$customer->email}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$customer->phone}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$customer->address}}
                </div>
              </div>
              <hr>
              <form method="POST" action="{{url('/logout')}}" class="flex-c m-t-30">

                <div class="row">
                  <div class="col-sm-12">
                    <a class="btn btn-info " href="{{url('/account/edit-profile')}}">Edit</a>
                    @csrf
                    <button type="submit" class="btn btn-info ">Logout</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <h1>Order History</h1>
          <div class="card m-tb-15">
            @foreach($orders as $order)
            <div class="d-flex justify-content-between align-items-center flex-wrap m-t-10 bg11 ">
              <span class="m-lr-30 m-tb-10">Payment: {{$order->payment}}</span>
              <span class="m-lr-30 m-tb-10">Status: {{($order->status) ? 'Complete' : 'Process'}}</span>
              <span class="m-lr-30 m-tb-10">Total: ${{$order->orderDetails->sum('total')}}</span>
            </div>
            <ul class="list-group list-group-flush m-tb-5 m-lr-10">
              @foreach($order->orderDetails as $order_detail)
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap ">
                @foreach($order_detail->product->images->where('is_primary','1') as $image)
                <img src="{{asset('user/images/product/'.$image->path)}}" alt="{{$order_detail->product->name}}" width="50" height="50">
                @endforeach
                <div>
                  <a href="{{url('product/'.$order_detail->product->name.'/'.$order_detail->product->id)}}" class="cl2">{{$order_detail->product->name}}</a>
                  <br>
                  <span class="flex-c" class="cl2">x{{$order_detail->quantity}}</span>
                </div>
                <div class="cl2">${{$order_detail->total}}</div>
              </li>
              @endforeach
            </ul>
            @endforeach
          </div>





        </div>
      </div>

    </div>
  </div>
</x-layout>