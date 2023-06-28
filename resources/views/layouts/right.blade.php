<div class="sidebar-left">
    <!-- Advanced search start -->
    <div class="widget advanced-search2">
        <h3 class="sidebar-title">Search Cars</h3>
        <div class="s-border"></div>
        <div class="m-border"></div>
        {{-- <input type="hidden" name="current_type" id="currentType" value="{{ $type->id }}"> --}}

        <form method="GET" id="vehiclesSearchForm" action="{{ route('search') }}">
            @csrf
            <div class="form-group">
                <select class="form-select form-select-md" name="type" id="filterVehicleType">

                </select>
            </div>

            <div class="form-group">
                <select class="form-select form-select-md" name="make" id="filterMakesID">

                </select>
            </div>
            
            <div class="form-group">
                <select class="form-select form-select-md" name="model" id="vehicleModelID">
<option value=""></option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-select form-select-md" name="usage" id="usage">
                    <option value="">Usage</option>
                    <option value="New">New</option>
                    <option value="Semi-new">Semi New</option>
                    <option value="Locally Used">Locally used</option>
                    <option value="Foreign Used">Foreign used</option>
                    <option value="Damaged">Damaged</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-select form-select-md" name="year" id="filterYear">
                    <option value="">Year</option>
                    @for ($i = 2023; $i >= 1990; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            {{-- <div class="form-group">
                <select class="form-select form-select-md" name="county_id" id="countiesID">
                    <option>Location</option>

                </select>
            </div> --}}

            <div class="form-group">
                <select class="form-select form-select-md" name="transmission" id="filterTransmission">
                    <option value="">Transmission</option>
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                    <option value="Semi-Auto">Semi-Auto</option>
                    <option value="Tiptronic">Tiptronic</option>
                </select>
            </div>


            <div class="range-slider clearfix">
                <label>Price</label>
                <div data-min="0" data-max="30000000" data-min-name="min_price" data-max-name="max_price"
                    data-unit="Ksh" class="range-slider-ui ui-slider" aria-disabled="false" id="priceSlider"></div>
                <div class="clearfix"></div>
                <input type="hidden" name="start_price" id="rangeSliderStartPrice" value="0">
                <input type="hidden" name="end_price" id="rangeSliderEndPrice" value="30000000">
            </div>

            {{-- <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                    <i class="fa fa-plus-circle"></i> Other Features
                                </a> --}}

            {{-- <div id="options-content" class="collapse">
                                    <h3 class="sidebar-title">Brands</h3>
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox2" type="checkbox">
                                        <label for="checkbox2">
                                            Audi
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox3" type="checkbox">
                                        <label for="checkbox3">
                                            BMW
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox4" type="checkbox">
                                        <label for="checkbox4">
                                            Honda
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1">
                                            Lamborghini
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox5" type="checkbox">
                                        <label for="checkbox5">
                                            Toyota
                                        </label>
                                    </div>
                                    <br>
                                </div> --}}
            <div class="form-group mb-0">
                <button type="submit" class="search-button btn">Search</button>
            </div>
        </form>
    </div>
</div>
