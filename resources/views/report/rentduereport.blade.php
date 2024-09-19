
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-sm-center" >
            <h3> Renter Due Report</h3>
            <h6><b>From :</b> {{ $from }} <b>To :</b> {{ $to }}</h6>
            <h6><b>Building :</b> @if  ($building_id == 1)  BUILDING-1   @endif
                          @if  ($building_id == 2)  BUILDING-2   @endif
                          @if  ($building_id == 'ALL')  ALL   @endif
            </h6>
           
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
                  <thead>
                  <tr>
                      <th >#</th>                     
                      <th>For Month </th>


					  <th>Month & Year</th>

                      <th>Building</th>
                      <th>Flat</th>
                      <th>Name</th>
                      <th>Rent Amt</th>                             
                      
                      
                  </tr>
                  </thead>
                  <tbody>
                  @php
                   $t_rent_amt = 0;
                 


                  @endphp

                  @foreach ($rentprocessors as $key=>$rentprocessor)
                  @php   $t_rent_amt = $t_rent_amt +  $rentprocessor->rent_amt;
                         
                    @endphp   
                 
                
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ \Carbon\Carbon::parse($rentprocessor->rent_for_month)->format('d/m/Y')}}</td>


					  <td>{{ $rentprocessor->month }} ,  {{ $rentprocessor->year }}</td>   

                      <td>{{ optional($rentprocessor->buildinginfo)->name }}
                      </td>
                      <td>{{ optional($rentprocessor->flatinfo)->name}}</td>                      
                      <td>{{ optional($rentprocessor->renterinfo)->name }}</td>     
                      <td>{{ $rentprocessor->rent_amt }}</td> 
        
                                                         
                   
                      </tr>
                    @endforeach

                  
                  </tbody>
                  <tfoot>
                 
                  <tr>
                                         
                      <th colspan="5" class="text-center">Total</th>                      
                      <th>{{ $t_rent_amt }}</th>
                      
                        
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