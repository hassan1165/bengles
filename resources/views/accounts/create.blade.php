@extends('layouts.app', ['title' => __('Account Management')])

@section('content')
    @include('accounts.partials.header', ['title' => __('Add Account')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Account Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('accounts.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('accounts.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Account information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-type_id">{{ __('Design') }}</label>
                                    <select name="type" class="form-control">
                                            <option value="0">Current Assets</option>
                                            <option value="1">Fixed Assets</option>
                                            <option value="2">Capital</option>
                                    </select>
                                    @if ($errors->has('type_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('balance') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-balance">{{ __('Balance') }}</label>
                                    <input type="text" name="balance" id="input-balance" class="form-control form-control-alternative{{ $errors->has('balance') ? ' is-invalid' : '' }}" placeholder="{{ __('Balance') }}" value="{{ old('balance') }}" required autofocus>

                                    @if ($errors->has('balance'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('balance') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('itemwise_pricing') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-itemwise_pricing">{{ __('ItemWise Pricing') }}</label>
                                    <input type="text" name="itemwise_pricing" id="input-itemwise_pricing" class="form-control form-control-alternative{{ $errors->has('itemwise_pricing') ? ' is-invalid' : '' }}" placeholder="{{ __('ItemWise Pricing') }}" value="{{ old('itemwise_pricing') }}" required autofocus>

                                    @if ($errors->has('itemwise_pricing'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('itemwise_pricing') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('sales_tax') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-sales_tax">{{ __('Sales Tax') }}</label>
                                    <input type="text" name="sales_tax" id="input-sales_tax" class="form-control form-control-alternative{{ $errors->has('sales_tax') ? ' is-invalid' : '' }}" placeholder="{{ __('Sales Tax') }}" value="{{ old('sales_tax') }}" required autofocus>

                                    @if ($errors->has('sales_tax'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sales_tax') }}</strong>
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