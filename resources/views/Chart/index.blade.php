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
          <a href="{{url('clarins/feedback')}}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Feedback Center</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('clarins/chart')}}" class="nav-link active ">
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
<table>
  <thead>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Chart 2024</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </thead>
  <tbody>
    <h3 class="h3">2024 Revenue Statistics Chart</h3>
    <div style="width: 80%; margin: auto;">
      <canvas id="revenueChart"></canvas>
    </div>

    <script>
      var ctx = document.getElementById('revenueChart').getContext('2d');
      var revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [{
            label: 'Revenue in 2024',
            data: @json($revenues),
            backgroundColor: 'rgba(181, 24, 40, 0.2)',
            borderColor: '#b51828',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
  </tbody>

  <style>
    .h3 {
      color: #b51828;
      text-align: center;
    }
  </style>
  <br><br><br><br>
  <h3 class="h3">Summary</h3>



  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>40<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="fas fa-chart-pie"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
  </div>


</table>


@endsection