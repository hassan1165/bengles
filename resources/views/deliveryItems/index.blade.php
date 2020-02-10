@extends('layouts.app', ['title' => __('Delivery Items Management')])

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
                                <h3 class="mb-0">{{ __('Delivery Items') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('deliveryItems.create') }}" class="btn btn-sm btn-primary">{{ __('Add incoming items') }}</a>
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
                                    <th scope="col">{{ __('Incoming') }}</th>
                                    <th scope="col">{{ __('Color') }}</th>
                                    <th scope="col">{{ __('Size') }}</th>
                                    <th scope="col">{{ __('Design') }}</th>
                                    <th scope="col">{{ __('Quantity') }}</th>
                                    <th scope="col">{{ __('Extra') }}</th>
                                    <th scope="col">{{ __('Unit Price') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveryItems as $data => $deliveryItem)
                                    <tr>
                                        <td>{{ $deliveryItem->id }}</td>
                                        <td>{{ date("m/d/Y", strtotime( $deliveryItem->incomings->date ) ) }}</td>
                                        <td>{{ $deliveryItem->colors->title }}</td>
                                        <td>{{ $deliveryItem->size->title }}</td>
                                        <td>{{ $deliveryItem->designs->title }}</td>
                                        <td>{{ $deliveryItem->quantity }}</td>
                                        <td>{{ $deliveryItem->extra }}</td>
                                        <td>{{ $deliveryItem->unit_price }}</td>

                                        <td>{{ $deliveryItem->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <form action="{{ route('deliveryItems.destroy', $deliveryItem) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('deliveryItems.edit', $deliveryItem) }}">{{ __('Edit') }}</a>
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
                            {{ $deliveryItems->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection