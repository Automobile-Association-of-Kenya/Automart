@extends('layouts.dashboardlayout')

@section('title')
    Vehicles @parent
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
                    <div class="col-md-2">
                        <section class="filterpane">
                            <div class="container">
                                <div class="row">
                                    {{-- <input type="hidden" name=""> --}}
                                    <div class="col-md-12 mt-2" id="filteroptions">
                                        <div class="card" style="padding: 0;">
                                            <div class="card-header">
                                                <h5>Filter Options</h5>
                                            </div>

                                            <form id="filtervehiclesform">
                                                <div class="col-12">
                                                    <label>Dealer</label>
                                                    <select name="filterlistdealer" id="filterlistdealer"
                                                        class="form-control form-control-md">
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <label>Make</label>
                                                    <select name="filterlistmake" id="filterlistmake"
                                                        class="form-control form-control-md">
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <label for="filterliststatus">Model</label>
                                                    <select name="filterlistmodel" id="filterlistmodel"
                                                        class="form-control form-control-md">

                                                    </select>
                                                </div>
                                            </form>

                                            <select name="vehicleslist" id="vehicleslist" class="customerslisttreeview mt-2"
                                                multiple></select>

                                            <p class='bg-secondary p-1  mt-1 text-white text-center'><span
                                                    id="listcount">No</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-md-10">
                        <div class="alert alert-primary">
                            <div class="row">
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
                            </div>

                            <div class="row">
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
                            </div>
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
                        </div>
                        <!-- Set up tabs  -->
                        <nav class="nav-justified ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#vehicledetails"
                                    role="tab" aria-controls="pop1" aria-selected="true">Vehicle Details</a>

                                <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#vehicleListTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Vehicle List</a>

                                <a class="nav-item nav-link" id="makes-tab" data-toggle="tab" href="#makesTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Makes</a>

                                <a class="nav-item nav-link" id="models-tab" data-toggle="tab" href="#modelsTab"
                                    role="tab" aria-controls="pop5" aria-selected="false">Models</a>

                                <a class="nav-item nav-link" id="features-tab" data-toggle="tab" href="#featuresTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Features</a>
                            </div>
                        </nav>

                        <div class="tab-content text-left" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="vehicledetails" role="tabpanel">
                                <div class="pt-3"></div>
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div id="vehiclenotifications"></div>

                                            <div class="row">

                                                <div class="col-md-4 form-group">
                                                    <input type="hidden" id="vehicleID" value="0">
                                                    <label for="type">Dealer:</label>
                                                    <div class="input-group">
                                                        <select class="form-control form-control-md" name="dealer_id"
                                                            id="vehicleDealer"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <input type="hidden" id="vehicleID" value="0">
                                                    <label for="type">Vehicle Type:</label>
                                                    <div class="input-group">
                                                        <select class="form-control form-control-md" name="type"
                                                            id="vehicleType"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="make">Vehicle Make:</label>
                                                    <div class="input-group">
                                                        <select class="form-control form-control-md" name="make"
                                                            id="vehicleMake"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="firstname">Vehicle Model:</label>
                                                    <div class="input-group">
                                                        <select name="model" id="vehicleModel"
                                                            class="form-control form-control-md"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="middlename">Country of origin:</label>
                                                    <div class="input-group">
                                                        <select name="contry_of_origin" id="countryofOrigin"
                                                            class="form-control form-control-md"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="shipping_to">Shipping to:</label>
                                                    <div class="input-group">
                                                        <select name="shipping_to" id="shippingTo"
                                                            class="form-control form-control-md"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <h5>Location <label for="yard" class="float-right"><input
                                                                type="checkbox" name="yard_check"
                                                                id="yardToggle">&nbsp;&nbsp;Yard</label></h5>

                                                    <div class="input-group locationInput">
                                                        <input type="text"
                                                            class="form-control form-control-md location" id="location"
                                                            name="location">
                                                    </div>

                                                    <div class="input-group yardInput">
                                                        <select name="yard_id"
                                                            id="yardID"class="form-control form-control-md location"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Year of manufacture:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fal fa-calender-alt  fa-sm fa-fw"></i></span>
                                                        </div>
                                                        <select name="year" id="yearOfManufacture"
                                                            class="form-control  form-control-md">
                                                            <option value="">Select One</option>
                                                            @for ($i = date('Y', strtotime(now())); $i >= 2000; $i--)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Mileage:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fal fa-calender-alt  fa-sm fa-fw"></i></span>
                                                        </div>
                                                        <input type="number" name="mileage" id="mileAge"
                                                            class="form-control form-control-md">
                                                    </div>
                                                </div>


                                                <div class="col-md-4 form-group">
                                                    <label for="company">Color:</label>
                                                    <select name="color" id="vehicleColor"
                                                        class="form-control  form-control-md" required>
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
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Price:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Ksh</span>
                                                        </div>
                                                        <input type="text" name="price" id="vehiclePrice"
                                                            class="form-control form-control-md">
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Engine CC:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">cc</span>
                                                        </div>
                                                        <input type="text" name="enginecc" id="engineCC"
                                                            class="form-control form-control-md" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Interior:</label>
                                                    <div class="input-group">
                                                        <select name="inetrior" id="interior"
                                                            class="form-control form-control-md" required>
                                                            <option value="">Select One</option>
                                                            <option value="Leather">Leather</option>
                                                            <option value="Fabric">Fabric</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Fuel Type:</label>
                                                    <div class="input-group">
                                                        <select name="fuel_type" id="fuelType" required
                                                            class="form-control form-control-md">
                                                            <option value="">Select One</option>
                                                            <option value="Petrol">Petrol</option>
                                                            <option value="Diesel">Diesel</option>
                                                            <option value="Hybrid">Hybrid</option>
                                                            <option value="Diesel-Hybrid">Diesel-Hybrid</option>
                                                            <option value="Electic">Electic</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label for="company">Transmission:</label>
                                                    <div class="input-group">

                                                        <select name="transmission" id="transmission"
                                                            class="form-control form-control-md" required>
                                                            <option value="">Select One</option>
                                                            <option value="Automatic">Automatic</option>
                                                            <option value="Manual">Manual</option>
                                                            <option value="Semi-Auto">Semi-Auto</option>
                                                            <option value="None">None</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label for="company">Tags:</label>
                                                    <div class="input-group">
                                                        <select name="tags" id="vehicleTags"
                                                            class="form-control form-control-md">

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
                                                <h5>Images</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="cover_photo">Cover Photo:</label>
                                                        <div class="input-group">
                                                            <input type="file" name="cover_photo" id="coverPhoto">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="documentnumber"><span id="images">Additional
                                                                Images:</label>
                                                        <div class="input-group">
                                                            <input type="file" name="images" id="addionalImages"
                                                                multiple>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button class='btn btn-success btn-md' id='savevehicle'><i
                                                        class="fal fa-save fa-lg fa-fw"></i> Save vehicle</button>
                                                <button class='btn btn-outline-danger btn-sm' id='clearvehicle'><i
                                                        class="fal fa-broom fa-lg fa-fw"></i> Clear Fields</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="vehicleListTab" role="tabpanel" aria-labelledby="pop2-tab">

                            </div>

                            <div class="tab-pane fade" id="makesTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-8" id="MakesTableSectiontion">

                                    </div>

                                    <div class="col-md-4">
                                        <form action="{{ route('make-create') }}" method="post" id="makeCreateForm">
                                            <div id="makefeedback"></div>
                                            <div class="col-md-12 form-group">
                                                <label for="make">Make:</label>
                                                <div class="input-group">
                                                    <input type="number" name="make" id="makeName"
                                                        class="form-control form-control-md">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-sm btn-success"
                                                id="submitMake">save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="vehicleModelsTab" role="tabpanel" aria-labelledby="pop2-tab">


                            </div>

                            <div class="tab-pane fade" id="featuresTab" role="tabpanel" aria-labelledby="pop2-tab">

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
                        <select name="schedulecategory" id="schedulecategory" class="form-control form-control-md">
                            <option value="">&lt;Choose&gt;</option>
                            <option value="shares">Shares</option>
                            <option value="deposits">Deposits</option>
                            <option value="savings">Savings</option>
                        </select>
                    </div>

                    <div id="schedulesharetypes" class="form-group" display="none">
                        <label for="schedulesharetypes">Share Type</label>
                        <select name="shedulesharetype" id="shedulesharetype" class="form-control form-control-md">

                        </select>
                    </div>

                    <div id="schedulesavingtypes" class="form-group" display="none">
                        <label for="schedulesavingtype">Saving Type</label>
                        <select name="schedulesavingtype" id="schedulesavingtype"
                            class="form-control form-control-md"></select>
                    </div>

                    <div class="form-group">
                        <label for="schedulestartdate">Start Date</label>
                        <input type="text" name="schedulestartdate" id="schedulestartdate"
                            class="form-control form-control-md">
                    </div>

                    <div class="form-group">
                        <label for="scheduleenddate">End Date</label>
                        <input type="text" name="scheduleenddate" id="scheduleenddate"
                            class="form-control form-control-md">
                    </div>

                    <div class="form-group">
                        <label for="scheduleamount">Amount</label>
                        <input type="text" name="scheduleamount" id="scheduleamount"
                            class="form-control form-control-md">
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
    <script src="{{ asset('js/main/vehicle.js') }}"></script>
@endsection
