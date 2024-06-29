
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-sm-center" >
            <h3>Rent Collection Report</h3>
            <h6><b>From :</b> {{ $from }} <b>To :</b> {{ $to }}</h6>
            <h6><b>Building :</b> @if  ($building_id == 1)  BUILDING-1   @endif
                          @if  ($building_id == 2)  BUILDING-2   @endif
                          @if  ($building_id == 'ALL')  ALL   @endif
            </h6>
            <h6><b>Renter Type :</b> {{ $is_active }}</h6>
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
                      <th> Update By</th>      
                  </tr>
                  </thead>
                  <tbody>
                  @php
                   $t_rent = 0;
                   $t_ebill = 0;
                   $t_gbill = 0;
                   $t_obill = 0;


                  @endphp

                  @foreach ($rentcollections as $key=>$rentcollection)
                    
                   @php   $t_rent =  $t_rent +  $rentcollection->rent_amt; 
                          $t_ebill = $t_ebill +  $rentcollection->electric_bill;
                          $t_gbill = $t_gbill + $rentcollection->gas_bill;
                          $t_obill = $t_obill + $rentcollection->others_bill;
                    @endphp        
                
                    <tr>
                      <td>{{++$key}}</td>                     
                      <td>{{ \Carbon\Carbon::parse($rentcollection->rent_for_month)->format('d/m/Y')}}</td>
                      <td>{{ optional($rentcollection->buildinginfo)->name }}
                      </td>
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
                      <td>{{ $rentcollection->updated_by }}</td>                                      
                   
                      </tr>
                    @endforeach

                  
                  </tbody>
                  <tfoot>
                 
                  <tr>
                                         
                      <th colspan="5" class="text-center">Total</th>
                      
                      <th>{{ $t_rent }}</th>
                      <th>{{ $t_ebill }} </th>
                      <th>{{ $t_gbill }} </th>
                      <th>{{ $t_obill }} </th>
                      <th>{{ $t_rent + $t_ebill + $t_gbill + $t_obill }}</th>
                      <th> </th>
                      <th></th>
                      <th></th>
                      <th></th> 
                      <th></th>      
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