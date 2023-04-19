@extends('layouts.dashboardlayout')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
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
                                        <div class="col-md-12 mt-2" id="filteroptions">
                                            <div class="card" style="padding: 0;">
                                                <div class="card-header">
                                                    <h5>Filter Options</h5>
                                                </div>
                                                <form id="filtervehiclesform">
                                                    <div class="col-12">
                                                        <label>Dealer</label>
                                                        <select name="filterlistdealer" id="filterlistdealer"
                                                            class="form-control form-control-sm">
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="filterliststatus">Model</label>
                                                        <select name="filterlistmodel" id="filterlistmodel"
                                                            class="form-control form-control-sm">

                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <label>Make</label>
                                                        <select name="filterlistmake" id="filterlistmake"
                                                            class="form-control form-control-sm">
                                                        </select>
                                                    </div>
                                                </form>

                                                <select name="vehicleslist" id="vehicleslist"
                                                    class="customerslisttreeview mt-2" multiple></select>

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
                                    <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab"
                                        href="#vehicledetails" role="tab" aria-controls="pop1"
                                        aria-selected="true">Vehicle Details</a>
                                    <a class="nav-item nav-link" id="pop1-tab" data-toggle="tab" href="#people"
                                        role="tab" aria-controls="pop1" aria-selected="true">Vehicle List</a>
                                    <a class="nav-item nav-link" id="statement-tab" data-toggle="tab" href="#statement"
                                        role="tab" aria-controls="pop2" aria-selected="false">Statement</a>
                                    <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#deliveries"
                                        role="tab" aria-controls="pop5" aria-selected="false">Deliveries</a>
                                    <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#charges"
                                        role="tab" aria-controls="pop2" aria-selected="false">Charges</a>
                                </div>
                            </nav>

                            <div class="tab-content text-left" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="vehicledetails" role="tabpanel">
                                    <div class="pt-3"></div>
                                    <div id="userdetails" class="mt-2">
                                        <div class="card containergroup">
                                            <div class="card-header">
                                                <h5>Vehicle Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <div id="vehiclenotifications"></div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <input type="hidden" id="vehicleID" value="0">
                                                        <label for="type">Dealer:</label>
                                                        <div class="input-group">
                                                            <select class="form-control form-control-sm" name="dealer_id"
                                                                id="vehicleDealer"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <input type="hidden" id="vehicleID" value="0">
                                                        <label for="type">Vehicle Type:</label>
                                                        <div class="input-group">
                                                            <select class="form-control form-control-sm" name="type"
                                                                id="vehicleType"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="make">Vehicle Make:</label>
                                                        <div class="input-group">
                                                            <select class="form-control form-control-sm" name="make"
                                                                id="vehicleMake"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="firstname">Vehicle Model:</label>
                                                        <div class="input-group">
                                                            <select name="model" id="vehicleModel"
                                                                class="form-control form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="middlename">Country of origin:</label>
                                                        <div class="input-group">
                                                            <select name="contry_of_origin" id="countryofOrigin"
                                                                class="form-control form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="lastname">Country of Sale:</label>
                                                        <div class="input-group">
                                                            <select name="country_located" id="countryLocated"
                                                                class="form-control form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="lastname">County located:</label>
                                                        <div class="input-group">
                                                            <select name="county_id" id="countyID"
                                                                class="form-control form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="company">Year of manufacture:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fal fa-calender-alt  fa-sm fa-fw"></i></span>
                                                            </div>
                                                            <select name="year" id="yearOfManufacture"
                                                                class="form-control  form-control-sm"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="company">Mileage:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fal fa-calender-alt  fa-sm fa-fw"></i></span>
                                                            </div>
                                                            <input type="number" name="mileage" id="mileAge"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <label for="company">Color:</label>
                                                        <select name="color" id="vehicleColor"
                                                            class="form-control  form-control-sm" required>
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

                                                    <div class="col-md-4">
                                                        <label for="company">Price:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Ksh</span>
                                                            </div>
                                                            <input type="text" name="price" id="vehiclePrice"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="company">Engine CC:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">cc</span>
                                                            </div>
                                                            <input type="text" name="enginecc" id="engineCC"
                                                                class="form-control form-control-sm" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="company">Interior:</label>
                                                        <div class="input-group">
                                                            <select name="inetrior" id="interior"
                                                                class="form-control form-control-sm" required>
                                                                <option value="">Select One</option>
                                                                <option value="Leather">Leather</option>
                                                                <option value="Fabric">Fabric</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="company">Fuel Type:</label>
                                                        <div class="input-group">
                                                            <select name="fuel_type" id="fuelType" required
                                                                class="form-control form-control-sm">
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
                                                    <div class="form-group col-md-6">
                                                        <label for="company">Transmission:</label>
                                                        <div class="input-group">

                                                            <select name="transmission" id="transmission"
                                                                class="form-control form-control-sm" required>
                                                                <option value="">Select One</option>
                                                                <option value="Automatic">Automatic</option>
                                                                <option value="Manual">Manual</option>
                                                                <option value="Semi-Auto">Semi-Auto</option>
                                                                <option value="None">None</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="col-md-6">
                                                        <label for="company">Tags:</label>
                                                        <div class="input-group">
                                                            <select name="tags" id="vehicleTags"
                                                                class="form-control form-control-sm" multiple>

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
                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox" value="4WD/AWD"
                                                                    id="4WD/AWD"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;4WD/AWD</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="ABS Brakes" id="ABS Brakes"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;ABS Brakes</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Air Conditioning" id="Air Conditioning"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Air
                                                                Conditioning</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Alloy Wheels" id="Alloy Wheels"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Alloy
                                                                Wheels</label>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="AM/FM Stereo" id="AM/FM Stereo"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;AM/FM
                                                                Stereo</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Roof Racks" id="Roof Racks"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Roof Racks</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Auxiliary Audio Input"
                                                                    id="Auxiliary Audio Input"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Auxiliary Audio
                                                                Input</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox" value="CD Audio"
                                                                    id="CD Audio" name="features[]">&nbsp;&nbsp;&nbsp;CD
                                                                Audio</label>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Cruise Control" id="Cruise Control"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Cruise
                                                                Control</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Front Seat Heaters" id="Front Seat Heaters"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Front Seat
                                                                Heaters</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Leather Seats" id="Leather Seats"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Leather
                                                                Seats</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Memory Seat(s)" id="Memory Seat(s)"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Memory
                                                                Seat(s)</label>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value=" Navigation System" id=" Navigation System"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Navigation
                                                                System</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Overhead Airbags" id="Overhead Airbags"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Overhead
                                                                Airbags</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Panoramic Sunroof" id="Panoramic Sunroof"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Panoramic
                                                                Sunroof</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Parking Sensors" id="Parking Sensors"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Parking
                                                                Sensors</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Power Locks" id="Power Locks"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Power Locks</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""> <input type="checkbox"
                                                                    value="Power Mirrors" id="Power Mirrors"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Power
                                                                Mirrors</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Power Seat(s)" id="Power Seat(s)"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Power
                                                                Seat(s)</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Power Windows" id="Power Windows"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Power
                                                                Windows</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Premium Package" id="Premium Package"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Premium
                                                                Package</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Rear Defroster" id="Rear Defroster"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Rear
                                                                Defroster</label>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Rear View Camera" id="Rear View Camera"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Rear View
                                                                Camera</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Satellite Radio Ready"
                                                                    id="Satellite Radio Ready"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Satellite Radio
                                                                Ready</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="color:#000;">
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Side Airbags" id="Side Airbags"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Airbags</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="SiriusXM Trial Avail" id="SiriusXM Trial Avail"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;SiriusXM Trial
                                                                Avail</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Technology Package" id="Technology Package"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Technology
                                                                Package</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for=""><input type="checkbox"
                                                                    value="Traction Control" id="Traction Control"
                                                                    name="features[]">&nbsp;&nbsp;&nbsp;Traction
                                                                Control</label>
                                                        </div>
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
                                    <!-- End of vehicle Details Tab  -->

                                    <!-- vehicle statement tab  -->
                                    <div class="tab-pane fade" id="statement" role="tabpanel"
                                        aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <!-- <h4>Statement</h4> -->
                                    </div>
                                    <!-- End of vehicle statement tab  -->

                                    <!-- vehicle Charges tab  -->
                                    <div class="tab-pane fade" id="charges" role="tabpanel"
                                        aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>

                                    </div>
                                    <!-- End of vehicle charges tab  -->

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

                    <div id="schedulesharetypes" class="form-group" display="none">
                        <label for="schedulesharetypes">Share Type</label>
                        <select name="shedulesharetype" id="shedulesharetype" class="form-control form-control-sm">

                        </select>
                    </div>

                    <div id="schedulesavingtypes" class="form-group" display="none">
                        <label for="schedulesavingtype">Saving Type</label>
                        <select name="schedulesavingtype" id="schedulesavingtype"
                            class="form-control form-control-sm"></select>
                    </div>

                    <div class="form-group">
                        <label for="schedulestartdate">Start Date</label>
                        <input type="text" name="schedulestartdate" id="schedulestartdate"
                            class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label for="scheduleenddate">End Date</label>
                        <input type="text" name="scheduleenddate" id="scheduleenddate"
                            class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label for="scheduleamount">Amount</label>
                        <input type="text" name="scheduleamount" id="scheduleamount"
                            class="form-control form-control-sm">
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
