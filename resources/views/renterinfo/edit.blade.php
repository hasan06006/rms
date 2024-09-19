
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Renter Information Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/editrenter/'.$renterinfos->id) }}" enctype="multipart/form-data" >
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="renter_category" class="col-md-4 col-form-label text-md-end">{{ __('Renter Category') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('renter_category') is-invalid @enderror" name="renter_category" id="renter_category" required >
                                    <option value="General" @if($renterinfos->renter_category==='General') selected='selected' @endif >General</option> 
                                    <option value="Positioned" @if($renterinfos->renter_category==='Positioned') selected='selected' @endif > Positioned </option>
                                                                      
                                </select>                            

                                @error('renter_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $renterinfos->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="father_name" class="col-md-4 col-form-label text-md-end">{{ __('Father\'s Name') }}</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $renterinfos->father_name }}" required autocomplete="father_name" autofocus>

                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nid" class="col-md-4 col-form-label text-md-end">{{ __('NID') }}</label>

                            <div class="col-md-6">
                                <input id="nid" type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ $renterinfos->nid }}" required autocomplete="nid" autofocus>

                                @error('nid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $renterinfos->mobile }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" rows="3" name="address" placeholder="">{{ $renterinfos->address }}</textarea>
                            
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="assigned_flat" class="col-md-4 col-form-label text-md-end">{{ __('Flat Assign') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('assigned_flat') is-invalid @enderror" name="assigned_flat" id="assigned_flat" required >
                                   
                                    @foreach ($flatinfos as $flatinfo)
                                      <option value="{{ $flatinfo->id }}" @if($flatinfo->id == $renterinfos->assigned_flat) selected='selected' @endif>{{ $flatinfo->name }}</option>
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
                              <input id="bdname" type="text" class="form-control @error('bdname') is-invalid @enderror" name="bdname" value="{{ optional($renterinfos->buildinginfo)->name }}" required  readonly> 
                              <input id="building_id" type="hidden" class="form-control @error('building_id') is-invalid @enderror" name="building_id" value="{{ $renterinfos->building_id }} " required  readonly>                             
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Document') }}</label>
                             
                          
                            <div class="col-md-6">
                              
                                <div class="custom-file">                                   
                                    <input type="file" class="form-control" id="document" name="document" >
                                    <label for="document" >{{ $renterinfos->document }}</label> 
                                </div>                             
                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Is Active') }}</label>
                            <div class="col-md-8">  
                               
                                    <div class="">
                                    <input class="" type="radio" id="is_active" value="ACTIVE" name="is_active" @if($renterinfos->is_active==='ACTIVE') checked @endif >
                                    <label for="is_active" class="">ACTIVE</label>   
                                    <input class="" type="radio" id="is_active" value="INACTIVE" name="is_active" @if($renterinfos->is_active==='INACTIVE') checked @endif>
                                    <label for="is_active" class="">INACTIVE</label>                                   
                                    </div> 
                                   
                               
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

        $('#assigned_flat').on('change',function(){
        
       // e.preventDefault();
       
        var flat_id = $(this).val(); 
            

            $.ajax({          
                    type:'get',
                    url:"{{url('/getbuildinginfo/')}}/"+flat_id,                                       
                    dataType:'json',//return data will be json
                    success:function(data){
                        // alert(name);
                        
                         //   console.log(data);
                          //alert( console.log(data.name));
                         // alert(data.name);
                        
                            $('#building_id').val(data.building_id);
                            $('#bdname').val(data.name);
                                                     
                           
                           
                      
                    },
                    error:function(){
                    alert("Error Occurred");
                    }
                
                });
         


        });
});
</script>


 @endsection