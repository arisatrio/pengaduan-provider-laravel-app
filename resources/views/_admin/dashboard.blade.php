@extends('_admin.layouts.app')

@section('content')
<section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
      <div class="col-lg-3 col-6">
      
      <div class="small-box bg-info">
      <div class="inner">
      <h3>{{ \App\Models\TComplaint::count() }}</h3>
      <p>Pengaduan Total</p>
      </div>
      <div class="icon">
      <i class="ion ion-bag"></i>
      </div>
      </div>
      </div>
      
      <div class="col-lg-3 col-6">
      
      <div class="small-box bg-success">
      <div class="inner">
      <h3>{{ \App\Models\TComplaint::whereDoesntHave('replies')->count() }}</h3>
      <p>Pengaduan Baru</p>
      </div>
      <div class="icon">
      <i class="ion ion-stats-bars"></i>
      </div>
      </div>
      </div>
      
      <div class="col-lg-3 col-6">
      
      <div class="small-box bg-warning">
      <div class="inner">
      <h3>{{ \App\Models\TComplaint::whereHas('replies')->count() }}</h3>
      <p>Pengaduan Dibalas</p>
      </div>
      <div class="icon">
      <i class="ion ion-person-add"></i>
      </div>
      </div>
      </div>
      
      <div class="col-lg-3 col-6">
      
      <div class="small-box bg-danger">
      <div class="inner">
      <h3>{{ \App\Models\Category::count() }}</h3>
      <p>Kategori Pengaduan Total</p>
      </div>
      <div class="icon">
      <i class="ion ion-pie-graph"></i>
      </div>
      </div>
      </div>
      
      </div>

  </section>
@endsection