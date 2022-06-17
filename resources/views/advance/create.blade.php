
@extends('frontend.master')
@section('container')
<script type="text/css">
<link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
 </script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Anvance Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/addadvance') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="flat_id" class="col-md-4 col-form-label text-md-end">{{ __('Flat Name') }}</label>

                           <div class="col-md-6">                           
                                <select class="form-control @error('flat_id') is-invalid @enderror" name="flat_id" id="flat_id" required >
                                      <option value="">Select One</option>
                                @foreach ($flatinfos as $flatinfo)
                                      <option value="{{ $flatinfo->id }}">{{ $flatinfo->name }}</option>
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
                            <input id="bdname" type="text" class="form-control @error('bdname') is-invalid @enderror" name="bdname" value="{{ old('bdname') }}" required  readonly>                       
                              <input id="building_id" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="{{ old('building_id') }}" required  readonly>                             
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Renter Name') }}</label>

                            <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  readonly>
                              <input id="renter_id" type="hidden" class="form-control @error('renter_id') is-invalid @enderror" name="renter_id" value="{{ old('renter_id') }}" required  >
                            </div>
                        </div>
                      
                        
                        <div class="row mb-3">
                            <label for="credit_amt" class="col-md-4 col-form-label text-md-end">{{ __('Advance Amount') }}</label>

                            <div class="col-md-6">
                                <input id="credit_amt" type="text" class="form-control @error('credit_amt') is-invalid @enderror" name="credit_amt" value="{{ old('credit_amt') }}" required autocomplete="credit_amt" autofocus>

                                @error('credit_amt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Note(if any)') }}</label>

                            <div class="col-md-6">
                            <textarea id="note" class="form-control @error('note') is-invalid @enderror" rows="3" name="note" placeholder="Type address here ..."></textarea>
                            
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
                                    {{ __('SAVE') }}
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
<script>

$(document).ready(function(){

        $('#flat_id').on('change',function(){
        
       // e.preventDefault();
       
        var flat_id = $(this).val(); 
            

            $.ajax({          
                    type:'get',
                    url:"{{url('/getrenterData/')}}/"+flat_id,                                       
                    dataType:'json',//return data will be json
                    success:function(data){
                        // alert(name);
                        
                         //   console.log(data);
                          //alert( console.log(data.name));
                         // alert(data.name);
                         
                          

                            $('#building_id').val(data.building_id);
                            $('#name').val(data.name);
                            $('#renter_id').val(data.id);                         
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