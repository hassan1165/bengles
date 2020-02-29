@extends('layouts.app', ['title' => __('Transactions Management')])

@section('content')
    @include('transactions.partials.header', ['title' => __('Add Transaction')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Transactions Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('transactions.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Transaction information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('account_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-account_id">{{ __('Accounts') }}</label>
                                    <select name="account_id" class="form-control">
                                        <option selected="false">Select Account</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('account_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount') }}" value="{{ old('amount') }}" required autofocus>

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-details">{{ __('Detail') }}</label>
                                    <input type="text" name="details" id="input-details" class="form-control form-control-alternative{{ $errors->has('details') ? ' is-invalid' : '' }}" placeholder="{{ __('Detail') }}" value="{{ old('details') }}" required autofocus>

                                    @if ($errors->has('details'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('details') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('added_by') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-added_by">{{ __('Added By') }}</label>
                                    <input type="text" name="added_by" id="input-added_by" class="form-control form-control-alternative{{ $errors->has('added_by') ? ' is-invalid' : '' }}" placeholder="{{ __('Added By') }}" value="{{ old('added_by') }}" required autofocus>

                                    @if ($errors->has('added_by'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('added_by') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection