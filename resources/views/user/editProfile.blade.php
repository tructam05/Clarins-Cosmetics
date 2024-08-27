<x-layout>
  <div class="container m-t-100">
    <div class="main-body">
      <div class="row">
        <div class="col-lg-4">
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
        </div>
        <div class="col-lg-8 m-b-50">
          <div class="card">
            <div class="card-body">
              <form action="{{url('/update-info')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-9 text-secondary">
                    <input type="hidden" class="form-control" value="{{$customer->id}}" name="id">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" value="{{$customer->name}}" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Age</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="number" class="form-control" value="{{$customer->age}}" name="age">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="email" class="form-control" value="{{$customer->email}}" name="email">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" value="{{$customer->phone}}" name="phone">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" value="{{$customer->address}}" name="address">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Change Avatar</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="file" class="form-control" name="avatar" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>