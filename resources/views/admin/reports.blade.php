@extends('layouts.dashboardlayout')

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
                    <div class="col col-md-4">
                        <div class="row">
                            <div class="col form-group">
                                <label for="reportname">Report to Generate</label>
                                <select name="reportname" id="reportname" class="form-control form-control-sm">
                                    <option value="">&lt;Choose&gt;</option>
                                    <option value="companymembership">Dealer Membership Report</option>
                                    <option value="loananalysis">Subscription Report</option>
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="filtercompanyreport">Select Company</label>
                                <select name="filtercompanyreport" id="filtercompanyreport"
                                    class="form-control form-control-sm"></select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div id="filtercompanymembershipreport" style="display:none">
                            <div class="row">
                                <div class="form-group col col-md-3">
                                    <label for="companyreportdate">Balances As At?</label>
                                    <input type="text" name="companyreportdate" id="companyreportdate"
                                        class="datepickercontrol form-control form-control-sm">
                                </div>

                                <div class="form-group col col-md-2">
                                    <label for="filtercompanyreportbutton">&nbsp;</label>
                                    <button class="btn btn-sm btn-secondary d-block" id="filtercompanyreportbutton"><i
                                            class="fal fa-search fa-fw fa-lg"></i> Filter Report</button>
                                </div>

                            </div>
                        </div>

                        <div id="filterdividendcalculator" style="display:none">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="dividendreportdate">As At?</label>
                                    <input type="text" name="dividendreportdate" id="dividendreportdate"
                                        class="datepickercontrol form-control form-control-sm">
                                </div>

                                <div class="col form-group">
                                    <label for="dividendrate">Rate(%)</label>
                                    <input type="number" name="dividendrate" id="dividendrate"
                                        class="form-control form-control-sm">
                                </div>

                                <div class="col form-group">
                                    <label for="dividendwht">WHT(%)</label>
                                    <input type="number" name="dividendwht" id="dividendwht"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="">Compute for?</label>
                                    <div class="col d-flex justify-content-between">
                                        <div class="col col-md-1 form-check mr-4">
                                            <input type="checkbox" class="form-check-input" id="dividendshares">
                                            <label class="form-check-label" for="dividendshares">Shares</label>
                                        </div>

                                        <div class="col col-md-1 form-check mr-4">
                                            <input type="checkbox" class="form-check-input" id="dividenddeposits">
                                            <label class="form-check-label" for="dividenddeposits">Deposits</label>
                                        </div>

                                        <div class="col col-md-1 form-check mr-4">
                                            <input type="checkbox" class="form-check-input" id="dividendsavings">
                                            <label class="form-check-label" for="dividendsavings">Savings</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="col form-group">
                                    <label for="dividendfilter">&nbsp;</label>
                                    <button class="btn btn-sm btn-secondary d-block ml-4"
                                        id="dividendfilter">Generate</button>
                                </div>

                            </div>
                        </div>

                        <div id="loananalysisreportfilter">
                            <div class="row">
                                <div class="col form-group col-md-3">
                                    <label for="loananalysisstartdate">Start Date</label>
                                    <input type="text" name="loananalysisstartdate" id="loananalysisstartdate"
                                        class="form-control form-control-sm datepickercontrol">
                                </div>
                                <div class="col form-group col-md-3">
                                    <label for="loananalysisenddate">End Date</label>
                                    <input type="text" name="loanalaysisenddate" id="loananalysisenddate"
                                        class="form-control form-control-sm datepickercontrol">
                                </div>
                                <div class="col form-group col-md-2">
                                    <label for="filterloananalysisreport">&nbsp;</label>
                                    <button class="btn btn-secondary btn-sm d-block" id="filterloananalysisreport"><i
                                            class="fal fa-lg fa-fw fa-search"></i> Filter</button>
                                </div>
                            </div>

                        </div>

                        <div id="gradealoansfilter" style="display:none">
                            <div class="row">
                                <div class="col form-group col-md-3">
                                    <label for="gradealoanasatdate">Start Date</label>
                                    <input type="text" name="gradealoanasatdate" id="gradealoanasatdate"
                                        class="form-control form-control-sm datepickercontrol">
                                </div>

                                <div class="col form-group col-md-2">
                                    <label for="filtergradealoanreport">&nbsp;</label>
                                    <button class="btn btn-secondary btn-sm d-block" id="filtergradealoanreport"><i
                                            class="fal fa-lg fa-fw fa-search"></i> Filter</button>
                                </div>
                            </div>

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
