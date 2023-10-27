<div class="card">
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="loggedInUserRole" id="loggedInUserRole" value="{{ auth()->user()->role }}">

            <input type="hidden" name="unique_str" id="uniqueStrID" value="{{ $str }}">
            <input type="hidden" name="vehicle_id" id="vehicleID" value="">
            @if (auth()->user()->role === 'admin')
                <div class="col-md-3 form-group">
                    <label for="vehicleDealer">Dealer: <sup>*</sup></label>
                    <div class="input-group">
                        <select class="form-control  chzn-select" name="dealer_id" id="vehicleDealer"
                            style="width: 100%;"></select>
                    </div>
                </div>
            @endif

            <div class="col-md-3 form-group">
                <label for="vehicleType">Vehicle Type:</label>
                <div class="input-group">
                    <select class="form-control form-control--md chzn-select" name="type" id="vehicleType"
                        style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="vehicleMake">Vehicle Make: <sup>*</sup></label>
                <div class="input-group">
                    <select class="form-control form-control--md chzn-select" name="make" id="vehicleMake" required
                        style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="vehicleModel">Vehicle Model: <sup>*</sup></label>
                <div class="input-group">
                    <select name="model" id="vehicleModel" class="form-control form-control--md chzn-select" required
                        style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="yearOfManufacture">Year of manufacture: <sup>*</sup></label>
                <div class="input-group">
                    <select name="year" id="yearOfManufacture" class="form-control form-control--md chzn-select"
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
                <label for="fuelType">Fuel Type: <sup>*</sup></label>
                <div class="input-group">
                    <select name="fuel_type" id="fuelType" class="form-control form-control--md chzn-select"
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
                <label for="transmission">Transmission: <sup>*</sup></label>
                <div class="input-group">
                    <select name="transmission" id="transmission" class="form-control form-control--md chzn-select"
                        style="width: 100%;" required>
                        <option value="">Select One</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                        <option value="Electric">Electric</option>
                        <option value="Tiptronic">Tiptronic</option>
                        <option value="None">None</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="usageCondition">Usage: <sup>*</sup></label>
                <div class="input-group">
                    <select name="usage" id="usageCondition" class="form-control form-control--md chzn-select"
                        style="width:100%;">
                        <option value="">Select One</option>
                        <option value="New">New</option>
                        <option value="Locally Used">Locally used</option>
                        <option value="Foreign Used">Foreign used</option>
                        <option value="Damaged">Damaged</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="vehiclePrice">Price: <sup>*</sup></label>
                <div class="input-group">
                    <input type="number" name="price" id="vehiclePrice" class="form-control form-control--md"
                        required>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="engineCC">Engine CC: <sup>*</sup></label>
                <div class="input-group">
                    <input type="number" name="enginecc" id="engineCC" class="form-control form-control--md" required>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="mileAge">Mileage:</label>
                <div class="input-group">
                    <input type="number" name="mileage" id="mileAge" class="form-control form-control--md">
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="location">Location </label><span for="yard" class="float-right"><input type="checkbox"
                        name="yard_check" id="yardToggle">&nbsp;&nbsp;Yard</span>

                <div class="input-group locationInput">
                    <input type="text" class="form-control form-control--md location" id="location"
                        name="location">
                </div>

                <div class="input-group yardInput">
                    <select name="yard_id" id="yardID"class="form-control form-control--md location chzn-select"
                        style="width: 100%;"></select>
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
        <button type="button" class="btn btn-outline-danger mt-1 mb-1 btn-floated float-right"><i
                class="fa fa-plus fa-1x text-warning"></i></button>
    </div>

    <div class="card-body" id="additionInfo">
        <div class="row">

            <div class="col-md-3 form-group">
                <label for="countyID">County Located:</label>
                <div class="input-group">
                    <select name="county_id" id="countyID"
                        class="form-control form-control--md chzn-select" style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="countryofOrigin">Country of origin:</label>
                <div class="input-group">
                    <select name="country_of_origin" id="countryofOrigin"
                        class="form-control form-control--md chzn-select" style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="engine">Engine: </label>
                <div class="input-group">
                    <input type="text" name="engine" id="engine" class="form-control form-control--md">
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="vehicleColor">Color:</label>
                <select name="color" id="vehicleColor" class="form-control  form-control--md chzn-select"
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
                <label for="interior">Interior:</label>
                <div class="input-group">
                    <select name="inetrior" id="interior" class="form-control form-control--md chzn-select"
                        style="width: 100%;">
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
                    <input type="number" name="seats" id="noOfSeats" class="form-control">
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="gear">NO of Gears: </label>
                <div class="input-group">
                    <input type="text" name="gear" id="gear" class="form-control form-control--md">
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="speed">Top Speed: </label>
                <div class="input-group">
                    <input type="text" name="speed" id="speed" class="form-control form-control--md">
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="terrain">Drive terrain: </label>
                <div class="input-group">
                    <input type="text" name="terrain" id="terrain" class="form-control form-control-md">
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label for="horsepower">Horse Power: </label>
                <div class="input-group">
                    <input type="text" name="horsepower" id="horsepower" class="form-control form-control--md">
                </div>
            </div>

            <div class="col-md-4 form-group">
                <label for="vehicleTags">Tags:</label>
                <div class="input-group">
                    <select name="tags" id="vehicleTags" class="form-control form-control-md"
                        multiple="multiple" style="width: 100%;">
                        <option value="#Best deals">#Best deals</option>
                        <option value="#Cars on sale">#Cars on sale</option>
                        <option value="#New Arrivals">#New Arrivals</option>
                        <option value="#Best deals">#Best deals</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 form-group">
                <div class="row mt-4" id="featuresSection">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card mt-2">
    <div class="card-header bg-white">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="coverPhoto"><span id="images">Main Image/Cover
                        Photo:</label>
                <div class="input-group">
                    <input type="file" name="cover_photo" id="coverPhoto">
                </div>
            </div>

            <div class="col-md-6 form-group">
                <label for="addionalImages"><span id="images">Additional
                        Images:</label>
                <div class="input-group">
                    <input type="file" name="images" id="addionalImages"
                        multiple>
                </div>
                <p class="text-danger">You can upload from 1 - 20 photos</p>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="row" id="image-preview">
        </div>
        <div id="imageFeedback"></div>
    </div>
</div>

<div id="vehiclefeedback"></div>

@if (Session::has('subscriptioninfo'))
    <div class="alert alert-warning" role="alert">
        {!! Session::get('subscriptioninfo') !!}
    </div>
@endif

<div class="col-md-12">
    <button class='btn btn-success btn-md' type="submit" id='savevehicle'><i class="fa fa-save fa-lg fa-fw"></i>
        Save
        vehicle</button>
    <button class='btn btn-outline-warning btn-md' id='clearvehicle'><i class="fa fa-broom fa-lg fa-fw"></i>
        Clear Fields</button>
</div>
