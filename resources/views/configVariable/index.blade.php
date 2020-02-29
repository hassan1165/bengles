@extends('layouts.app', ['title' => __('Config Variables Management')])

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Config Variables') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('configVariable.create') }}" class="btn btn-sm btn-primary">{{ __('Add Config Variable') }}</a>
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
                                    <th scope="col">{{ __('notes') }}</th>
                                    <th scope="col">{{ __('type') }}</th>
                                    <th scope="col">{{ __('default_values') }}</th>
                                    <th scope="col">{{ __('key') }}</th>
                                    <th scope="col">{{ __('value') }}</th>
                                    <th scope="col">{{ __('sortorder') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($configVariables as $configVariable)
                                    <tr>
                                        <td>{{ $configVariable->id }}</td>
                                        <td>{{ $configVariable->title }}</td>
                                        <td>{{ $configVariable->notes }}</td>
                                        <td>{{ $configVariable->type }}</td>
                                        <td>{{ $configVariable->default_values }}</td>
                                        <td>{{ $configVariable->key }}</td>
                                        <td>{{ $configVariable->value }}</td>
                                        <td>{{ $configVariable->sortorder }}</td>

                                        <td>{{ $configVariable->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <form action="{{ route('configVariable.destroy', $configVariable) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('configVariable.edit', $configVariable) }}">{{ __('Edit') }}</a>
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
                            {{ $configVariables->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection