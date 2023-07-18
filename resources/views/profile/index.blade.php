@extends('layouts.dealer')

@section('title')
    Profile @parent
@endsection

@section('header_styles')
<style>
    .card-img-top {
        margin: 10px;
        border-radius: 50%;
        width: 50%;
        height: 50%;
        float: center;
    }
</style>
@endsection

@section('page')
    Profile
@endsection

@section('main')

@section('main')
    <main>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="card">
                    <img src="{{ asset('images/avatar.png') }}" alt="" class="card-img-top">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer_scripts')
@endsection
