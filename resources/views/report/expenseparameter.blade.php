
@extends('frontend.master')

@section('container')





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Expense Report') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/ereport') }}">
                        @csrf
                      
                       
                        <div class="row mb-3">
                            <label for="from" class="col-md-4 col-form-label text-md-end">{{ __('From') }}</label>

                            <div class="col-md-6">
                            <input type="date" id="from" class=" form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from') }}" required autocomplete="from" autofocus> 
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="to" class="col-md-4 col-form-label text-md-end">{{ __('To') }}</label>

                            <div class="col-md-6">
                            <input type="date" id="to" class=" form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autocomplete="to" autofocus> 
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  
                        
                        <div class="row mb-3">
                            <label for="expense_type" class="col-md-4 col-form-label text-md-end">{{ __('Expense Type') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control select2" name="expense_type" id="expense_type" required >
                                    <option value="ALL">ALL</option>
                                    <option value="GENERAL EXPENSE">GENERAL EXPENSE</option> 
                                    <option value="AMINUL HAQUE">AMINUL HAQUE</option>
                                    <option value="MAZHARUL HAQUE">MAZHARUL HAQUE</option>                                                                      
                                </select>               
                                
                              
                                @error('expense_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
            
                        
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
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


 @endsection