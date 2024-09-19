
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Building Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Building Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">  
                      @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }} </h6>
                      @endif
                  <a href="{{url('/addbuilding')}}" class="btn btn-primary" >Add New </a>  
                </h3>
                <div class="card-tools">
                   
                </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                      
                      <th>Name</th>
                      <th>Description</th>                      
                      <th>Is Active</th>
                      <th>Created By</th>                      
                      <th>Created Date</th> 
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($buildings as $key=>$building)
                    <tr>
                      <td>{{++$key}}</td>                      
                      <td>{{ $building->name }}</td>
                     
                      <td>{{ $building->description }}</td>                                    
                      <td>{{ $building->is_active }}</td>
                      <td>{{ $building->created_by }}</td>
                      <td>{{ \Carbon\Carbon::parse($building->created_at)->format('d/m/Y') }}</td>
                      <td><a  href="{{url('/editbuilding/'.$building->id)}}">Edit</a> || 
                      @if(Auth::user()->role_name == 'Admin')
                          <a  href="{{url('/deletebuilding/'.$building->id)}}">Delete</a>
                      @endif    
                      </td>
                      </tr>
                    @endforeach

                
                  </tbody>
                </table>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
       
       
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  







 @endsection