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
          <a href="{{url('clarins/product/add')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/product/low-stock')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Out Of Stock Product</p>
          </a>
        </li>
      </ul>
    </li>


  </ul>
</nav>
@endsection



@section('content')
<h3>Clarins Product</h3>

@if(Session::has('msg'))
<div class="alert alert-success" id="alert">
  {{session('msg')}}
</div>
@endif




<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Photo</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Short Description</th>
      <th>Description</th>
      <th>Ingredients</th>
      <th>Category</th>
      <th>Status</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>

    @foreach($products as $product)
    <tr>
      <td>{{ $product->id}}</td>

      <td>{{ $product->name}}</td>

      <td>
        <a href="{{url('clarins/product/show', $product->id) }}">View More</a>
      </td>

      <td>{{ $product->price}}</td>

      <td>{{ $product->quantity}}</td>

      <td>
        <a href="{{url('clarins/product/show', $product->id) }}">View More</a>
      </td>

      <td>
        <a href="{{url('clarins/product/show', $product->id) }}">View More</a>
      </td>

      <td>
        <a href="{{url('clarins/product/show', $product->id) }}">View More</a>
      </td>

      <td>{{ $product->category->name }}</td>

      <td>
        @if ($product->status === 1)
        In stock
        @else
        Out of stock
        @endif
      </td>






      <td>
        <a href="{{url('clarins/product/edit/' . $product->id)}}" style="text-decoration: none;">
          <i class="fas fa-edit" style="color:#000080;"> Edit </i>
        </a>
        &nbsp; &nbsp; &nbsp;
        <a href="{{url('clarins/product/delete/' . $product->id)}}" onclick="return confirm('Are you sure?')">
          <i class="fas fa-trash" style="color:#e7264c;">Delete</i>
        </a>
      </td>
    </tr>
    @endforeach



  </tbody>
</table>

<script>
  const descriptions = document.querySelectorAll('.description');

  descriptions.forEach(description => {
    const fullText = description.textContent;
    const showMore = description.querySelector('.read-more');

    showMore.addEventListener('click', () => {
      if (description.style.height === '100px') {
        description.style.height = 'auto';
        showMore.textContent = 'Thu gọn';
      } else {
        description.style.height = '100px';
        showMore.textContent = 'Xem thêm';
      }
    });
  });
</script>

@endsection