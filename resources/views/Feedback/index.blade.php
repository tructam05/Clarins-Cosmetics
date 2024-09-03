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
          <a href="{{url('clarins/category/index')}}" class="nav-link ">
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
          <a href="{{url('clarins/category/add')}}" class="nav-link">
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
          <a href="{{url('clarins/contact')}}" class="nav-link  ">
            <i class="far fa-circle nav-icon"></i>
            <p>Contact Us</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/feedback')}}" class="nav-link active">
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


@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

<table class="table table-striped">
  <thead>
    <tr>
      <th>Product</th>
      <th>Customer</th>
      <th>Rate</th>
      <th>Content</th>
      <th>Time</th>
      <th>Status</th>
      <th>Active</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($reviews as $review)
    <tr>
      <td>{{ $review->product->name }}</td>
      <td>{{ $review->user->name }}</td>
      <td>{{ $review->rating }}</td>
      <td>{{ $review->content }}</td>
      <td>{{ $review->created_at }}</td>
      <td>
        @if ($review->is_approved)
        Approved
        @else
        <form action="{{ route('feedback.approve', $review) }}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="btn-approve">Approve</button>
        </form>
        @endif
      </td>
      <td>
        <form action="{{ route('feedback.destroy', $review) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn-delete">Delete</button>

        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

<style>
  .table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .btn-approve {
    background-color: #4CAF50;
    color: white;
    padding: 6px 15px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
  }

  .btn-delete {
    background-color: #e7264c;
    color: white;
    padding: 6px 15px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
  }
</style>