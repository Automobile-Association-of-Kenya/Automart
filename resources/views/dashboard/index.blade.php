@extends('layouts.dashboardlayout')
@section('title')
    Dashboard @parent
@endsection
@section('main')
    <main id="dashboard">
        <!-- Cards -->
        <div class="row card-list">
            <div class="col badge blue text-left" id="innovators">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-users fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Loans
                    <p class="subheading">Loans due today</p>
                </div>

                <div class="number" style="display: inline-block" id='innovatorlabel'>
                    0
                </div>
            </div>

            <div class="col badge green" id="openreceivables">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-download fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Shares
                    <p class="subheading">Shares to Date</p>
                </div>

                <div class="number" style="display: inline-block" id="mentorlabel">
                    0
                </div>
            </div>

            <div class="col badge red" id="openpayables">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-upload fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Deposits
                    <p class="subheading">Members Deposit</p>
                </div>

                <div class="number" style="display: inline-block" id="funderlabel">
                    0
                </div>
            </div>

            <div class="col badge purple" id="openorders">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-file-invoice-dollar fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Interest
                    <p class="subheading">Interest due today</p>
                </div>

                <div class="number" style="display: inline-block" id="serviceproviderlabel">
                    0
                </div>
            </div>
        </div>

        <!-- People Charts -->
        <div class="row chart">
            <div class="col">
                <div class="card peoplebyrole">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Loans By Type</span>
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
