@extends('layouts.admin')

@section('title')
    Reports @parent
@endsection

@section('header_styles')
@endsection

@section('page')
@endsection

@section('main')
    <main id="reports">
        <div class="card containergroup">
            <div class="card-header">
                <h5>Filter Options</h5>
            </div>
            <div class="card-body">
                <div id="filterreportnotifications"></div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="reportname">Report to Generate</label>
                            <select name="reportname" id="reportname" class="form-control form-control-sm">
                                <option value="">&lt;Choose&gt;</option>
                                <option value="quote">Quote Request Report</option>
                                <option value="Sale">Sale Request Report</option>
                                <option value="loan">Loan Application Report</option>
                                <option value="tradeins">Trade in Request Report</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="gradealoanasatdate">Start Date</label>
                        <input type="date" name="gradealoanasatdate" id="gradealoanasatdate"
                            class="form-control form-control-sm datepickercontrol" value="{{ date() }}">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="gradealoanasatdate">End Date</label>
                        <input type="date" name="gradealoanasatdate" id="gradealoanasatdate"
                            class="form-control form-control-sm datepickercontrol" value="{{ date() }}">
                    </div>

                    <div class="col-md-1 form-group">
                        <label for="filtergradealoanreport">&nbsp;</label>
                        <button class="btn btn-success btn-sm d-block" id="filtergradealoanreport"><i
                                class="fal fa-lg fa-fw fa-search"></i> Filter</button>
                    </div>

                    </div>
                </div>

                <div class="scrollable scrollable-big">
                    <div id="reportbody"></div>
                </div>

            </div>
        </div>
    </main>
@endsection
