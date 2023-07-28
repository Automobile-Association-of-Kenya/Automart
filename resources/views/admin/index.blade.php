@extends('layouts.admin')

@section('title')
    Dashboard @parent
@endsection

@section('header_styles')
@endsection

@section('header_styles')
<style>
    canvas {
        width: 100%;
    }
</style>
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
                    <h4 class="text-white text-start" style="padding: .4em;">Vehicles</h4>
                    {{-- <span class="badge">New {{ $summary["todaysvehiclecount"] }}</span> --}}
                    <div class="number" style="display: inline-block" id=''>
                        {{ $summary['vehiclescount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge bg-info" style="width: 98%;">
                    <h4 class="text-white text-start" style="padding: .4em;">Sales</h4>
                    {{-- <span class="badge">new {{ $summary["todaysales"] }}</span> --}}
                    <div class="number" style="display: inline-block" id="">
                        {{ $summary['salescount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge bg-warning" style="width: 98%;">
                    <h4 class="text-white text-start" style="padding: .4em;">Dealers</h4>
                    {{-- <span class="badge">New {{ $summary["todaynewdealers"] }}</span> --}}
                    <div class="number" style="display: inline-block" id="">
                        {{ $summary['dealerscount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-warning" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Purchase Requests</h4>
                    {{-- <span class="badge">New {{ $summary["todaypurchasecount"] }}</span> --}}
                    <div class="number" style="display: inline-block" id="">
                        {{ $summary['purchasecount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-primary" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Quote Requests</h4>
                    {{-- <span class="badge">New {{ $summary["quotescounttoday"] }}</span> --}}
                    <div class="number" style="display: inline-block" id=''>
                        {{ $summary['quotescount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-info" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Trade in Requests</h4>
                    {{-- <span class="badge">New {{ $summary["tradeinscounttoday"] }}</span> --}}
                    <div class="number" style="display: inline-block" id=''>
                        {{ $summary['tradeinscount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-info" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Loan Applications</h4>
                    {{-- <span class="badge">New {{ $summary["tradeinscounttoday"] }}</span> --}}
                    <div class="number" style="display: inline-block" id=''>
                        {{ $summary['loanscount'] }}<br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="badge alert-info" style="width: 98%;">
                    <h4 class="text-start" style="padding: .4em;">Active subscriptions</h4>
                    <div class="number" style="display: inline-block" id=''>
                        {{ $summary['activesubscriptions'] }}<br>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-2 mt-2 p-2">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Subscriptions</span>
                    </div>
                    <div class="card-body" style="width: 100%;height: auto;">
                        <canvas id="subscriptionsgraph"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Dealers</span>
                    </div>
                    <div class="card-body"  style="width: 100%;height: auto;">
                        <canvas id="dealersgraph"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        <span class="text-left font-weight-bold">Vehicles on Subscriptions</span>
                    </div>
                    <div class="card-body" style="width: 100%;height: auto;">
                        <canvas id="vehiclesonsubsgraph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 mb-4 p-2">

            <div class="col-md-6">
                <div class="card peoplebyregtrend">
                    <div class="card-header bg-warning">
                        <span class="text-left font-weight-bold">Revenue</span>
                        <select class="form-select" name="revenueyear" id="revenueYear">
                            @for ($i = 2023; $i < 2030; $i++)
                            <option value="{{ $i }}" {{ ($i==date('Y') ? 'selected' : '') }}>
                                {{ $i }}
                            </option>
                            @endfor
                        </select>
                    </div>
                    <div class="card-body" style="width: 100%;height: auto;">
                        <canvas id="revenuegraph"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card peoplebyregtrend">
                    <div class="card-header bg-success">
                        <span class="text-left font-weight-bold text-white">Web Traffic</span> <input type="date"
                            class="float-right" name="traffic" id="trafficDate" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="card-body" style="width: 100%;height: auto;">
                        <canvas id="webtraffic"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
