@extends('layouts.main')
@section('content')
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    <!-- show error messages -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <div class="container" style="padding-bottom:20px;padding-top:10px;">
                <div class="row" style="padding-bottom:10px;padding-top:10px;">
                    @if (!empty($packs) && $packs->count())
                        @foreach ($packs as $pack)
                            <div class="col-md">
                                <div class="card text-center">
                                    <div class="card-header">{{ $pack->name }}</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Price: <b>Ksh. {{ number_format("$pack->amount", 2) }}</b>
                                        </h5>
                                        <p class="card-text">{{ $pack->description }}</p>
                                        <h5><b><u>To subscribe</u></b></h5>
                                        <h5>Go to Mpesa</h5>
                                        <h5>Buy Goods and Services
                                            <h5>Paybill: 927137</h5>
                                            <h5>Account: <b>{{ session('carID') }}</b></h5>
                                        </h5>
                                    </div>
                                    <div class="card-footer text-muted">Post Valid For: {{ $pack->duration }}</div>
                                    <h6>Send payment prompt</h6>
                                    <button type="button" class="btn btn-primary">MPesa Direct</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- <div class="alert alert-success" role="alert">
         Sorry. No Records Found.
  </div> --}}
                    @endif
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div>
    @endsection
