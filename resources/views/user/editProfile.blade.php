<x-layout>
  <section class="bg0 p-t-200 p-b-120">
    <div class="container">
      <div class="bg0 bor2">
        <h1 class="ltext-203 cl8 txt-center p-t-50">
          Edit Profile
        </h1>

        <div class="row p-all-80">
          <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
            <table>
              <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" value="{{$account->name}}"></td>
              </tr>
              <tr>
                <td>Age</td>
                <td><input type="text" name="age" id="" value="{{$account->age}}"></td>
              </tr>
              <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" id="" value="{{$account->phone}}"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="" value="{{$account->email}}"></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input type="text" name="address" id="" value="{{$account->address}}"></td>
              </tr>
            </table>
          </div>

          <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
            <div class="">
              <div class="hov-img0 bor0">
                <img src="{{asset('user')}}/images/La-plus-proche-de-ses-clients.jpg" alt="IMG">
              </div>
              <div class="flex-col-c-t m-t-30">
                <label for="avatar" class="m-b-15">Change the Avatar</label>
                <input type="file" name="avatar" id="avatar">
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
</x-layout>