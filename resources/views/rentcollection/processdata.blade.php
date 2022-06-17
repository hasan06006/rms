
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="">Process data for rent collection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Processing </li>             
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
                  
                  <a style="margin-left:100px;" href="{{url('/dataprocessing')}}" class=" btn btn-danger" >Process Data  </a>              
                </h3>
                            
              
                <div class="card-tools">
                    {{ $rentprocessors->links() }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                     
                      <th>Process for </th>                      
                      <th>Month & year </th>                    
                      <th>Renter</th>
                      <th>Building</th>
                      <th>Flat</th> 
                      <th>Rent Amount</th>                           
                      <th>Processing Date</th>                               
                                        
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($rentprocessors as $key=>$rentprocessor)
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ \Carbon\Carbon::parse($rentprocessor->rent_for_month)->format('d/m/Y')}}</td> 
                      <td>{{ $rentprocessor->month}} , {{$rentprocessor->year}} </td>                    
                      <td>{{ optional($rentprocessor->renterinfo)->name}}</td>                       
                      <td>{{optional($rentprocessor->buildinginfo)->name}} </td>
                      <td>{{ optional($rentprocessor->flatinfo)->name}}</td>             
                      <td>{{ $rentprocessor->rent_amt }}</td>
                      <td>{{ \Carbon\Carbon::parse($rentprocessor->created_at)->format('d/m/Y')}}</td>           
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