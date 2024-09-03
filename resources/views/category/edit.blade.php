@extends('layout.admin')
@section('Sidebar Menu')
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Clarins
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{url('clarins/category/index')}}" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Clarins Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/product/index')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p> Clarins Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/category/add')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/product/add')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/product/low-stock')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Out Of Stock</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/contact')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Contact Us</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/feedback')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Feedback Center</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/chart')}}" class="nav-link  ">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Analytics</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
@endsection
@section('content')




<h3>Edit Category</h3>
@if(Session::has('msg'))
<div class="alert alert-success" id="alert">
  {{ session('msg') }}
</div>
@endif
<form action="{{url('/clarins/category/update')}}" method="post">
  @csrf
  <div class="card-body">
    <div class="form-group">
      <label for="menu">Name</label>
      <input type="text" name="name" value="{{$categories->name}}" class="form-control" placeholder="Enter Name">
    </div>


    <div class="form-group">
      <label for="menu">Description</label>
      <input type="text" name="description" value="{{$categories->description}}" class="form-control" placeholder="Enter Name">
    </div>


  </div>


  <div class="card-footer">
    <button type="submit" class="btn btn-pink">Update </button>
    <input type="hidden" name="id" value="{{$categories->id}}">
  </div>
  @csrf
</form>

















@endsection


<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script>
  $(function() {
    $("#created_at").datepicker({
      dateFormat: 'dd/mm/yy'
    });
  });
</script>

<script>
  $(function() {
    $("#updated_at").datepicker({
      dateFormat: 'dd/mm/yy'
    });
  });
</script>