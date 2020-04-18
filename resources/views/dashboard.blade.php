@extends('layouts.app', ['home' => 'sweetHome'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">


            @if(isset($home))
                <div class="container-fluid">
                    <div class="header-body">
                        <!-- Card stats -->
                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Account</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('accounts.index') }}">Account Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Color</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-palette"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-success mr-2"><a href="{{ route('colors.index') }}"> Color Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Size</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-sitemap"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-danger mr-2"><a href="{{ route('sizes.index') }}"> Size Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Design</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-layer-group"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('designs.index') }}"> Design Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Customer</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('customers.index') }}"> Customer Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Labour</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('labours.index') }}"> Labour Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Incoming</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-user-secret"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('incomings.index') }}"> Incoming Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Incoming Item</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-list-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('incomingItems.index') }}"> Incoming Item Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Washing</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-recycle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('washings.index') }}"> Washing Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Washing Item</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-list-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('washingItems.index') }}"> Washing Item Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Delivery</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('deliveries.index') }}"> Delivery Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Delivery Item</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-list-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('deliveryItems.index') }}">Delivery Item Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Customer Pay</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('customerPayments.index') }}">Customer Pay Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Expense</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('expenses.index') }}">Expense Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Expense Category</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('expenseCategory.index') }}">Expense Category Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Transaction Category</h5>
                                                <span class="h2 font-weight-bold mb-0">Manage</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-gray-dark text-white rounded-circle shadow">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><a href="{{ route('transactions.index') }}">Transaction Management </a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>


        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
