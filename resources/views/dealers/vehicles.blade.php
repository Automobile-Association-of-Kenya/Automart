@extends('layouts.dealer')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
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
            <div class="card">
                <div class="col-md-12">
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
                                        id="filterToggle"><i class="fa fa-edit fa-1x text-warning"></i></button>
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
                                            <label>Yard</label>
                                            <select name="filterlistyard_id" id="filterVehicleYardID"
                                                class="form-control form-control--md chzn-select" style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Make</label>
                                            <select name="filterlistmake_id"
                                                class="form-control form-control--md chzn-select" id="filterMakeID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="filterliststatus">Model</label>
                                            <select name="filterlistmodel_id"
                                                class="form-control form-control--md chzn-select" id="filterModelID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="vehicles">Vehicles</label>
                                            <select name="vehicleslist_id" style="width: 100%;"
                                                class="form-control form-control--md chzn-select" id="filterVehiclesID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                    class="fas fa-search"></i>&nbsp;Find</button>
                                        </div>

                                    </form>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <form action="{{ route('vehicles.store') }}" id="vehicleCreateForm">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <input type="hidden" name="unique_str" id="uniqueStrID"
                                                            value="{{ $str }}">

                                                        <div class="col-md-3 form-group">
                                                            <label for="type">Vehicle Type:</label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control--md chzn-select"
                                                                    name="type" id="vehicleType"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <label for="make">Vehicle Make: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control--md chzn-select"
                                                                    name="make" id="vehicleMake" required
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="firstname">Vehicle Model: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <select name="model" id="vehicleModel"
                                                                    class="form-control form-control--md chzn-select"
                                                                    required style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Year of manufacture: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <select name="year" id="yearOfManufacture"
                                                                    class="form-control form-control--md chzn-select"
                                                                    required style="width: 100%;">
                                                                    <option value="">Select One</option>
                                                                    @for ($i = date('Y', strtotime(now())); $i >= 1995; $i--)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Fuel Type: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <select name="fuel_type" id="fuelType"
                                                                    class="form-control form-control--md chzn-select"
                                                                    style="width: 100%;" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="Petrol">Petrol</option>
                                                                    <option value="Diesel">Diesel</option>
                                                                    <option value="Hybrid">Hybrid</option>
                                                                    <option value="Diesel-Hybrid">Diesel-Hybrid
                                                                    </option>
                                                                    <option value="Electic">Electic</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Transmission: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <select name="transmission" id="transmission"
                                                                    class="form-control form-control--md chzn-select"
                                                                    style="width: 100%;" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="Automatic">Automatic</option>
                                                                    <option value="Manual">Manual</option>
                                                                    <option value="Electric">Electric</option>
                                                                    <option value="Tiptronic">Tiptronic</option>
                                                                    <option value="Tiptronic">Tiptronic</option>
                                                                    <option value="None">None</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Usage: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <select name="usage" id="usageCondition"
                                                                    class="form-control form-control--md chzn-select"
                                                                    style="width:100%;">
                                                                    <option value="">Select One</option>
                                                                    <option value="New">New</option>
                                                                    <option value="Semi-new">Semi New</option>
                                                                    <option value="Locally Used">Locally used</option>
                                                                    <option value="Foreign Used">Foreign used</option>
                                                                    <option value="Damaged">Damaged</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Price: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <input type="text" name="price" id="vehiclePrice"
                                                                    class="form-control form-control--md" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="enginecc">Engine CC: <sup>*</sup></label>
                                                            <div class="input-group">
                                                                <input type="text" name="enginecc" id="engineCC"
                                                                    class="form-control form-control--md" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Mileage:</label>
                                                            <div class="input-group">
                                                                <input type="number" name="mileage" id="mileAge"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="card mt-2">
                                                <div class="card-header d-flex bg-white" id="additionalToggle">
                                                    <h4><b>Additional Information</b></h4>
                                                    <button type="button"
                                                        class="btn btn-outline-danger mt-1 mb-1 btn-floated float-right"><i
                                                            class="fa fa-plus fa-1x text-warning"></i></button>
                                                </div>

                                                <div class="card-body" id="additionInfo">
                                                    <div class="row">
                                                        <div class="col-md-3 form-group">
                                                            <label for="engine">Engine: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="engine" id="engine"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label>Location </label><span for="yard"
                                                                class="float-right"><input type="checkbox"
                                                                    name="yard_check"
                                                                    id="yardToggle">&nbsp;&nbsp;Yard</span>

                                                            <div class="input-group locationInput">
                                                                <input type="text"
                                                                    class="form-control form-control--md location"
                                                                    id="location" name="location">
                                                            </div>

                                                            <div class="input-group yardInput">
                                                                <select name="yard_id"
                                                                    id="yardID"class="form-control form-control--md location chzn-select"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="vehicle_id" id="vehicleID"
                                                            value="">

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Color:</label>
                                                            <select name="color" id="vehicleColor"
                                                                class="form-control  form-control--md chzn-select"
                                                                style="width: 100%;">
                                                                <option value="">Select One</option>
                                                                <option value="Black">Black</option>
                                                                <option value="Blue">Blue</option>
                                                                <option value="Brown">Brown</option>
                                                                <option value="Beige">Beige</option>
                                                                <option value="Dark Green">Dark Green</option>
                                                                <option value="Dark Blue">Dark Blue</option>
                                                                <option value="Green">Green</option>
                                                                <option value="Grey">Grey</option>
                                                                <option value="Navy Blue">Navy Blue</option>
                                                                <option value="Orange">Orange</option>
                                                                <option value="Red">Red</option>
                                                                <option value="Sage Grey">Sage Grey</option>
                                                                <option value="Silver">Silver</option>
                                                                <option value="Urban Green">Urban Green</option>
                                                                <option value="White">White</option>
                                                                <option value="Yellow">Yellow</option>
                                                                <option value="Bronze">Bronze</option>
                                                                <option value="Maroon">Maroon</option>
                                                                <option value="Purple">Purple</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Interior:</label>
                                                            <div class="input-group">
                                                                <select name="inetrior" id="interior"
                                                                    class="form-control form-control--md chzn-select"
                                                                    style="width: 100%;">
                                                                    <option value="">Select One</option>
                                                                    <option value="Leather">Leather</option>
                                                                    <option value="Fabric">Fabric</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-3 form-group">
                                                            <label for="middlename">Country of origin:</label>
                                                            <div class="input-group">
                                                                <select name="country_of_origin" id="countryofOrigin"
                                                                    class="form-control form-control--md chzn-select"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="shipping_to">Shipping to:</label>
                                                            <div class="input-group">
                                                                <select name="shipping_to" id="shippingTo"
                                                                    class="form-control form-control--md chzn-select"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="gear">NO of Gears: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="gear" id="gear"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="speed">Top Speed: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="speed" id="speed"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="terrain">Drive terrain: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="terrain" id="terrain"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="horsepower">Horse Power: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="horsepower" id="horsepower"
                                                                    class="form-control form-control--md">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label for="company">Tags:</label>
                                                            <div class="input-group">
                                                                <select name="tags" id="vehicleTags"
                                                                    class="form-control form-control--md"
                                                                    multiple="multiple" style="width: 100%;">
                                                                    <option value="#Best deals">#Best deals</option>
                                                                    <option value="#Cars on sale">#Cars on sale</option>
                                                                    <option value="#New Arrivals">#New Arrivals</option>
                                                                    <option value="#Best deals">#Best deals</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="company">Description:</label>
                                                            <div class="input-group">
                                                                <textarea name="description" id="description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" id="featuresSection">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mt-2">
                                                <div class="card-header bg-white">
                                                    <div class="form-group">
                                                        <label for="documentnumber"><span id="images">Images:</label>
                                                        <div class="input-group">
                                                            <input type="file" name="images" id="addionalImages"
                                                                multiple required>
                                                        </div>
                                                        <p class="text-danger">You can upload from 1 - 20 photos</p>
                                                    </div>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row" id="image-preview">

                                                    </div>

                                                    <div id="imageFeedback"></div>
                                                </div>
                                            </div>

                                            @if (Session::has('subscriptioninfo'))
                                                <div class="alert alert-warning" role="alert">
                                                    {!! Session::get('subscriptioninfo') !!}
                                                </div>
                                            @endif

                                            <div id="vehiclefeedback"></div>

                                            <div class="col-md-12">
                                                <button class='btn btn-success btn-md' type="submit" id='savevehicle'><i
                                                        class="fal fa-save fa-lg fa-fw"></i>
                                                    Save
                                                    vehicle</button>
                                                <button class='btn btn-outline-warning btn-md' id='clearvehicle'><i
                                                        class="fal fa-broom fa-lg fa-fw"></i>
                                                    Clear Fields</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="vehicleListTab" role="tabpanel"
                                aria-labelledby="pop2-tab">
                                <div class="bg-primary mt-2 mb-2 pb-3 pt-3 pl-2 pr-1 border-rounded"
                                    style="border-radius: 6px;">
                                    <form id="filterVehiclesListForm" class="form-row">
                                        @csrf
                                        <div class="col-md-4">
                                            <label>Yard</label>
                                            <select name="filterlistyard_id" id="filterListVehicleYardID"
                                                class="form-control form-control--md chzn-select" style="width: 100%;">
                                            </select>
                                        </div>
                                        <input type="hidden" name="dealer_id" id="filterListDealerID"
                                            value="{{ auth()->user()->dealer_id }}">

                                        <div class="col-md-4">
                                            <label>Make</label>
                                            <select name="filterlistmake_id"
                                                class="form-control form-control--md chzn-select" id="filterListMakeID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="filterliststatus">Model</label>
                                            <select name="filterlistmodel_id"
                                                class="form-control form-control--md chzn-select" id="filterListModelID"
                                                style="width: 100%;">

                                            </select>
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                    class="fas fa-search"></i>&nbsp;Find</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-12 mt-2 text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-thumbs-up text-warning"></i>&nbsp;Mark as sold</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-arrow-down text-warning"></i>&nbsp;Discount</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-trash text-warning"></i>&nbsp;Delist</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-trash text-danger"></i>&nbsp;Delete</a>
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
                                                                <label for="make">Name:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="yard" id="yardName"
                                                                        class="form-control form-control--md">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="make">Address:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="yardaddress"
                                                                        id="yardAddress"
                                                                        class="form-control form-control--md">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="make">Email:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="yardemail" id="yardEmail"
                                                                        class="form-control form-control--md">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="make">Phone:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="yardphone" id="yardPhone"
                                                                        class="form-control form-control--md">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                                        class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                                <button class='btn btn-outline-warning btn-sm'
                                                                    id='clearYard'><i
                                                                        class="fal fa-broom fa-lg fa-fw"></i>
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
            </div>
    </main>
@endsection

@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/jquery_ui.js') }}"></script>
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
