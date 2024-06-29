
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $total_flat }}</h3>

                <p>Total Flat</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total_booked_flat }}</h3>

                <p>Total Booked</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $total_available_flat }}</h3>

                <p>Total Available</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $total_positioned }}</h3>

                <p>Positioned Renter</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->       

           

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 @endsection