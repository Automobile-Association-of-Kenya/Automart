@if (auth()->user()->role === "admin")
    @extends('layouts.admin')
@else
    @extends('layouts.dealer')
@endif

@section('title')
    Profile @parent
@endsection

@section('header_styles')
@endsection

@section('page')
    Profile
@endsection


@section('main')

@section('main')
    <div class="card">
        <div class="card-body">

        </div>
    </div>
@endsection

@section('footer_scripts')
@endsection
