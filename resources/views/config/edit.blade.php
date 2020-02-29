@extends('layouts.app', ['title' => __('Config Management')])

@section('content')
    @include('config.partials.header', ['title' => __('Edit Config')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Config Management') }}</h3>
                            </div>
                            {{--<div class="col-4 text-right">--}}
                                {{--<a href="{{ route('config.update') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('config.store') }}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Config information') }}</h6>
                            <div class="pl-lg-4">

                                @foreach($configs as $config => $key)

                                    <?php

                                        switch($key->type){
                                            case "text":
                                            case "textarea":
                                            case "file":
                                    ?>
                                                <div class="form-group{{ $errors->has('default_values') ? ' has-danger' : '' }}">

                                                    @if($key->type === "textarea")
                                                        <label class="form-control-label" for="input-default_values">{{ __( $key->title ) }}</label>
                                                        <form>
                                                            <textarea name="values[{{ $key->id }}]" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a large text here ..." value="{{ old('values', $key->value) }}">{{ $key->value }}</textarea>
                                                        </form>
                                                    @else
                                                        <label class="form-control-label" for="input-default_values">{{ __( $key->title ) }}</label>
                                                        <input type="{{ $key->type }}" name="values[{{ $key->id }}]" id="input-default_values" class="form-control form-control-alternative{{ $errors->has('default_values') ? ' is-invalid' : '' }}" placeholder="{{ __('Added By') }}" value="{{ old('values', $key->value) }}" autofocus>
                                                    @endif

                                                    @if ($errors->has('default_values'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('default_values') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                    <?php
                                            break;
                                            case "checkbox":
                                            case "radio":
                                            case "combobox":
                                    ?>
                                                <div class="form-group{{ $errors->has('checkbox') ? ' has-danger' : '' }}">

                                                    @if($key->type === "checkbox" || $key->type === "radio")
                                                        <label class="form-control-label" for="input-checkbox">{{ __( $key->title ) }}</label>
                                                    <?php $checkBoxVal = explode(",",$key->default_values);
                                                    foreach($checkBoxVal as $i => $chkVal) {

                                                    ?>
                                                        <div class="custom-control custom-{{$key->type}}">

                                                            <input name="values[{{ $key->id }}]" class="custom-control-input" id="{{ ($key->type === "checkbox"?'customCheck'.$i:'customRadio'.$i) }}" type="{{$key->type}}" value="{{ old('values', $chkVal) }}">
                                                            <label class="custom-control-label" for="{{ ($key->type === "checkbox"?'customCheck'.$i:'customRadio'.$i) }}">{{ $chkVal }}</label>

                                                        </div>
                                                    <?php } ?>
                                                        @elseif($key->type === "combobox")
                                                            <label class="form-control-label" for="input-checkbox">{{ __( $key->title ) }}</label>
                                                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">

                                                                    <select name="values[{{ $key->id }}]" class="form-control">
                                                                        <option selected="false">Select Type</option>
                                                                        <?php
                                                                        $val = explode(",",$key->default_values);
                                                                        foreach($val as $i =>$optVal) {
                                                                        ?>
                                                                        <option value="{{ $optVal }}" {{ ($key->type) }}>{{ $optVal }}</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    @if ($errors->has('type'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('type') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                        @endif

                                                    @if ($errors->has('checkbox'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('checkbox') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                    <?php
                                        break;
                                        }
                                    ?>
                                @endforeach

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