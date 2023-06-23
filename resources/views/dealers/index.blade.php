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
        {{-- <div class="col-md-12 m-2"> --}}
            <div class="row mt-2 mb-2 p-2">
                <div class="col-md-3">
                    <div class="bg-primary" style="width: 95%;">
                        <a href="{{ route('dealer.vehicles') }}">
                            <div class="image" style="display: inline-block">
                                <i class="fas fa-plus text-white fa-lg"></i>
                            </div>

                            <div class="heading" style="display: inline-block; color:#fff;">
                                Advertise Now
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="badge bg-primary" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-cars fa-lg"></i>
                        </div>
                        <div class="heading" style="display: inline-block">
                            My Vehicles
                            <p class="subheading">Vehicles added today <span
                                    class="badge badge-secondary">{{ $summary['todaysvehiclecount'] }}</span></p>
                        </div>
                        <div class="number" style="display: inline-block" id='loanAppliedlabel'>
                            {{ $summary['vehiclescount'] }}<br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="badge bg-info" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-cars fa-lg"></i>
                        </div>
                        <div class="heading" style="display: inline-block">
                            Sales
                            <p class="subheading">Todays sales <span
                                    class="badge badge-secondary">{{ $summary['soldtodaycount'] }}</span></p>
                        </div>
                        <div class="number" style="display: inline-block" id="activeLoanslabel">
                            {{ $summary['countvehiclessold'] }}<br>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="badge bg-warning" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-usd-circle fa-lg"></i>
                        </div>

                        <div class="heading" style="display: inline-block">
                            Revenue
                            <p class="subheading">Income today <span
                                    class="badge badge-secondary">{{ $summary['incometoday'] }}</span></p>
                        </div>

                        <div class="number" style="display: inline-block" id="vehiclesFundedlabel">
                            {{ $summary['income'] }}<br>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}

        @if (Session::has('advertinfo'))
            <div class="alert alert-info" role="alert">
                {!! Session::get('advertinfo') !!}
            </div>
        @endif

        {{-- <div class="col-md-12 mt-4"> --}}
            <div class="row mt-4 p-2 mb-3">
                <div class="col-md-3">
                    <div class="badge alert-success" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-users fa-lg"></i>
                        </div>

                        <div class="heading" style="display: inline-block">
                            Visitors reached
                            <p class="subheading">Reached today <span
                                    class="badge badge-secondary">{{ $summary['todayviews'] }}</span></p>
                        </div>

                        <div class="number" style="display: inline-block" id="customersMonthLabel">
                            {{ $summary['views'] }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="badge alert-primary" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-cars fa-lg"></i>
                        </div>

                        <div class="heading" style="display: inline-block">
                            Quote Requests
                            <p class="subheading">Requests today <span
                                    class="badge badge-secondary">{{ $summary['quotescounttoday'] }}</span></p>
                        </div>
                        <div class="number" style="display: inline-block" id='loanAppliedlabel'>
                            {{ $summary['quotescount'] }}<br>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="badge alert-info" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-cars fa-lg"></i>
                        </div>

                        <div class="heading" style="display: inline-block">
                            Financing Requests
                            <p class="subheading">Todays requests <span
                                    class="badge badge-secondary">{{ $summary['financescounttoday'] }}</span></p>
                        </div>

                        <div class="number" style="display: inline-block" id="activeLoanslabel">
                            {{ $summary['financescount'] }}<br>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="badge alert-warning" style="width: 95%;">
                        <div class="image" style="display: inline-block">
                            <i class="fas fa-usd-circle fa-lg"></i>
                        </div>

                        <div class="heading" style="display: inline-block">
                            Tradein Requests
                            <p class="subheading">Requests today <span
                                    class="badge badge-secondary">{{ $summary['tradeinscounttoday'] }}</span></p>
                        </div>

                        <div class="number" style="display: inline-block" id="vehiclesFundedlabel">
                            {{ $summary['tradeinscount'] }}<br>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row mt-4 p-2">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <br>
                        <h5 class="text-white font-weight-bold">Ads stats</h5>
                        <br>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header bg-success">
                        <br>
                        <h5 class="text-white font-weight-bold">Revenue stats</h5>
                        <br>
                    </div>
                    <div class="card-body">

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/main/dealer.js') }}"></script>
@endsection
