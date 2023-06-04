@extends('layouts.dashboardlayout')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .chzn-select {
            widows: 100%;
        }
    </style>
@endsection

@section('page')
    Vehicles
@endsection

@section('main')
    <main id="vehicleship">
        <div class="card" id="main-content-card">
            <div class="card-body">
                {{-- <div class="container"> --}}
                <div class="row">
                    {{-- <div class="col-md-2">
                        <section class="filterpane">
                            <div class="container">
                                <div class="row">

                                </div>
                            </div>
                        </section>
                    </div> --}}

                    <div class="col-md-12" id="vehicledetailsSection">
                        {{-- <div class="alert alert-primary"> --}}
                        {{-- <div class="row">
                                <div class="col">
                                    <label for="cardvehicleno">Views: <span class='font-weight-bold'
                                            id="cardvehicleviews"></span></label>
                                </div>

                                <div class="col">
                                    <label for="cardvehiclelikes">Likes: <span class='font-weight-bold'
                                            id="cardvehiclelikes"></span></label>
                                </div>

                                <div class="col">
                                    <label for="cardvehiclecdealer">Dealer: <span class='font-weight-bold'
                                            id="cardvehiclecdealer"></span></label>
                                </div>
                            </div> --}}

                        {{-- <div class="row">
                                <div class="col">
                                    <label for="cardvehicleenquiries">Enquiries: <span class='font-weight-bold'
                                            id="cardvehicleloans"></span></label>
                                </div>

                                <div class="col">
                                    <label for="cardvehiclefinance">ROF: <span class='font-weight-bold'
                                            id="cardvehiclefinance">0.00</span></label>
                                </div>

                                <div class="col">
                                    <label for="cardvehiclecreated">Created at: <span class='font-weight-bold'
                                            id="cardvehiclecreated"></span></label>
                                </div>
                            </div> --}}

                        {{-- <div class="row">
                                    <div class="col">
                                        <label for="cardtotalsavings">Total Savings <span class='font-weight-bold'
                                                id="cardtotalsavings">0.00</span></label>
                                    </div>

                                    <div class="col">
                                        <label for="cardgauaranteeddeposits">Guaranteed Deposits: <span
                                                class='font-weight-bold' id="cardgauaranteeddeposits">0.00</span></label>
                                    </div>

                                    <div class="col">
                                        <label for="cardfreedeposits">Free Deposits: <span class='font-weight-bold'
                                                id="cardfreedeposits">0.00</span></label>
                                    </div>
                                </div> --}}
                        {{-- </div> --}}
                        <!-- Set up tabs  -->
                        <nav class="nav-justified ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#vehicledetails"
                                    role="tab" aria-controls="pop1" aria-selected="true">Vehicle Details</a>

                                <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#vehicleListTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Vehicle List</a>

                                <a class="nav-item nav-link" id="makes-tab" data-toggle="tab" href="#makesTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Makes</a>

                                <a class="nav-item nav-link" id="models-tab" data-toggle="tab" href="#vehicleModelsTab"
                                    role="tab" aria-controls="pop5" aria-selected="false">Models</a>

                                <a class="nav-item nav-link" id="features-tab" data-toggle="tab" href="#featuresTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Features</a>

                                <a class="nav-item nav-link" id="types-tab" data-toggle="tab" href="#vehicleTypesTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Vehicle Types</a>

                                <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#yardsTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Yards</a>
                            </div>
                        </nav>

                        <div class="tab-content text-left" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="vehicledetails" role="tabpanel">
                                <div class="bg-primary pb-3 pt-3 pl-2 pr-1 border-rounded" style="border-radius: 6px;">
                                    <form id="filterVehiclesForm" class="form-row">
                                        @csrf
                                        {{-- @if (auth()->user()->role === 'dealer')
                                            <div class="col-md-3">
                                                <label>Yard</label>
                                                <select name="filterlistyard_id" id="filterVehicleYardID"
                                                    class="form-control form-control-sm chzn-select" style="width: 100%;">
                                                </select>
                                            </div>
                                        @endif --}}

                                        <div class="col-md-3">
                                            <label>Dealer</label>
                                            <select name="filterlistdealer_id"
                                                class="form-control form-control-sm chzn-select" id="filterDealerID"
                                                style="width: 100%;">
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Make</label>
                                            <select name="filterlistmake_id"
                                                class="form-control form-control-sm chzn-select" id="filterMakeID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="filterliststatus">Model</label>
                                            <select name="filterlistmodel_id"
                                                class="form-control form-control-sm chzn-select" id="filterModelID"
                                                style="width: 100%;">

                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="vehicles">Vehicles</label>
                                            <select name="vehicleslist_id" style="width: 100%;"
                                                class="form-control form-control-sm chzn-select" id="filterVehiclesID"
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
                                        <input type="hidden" name="unique_str" id="uniqueStrID"
                                            value="{{ $str }}">
                                        <input type="hidden" name="vehicle_id" id="vehicleID" value="">
                                        <div class="card containergroup">
                                            <div class="card-body">
                                                <div id="vehiclefeedback"></div>
                                                <form action="{{ route('vehicles.store') }}" id="vehicleCreateForm">
                                                    <div class="row">

                                                        <div class="col-md-3 form-group">
                                                            <label for="type">Dealer: </label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control-sm chzn-select"
                                                                    name="dealer_id" id="vehicleDealer"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="type">Vehicle Type:</label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control-sm chzn-select"
                                                                    name="type" id="vehicleType"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="make">Vehicle Make: <sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control-sm chzn-select"
                                                                    name="make" id="vehicleMake" required
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="firstname">Vehicle Model: <sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="input-group">
                                                                <select name="model" id="vehicleModel"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    required style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="middlename">Country of origin:</label>
                                                            <div class="input-group">
                                                                <select name="country_of_origin" id="countryofOrigin"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="shipping_to">Shipping to:</label>
                                                            <div class="input-group">
                                                                <select name="shipping_to" id="shippingTo"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label>Location </label><span for="yard"
                                                                class="float-right"><input type="checkbox"
                                                                    name="yard_check"
                                                                    id="yardToggle">&nbsp;&nbsp;Yard</span>

                                                            <div class="input-group locationInput">
                                                                <input type="text"
                                                                    class="form-control form-control-sm location"
                                                                    id="location" name="location">
                                                            </div>

                                                            <div class="input-group yardInput">
                                                                <select name="yard_id"
                                                                    id="yardID"class="form-control form-control-sm location chzn-select"
                                                                    style="width: 100%;"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Year of manufacture: <sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="input-group">
                                                                <select name="year" id="yearOfManufacture"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    required style="width: 100%;">
                                                                    <option value="">Select One</option>
                                                                    @for ($i = date('Y', strtotime(now())); $i >= 2000; $i--)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Mileage: <sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="input-group">
                                                                <input type="number" name="mileage" id="mileAge"
                                                                    class="form-control form-control-sm" required>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Color:</label>
                                                            <select name="color" id="vehicleColor"
                                                                class="form-control  form-control-sm chzn-select"
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
                                                            <label for="company">Price: <sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="input-group">
                                                                <input type="text" name="price" id="vehiclePrice"
                                                                    class="form-control form-control-sm" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="gear">NO of Gears: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="gear" id="gear"
                                                                    class="form-control form-control-sm" >
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3 form-group">
                                                            <label for="speed">Top Speed: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="speed" id="speed"
                                                                    class="form-control form-control-sm" >
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3 form-group">
                                                            <label for="terrain">Drive terrain: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="terrain" id="terrain"
                                                                    class="form-control form-control-sm" >
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-3 form-group">
                                                            <label for="engine">Engine: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="engine" id="engine"
                                                                    class="form-control form-control-sm" >
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3 form-group">
                                                            <label for="enginecc">Engine CC: <sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="input-group">
                                                                <input type="text" name="enginecc" id="engineCC"
                                                                    class="form-control form-control-sm" required>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3 form-group">
                                                            <label for="horsepower">Horse Power: </label>
                                                            <div class="input-group">
                                                                <input type="text" name="horsepower" id="horsepower"
                                                                    class="form-control form-control-sm">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Interior:</label>
                                                            <div class="input-group">
                                                                <select name="inetrior" id="interior"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    style="width: 100%;">
                                                                    <option value="">Select One</option>
                                                                    <option value="Leather">Leather</option>
                                                                    <option value="Fabric">Fabric</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Fuel Type:</label>
                                                            <div class="input-group">
                                                                <select name="fuel_type" id="fuelType"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    style="width: 100%;">
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
                                                            <label for="company">Transmission:</label>
                                                            <div class="input-group">
                                                                <select name="transmission" id="transmission"
                                                                    class="form-control form-control-sm chzn-select"
                                                                    style="width: 100%;">
                                                                    <option value="">Select One</option>
                                                                    <option value="Automatic">Automatic</option>
                                                                    <option value="Manual">Manual</option>
                                                                    <option value="Semi-Auto">Semi-Auto</option>
                                                                    <option value="Tiptronic">Tiptronic</option>
                                                                    <option value="None">None</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="company">Usage:</label>
                                                            <div class="input-group">
                                                                <select name="usage" id="usage"
                                                                    class="form-control form-control-sm">
                                                                    <option value="">Any</option>
                                                                    <option value="New">New</option>
                                                                    <option value="Semi-new">Semi New</option>
                                                                    <option value="Locally Used">Locally used</option>
                                                                    <option value="Foreign Used">Foreign used</option>
                                                                    <option value="Damaged">Damaged</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label for="company">Tags:</label>
                                                            <div class="input-group">
                                                                <select name="tags" id="vehicleTags"
                                                                    class="form-control form-control-sm"
                                                                    multiple="multiple" style="width: 100%;">
                                                                    <option value="#Best deals">#Best deals</option>
                                                                    <option value="#Cars on sale">#Cars on sale</option>
                                                                    <option value="#New Arrivals">#New Arrivals</option>
                                                                    <option value="#Best deals">#Best deals</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <label for="company">Description:</label>
                                                            <div class="input-group">
                                                                <textarea name="description" id="description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card containergroup mt-2">
                                                        <div class="card-header ">
                                                            <h5>Additional Features</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row" id="featuresSection">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card containergroup mt-2">
                                                        <div class="card-header ">
                                                            <h4 class="text text-success">Select vehicle images and then
                                                                click upload button to the left before submitting this form.
                                                            </h4>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cover_photo">Cover Photo:</label>
                                                                    <div class="input-group">
                                                                        <input type="file" name="cover_photo"
                                                                            id="coverPhoto">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="documentnumber"><span
                                                                            id="images">Additional
                                                                            Images:</label>
                                                                    <div class="input-group">
                                                                        <input type="file" name="images"
                                                                            id="addionalImages" multiple>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12 row" id="image-preview">
                                                                    <div class="col-md-3" id="coverPhotoPreview">

                                                                    </div>

                                                                    <div id="imageFeedback"></div>
                                                                </div>
                                                                <button type="submit" class="btn btn-md btn-primary"
                                                                    id="vehicleImagesUpload"><i
                                                                        class="fal fa-arrow-up"></i>&nbsp;&nbsp;Upload
                                                                    Images</button>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class='btn btn-success btn-sm' type="submit"
                                                                id='savevehicle'><i class="fal fa-save fa-lg fa-fw"></i>
                                                                Save
                                                                vehicle</button>
                                                            <button class='btn btn-outline-warning btn-sm'
                                                                id='clearvehicle'><i class="fal fa-broom fa-lg fa-fw"></i>
                                                                Clear Fields</button>

                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="vehicleListTab" role="tabpanel"
                                aria-labelledby="pop2-tab">
                                <div class="bg-primary pb-3 pt-3 pl-2 pr-1 border-rounded" style="border-radius: 6px;">
                                    <form id="filterVehiclesListForm" class="form-row">
                                        @csrf
                                        {{-- @if (auth()->user()->role === 'dealer')
                                            <div class="col-md-3">
                                                <label>Yard</label>
                                                <select name="filterlistyard_id" id="filterListVehicleYardID"
                                                    class="form-control form-control-sm chzn-select" style="width: 100%;">
                                                </select>
                                            </div>
                                        @endif --}}

                                        <div class="col-md-4">
                                            <label>Dealer</label>
                                            <select name="filterlistdealer_id"
                                                class="form-control form-control-sm chzn-select" id="filterListDealerID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Make</label>
                                            <select name="filterlistmake_id"
                                                class="form-control form-control-sm chzn-select" id="filterListMakeID"
                                                style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="filterliststatus">Model</label>
                                            <select name="filterlistmodel_id"
                                                class="form-control form-control-sm chzn-select" id="filterListModelID"
                                                style="width: 100%;">

                                            </select>
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                    class="fas fa-search"></i>&nbsp;Find</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-12 mt-2 text-left">
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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

                            <div class="tab-pane fade mb-3" id="makesTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">


                                    <div class="col-md-8 mt-2" id="makesTableSection">

                                    </div>

                                    <div class="col-md-4">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Makes Form</h4>

                                            <form action="#" method="post" id="makeCreateForm">
                                                <div id="makefeedback"></div>
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="make_id" id="makeCreateID"
                                                        value="">
                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Make:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="make" id="makeName"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            id="submitMake"><i
                                                                class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                        <button class='btn btn-outline-warning btn-sm' id='clearMake'><i
                                                                class="fal fa-broom fa-lg fa-fw"></i> Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="vehicleModelsTab" role="tabpanel"
                                aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-8" id="modelsTableSection">

                                    </div>

                                    <div class="col-md-4">
                                        <div class="model-create-section mt-2">
                                            <h4 class="text text-center mb-2">Model Form</h4>

                                            <form action="#" method="post" id="modelCreateForm">
                                                @csrf
                                                <div id="modelfeedback"></div>
                                                <div class="row">
                                                    <input type="hidden" name="model_id" id="modelID" value="">
                                                    <div class="col-md-12 form-group">
                                                        <label for="make_id">Make:</label>
                                                        <div class="input-group">
                                                            <select name="make_id" id="modelMakeID"
                                                                class="form-control form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Model:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="model" id="modelName"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            id="submitModel"><i
                                                                class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                        <button class='btn btn-outline-warning btn-sm' id='clearModel'><i
                                                                class="fal fa-broom fa-lg fa-fw"></i> Reset</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="featuresTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-8" id="featureseSection"></div>
                                    <div class="col-md-4">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Features Form</h4>

                                            <form action="#" method="post" id="featureCreateForm">
                                                <div id="featurefeedback"></div>
                                                @csrf
                                                <input type="hidden" name="feature_id" id="featureCreateID"
                                                    value="">
                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Feature:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="feature" id="featureName"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Description:</label>
                                                        <div class="input-group">
                                                            <textarea name="description" id="featureDescription" class="form-control form-control-sm"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                        <button class='btn btn-outline-warning btn-sm'
                                                            id='clearFeature'><i class="fal fa-broom fa-lg fa-fw"></i>
                                                            Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade mb-3" id="vehicleTypesTab" role="tabpanel"
                                aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-8" id="typesSection"></div>
                                    <div class="col-md-4">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Vehicle Types Form</h4>

                                            <form action="#" method="post" id="typeCreateForm">
                                                <div id="typefeedback"></div>
                                                @csrf
                                                <input type="hidden" name="type_id" id="typeCreateID" value="">
                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Name:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="feature" id="typeName"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                        <button class='btn btn-outline-warning btn-sm' id='clearType'><i
                                                                class="fal fa-broom fa-lg fa-fw"></i> Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="yardsTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-8" id="yardsSection"></div>
                                    <div class="col-md-4">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Vehicle yards Form</h4>

                                            <form action="#" method="post" id="yardCreateForm">
                                                <div id="yardfeedback"></div>
                                                @csrf
                                                <input type="hidden" name="yard_id" id="yardCreateID" value="">
                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Dealer:</label>
                                                        <div class="input-group">
                                                            <select type="text" name="dealer_id" id="dealerYardID"
                                                                class="form-control form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Name:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yard" id="yardName"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Address:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yardaddress" id="yardAddress"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Email:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yardemail" id="yardEmail"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="make">Phone:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yardphone" id="yardPhone"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                        <button class='btn btn-outline-warning btn-sm' id='clearYard'><i
                                                                class="fal fa-broom fa-lg fa-fw"></i> Reset</button>
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
    </main>

    <!-- Modal for adding vehicle schedule  -->
    {{-- <div class="modal" tabindex="-1" role="dialog" id="vehiclescheduledetailsmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="scheduleid" id="scheduleid" value="0">
                    <div id="scheduledetailsnotifications"></div>
                    <div class="form-group">
                        <label for="schedulecategory">Schedule Category</label>
                        <select name="schedulecategory" id="schedulecategory" class="form-control form-control-sm">
                            <option value="">&lt;Choose&gt;</option>
                            <option value="shares">Shares</option>
                            <option value="deposits">Deposits</option>
                            <option value="savings">Savings</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" id="saveschedule"><i
                            class="fal fa-save fa-lg fa-fw"></i> Save Schedule</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"
                        id="clearcloseschedulemodal"><i class="fal fa-times fa-fw fa-lg"></i> Close</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/main/vehicle.js') }}"></script>
@endsection
