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




<h3>Clarins Category</h3>
@if(Session::has('msg'))
<div class="alert alert-success" id="alert">
  {{session('msg')}}
</div>
@endif

@if(Session::has('msg'))
@endif
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <td> {{$category->id}} </td>
    <td> {{$category->name}} </td>
    <td> {{$category->description}} </td>
    <td>
      <a href="{{url('/clarins/category/edit/' . $category->id)}}" style="text-decoration: none;">
        <i class="fas fa-edit" style="color:#000080;"> Edit </i>
      </a>
      &nbsp; &nbsp; &nbsp;
      <a href="{{url('clarins/category/delete/' . $category->id)}}" onclick="return confirm('Are you sure?')" style="text-decoration: none;">
        <i class="fas fa-trash" style="color:#e7264c;">Delete</i>
      </a>
    </td>

    </tr>
    @endforeach



  </tbody>
</table>






































@endsection