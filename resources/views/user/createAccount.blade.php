<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Account</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('user')}}/css/login.css">
  <link rel="icon" type="image/png" href="{{asset('user')}}/images/icons/favicon.ico" />

</head>

<body>
  <div class="registration-form">
    <form action="{{url('new-account')}}" method="post">
      @csrf
      <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
      </div>
      <div class="form-group">
        <input type="text" class="form-control item" name="name" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control item" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control item" name="password_confirmation" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <input type="text" class="form-control item" name="email" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="text" class="form-control item" name="phone" placeholder="Phone Number">
      </div>
      <div class="form-group">
        <input type="number" class="form-control item" name="age" placeholder="Age">
      </div>
      <div class="form-group">
        <input type="text" class="form-control item" name="address" placeholder="Address">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-block create-account">Create Account</button>
      </div>
    </form>

    <div class="social-media">
      <h5>Have an Account</h5>
      <button class="btn btn-block create-account"><a href="{{url('/login')}}" style="color: white;">Login</a></button>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <!-- <script src="assets/js/script.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#birth-date').mask('00/00/0000');
      $('#phone-number').mask('0000-0000');
    })
  </script>
</body>

</html>