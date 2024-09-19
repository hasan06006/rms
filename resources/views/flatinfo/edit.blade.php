
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Flat Information Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/editflat/'.$flatinfos->id) }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="building_id" class="col-md-4 col-form-label text-md-end">{{ __('Building Name') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('building_id') is-invalid @enderror" name="building_id" id="building_id" required >                                   

                                    @foreach ($buildings as $building)                                     
                                      <option value="{{ $building->id }}" @if($flatinfos->building_id == $building->id) selected='selected' @endif>{{ $building->name }}</option>
                                    @endforeach  
                                                                      
                                </select>                            

                                @error('building_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Flat Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $flatinfos->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="renter_category" class="col-md-4 col-form-label text-md-end">{{ __('Renter Category') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control @error('renter_category') is-invalid @enderror" name="renter_category" id="renter_category" required >
                                    <option value="GENERAL" @if($flatinfos->renter_category==='GENERAL') selected='selected' @endif >GENERAL</option> 
                                    <option value="POSITIONED" @if($flatinfos->renter_category==='POSITIONED') selected='selected' @endif > POSITIONED </option>
                                                                      
                                </select>                            

                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Rent Amount') }}</label>

                            <div class="col-md-6">
                                <input id="rent_amt" type="number" class="form-control @error('rent_amt') is-invalid @enderror" name="rent_amt" value="{{ $flatinfos->rent_amt }}" required autocomplete="rent_amt" autofocus>

                                @error('rent_amt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Note(if any)') }}</label>

                            <div class="col-md-6">
                            <textarea id="note" class="form-control @error('note') is-invalid @enderror" rows="3" name="note" placeholder="Type address here ...">{{ $flatinfos->note }}</textarea>
                            
                                @error('note')
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
                                    @if($flatinfos->is_active==='AVAILABLE')
                                    <input class="" type="radio" id="is_active" value="AVAILABLE" name="is_active" @if($flatinfos->is_active==='AVAILABLE') checked @endif >
                                    <label for="is_active" class="">AVAILABLE</label> 
                                    @endif
                                    @if($flatinfos->is_active==='BOOKED')  
                                    <input class="" type="radio" id="is_active" value="BOOKED" name="is_active" @if($flatinfos->is_active==='BOOKED') checked @endif>
                                    <label for="is_active" class="">BOOKED</label>
                                    @endif
                                                                     
                                       
                                </div>                                
                               
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


 @endsection