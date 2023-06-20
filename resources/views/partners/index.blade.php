@extends('layouts.partner')

@section('title')
    @parent Dashboard
@endsection

@section('main')
    <main id="dashboard">
        <!-- Cards -->
        <div class="row card-list">

            <div class="col badge alert-primary text-left" id="innovators">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-file-invoice-dollar fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Loan Applications
                    <p class="subheading">Loans applied today</p>
                </div>

                <div class="number" style="display: inline-block" id='loanAppliedlabel'>
                    0
                </div>
            </div>

            <div class="col badge alert-info" id="openreceivables">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-usd-circle fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Active Loans
                    <p class="subheading">Active to date</p>
                </div>

                <div class="number" style="display: inline-block" id="activeLoanslabel">
                    0
                </div>
            </div>

            <div class="col badge alert-warning" id="openpayables">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-cars fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Vehicles funded
                    <p class="subheading">Active to date</p>
                </div>

                <div class="number" style="display: inline-block" id="vehiclesFundedlabel">
                    0
                </div>
            </div>

            <div class="col badge alert-success" id="openorders">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-users fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Customers Served
                    <p class="subheading">New this month </p>
                </div>

                <div class="number" style="display: inline-block" id="customersMonthLabel">
                    0
                </div>
            </div>
        </div>

        <!-- People Charts -->
        <div class="row chart">

            <div class="col">
                <div class="card peoplebyrole">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Loans By Product</span>
                    </div>
                    <div class="card-body">
                        <canvas id="peoplebyrole"></canvas>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card peoplebyindustry">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Members By Company</span>
                    </div>
                    <div class="card-body">
                        <canvas id="peoplebycategory"></canvas>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card peoplebyregtrend">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Interest by Loan Type</span>
                    </div>
                    <div class="card-body">
                        <canvas id="peoplebyregtrend"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Charts  -->
        <div class="row chart">
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
        </div>

        <!-- Summary Tables -->
        <div class="row table">
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
        </div>
    </main>
@endsection
