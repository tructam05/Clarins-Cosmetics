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
          <a href="{{url('clarins/product/index')}}" class="nav-link active ">
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
@if(Session::has('msg'))
<div class="alert alert-success" id="alert">
  {{ session('msg') }}
</div>
@endif

<form method="post" action="{{url('clarins/product/update')}}" enctype="multipart/form-data">
  @csrf

  <div class="card-body">
    <div class="form-group">
      <label for="menu">Name</label>
      <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>


    <div class="form-group">
      <label for="price">Price</label>
      <div style="display: flex; align-items: center;">
        <input type="text" name="price" class="form-control" placeholder="Enter Price" value="{{ $product->price }}">
        <select name="currency" class="form-control" style="border: 2px solid #B51828; border-radius: 5px; width: auto;">
          <option value="USD">USD</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="menu">Quantity</label>
      <input type="text" name="quantity" class="form-control" value="{{ $product->quantity  }}" placeholder="Enter Quantity">

    </div>



    <div class="form-group">
      <label for="menu">Short Description</label>
      <input type="text" name="short_description" value="{{ $product->short_description }}" class="form-control" placeholder="Enter Short Description">

    </div>



    <div class="form-group">
      <label for="menu"> Description</label>
      <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Enter Description">
    </div>



    <div class="form-group">
      <label for="menu"> Ingredients</label>
      <input type="text" name="ingredients" value="{{ $product->ingredients }}" class="form-control" placeholder="Enter Ingredients">
    </div>

    <div class="form-group">
      <label for="menu">List</label>
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
        @endforeach
      </select>
    </div>



    <div class="form-group">
      <label for="menu">Images</label>
      <br>
      <input type="file" name="file">
      <br>
      @foreach($product->images as $image)
      <img src="{{ asset('user/images/product/' . $image->path) }}" width="70" height="70" alt="{{ $product->name }}">
      <button class="btn btn-pink"><a href="{{url('/clarins/product/delete-image/'.$image->id)}}">Delete</a></button>
      @endforeach
    </div>




    <div class="form-group">
      <label>Status</label>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="1" type="radio" id="in_stock" name="status" {{ $product->status === 1 ? 'checked' : '' }}>
        <label for="in_stock" class="custom-control-label">In Stock</label>
      </div>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="0" type="radio" id="out_of_stock" name="status" {{ $product->status === 0 ? 'checked' : '' }}>
        <label for="out_of_stock" class="custom-control-label">Out of Stock</label>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-pink">Update List</button>
      <input type="hidden" name="id" value="{{$product->id}}">
      <input type="hidden" name="photo" value="{{$product->photo}}">
    </div>


</form>







@endsection