@extends('layouts.app', ['title' => __('Transactions Management')])

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Transactions') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('transactions.create') }}" class="btn btn-sm btn-primary">{{ __('Add Transaction') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('id') }}</th>
                                    <th scope="col">{{ __('project') }}</th>
                                    <th scope="col">{{ __('account') }}</th>
                                    <th scope="col">{{ __('reference') }}</th>
                                    <th scope="col">{{ __('datetime added') }}</th>
                                    <th scope="col">{{ __('amount') }}</th>
                                    <th scope="col">{{ __('details') }}</th>
                                    <th scope="col">{{ __('added by') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->project_id }}</td>
                                        <td>{{ $transaction->Account->title }}</td>
                                        <td>{{ $transaction->reference_id }}</td>
                                        <td>{{ date("m/d/Y", strtotime($transaction->datetime_added))  }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->details }}</td>
                                        <td>{{ $transaction->added_by }}</td>

                                        <td>

                                            <a href="{{ route('transactions.index', [ "id" => $transaction->id, "status" => ($transaction->status == 1 ? 0 : 1) ] ) }}">
                                                <img src="{!! ( $transaction->status == 0 ? url('img/offdefault.png') : url('img/ondefault.png') ) !!}">
                                            </a>
                                        </td>

                                        <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <form action="{{ route('transactions.destroy', $transaction) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('transactions.edit', $transaction) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $transactions->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection