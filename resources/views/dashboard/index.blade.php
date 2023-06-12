@extends('layouts.dashboardlayout')

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
        <div class="row card-list">
            <div class="col badge blue text-left" id="innovators">
                <div class="image" style="display: inline-block">
                    <i class="fas fa-users fa-lg"></i>
                </div>

                <div class="heading" style="display: inline-block">
                    Dealers
                    <p class="subheading">New dealers today</p>
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
                    Subscriptions
                    <p class="subheading">Active subscriptions</p>
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
                    Vehicles
                    <p class="subheading">Newly added</p>
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
                    Sales
                    <p class="subheading">Sales today</p>
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
