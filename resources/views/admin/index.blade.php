@extends('layouts.admin')

@section('title')
    Dashboard @parent
@endsection

@section('header_styles')
@endsection

@section('header_styles')
@endsection

@section('page')
    Dashboard
@endsection

@section('main')
    <main id="dashboard">
        <!-- Cards -->
        <div class="row mt-2 p-2">
            <div class="col-md-3 mb-2">
                <div class="badge bg-primary" style="width: 98%;">
                    <h4 class="text-white text-start" style="padding: .4em;">My Vehicles</h4>
                    <div class="number" style="display: inline-block" id='loanAppliedlabel'>
                        {{ $summary['vehiclescount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge bg-info" style="width: 98%;">
                    <h4 class="text-white text-start" style="padding: .4em;">Sales</h4>
                    <div class="number" style="display: inline-block" id="activeLoanslabel">
                        {{ $summary['countvehiclessold'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge bg-warning" style="width: 98%;">
                    <h4 class="text-white text-start" style="padding: .4em;">Revenue</h4>
                    <i>Ksh</i>
                    <div class="number" style="display: inline-block" id="vehiclesFundedlabel">
                        {{ number_format($summary['income'], 2) }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-warning" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Purchase Requests</h4>
                    <div class="number" style="display: inline-block" id="vehiclesFundedlabel">
                        {{ $summary['purchasecount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-primary" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Quote Requests</h4>
                    <div class="number" style="display: inline-block" id='loanAppliedlabel'>
                        {{ $summary['quotescount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-info" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Trade in Requests</h4>
                    <div class="number" style="display: inline-block" id='loanAppliedlabel'>
                        {{ $summary['tradeinscount'] }}<br>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- People Charts -->
        <div class="row chart">
            <div class="col">
                <div class="card peoplebyrole">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Subscriptions by product</span>
                    </div>
                    <div class="card-body">
                        <canvas id="peoplebyrole"></canvas>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card peoplebyindustry">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Dealers by subscription</span>
                    </div>
                    <div class="card-body">
                        <canvas id="peoplebycategory"></canvas>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card peoplebyregtrend">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Revenue by subscriptions</span>
                    </div>
                    <div class="card-body">
                        <canvas id="peoplebyregtrend"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Charts  -->
        {{-- <div class="row chart">
            <div class="col">
                <div class="card projectbyindustry">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Grade A Loans</span>
                    </div>
                    <div class="card-body">
                        <canvas id="projectbyindustry"></canvas>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card projectbyneed">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Potfolio at Risk</span>
                    </div>
                    <div class="card-body">
                        <canvas id="projectsummarybyneed"></canvas>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card projectbystatus">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Quantitative Analysis</span>
                    </div>
                    <div class="card-body">
                        <canvas id="projectsbystatus"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Summary Tables -->
        {{-- <div class="row table">
            <div class="col ml-2">
                <div class="card recentapplications">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Qualitative Analysis</span>
                    </div>
                    <div class="card-body scrollable">
                        <table id="recentinnovations">

                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card recentmembers">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Recent Disbursements</span>
                    </div>
                    <div class="card-body scrollable">
                        <table id="recentmembers">

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card projectbystatus">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Loan Aging Analysis</span>
                    </div>
                    <div class="card-body scrollable">
                        <div>
                            <table id="recentconnections">
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </main>
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/main/dealer.js') }}"></script>
@endsection
