@extends('layouts.dealer')

@section('title')
    @parent Dashboard
@endsection

@section('header_styles')
@endsection

@section('main')
    <main id="dashboard">
        @if (Session::has('dealerinfo'))
            <div class="alert alert-warning" role="alert">
                {!! Session::get('dealerinfo') !!}
            </div>
        @endif

        @if (Session::has('subscriptioninfo'))
            <div class="alert alert-warning" role="alert">
                {!! Session::get('subscriptioninfo') !!}
            </div>
        @endif
        <div class="p-2"><a href="{{ route('dealer.vehicles') }}" class="btn btn-success btn-md"><i class="fas fa-plus"></i>
                Advertise</a></div>
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
            <div class="col-md-6 mb-2">
                @if (Session::has('advertinfo'))
                    <div class="alert alert-info" role="alert">
                        {!! Session::get('advertinfo') !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-4 p-2">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="text-white font-weight-bold mt-2 mb-2">Ads stats</h5>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



@section('footer_scrips')
@endsection
