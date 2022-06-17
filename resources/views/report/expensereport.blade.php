
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-sm-center" >
            <h3>Rent Collection Report</h3>
            <h6><b>From :</b> {{ $from }} <b>To :</b> {{ $to }}</h6>
            <h6><b>Expense Type :</b>{{ $expense_type}} 
           
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
                      <th>Expense Type</th>
                      <th>Amount</th>                     
                      <th>Note</th>
                      <th>Created By</th>                                         
                      <th>Created Date</th> 
                                      
                    </tr>
                  </thead>
                  <tbody>
                  @php
                   $t_amt = 0;
                  @endphp
                  
                  @foreach ($expenses as $key=>$expense)
                 
                  @php  $t_amt = $t_amt +  $expense->amount;
                         
                         @endphp   
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ $expense->expense_type }}</td>
                      <td>{{ $expense->amount }}</td>     
                      <td>{{ $expense->note }}</td> 
                      <td>{{ optional($expense->createsby)->name }}</td>
                      <td>{{ \Carbon\Carbon::parse($expense->created_at)->format('d/m/Y') }}</td>                
                     
                      </tr>
                    @endforeach


                
                  </tbody>
                  <tfoot>
                 
                  <tr>
                                         
                      <th colspan="2" class="text-center">Total</th>
                      <th>{{ $t_amt }}</th>
                     
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