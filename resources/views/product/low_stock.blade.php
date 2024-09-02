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
          <a href="{{url('clarins/product/index')}}" class="nav-link  ">
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
          <a href="{{url('clarins/product/add')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/product/low-stock')}}" class="nav-link active ">
            <i class="far fa-circle nav-icon"></i>
            <p>Out Of Stock Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/contact')}}" class="nav-link  ">
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
          <a href="{{url('clarins/chart')}}" class="nav-link ">
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

<div class="container mt-5">
  <h2 style="color: #b51828;">Product is almost out of stock</h2>
  <div class="row">
    @foreach ($products as $product)
    <div class="col-md-4 mb-3">
      <div class="card">
        <img src="{{ asset('user/images/product/' . $product->image->path) }}" class="card-img-top" alt="{{ $product->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <p class="card-text">Quantity: <span style="color: {{ $product->quantity < 30 ? '#b51828' : '' }}">{{ $product->quantity }}</span></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection