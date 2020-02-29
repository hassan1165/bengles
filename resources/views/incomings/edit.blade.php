@extends('layouts.app', ['title' => __('Incoming Management')])

@section('content')
    @include('incomings.partials.header', ['title' => __('Edit Incoming')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Incoming Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('incomings.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('incomings.update', $incoming) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Incoming information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-incoming_date">{{ __('Incoming Date') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input name="date" class="form-control datepicker" placeholder="Select date" type="text" value="{{ old('date', date("m/d/Y", strtotime($incoming->date)) ) }}">
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('customer_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-customer_id">{{ __('Customers') }}</label>
                                    <select name="customer_id" class="form-control">
                                        <option selected="false">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {!! ($incoming->customer_id==$customer->id ? "selected": "") !!}>{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('customer_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('labour_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-labour_id">{{ __('Labours') }}</label>
                                    <select name="labour_id" class="form-control">
                                        <option selected="false">Select Customer</option>
                                        @foreach($labours as $labour)
                                            <option value="{{ $labour->id }}" {!! ($incoming->labour_id==$labour->id ? "selected": "") !!}>{{ $labour->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('labour_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('labour_id') }}</strong>
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