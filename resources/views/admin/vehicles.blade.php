@extends('layouts.admin')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <style>
        .filterSection,
        #additionInfo {
            display: none;
        }
    </style>
@endsection

@section('page')
    Vehicles
@endsection
@section('main')
    <main>
        <div class="row">
            <div class="col-md-12 card">
                {{-- <div class="card-header bg-white"> --}}
                <nav class="nav-justified">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#vehicledetails"
                            role="tab" aria-controls="pop1" aria-selected="true">Vehicle Details</a>

                        <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#vehicleListTab"
                            role="tab" aria-controls="pop1" aria-selected="true">Vehicle List</a>

                        <a class="nav-item nav-link" id="makes-tab" data-toggle="tab" href="#makesTab" role="tab"
                            aria-controls="pop2" aria-selected="false">Makes</a>

                        <a class="nav-item nav-link" id="models-tab" data-toggle="tab" href="#vehicleModelsTab"
                            role="tab" aria-controls="pop5" aria-selected="false">Models</a>

                        <a class="nav-item nav-link" id="features-tab" data-toggle="tab" href="#featuresTab" role="tab"
                            aria-controls="pop2" aria-selected="false">Features</a>

                        <a class="nav-item nav-link" id="types-tab" data-toggle="tab" href="#vehicleTypesTab" role="tab"
                            aria-controls="pop2" aria-selected="false">Vehicle Types</a>

                        <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#yardsTab" role="tab"
                            aria-controls="pop2" aria-selected="false">Yards</a>
                    </div>
                </nav>
                {{-- </div> --}}

                <div class="card-body">
                    <div class="tab-content text-left" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="vehicledetails" role="tabpanel">
                            <div class="text-right">
                                <button type="button" class="btn btn-success btn-sm mt-1 mb-1 btn-floated"
                                    id="filterToggle"><i class="fa fa-edit fa-1x text-warning"></i>Edit Vehicle</button>
                            </div>

                            <div class="alert-success pb-3 pt-3 pl-2 pr-1 border-rounded filterSection"
                                style="border-radius: 6px;">
                                <form id="filterVehiclesForm" class="form-row">
                                    @csrf
                                    <div class="col-md-3">
                                        <label for="filterDealerID">Dealer</label>
                                        <select name="filterlistdealer_id" class="form-control  chzn-select"
                                            id="filterDealerID" style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="filterMakeID">Make</label>
                                        <select name="filterlistmake_id" class="form-control  chzn-select" id="filterMakeID"
                                            style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="filterModelID">Model</label>
                                        <select name="filterlistmodel_id" class="form-control  chzn-select"
                                            id="filterModelID" style="width: 100%;">

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="filterVehiclesID">Vehicles</label>
                                        <select name="vehicleslist_id" style="width: 100%;"
                                            class="form-control  chzn-select" id="filterVehiclesID" style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                class="fas fa-search"></i>&nbsp;Find</button>
                                    </div>
                                </form>
                            </div>

                            <div class="row mt-2">
                                <form action="{{ route('vehicles.store') }}" id="vehicleCreateForm">
                                    {{-- <p class="text-danger">Fields marked with * are required</p> --}}
                                    <div class="col-md-12">
                                        <div class="card ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" name="unique_str" id="uniqueStrID"
                                                        value="{{ $str }}">
                                                    <input type="hidden" name="vehicle_id" id="vehicleID"
                                                        value="">
                                                    <div class="col-md-3 form-group">
                                                        <label for="vehicleDealer">Dealer: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <select class="form-control  chzn-select" name="dealer_id"
                                                                id="vehicleDealer" style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="vehicleType">Vehicle Type:<sup>*</sup></label>
                                                        <div class="input-group">
                                                            <select class="form-control  chzn-select" name="type"
                                                                id="vehicleType" style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="vehicleMake">Vehicle Make: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <select class="form-control  chzn-select" name="make"
                                                                id="vehicleMake" required style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="vehicleModel">Vehicle Model: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <select name="model" id="vehicleModel"
                                                                class="form-control  chzn-select" required
                                                                style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="location">Location </label><span for="yard"
                                                            class="float-right"><input type="checkbox" name="yard_check"
                                                                id="yardToggle">&nbsp;&nbsp;Yard</span>

                                                        <div class="input-group locationInput">
                                                            <input type="text" class="form-control  location"
                                                                id="location" name="location">
                                                        </div>

                                                        <div class="input-group yardInput">
                                                            <select name="yard_id"
                                                                id="yardID"class="form-control  location chzn-select"
                                                                style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="yearOfManufacture">Year of manufacture: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <select name="year" id="yearOfManufacture"
                                                                class="form-control  chzn-select" required
                                                                style="width: 100%;">
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
                                                        <label for="usageCondition">Usage:</label>
                                                        <div class="input-group">
                                                            <select name="usage" id="usageCondition"
                                                                class="form-control  chzn-select" style="width: 100%;">
                                                                <option value="">Any</option>
                                                                <option value="New">New</option>
                                                                <option value="Locally Used">Locally used</option>
                                                                <option value="Foreign Used">Foreign used</option>
                                                                <option value="Damaged">Damaged</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="transmission">Transmission:</label>
                                                        <div class="input-group">
                                                            <select name="transmission" id="transmission"
                                                                class="form-control  chzn-select" style="width: 100%;">
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
                                                        <label for="mileAge">Mileage: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <input type="number" name="mileage" id="mileAge"
                                                                class="form-control " required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="vehiclePrice">Price: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <input type="number" name="price" id="vehiclePrice"
                                                                class="form-control " required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="engineCC">Engine CC: <sup>*</sup></label>
                                                        <div class="input-group">
                                                            <input type="number" name="enginecc" id="engineCC"
                                                                class="form-control " required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="fuelType">Fuel Type:</label>
                                                        <div class="input-group">
                                                            <select name="fuel_type" id="fuelType"
                                                                class="form-control  chzn-select" style="width: 100%;">
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

                                                    <div class="col-md-12">
                                                        <label for="description">Description:</label>
                                                        <div class="input-group">
                                                            <textarea name="description" id="description" class="form-control" required></textarea>
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
                                                        <label for="countryofOrigin">Country of origin:</label>
                                                        <div class="input-group">
                                                            <select name="country_of_origin" id="countryofOrigin"
                                                                class="form-control  chzn-select"
                                                                style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="col-md-3 form-group">
                                                        <label for="shipping_to">Shipping to:</label>
                                                        <div class="input-group">
                                                            <select name="shipping_to" id="shippingTo"
                                                                class="form-control  chzn-select"
                                                                style="width: 100%;"></select>
                                                        </div>
                                                    </div> --}}

                                                    <div class="col-md-3 form-group">
                                                        <label for="vehicleColor">Color:</label>
                                                        <select name="color" id="vehicleColor"
                                                            class="form-control   chzn-select" style="width: 100%;">
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
                                                        <label for="interior">Interior:</label>
                                                        <div class="input-group">
                                                            <select name="inetrior" id="interior"
                                                                class="form-control  chzn-select" style="width: 100%;">
                                                                <option value="">Select One</option>
                                                                <option value="Leather">Leather</option>
                                                                <option value="Fabric">Fabric</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="noOfSeats">NO Seats: </label>
                                                        <div class="input-group">
                                                            <input type="text" name="seats" id="noOfSeats"
                                                                class="form-control ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="gear">NO of Gears: </label>
                                                        <div class="input-group">
                                                            <input type="text" name="gear" id="gear"
                                                                class="form-control ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="speed">Top Speed: </label>
                                                        <div class="input-group">
                                                            <input type="text" name="speed" id="speed"
                                                                class="form-control ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="terrain">Drive terrain: </label>
                                                        <div class="input-group">
                                                            <input type="text" name="terrain" id="terrain"
                                                                class="form-control ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="engine">Engine: </label>
                                                        <div class="input-group">
                                                            <input type="text" name="engine" id="engine"
                                                                class="form-control ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="horsepower">Horse Power: </label>
                                                        <div class="input-group">
                                                            <input type="text" name="horsepower" id="horsepower"
                                                                class="form-control ">
                                                        </div>
                                                    </div>



                                                    <div class="col-md-4 form-group">
                                                        <label for="vehicleTags">Tags:</label>
                                                        <div class="input-group">
                                                            <select name="tags" id="vehicleTags" class="form-control "
                                                                multiple="multiple" style="width: 100%;">
                                                                <option value="#Best deals">#Best deals</option>
                                                                <option value="#Cars on sale">#Cars on sale</option>
                                                                <option value="#New Arrivals">#New Arrivals</option>
                                                                <option value="#Best deals">#Best deals</option>
                                                            </select>
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
                                                    <label for="addionalImages"><span id="images">Images:</label>
                                                    <div class="input-group">
                                                        <input type="file" name="images" id="addionalImages"
                                                            multiple>
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
                                        <div id="vehiclefeedback"></div>

                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <button class='btn btn-success btn-md' type="submit" id='savevehicle'><i
                                                        class="fal fa-save fa-lg fa-fw"></i>
                                                    Save
                                                    vehicle</button>
                                                <button class='btn btn-outline-warning btn-md' id='clearvehicle'><i
                                                        class="fal fa-broom fa-lg fa-fw"></i>
                                                    Clear Fields</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>

                        </div>

                        <div class="tab-pane fade mb-3" id="vehicleListTab" role="tabpanel" aria-labelledby="pop2-tab">
                            <div class="bg-primary pb-3 pt-3 pl-2 pr-1 border-rounded" style="border-radius: 6px;">
                                <form id="filterVehiclesListForm" class="form-row">
                                    @csrf
                                    {{-- @if (auth()->user()->role === 'dealer')
                                            <div class="col-md-3">
                                                <label>Yard</label>
                                                <select name="filterlistyard_id" id="filterListVehicleYardID"
                                                    class="form-control  chzn-select" style="width: 100%;">
                                                </select>
                                            </div>
                                        @endif --}}

                                    <div class="col-md-4">
                                        <label for="filterListDealerID">Dealer</label>
                                        <select name="filterlistdealer_id" class="form-control  chzn-select"
                                            id="filterListDealerID" style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="filterListMakeID">Make</label>
                                        <select name="filterlistmake_id" class="form-control  chzn-select"
                                            id="filterListMakeID" style="width: 100%;">
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="filterListModelID">Model</label>
                                        <select name="filterlistmodel_id" class="form-control  chzn-select"
                                            id="filterListModelID" style="width: 100%;">

                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                class="fas fa-search"></i>&nbsp;Find</button>
                                    </div>
                                </form>
                            </div>

                            <div id="listingfeedback"></div>

                            <div class="col-md-12 mt-2 text-left">
                                <div class="dropdown float-right">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Action
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-arrow-down text-warning"></i>&nbsp;Discount</a>
                                        <a class="dropdown-item" href="#" id="vehicleDelist"><i
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

                                <div class="col-md-8 mt-2">
                                    <div class="card">
                                        <div class="card-body" id="makesTableSection">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card make-create-section mt-2">
                                        <div class="card-header bg-white">
                                            <h4 class="text text-center mb-2">Makes Form</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="#" method="post" id="makeCreateForm"
                                                enctype="multipart/form-data">
                                                <div id="makefeedback"></div>
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="make_id" id="makeCreateID"
                                                        value="">
                                                    <div class="col-md-12 form-group">
                                                        <label for="makeName">Make:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="make" id="makeName"
                                                                class="form-control ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="makeLogo">Logo:</label>
                                                        <div class="input-group">
                                                            <input type="file" name="logo" id="makeLogo">
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
                        </div>

                        <div class="tab-pane fade mb-3" id="vehicleModelsTab" role="tabpanel"
                            aria-labelledby="pop2-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body" id="modelsTableSection">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="model-create-section mt-2">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h4 class="text text-center mb-2">Model Form</h4>

                                            </div>
                                            <div class="card-body">
                                                <form action="#" method="post" id="modelCreateForm">
                                                    @csrf
                                                    <div id="modelfeedback"></div>
                                                    <div class="row">
                                                        <input type="hidden" name="model_id" id="modelID"
                                                            value="">
                                                        <div class="col-md-12 form-group">
                                                            <label for="modelMakeID">Make:</label>
                                                            <div class="input-group">
                                                                <select name="make_id" id="modelMakeID"
                                                                    class="form-control "></select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 form-group">
                                                            <label for="modelName">Model:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="model" id="modelName"
                                                                    class="form-control ">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 form-group">
                                                            <button type="submit" class="btn btn-sm btn-success"
                                                                id="submitModel"><i
                                                                    class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                            <button class='btn btn-outline-warning btn-sm'
                                                                id='clearModel'><i class="fal fa-broom fa-lg fa-fw"></i>
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

                        <div class="tab-pane fade mb-3" id="featuresTab" role="tabpanel" aria-labelledby="pop2-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body" id="featureseSection">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="make-create-section mt-2">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h4 class="text text-center mb-2">Features Form</h4>

                                            </div>
                                            <div class="card-body">
                                                <form action="#" method="post" id="featureCreateForm">
                                                    <div id="featurefeedback"></div>
                                                    @csrf
                                                    <input type="hidden" name="feature_id" id="featureCreateID"
                                                        value="">
                                                    <div class="row">

                                                        <div class="col-md-12 form-group">
                                                            <label for="featureName">Feature:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="feature" id="featureName"
                                                                    class="form-control ">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 form-group">
                                                            <label for="featureDescription">Description:</label>
                                                            <div class="input-group">
                                                                <textarea name="description" id="featureDescription" class="form-control "></textarea>
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
                            </div>
                        </div>

                        <div class="tab-pane fade mb-3" id="vehicleTypesTab" role="tabpanel" aria-labelledby="pop2-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body" id="typesSection"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="make-create-section mt-2">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h4 class="text text-center mb-2">Vehicle Types Form</h4>
                                            </div>

                                            <div class="card-body">
                                                <form action="#" method="post" id="typeCreateForm">
                                                    <div id="typefeedback"></div>
                                                    @csrf
                                                    <input type="hidden" name="type_id" id="typeCreateID"
                                                        value="">
                                                    <div class="row">

                                                        <div class="col-md-12 form-group">
                                                            <label for="typeName">Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="type" id="typeName"
                                                                    class="form-control ">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 form-group">
                                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                                    class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                            <button class='btn btn-outline-warning btn-sm'
                                                                id='clearType'><i class="fal fa-broom fa-lg fa-fw"></i>
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

                        <div class="tab-pane fade mb-3" id="yardsTab" role="tabpanel" aria-labelledby="pop2-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body" id="yardsSection"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card make-create-section mt-2">
                                        <div class="card-header-bg-white">
                                            <h4 class="text text-center mb-2">Vehicle yards Form</h4>

                                        </div>
                                        <div class="card-body">
                                            <form action="#" method="post" id="yardCreateForm">
                                                <div id="yardfeedback"></div>
                                                @csrf
                                                <input type="hidden" name="yard_id" id="yardCreateID" value="">
                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="dealerYardID">Dealer:</label>
                                                        <div class="input-group">
                                                            <select type="text" name="dealer_id" id="dealerYardID"
                                                                class="form-control chzn-select"
                                                                style="width: 100%;"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="yardName">Name:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yard" id="yardName"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="yardAddress">Address:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yardaddress" id="yardAddress"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="yardEmail">Email:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yardemail" id="yardEmail"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="yardPhone">Phone:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="yardphone" id="yardPhone"
                                                                class="form-control ">
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
            </div>
    </main>
@endsection

<div class="modal fade" id="vehicleDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="vehicleHeader"></h5>
                <button type="button" class="close btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <span class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" id="vehicledetailsSection">

                    </div>
                    <div class="col-md-4">
                        <h3 class="text-success">Messages</h3>
                        <div id="vehicleMessagesSection">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--
<div class="accordion" id="accordionExample"></div>
  <div class=\"accordion-item\"><h2 class=\"accordion-header\" id=\"headingOne\"><button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">Vehicle Quotes</button></h2><div id=\"collapseOne\" class=\"accordion-collapse collapse\" aria-labelledby=\"headingOne\" data-bs-parent=\"#accordionExample\"><div class=\"accordion-body\">"+quotediv+"</div></div></div>
</div> --}}

@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/jquery-ui.js') }}"></script>
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
