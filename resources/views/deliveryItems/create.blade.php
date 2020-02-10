@extends('layouts.app', ['title' => __('Delivery Items Management')])

@section('content')
    @include('deliveryItems.partials.header', ['title' => __('Add Delivery Items')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Delivery Items Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('deliveryItems.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('deliveryItems.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Delivery Items information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('incoming_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-incoming_id">{{ __('Incomings') }}</label>
                                    <select name="incoming_id" class="form-control">

                                        @foreach($incomings as $incoming)
                                            <option value="{{ $incoming->id }}">{{ date("m/d/Y", strtotime( $incoming->date ) ) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('incoming_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('incoming_id') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('color') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-color">{{ __('Color') }}</label>
                                    <select name="color_id" class="form-control">

                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('color'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('color') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('size') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-size">{{ __('Size') }}</label>
                                    <select name="size_id" class="form-control">

                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('size'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('size') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('design') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-design">{{ __('Size') }}</label>
                                    <select name="design_id" class="form-control">

                                        @foreach($designs as $design)
                                            <option value="{{ $design->id }}">{{ $design->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('design'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('design') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-quantity">{{ __('Quantity') }}</label>
                                    <input type="text" name="quantity" id="input-quantity" class="form-control form-control-alternative{{ $errors->has('quantity') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantity') }}" value="{{ old('quantity') }}" required autofocus>

                                    @if ($errors->has('quantity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('extra') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-extra">{{ __('Extra') }}</label>
                                    <input type="text" name="extra" id="input-extra" class="form-control form-control-alternative{{ $errors->has('extra') ? ' is-invalid' : '' }}" placeholder="{{ __('Extra') }}" value="{{ old('extra') }}" required autofocus>

                                    @if ($errors->has('extra'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('extra') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('unit_price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-unit_price">{{ __('Unit Price') }}</label>
                                    <input type="text" name="unit_price" id="input-unit_price" class="form-control form-control-alternative{{ $errors->has('unit_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Unit Price') }}" value="{{ old('unit_price') }}" required autofocus>

                                    @if ($errors->has('unit_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('unit_price') }}</strong>
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