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
                <form action="{{ route('reports.filter') }}" method="post" id="filterReportsForm">
                @csrf
                    <div class="row">
                        <div class="col-md-5 form-group">
                            <label for="reportName">Report to Generate</label>
                            <select name="reportname" id="reportName" class="form-control form-control-sm" required>
                                <option value="">&lt;Choose&gt;</option>
                                <option value="quote">Quote Request Report</option>
                                <option value="sale">Sale Request Report</option>
                                <option value="loan">Loan Application Report</option>
                                <option value="tradeins">Trade in Request Report</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="reportStart">Start Date</label>
                            <input type="date" name="reportstart" id="reportStart"
                                class="form-control form-control-sm datepickercontrol" value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="reportEnd">End Date</label>
                            <input type="date" name="reportend" id="reportEnd"
                                class="form-control form-control-sm" value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-1 form-group">
                            <label for="filtergradealoanreport">&nbsp;</label>
                            <button class="btn btn-success btn-sm d-block" id="filtergradealoanreport"><i
                                    class="fa fa-lg fa-fw fa-search"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="scrollable scrollable-big">
                <div id="reportbody"></div>
            </div>
        </div>
        </div>
    </main>
@endsection


@section('footer_scrips')
    <script src="{{ asset('js/main/reports.js') }}"></script>
@endsection
