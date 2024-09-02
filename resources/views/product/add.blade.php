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
          <a href="{{url('clarins/category/index')}}" class="nav-link "> <!-- active -->
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
          <a href="{{url('clarins/product/add')}}" class="nav-link active">
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

<h3>Thêm sản phẩm mới</h3>

@if(Session::has('msg'))
<div class="alert alert-success" id="alert">
  {{ session('msg') }}
</div>
@endif

<form action="{{ url('/clarins/product/save') }}" method="post">
  @csrf
  <div class="card-body">
    <div class="form-group">
      <label for="menu">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter Name">
    </div>


    <div class="form-group">
      <label for="price">Price</label>
      <div style="display: flex; align-items: center;">
        <input type="text" name="price" class="form-control" placeholder="Enter Price">
        <select name="currency" class="form-control" style="border: 2px solid #B51828; border-radius: 5px; width: auto;">
          <option value="VND">VND</option>
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
          <!-- Thêm các đơn vị tiền tệ khác ở đây -->
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="menu">Quantity</label>
      <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
    </div>



    <div class="form-group">
      <label for="menu">Short Description</label>
      <textarea name="short_description" class="form-control" placeholder="Enter Short Description"></textarea>
    </div>



    <div class="form-group">
      <label for="menu"> Description</label>
      <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
    </div>



    <div class="form-group">
      <label for="menu"> Ingredients</label>
      <textarea name="ingredients" class="form-control" placeholder="Enter Ingredients"></textarea>
    </div>

    <div class="form-group">
      <label for="menu">List</label>
      <select class="form-control" name="category_id">
        <option value="0">Category</option>

        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach


      </select>
    </div>




    <div class="form-group">
      <label>Status</label>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="1" type="radio" id="in_stock" name="status" checked="">
        <label for="in_stock" class="custom-control-label">In Stock</label>
      </div>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="0" type="radio" id="out_of_stock" name="status">
        <label for="out_of_stock" class="custom-control-label">Out of Stock</label>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-pink">Create List</button>
    </div>
  </div>
</form>








@endsection