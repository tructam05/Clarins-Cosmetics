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
                <a href="{{url('clarins/category/index')}}" class="nav-link active"> <!-- active -->
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
            </ul>
          </li>


        </ul>
</nav>
@endsection

@section('content')


<div class="question-display">
    <div class="question-header">
        <h3>User Questions</h3>
</div>
    
@foreach ($contacts as $contact)

    <div class="question-content">
            <p> 
                <strong>Full name:</strong>  {{ $contact->name }}
            </p>



            <p>
                  <strong>Email:</strong>  {{$contact->email}} 
            </p>


            <p>
                <strong>Phone:</strong>  {{$contact->phone}} 
            </p>


            <p>
                <strong>Question:</strong>
            </p>
            <p>  {{$contact->question}}     </p>

              <p>
            <i>Created: {{$contact->created_at}}</i>
            </p>
        </div>
    <div class="question-footer">
        <a href="{{ route('contact.show', $contact) }}">
            <button class="btn-reply">Reply</button>
        </a>

        <a href="">
            <button class="btn-archive">Repository</button>
        </a>

        <a href="">
            <button class="btn-archive">Delete</button>
        </a>
    </div>

















@endforeach



















@endsection






























































