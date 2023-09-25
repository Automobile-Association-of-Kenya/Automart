@extends('layouts.dealer')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
    {{-- <link rel="stylesheet" href="{{ asset('css/') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .filterSection,
        #additionInfo {
            display: none;
        }

        .btn-floated {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
@endsection

@section('page')
    My Vehicles
@endsection

@section('main')
    <main>
        <div class="row">
            <div class="col-md-12 card">

                <nav class="nav-justified bg-white">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#vehicledetails"
                            role="tab" aria-controls="pop1" aria-selected="true">Add Vehicle</a>
                        <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#vehicleListTab"
                            role="tab" aria-controls="pop1" aria-selected="true">Vehicle List</a>
                        <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#yardsTab" role="tab"
                            aria-controls="pop2" aria-selected="false">Yards</a>
                    </div>
                </nav>
                <div class="card-body">
                    <div class="tab-content text-left" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="vehicledetails" role="tabpanel">
                            <div class="text-right">
                                <button type="button" class="btn btn-success btn-sm mt-1 mb-1 btn-floated"
                                    id="filterToggle"><i class="fa fa-edit fa-1x text-warning"></i>&nbsp;Edit
                                    Vehicle</button>
                            </div>
                            @if (Session::has('dealerinfo'))
                                <div class="alert alert-warning" role="alert">
                                    {!! Session::get('dealerinfo') !!}
                                </div>
                            @endif

                            <div class="alert-success pb-3 pt-3 pl-2 pr-1 border-rounded filterSection"
                                style="border-radius: 6px; display:none;">
                                <form id="filterVehiclesForm" class="form-row">
                                    @csrf
                                    <input type="hidden" name="dealer_id" id="filterDealerID"
                                        value="{{ auth()->user()->dealer_id }}">
                                    <input type="hidden" name="dealer_id" id="vehicleDealer"
                                        value="{{ auth()->user()->dealer_id }}">
                                    <div class="col-md-3">
                                        <label for="filterVehicleYardID">Yard</label>
                                        <select name="filterlistyard_id" id="filterVehicleYardID"
                                            class="form-control form-control--md chzn-select" style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="filterMakeID">Make</label>
                                        <select name="filterlistmake_id" class="form-control form-control--md chzn-select"
                                            id="filterMakeID" style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="filterModelID">Model</label>
                                        <select name="filterlistmodel_id" class="form-control form-control--md chzn-select"
                                            id="filterModelID" style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="filterVehiclesID">Vehicles</label>
                                        <select name="vehicleslist_id" style="width: 100%;"
                                            class="form-control form-control--md chzn-select" id="filterVehiclesID"
                                            style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                class="fa fa-search"></i>&nbsp;Find</button>
                                    </div>

                                </form>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('vehicles.store') }}" id="vehicleCreateForm">
                                        @include('layouts.vehicle')
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade mb-3" id="vehicleListTab" role="tabpanel" aria-labelledby="pop2-tab">
                            <div class="bg-primary mt-2 mb-2 pb-3 pt-3 pl-2 pr-1 border-rounded"
                                style="border-radius: 6px;">
                                <form id="filterVehiclesListForm" class="form-row">
                                    @csrf
                                    <div class="col-md-4">
                                        <label for="filterListVehicleYardID">Yard</label>
                                        <select name="filterlistyard_id" id="filterListVehicleYardID"
                                            class="form-control form-control--md chzn-select" style="width: 100%;">
                                        </select>
                                    </div>
                                    <input type="hidden" name="dealer_id" id="filterListDealerID"
                                        value="{{ auth()->user()->dealer_id }}">

                                    <div class="col-md-4">
                                        <label for="filterListMakeID">Make</label>
                                        <select name="filterlistmake_id" class="form-control form-control--md chzn-select"
                                            id="filterListMakeID" style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="filterListModelID">Model</label>
                                        <select name="filterlistmodel_id"
                                            class="form-control form-control--md chzn-select" id="filterListModelID"
                                            style="width: 100%;">

                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                class="fa fa-search"></i>&nbsp;Find</button>
                                    </div>
                                </form>
                            </div>
                            <div id="listingfeedback"></div>

                            <div class="col-md-12 mt-2 text-right">
                                <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Action
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" id="markAsSold"><i
                                                class="fa fa-thumbs-up text-warning"></i>&nbsp;Mark as sold</a>
                                        {{-- <a class="dropdown-item" href="#" id="discountVehicles"><i
                                                class="fa fa-arrow-down text-warning"></i>&nbsp;Discount</a> --}}
                                        <a class="dropdown-item" href="#" id="vehicleDelist"><i
                                                class="fa fa-trash text-warning"></i>&nbsp;Delist</a>
                                        {{-- <a class="dropdown-item" href="#" id="deleteVehicles"><i
                                                class="fa fa-trash text-danger"></i>&nbsp;Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="vehicledatasection">
                            </div>
                        </div>

                        <div class="tab-pane fade mb-3" id="yardsTab" role="tabpanel" aria-labelledby="pop2-tab">
                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body" id="yardsSection">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="make-create-section mt-2">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="text text-center mb-2">Vehicle yards Form</h4>

                                            </div>
                                            <div class="card-body">
                                                <form action="#" method="post" id="yardCreateForm">
                                                    <div id="yardfeedback"></div>
                                                    @csrf
                                                    <input type="hidden" name="yard_id" id="yardCreateID"
                                                        value="">
                                                    <div class="row">

                                                        <input type="hidden" name="dealer_id" id="dealerYardID"
                                                            value="{{ auth()->user()->dealer_id }}">

                                                        <div class="col-md-12 form-group">
                                                            <label for="yardName">Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="yard" id="yardName"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="yardAddress">Address:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="yardaddress" id="yardAddress"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="yardEmail">Email:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="yardemail" id="yardEmail"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="yardPhone">Phone:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="yardphone" id="yardPhone"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                                    class="fa fa-save fa-lg fa-fw"></i>save</button>
                                                            <button class='btn btn-outline-warning btn-sm'
                                                                id='clearYard'><i class="fa fa-broom fa-lg fa-fw"></i>
                                                                Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection

@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/vehicle.js') }}"></script>
    <script>
        (function() {
            $('#additionalToggle').on('click', function() {
                console.log('here');
                $('#additionInfo').toggle();
            });
            $('#filterToggle').on('click', function() {
                console.log('hsrsss');

                $('.filterSection').toggle();
            });
        })()
    </script>
@endsection
