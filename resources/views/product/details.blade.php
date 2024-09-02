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
<h3>Product Details</h3>

<div class="container mt-5">
  <div class="card">

    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          @foreach ($images as $image)
          <img src="{{ asset('user/images/product/' . $image->path) }}" class="img-fluid" alt="{{ $product->name }}">
          <br><br><br>

          @endforeach
        </div>
        <div class="col-md-8">
          <h2 class="text-primary" style="color: #b51828;">{{ $product->name }}</h2>
          <p><strong>Price:</strong> {{ $product->price }}</p>
          <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
          <p><strong>Short Description:</strong> {{ $product->short_description }}</p>
          <p><strong>Description:</strong> {{ $product->description }}</p>
          <p><strong>Ingredients:</strong> {{ $product->ingredients }}</p>
          <p><strong>Category:</strong> {{ $product->category->name }}</p>
          <p><strong>Status:</strong> {{ $product->status }}</p>

        </div>
      </div>
    </div>
  </div>
</div>










@endsection