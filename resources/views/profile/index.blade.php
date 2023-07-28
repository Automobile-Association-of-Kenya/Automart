@extends('layouts.dealer')

@section('title')
    Profile @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('page')
    Profile
@endsection
@php
    $user = auth()->user();
@endphp
@section('main')
    <main>
        <div class="dashboard-content">
            <div class="dashboard-form mb-4">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-xs-12 padding-right-30 text-center">
                        <div class="dashboard-list bg-white p-2">
                            <h4 class="gray">Profile Details</h4>
                            <div class="dashboard-list-static">

                                <div class="edit-profile-photo">
                                    @if (!is_null($user->profile) && Storage::has($user->profile))
                                        <img src="{{ asset('profiles/' . $user->profile) }}" alt="">
                                    @else
                                        <img src="{{ asset('images/avatar.png') }}" alt="">
                                    @endif
                                </div>

                                <div class="my-profile">
                                    <h5><strong>{{ $user->name }}</strong></h5>
                                    <p>{!! 'Tel: <span class="text-success">' . $user->phone . '/' . $user->alt_phone . '</span>' !!}</p>
                                    <p>{!! 'Email: <span class="text-success">' . $user->email . '</span>' !!}</p>
                                    <a href="#" class="btn btn-success btn-block" data-toggle="modal"
                                        data-target="#updateProfileModal">Update Profile</a>
                                    <div id="profilefeedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 col-xs-12 padding-left-30">
                        <div class="dashboard-list  bg-white p-2">
                            <h4 class="gray">Dealership Information </h4>
                            {{-- <button type="button" class="btn btn-success btn-sm mt-1 mb-1 btn-floated float-right"
                                    id="filterToggle"><i class="fa fa-edit fa-1x text-warning"></i></button> --}}
                            <div class="dashboard-list-static">
                                <div class="my-profile">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="edit-profile-photo">
                                                @if (!is_null($user->dealer?->logo) && Storage::has('dealers' . $user->dealer?->logo))
                                                    <img src="{{ asset('dealers/' . $user->dealer?->logo) }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Business &nbsp;</strong>{{ $user->dealer?->name }}</p>
                                            <hr>
                                            <p><strong>Business Email &nbsp;</strong>{{ $user->dealer?->email }}</p>
                                            <hr>
                                            <p><strong>Business Phone
                                                    &nbsp;</strong>{{ $user->dealer?->phone . ' / ' . $user->dealer?->alt_phone }}
                                            </p>
                                            <hr>
                                            <p><strong>Postal &nbsp;</strong>{{ $user->dealer?->postal_address }}</p>
                                            <hr>
                                            <p><strong>Address
                                                    &nbsp;</strong>{{ $user->dealer?->address . ', ' . $user->dealer?->city }}
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-md btn-block btn-success btn-round" data-toggle="modal" data-target="#addBusinessModal">Update Business Information</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.alert')
    </main>
@endsection

<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title">
                    <h4 class="text-black">Profile Details</h4>
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('users.update', auth()->id()) }}" method="PUT" id="userupdateForm">
                    @csrf
                    <input type="hidden" name="user_id" id="userId" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label>Your Name *</label>
                        <input value="{{ $user->name }}" type="text" name="name" class="form-control"
                            id="username">
                    </div>

                    <div class="form-group">
                        <label>Phone Number *</label>
                        <input value="{{ $user->phone }}" type="text" name="phone" class="form-control"
                            id="userphone">
                    </div>

                    <div class="form-group">
                        <label>Email Address *</label>
                        <input value="{{ $user->email }}" type="text" name="email" class="form-control"
                            id="useremail">
                    </div>

                    <div class="form-group">
                        <label>Alternative Phone </label>
                        <input value="{{ $user->alt_phone }}" type="text" name="alt_phone" class="form-control"
                            id="useralt_phone">
                    </div>

                    <div class="form-group">
                        <label>Profile Photo </label><br>
                        <div class="input-group">
                            <input type="file" name="profile">
                        </div>
                    </div>

                        <div class="form-group">
                                <button class='btn btn-success btn-md' type="submit" id='savedealer'><i
                                        class="fal fa-save fa-lg fa-fw"></i>
                                    Save
                                </button>
                                <button class='btn btn-outline-warning btn-md' id='cleardealer'><i
                                        class="fal fa-broom fa-lg fa-fw"></i>
                                    Clear Fields</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addBusinessModal" tabindex="-1" role="dialog" aria-labelledby="quoteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h3>Business Information</h3>
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="businessfeedback"></div>
                <form action="{{ route('dealer.store') }}" method="POST" enctype="multipart/form-data"
                    id="dealerForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="dealer_id" id="dealerID" value="{{ $user->dealer?->id }}">
                        <div class="col-md-6 form-group">
                            <label for="name">Business Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="dealerName"
                                    value="{{ $user->dealer?->name }}">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="email">Business Email</label>
                            <div class="form-group email">
                                <input type="email" class="form-control" name="email" id="dealerEmail"
                                    value="{{ $user->dealer?->email }}">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Business Phone</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="phone" id="dealerPhone"
                                    value="{{ $user->dealer?->phone }}">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Alternative Phone</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="alt_phone" id="dealerAltPhone"
                                    value="{{ $user->dealer?->alt_phone }}">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Zip/Postal Address</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="postol" id="postolAddress"
                                    value="{{ $user->dealer?->postal_address }}">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Physical Address</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="address" id="dealerAddress"
                                    value="{{ $user->dealer?->address }}">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">City</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="city" id="dealerCity"
                                    value="{{ $user->dealer?->city }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Logo</label><br>
                                <div class="input-group">
                                    <input type="file" name="logo" id="dealerLogo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class='btn btn-success btn-md' type="submit" id='savedealer'><i
                                            class="fal fa-save fa-lg fa-fw"></i>
                                        Save
                                    </button>
                                    <button class='btn btn-outline-warning btn-md' id='cleardealer'><i
                                            class="fal fa-broom fa-lg fa-fw"></i>
                                        Clear Fields</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('footer_scripts')
    <script src="{{ asset('js/main/profile.js') }}"></script>
@endsection
