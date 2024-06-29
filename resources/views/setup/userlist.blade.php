
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Renters Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Renters Information</li>
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
                  <a href="{{url('/addnewuser')}}" class="btn btn-primary" >Add New </a>  
                </h3>

                <div class="card-tools">
                     {{ $users->links() }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                     
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>User Role</th>
                      <th>Created at</th>
                      <th>Updated at</th>                     
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as $key=>$user)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->password }}</td>
                      <td>{{ $user->role_name }}</td>     
                      <td>{{ $user->created_at }}</td> 
                      <td>{{ $user->updated_at }}</td>                
                      <td><a  href="{{url('/edituser/'.$user->id)}}">Edit</a> || 
                          <a  href="{{url('/deleteuser/'.$user->id)}}">Delete</a>
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