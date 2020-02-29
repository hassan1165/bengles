@extends('layouts.app', ['title' => __('Config Variables Management')])

@section('content')
    @include('configVariable.partials.header', ['title' => __('Edit Config Variable')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Config Variables Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('configVariable.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('configVariable.update', $configVariable) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Config Variable information') }}</h6>
                            <div class="pl-lg-4">


                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $configVariable->title) }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('notes') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-notes">{{ __('Notes') }}</label>
                                    <input type="text" name="notes" id="input-notes" class="form-control form-control-alternative{{ $errors->has('notes') ? ' is-invalid' : '' }}" placeholder="{{ __('Notes') }}" value="{{ old('notes', $configVariable->notes) }}" autofocus>

                                    @if ($errors->has('notes'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-type">{{ __('Type') }}</label>
                                    <select name="type" class="form-control">
                                        <option selected="false">Select Type</option>
                                        <option value="text" {!! ($configVariable->type=="text"?"selected":"") !!}>text</option>
                                        <option value="checkbox" {!! ($configVariable->type=="checkbox"?"selected":"") !!}>checkbox</option>
                                        <option value="radio" {!! ($configVariable->type=="radio"?"selected":"") !!}>radio</option>
                                        <option value="textarea" {!! ($configVariable->type=="textarea"?"selected":"") !!}>textarea</option>
                                        <option value="editor" {!! ($configVariable->type=="editor"?"selected":"") !!}>editor</option>
                                        <option value="file" {!! ($configVariable->type=="file"?"selected":"") !!}>file</option>
                                        <option value="combobox" {!! ($configVariable->type=="combobox"?"selected":"") !!}>combobox</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('default_values') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-default_values">{{ __('Default Values') }}</label>
                                    <input type="text" name="default_values" id="input-default_values" class="form-control form-control-alternative{{ $errors->has('default_values') ? ' is-invalid' : '' }}" placeholder="{{ __('Added By') }}" value="{{ old('default_values', $configVariable->default_values) }}" autofocus>

                                    @if ($errors->has('default_values'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('default_values') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('key') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-key">{{ __('Key') }}</label>
                                    <input type="text" name="key" id="input-key" class="form-control form-control-alternative{{ $errors->has('key') ? ' is-invalid' : '' }}" placeholder="{{ __('Key') }}" value="{{ old('key', $configVariable->key) }}" required autofocus>

                                    @if ($errors->has('key'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('key') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-value">{{ __('Value') }}</label>
                                    <input type="text" name="value" id="input-value" class="form-control form-control-alternative{{ $errors->has('value') ? ' is-invalid' : '' }}" placeholder="{{ __('Value') }}" value="{{ old('value', $configVariable->value) }}" autofocus>

                                    @if ($errors->has('value'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('value') }}</strong>
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