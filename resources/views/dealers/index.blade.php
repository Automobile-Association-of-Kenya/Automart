@extends('layouts.dealerlayout')

@section('title')
    Dealer @parent
@endsection

@section('header_styles')
@endsection

@section('header_styles')
@endsection

@section('page')
    Dealer
@endsection

@section('main')
    <main id="main" class="dashboard">

        <div class="pagetitle">
            <h4>Dashboard</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dealers.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section dashboard">
            <div class="row">


                <div id="g_id_onload"
     data-client_id="542097242134-vvu2f4mhg8226pj8s9dvkfr7je4nfah0.apps.googleusercontent.com"
     data-context="signup"
     data-ux_mode="popup"
     data-login_uri="http://127.0.0.1:800/loginwithgoogle"
     data-nonce=""
     data-auto_prompt="true">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="outline"
     data-text="signin_with"
     data-size="medium"
     data-logo_alignment="left">
</div>

                <div class="col-xl-3 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Sales <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4">

                    <div class="card info-card revenue-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Revenue <span>| This Month</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i>Ksh</i>
                                </div>
                                <div class="ps-3 pl-3">
                                    <h6>3,264</h6>
                                    <span class="text-success small pt-1 fw-bold">8%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-3 col-md-4">
                    <a href="{{ route('dealer.vehicles') }}">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">My Vehicles</h5>
                                <div class="d-flex align-items-center">
                                    {{-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i>Ksh</i>
                                </div> --}}
                                    <div class="ps-3 pl-3">
                                        <h6>{{ count($vehicles) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-4">
                    <a href="{{ route('dealer.requests') }}">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Quotes <span>| Request</span></h5>
                                <div class="d-flex align-items-center">
                                    {{-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i>Ksh</i>
                                </div> --}}
                                    <div class="ps-3 pl-3">
                                        <h6>{{ count($quotes) + count($tradeins) + count($finances) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- <div class="col-xl-3 col-md-4">
                    <a href="{{ route('dealer.requests') }}">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Financial <span>| Requests</span></h5>
                                <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i>Ksh</i>
                                </div>
                                    <div class="ps-3 pl-3">
                                        <h6>{{ count($quotes) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}

                {{-- <div class="col-xl-3 col-md-4">
                    <a href="{{ route('dealer.requests') }}">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Trade in <span>| Requests</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i>Ksh</i>
                                </div>
                                    <div class="ps-3 pl-3">
                                        <h6>{{ count($tradeins) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}

            </div>
        </section>

        <section class="vehicles">
            <div class="card mt-4">
                <div class="card-header">
                    {{-- <h5><b>My Vehicles</b></h5> --}}
                    <a href="{{ route('dealer.vehicles') }}" class="btn btn-success"><i
                            class="fal fa-plus"></i>&nbsp;&nbsp;Add new</a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered hover vehicleDataTable ">
                        <thead>
                            <th>#</th>
                            <th>NO</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>CC</th>
                            <th>Mileage</th>
                            <th>Fuel</th>
                            <th>Trans</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($vehicles as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->vehicle_no }}</td>
                                    <td>{{ $item->make->make }}</td>
                                    <td>{{ $item->model->model }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->enginecc }}</td>
                                    <td>{{ $item->mileage }}</td>
                                    <td>{{ $item->fuel_type }}</td>
                                    <td>{{ $item->transmission }}</td>
                                    {{-- <td>{{ $item-> }}</td> --}}
                                    <td>
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown"
                                                class="btn btn-success btn-sm">Action</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#"><i
                                                            class="fa fa-list text-success\"></i>&nbsp;View</a></li><li class="dropdown-item"><a
                                                                href="#" id="editProduct" data-id=" + id + "><i
                                                                    class="fa fa-edit text-warning"></i>&nbsp;Edit</a></li>
                                            </ul>
                                        </li>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </main>
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/main/dealer.js') }}"></script>
@endsection
