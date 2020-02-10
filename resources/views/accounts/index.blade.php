@extends('layouts.app', ['title' => __('Accounts Management')])

@section('content')
    @include('layouts.headers.cards')

    <style>

        input[type='radio']:after {
            background-color: red !important;
        }


        input[type='radio']:checked:after {
            background-color: #ffa500 !important;
        }
    </style>


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Accounts') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('accounts.create') }}" class="btn btn-sm btn-primary">{{ __('Add account') }}</a>
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
                                    <th scope="col">{{ __('title') }}</th>
                                    <th scope="col">{{ __('type') }}</th>
                                    <th scope="col">{{ __('description') }}</th>
                                    <th scope="col">{{ __('balance') }}</th>
                                    <th scope="col">{{ __('itemwise_pricing') }}</th>
                                    <th scope="col">{{ __('sales_tax') }}</th>
                                    <th scope="col">{{ __('status') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td>{{ $account->title }}</td>
                                        <td>{{ $account->type }}</td>
                                        <td>{{ $account->description }}</td>
                                        <td>{{ $account->balance }}</td>
                                        <td>{{ $account->itemwise_pricing }}</td>
                                        <td>{{ $account->sales_tax }}</td>
                                        <td>

                                            <a href="{{ route('accounts.index', [ "id" => $account->id, "status" => ($account->status == 1 ? 0 : 1) ] ) }}">
                                                <img src="{!! ( $account->status == 0 ? url('img/offdefault.png') : url('img/ondefault.png') ) !!}">
                                            </a>

                                        <td>{{ $account->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <form action="{{ route('accounts.destroy', $account) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('accounts.edit', $account) }}">{{ __('Edit') }}</a>
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
                            {{ $accounts->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection