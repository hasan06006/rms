
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advance Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advance Information</li>
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
                  <a href="{{url('/addadvance')}}" class="btn btn-primary" >Add New </a>  
                </h3>

                <div class="card-tools">
                    {{ $advances->links() }} 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>
                      <th>Building</th>
                      <th>Flat</th>
                      <th>Renter Name</th>
                      <th>Advance Amt (Cr)</th> 
                      <th>Advance Amt (Dr)</th>                    
                      <th>Note</th>
                      <th>Created By</th>                                          
                      <th>Created Date</th>                      
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                
                  @foreach ($advances as $key=>$advance)
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ optional($advance->flatinfo)->name }}</td>
                      <td>{{optional($advance->buildinginfo)->name}}</td>
                      <td>{{ optional($advance->renterinfo)->name }}</td>                      
                      <td>{{ $advance->credit_amt }}</td>     
                      <td>{{ $advance->debit_amt }}</td> 
                      <td>{{ $advance->note }}</td> 
                      <td>{{ optional($advance->createsby)->name }}</td> 
                      <td>{{ \Carbon\Carbon::parse($advance->created_at)->format('d/m/Y') }}</td>                                      
                      <td><a  href="{{url('/editadvance/'.$advance->id)}}">Edit</a> || 

                          <a  href="{{url('/deleteadvance/'.$advance->id)}}">Delete</a>

                      @if(Auth::user()->role_name == 'Admin') 
                          <a  href="{{url('/deleteadvance/'.$advance->id)}}">Delete</a>
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