<div class="search-box-3 sb-7 alert-success">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents">
                <form method="GET" action="{{ route('search') }}">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg border-rounded" name="type"
                                    id="filterVehicleType">

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg border-rounded" name="make"
                                    id="filterMakesID">

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg border-rounded" name="model"
                                    id="vehicleModelID">
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg border-rounded" name="year"
                                    id="filterYear">
                                    <option value="">All</option>
                                    @for ($i = date('Y'); $i >= 1990; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg border-rounded" name="usage" id="usage">
                                    <option value="">Condition</option>
                                    <option value="New">New</option>
                                    <option value="Semi-new">Semi New</option>
                                    <option value="Locally Used">Locally used</option>
                                    <option value="Foreign Used">Foreign used</option>
                                    <option value="Damaged">Damaged</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg border-rounded" name="transmission"
                                    id="filterTransmission">
                                    <option value="">Transmission</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Semi-Auto">Semi-Auto</option>
                                    <option value="Tiptronic">Tiptronic</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <div class="range-slider">
                                    <div data-min="0" data-max="30000000" data-unit="Kes" data-min-name="min_price"
                                        data-max-name="max_price" class="range-slider-ui ui-slider"
                                        aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <button class="btn w-100 button-theme btn-md" type="submit">
                                    <i class="fa fa-search"></i>&nbsp;&nbsp;Find
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
