
@extends('frontend.master')

@section('container')


<!-- Datepicker -->
<link rel="stylesheet" href="{{asset('resources/plugins/datepicker/bootstrap-datepicker.css')}}"> 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rent Collection Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/editrentercollection/'.$rentcollection->id)}}">
                        @csrf
                      
                       
                        <div class="row mb-3">
                            <label for="rent_for_month" class="col-md-4 col-form-label text-md-end">{{ __('Rent for the month') }}</label>

                            <div class="col-md-6">
                            <input type="date" class="form-control @error('rent_for_month') is-invalid @enderror" name="rent_for_month" value="{{ $rentcollection->rent_for_month }}" required autocomplete="rent_for_month" autofocus> 
                                @error('rent_for_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    


                     <div class="row mb-3">
                            <label for="flat_id" class="col-md-4 col-form-label text-md-end">{{ __('Flat Name') }}</label>

                           <div class="col-md-6">                           
                                <select class="form-control @error('flat_id') is-invalid @enderror" name="flat_id" id="flat_id" required >
                                      <option value="">Select One</option>
                                @foreach ($flatinfos as $flatinfo)
                                <option value="{{ $flatinfo->id }}" @if($flatinfo->id == $rentcollection->flat_id) selected='selected' @endif>{{ $flatinfo->name }}</option>
                                     
                                @endforeach                   
                                  
                                                                      
                                </select>                            

                                @error('assigned_flat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="building_id" class="col-md-4 col-form-label text-md-end">{{ __('Building') }}</label>

                            <div class="col-md-6">  
                            <input id="bdname" type="text" class="form-control @error('bdname') is-invalid @enderror" name="bdname" value="{{ optional($rentcollection->buildinginfo)->name }}" required  readonly>                   
                              <input id="building_id" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="{{ $rentcollection->building_id }}" required  readonly>                             
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Renter Name') }}</label>

                            <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ optional($rentcollection->renterinfo)->name }}" required  readonly>
                              <input id="renter_id" type="hidden" class="form-control @error('renter_id') is-invalid @enderror" name="renter_id" value="{{ $rentcollection->renter_id }}" required  >
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="rent_amt" class="col-md-4 col-form-label text-md-end">{{ __('Rent Amount') }}</label>

                            <div class="col-md-6">
                                <input id="rent_amt" type="text" class="form-control @error('rent_amt') is-invalid @enderror" name="rent_amt" value="{{ $rentcollection->rent_amt }}" required readonly autocomplete="rent_amt" autofocus   >

                                @error('rent_amt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="electric_bill" class="col-md-4 col-form-label text-md-end">{{ __('Electric Bill') }}</label>

                            <div class="col-md-6">
                                <input id="electric_bill" type="text" class="form-control @error('electric_bill') is-invalid @enderror" name="electric_bill" value="{{ $rentcollection->electric_bill }}"  autocomplete="electric_bill" autofocus>

                                @error('electric_bill')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gas_bill" class="col-md-4 col-form-label text-md-end">{{ __('Gas Bill') }}</label>

                            <div class="col-md-6">
                                <input id="gas_bill" type="text" class="form-control @error('gas_bill') is-invalid @enderror" name="gas_bill" value="{{ $rentcollection->gas_bill }}"  autocomplete="gas_bill" autofocus>

                                @error('gas_bill')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="others_bill" class="col-md-4 col-form-label text-md-end">{{ __('Others Bill') }}</label>

                            <div class="col-md-6">
                                <input id="others_bill" type="text" class="form-control @error('others_bill') is-invalid @enderror" name="others_bill" value="{{ $rentcollection->others_bill }}"  autocomplete="gas_bill" autofocus>

                                @error('gas_bill')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="rent_paid_from" class="col-md-4 col-form-label text-md-end">{{ __('Rent Paid From') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control select2" name="rent_paid_from" id="rent_paid_from" required >                         
                                    
                                    <option value="GENERAL" @if($rentcollection->rent_paid_from==='GENERAL') selected='selected' @endif >GENERAL</option> 
                                    <option value="ADVANCE" @if($rentcollection->rent_paid_from==='ADVANCE') selected='selected' @endif > ADVANCE </option>   
                                </select>               
                                
                              
                                @error('rent_paid_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Note(if any)') }}</label>

                            <div class="col-md-6">
                            <textarea id="note" class="form-control @error('note') is-invalid @enderror" rows="3" name="note" placeholder="Type address here ...">{{ $rentcollection->note }}</textarea>
                            
                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE') }}
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

----->

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
                            $('#bdname').val(data.bname); 
                          
                          
                    },
                    error:function(){
                    alert("Error Occurred");
                    }
                
                });
         


        });
});
</script>


 @endsection