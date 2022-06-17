
@extends('frontend.master')

@section('container')


<!-- Datepicker -->
<link rel="stylesheet" href="{{asset('resources/plugins/datepicker/bootstrap-datepicker.css')}}"> 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Process Data') }}</h3>
                     @if (session('status')=='success')
                        <h6 class="alert alert-success">{{ session('status') }} </h6>
                      @endif
                      @if (session('status')=='failed')
                        <h6 class="alert alert-danger">{{ session('status') }} </h6>
                      @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/dataprocessing') }}">
                        @csrf
                      
                       
                        <div class="row mb-3">
                            <label for="rent_for_month" class="col-md-4 col-form-label text-md-end">{{ __('Process for the month') }}</label>

                            <div class="col-md-6">
                            <input type="date" class="date form-control @error('rent_for_month') is-invalid @enderror" name="rent_for_month" value="{{ old('rent_for_month') }}" required autocomplete="rent_for_month" autofocus> 
                                @error('rent_for_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('RUN PROCESS') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{asset('resources/plugins/jquery/jquery.min.js')}}"></script>
<!-- Datepicker -->

<!--
<script src="{{asset('resources/plugins/datepicker/jquery.js')}}"></script>
<script src="{{asset('resources/plugins/datepicker/bootstrap-datepicker.js')}}"></script>


<script type="text/javascript">  
    $('.date').datepicker({  
       format: 'dd/mm/yyyy'     
     });  
</script>  

---->

<script>

$(document).ready(function(){

        $('#flat_id').on('change',function(){
        
       // e.preventDefault();
       
        var flat_id = $(this).val(); 
            

            $.ajax({          
                    type:'get',
                    url:"{{url('/getrenterDataCollection/')}}/"+flat_id,                                       
                    dataType:'json',//return data will be json
                    success:function(data){
                        // alert(name);
                        
                         //   console.log(data);
                          //alert( console.log(data.name));
                         // alert(data.name);
                        
                            $('#building_id').val(data.building_id);
                            $('#name').val(data.name);
                            $('#renter_id').val(data.id);
                            $('#rent_amt').val(data.rent_amt);                            
                           
                            if(data.building_id==1){

                                $('#bdname').text("BUILDING-1");
                            }
                            if(data.building_id==2){
                                $('#bdname').text("BUILDING-2");
                            }
                      
                    },
                    error:function(){
                    alert("Error Occurred");
                    }
                
                });
         


        });
});
</script>


 @endsection