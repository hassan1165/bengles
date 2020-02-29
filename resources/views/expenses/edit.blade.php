@extends('layouts.app', ['title' => __('Expenses Management')])

@section('content')
    @include('expenses.partials.header', ['title' => __('Edit Expense')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Expenses Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('expenses.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('expenses.update', $expense) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Expense information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('expenseCategories') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-expenseCategories">{{ __('Expense Categories') }}</label>
                                    <select name="expense_category_id" class="form-control">
                                        <option selected="false">Select Expense Category</option>
                                        @foreach($expenseCategories as $expenseCategory)
                                            <option value="{{ $expenseCategory->id }}" {!! ($expense->expense_category_id==$expenseCategory->id?"selected":"") !!}>{{ $expenseCategory->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('expenseCategories'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('expenseCategories') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('account_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-account_id">{{ __('Accounts') }}</label>
                                    <select name="account_id" class="form-control">
                                        <option selected="false">Select Account</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}" {!! ($expense->account_id==$account->id?"selected":"") !!}>{{ $account->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('account_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_id') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-details">{{ __('Detail') }}</label>
                                    <input type="text" name="details" id="input-details" class="form-control form-control-alternative{{ $errors->has('details') ? ' is-invalid' : '' }}" placeholder="{{ __('Detail') }}" value="{{ old('details', $expense->details) }}" required autofocus>

                                    @if ($errors->has('details'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('details') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount') }}" value="{{ old('amount', $expense->amount) }}" required autofocus>

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('added_by') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-added_by">{{ __('Added By') }}</label>
                                    <input type="text" name="added_by" id="input-added_by" class="form-control form-control-alternative{{ $errors->has('added_by') ? ' is-invalid' : '' }}" placeholder="{{ __('Added By') }}" value="{{ old('added_by', $expense->added_by) }}" required autofocus>

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