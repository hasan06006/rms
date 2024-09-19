
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Anvance Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/editadvance/'.$advances->id)}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="assignFlat" class="col-md-4 col-form-label text-md-end">{{ __('Flat Name') }}</label>

                            <div class="col-md-6">                           
                            <select class="form-control @error('flat_id') is-invalid @enderror" name="flat_id" id="flat_id" required >
                                      <option value="">Select One</option>
                                      @foreach ($flatinfos as $flatinfo)
                                      <option value="{{ $flatinfo->id }}" @if($flatinfo->id == $advances->flat_id) selected='selected' @endif>{{ $flatinfo->name }}</option>
                                    @endforeach        
                                  
                                                                      
                                </select>    
                                
                              
                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="building_id" class="col-md-4 col-form-label text-md-end">{{ __('Building') }}</label>

                            <div class="col-md-6">  
<<<<<<< HEAD
                                <span id="bdname"> </span>                          
                              <input id="building_id" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="{{ $rentcollection->building_id }}" required  readonly>                             
=======
                            <input id="bdname" type="text" class="form-control @error('bdname') is-invalid @enderror" name="bdname" value="{{ optional($advances->buildinginfo)->name }}" required  readonly>                          
                              <input id="building_id" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="{{ $advances->building_id }}" required  readonly>                             
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Renter Name') }}</label>

                            <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $advances->name }}" required  readonly>
                              <input id="renter_id" type="hidden" class="form-control @error('renter_id') is-invalid @enderror" name="renter_id" value="{{ $advances->id }}" required  >
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Advance Amount') }}</label>

                            <div class="col-md-6">
                                <input id="credit_amt" type="text" class="form-control @error('credit_amt') is-invalid @enderror" name="credit_amt" value="{{ $advances->credit_amt }}" required autocomplete="credit_amt" autofocus>

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
                            <textarea id="note" class="form-control @error('note') is-invalid @enderror" rows="3" name="note" placeholder="Type address here ...">{{ $advances->note }}</textarea>
                            
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
                                    {{ __('Update') }}
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
<<<<<<< HEAD
                         
                            $('#building_id').val(data.building_id);
                            $('#name').val(data.name);
                            $('#renter_id').val(data.id);

                            if(data.building_id==1){
                                $('#bdname').text("Baitul Haque");
                            }
                            if(data.building_id==2){
                                $('#bdname').text("Haque Mansion");
                            }
=======
                            $('#building_id').val(data.building_id);
                            $('#name').val(data.name);
                            $('#renter_id').val(data.id);                         
                            $('#bdname').val(data.bname);
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
                        
                       
                    
                      
                    },
                    error:function(){
                    alert("Error Occurred");
                    }
                
                });
         


        });
});
</script>


 @endsection