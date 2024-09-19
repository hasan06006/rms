
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rent Collection Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rent Collection Information</li>             
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
                  <a href="{{url('/addrentcollection')}}" class="btn btn-primary" >Add New </a>                   
                </h3>
                            
              
                <div class="card-tools">
                    {{ $rentcollections->links() }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                     
                      <th>For Month </th>
                      <th>Month & Year</th>                      
                      <th>Building</th>
                      <th>Flat</th>
                      <th>Name</th>
                      <th>Rent Amt</th>
                      <th>Electric </th>
                      <th>Gas </th>
                      <th>Others </th>
                      <th>Total</th>
                      <th>Paid From </th>
                      <th>Note</th>
                      <th>Collect By</th>
                      <th>Collect Date</th> 
                      <th>Update By</th>                     
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($rentcollections as $key=>$rentcollection)
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ \Carbon\Carbon::parse($rentcollection->rent_for_month)->format('d/m/Y')}}</td>
                      <td>{{ $rentcollection->month }} ,  {{ $rentcollection->year }}</td>                      
                      <td>{{optional($rentcollection->buildinginfo)->name}}</td>
                      <td>{{ optional($rentcollection->flatinfo)->name}}</td>                      
                      <td>{{ optional($rentcollection->renterinfo)->name }}</td>     
                      <td>{{ $rentcollection->rent_amt }}</td> 
                      <td>{{ $rentcollection->electric_bill }}</td> 
                      <td>{{ $rentcollection->gas_bill }}</td>
                      <td>{{ $rentcollection->others_bill }}</td> 
                      <td>{{ (int)$rentcollection->rent_amt +  (int)$rentcollection->electric_bill + (int)$rentcollection->gas_bill + (int)$rentcollection->others_bill }}</td> 
                      <td>{{ $rentcollection->rent_paid_from }}</td>  
                      <td>{{ $rentcollection->note }}</td>  
                      <td>{{ optional($rentcollection->createsby)->name }}</td>
                      <td>{{ \Carbon\Carbon::parse($rentcollection->created_at)->format('d/m/Y')}}</td>  
                      <td>{{ optional($rentcollection->updateby)->name }}</td>                                                         
                      <td>
                        <a  href="{{url('/editrentercollection/'.$rentcollection->id)}}"  >Edit</a> || 
                        <a  href="{{url('/pdfview/'.$rentcollection->id)}}" target="_blank">view</a>
                      <!--  <a  href="{{url('/pdfdownload/'.$rentcollection->id)}}">Print</a>
                          <a  href="{{url('/deleterentercollection/'.$rentcollection->id)}}">Delete</a>-->
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