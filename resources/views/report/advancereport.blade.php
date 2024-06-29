
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-sm-center" >
            <h3>Rent Collection Report</h3>
            <h6><b>From :</b> {{ $from }} <b>To :</b> {{ $to }}</h6>
            <h6><b>Renter ID :</b> @if($renter_id == NULL)  ALL @endif  
                                   @if($renter_id != NULL)  {{$renter_id}} @endif
           
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
             
              <!-- /.card-header -->
              <div class="card-body p-0">             
                

                <table id="example1" class="table table-bordered table-striped">
                <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="">#</th>
                      <th>Renter ID</th>
                      <th>Renter Name</th>
                      <th>Flat</th>                      
                      <th>Advance Amt (Cr)</th> 
                      <th>Advance Amt (Dr)</th>                    
                      <th>Note</th>                                         
                      <th>Created Date</th>
                                                            
                    </tr>
                  </thead>
                  <tbody>

                  @php
                   $t_cr_amt = 0;
                   $t_dr_amt = 0;
                  @endphp
                
                  @foreach ($advances as $key=>$advance)

                  @php   
                      $t_cr_amt =  $t_cr_amt +  $advance->credit_amt;
                      $t_dr_amt =  $t_dr_amt +  $advance->debit_amt;   
                  @endphp   
                    <tr>
                      <td>{{++$key}}</td> 
                      <td>{{ $advance->renter_id }}</td> 
                      <td>{{ optional($advance->renterinfo)->name }}</td>                    
                      <td>{{ optional($advance->flatinfo)->name }}</td>                                         
                      <td>{{ $advance->credit_amt }}</td>     
                      <td>{{ $advance->debit_amt }}</td> 
                      <td>{{ $advance->note }}</td> 
                      <td>{{ \Carbon\Carbon::parse($advance->created_at)->format('d/m/Y') }}</td>                   
                   
                      </tr>
                    @endforeach

                
                  </tbody>
                  <tfoot>
                 
                  <tr>
                                         
                      <th colspan="4" class="text-center">Total</th>
                      <th>{{ $t_cr_amt }}</th>
                      <th>{{ $t_dr_amt }}</th>
                     
                  </tr>                   
                  
                  </tfoot>
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