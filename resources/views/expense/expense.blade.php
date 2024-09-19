
@extends('frontend.master')
@section('container')


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expense Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense Information</li>
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
                  <a href="{{url('/addexpense')}}" class="btn btn-primary" >Add New </a>  
                </h3>

                <div class="card-tools">
                     {{ $expenses->links() }} 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="">#</th>                      
                      <th>Expense Type</th>
                      <th>Amount</th>                     
                      <th>Note</th> 
                      <th>Created By</th>                                         
                      <th>Created Date</th> 
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($expenses as $key=>$expense)
                    <tr>
                      <td>{{++$key}}</td>                     
<<<<<<< HEAD
                      <td>{{ $expense->expense_type }}</td>
=======
                      <td>{{ $expense->expensetypeinfo->type }}</td>
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
                      <td>{{ $expense->amount }}</td>     
                      <td>{{ $expense->note }}</td> 
                      <td>{{ optional($expense->createsby)->name }}</td> 
                      <td>{{ \Carbon\Carbon::parse($expense->created_at)->format('d/m/Y') }}</td>                
                      <td><a  href="{{url('/editexpense/'.$expense->id)}}">Edit</a> || 
                          <a  href="{{url('/deleteexpense/'.$expense->id)}}">Delete</a>
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