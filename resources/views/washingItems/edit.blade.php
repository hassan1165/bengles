@extends('layouts.app', ['title' => __('Washing Items Management')])

@section('content')
    @include('washingItems.partials.header', ['title' => __('Edit Washing Items')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Washing Items Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('washingItems.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('washingItems.update', $washingItems) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Washing Items information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('washing_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-washing_id">{{ __('Washings') }}</label>
                                    <select name="washing_id" class="form-control">

                                        @foreach($washings as $washing)
                                            <option value="{{ $washing->id }}" {!! ($washingItems->washing_id==$washing->id?"selected":"") !!}>{{ $washing->date }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('washing_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('washing_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('color') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-color">{{ __('Color') }}</label>
                                    <select name="color_id" class="form-control">

                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" {!! ($washingItems->color_id==$color->id ? "selected":"") !!}>{{ $color->title }}</option>
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
                                            <option value="{{ $size->id }}" {!! ($washingItems->size_id==$size->id ? "selected":"") !!}>{{ $size->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('size'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('size') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('design') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-design">{{ __('Design') }}</label>
                                    <select name="design_id" class="form-control">

                                        @foreach($designs as $design)
                                            <option value="{{ $design->id }}" {!! ($washingItems->size_id==$design->id ? "selected":"") !!}>{{ $design->title }}</option>
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
                                    <input type="text" name="quantity" id="input-quantity" class="form-control form-control-alternative{{ $errors->has('quantity') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantity') }}" value="{{ old('quantity', $washingItems->quantity) }}" required autofocus>

                                    @if ($errors->has('quantity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
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