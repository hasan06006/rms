
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
                  <a href="{{url('/addrenter')}}" class="btn btn-primary" >Add New </a>  
                </h3>

                <div class="card-tools">
                     {{ $renterinfos->links() }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                     
                      <th>Name</th>
                      <th>Father's name</th>
                      <th>NID</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Building</th>
                      <th> Flat</th>
                      <th>Category</th>
                      <th>Document</th>
                      <th>Renter Status</th>
                      <th>Created By</th> 
                      <th>Created Date</th> 
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($renterinfos as $key=>$renterinfo)
                    <tr>
                      <td>{{++$key}}</td>                      
                      <td> <a  href="{{url('/profile/'.$renterinfo->id)}}">{{ $renterinfo->name }}</a></td>
                      <td>{{ $renterinfo->father_name }}</td>
                      <td>{{ $renterinfo->nid }}</td>
                      <td>{{ $renterinfo->mobile }}</td>
                      <td>{{ $renterinfo->address }}</td>
                      <td>{{ optional($renterinfo->buildinginfo)->name }}</td>
                      <td>
                        {{ optional($renterinfo->flatinfo)->name}}</td>
                      <td>{{ $renterinfo->renter_category }}</td>
                      <td><a href="{{ asset('/uploads/documents/'.$renterinfo->document) }}">{{ $renterinfo->document }}</a></td>
                      <td>{{ $renterinfo->is_active }}</td>
                      <td>{{ optional($renterinfo->createsby)->name }}</td>
                      <td>{{ \Carbon\Carbon::parse($renterinfo->created_at)->format('d/m/Y') }}</td>
                      <td>@if($renterinfo->is_active =='ACTIVE')<a  href="{{url('/editrenter/'.$renterinfo->id)}}">Edit</a> || @endif
                    
                       @if(Auth::user()->role_name == 'Admin') 
                         <a  href="{{url('/deleterenter/'.$renterinfo->id)}}">Delete</a>
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