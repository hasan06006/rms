
@extends('frontend.master')
@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Expense Entry Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/addexpense') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="expense_type" class="col-md-4 col-form-label text-md-end">{{ __('Expense Type') }}</label>

                            <div class="col-md-6">                           
                                <select class="form-control select2" name="expense_type" id="expense_type" required >
                                    <option value="">Select Expense type</option>
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

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Expense Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                @error('amount')
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


 @endsection