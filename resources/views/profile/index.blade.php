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

@section('main')

@section('main')
    <main>
        <div class="dashboard-content">
            <div class="dashboard-form mb-4">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-xs-12 padding-right-30">
                        <div class="dashboard-list">
                            <h4 class="gray">Profile Details</h4>
                            <div class="dashboard-list-static">

                                <div class="edit-profile-photo">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" class="upload">
                                        </div>
                                    </div>
                                </div>

                                <div class="my-profile">
                                    <div id="profilefeedback"></div>

                                    <form action="{{ route('users.update', auth()->id()) }}" method="PUT"
                                        id="userupdateForm">
                                        @csrf
                                        <input type="hidden" name="user_id" id="userId" value="{{ auth()->id() }}">

                                        <div class="form-group">
                                            <label>Your Name *</label>
                                            <input value="{{ auth()->user()->name }}" type="text" name="name"
                                                class="form-control" id="username">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input value="{{ auth()->user()->phone }}" type="text" name="phone"
                                                class="form-control" id="userphone">
                                        </div>

                                        <div class="form-group">
                                            <label>Email Address *</label>
                                            <input value="{{ auth()->user()->email }}" type="text" name="email"
                                                class="form-control" id="useremail">
                                        </div>

                                        <div class="form-group">
                                            <label>Alternative Phone </label>
                                            <input value="{{ auth()->user()->alt_phone }}" type="text" name="alt_phone"
                                                class="form-control" id="useralt_phone">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i>
                                                Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 col-xs-12 padding-left-30">
                        <div class="dashboard-list margin-top-0">
                            <h4 class="gray">Dealership Information </h4>
                            {{-- <button type="button" class="btn btn-success btn-sm mt-1 mb-1 btn-floated float-right"
                                    id="filterToggle"><i class="fa fa-edit fa-1x text-warning"></i></button> --}}
                            <div class="dashboard-list-static">
                                <div class="my-profile">
                                    <form action="{{ route('dealer.store') }}" method="post" enctype="multipart/form-data" id="dealerForm">
                                        <div class="row">
                                            <input type="hidden" name="dealer_id" id="dealerID" value="{{ auth()->user()->dealer?->id }}">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dealerName">Company Name</label>
                                                    <input type="text" name="name" id="dealerName"
                                                        class="form-control" value="{{ auth()->user()->dealer?->name }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dealerAddress">Physical Address *</label>
                                                    <input type="text" name="address" id="dealerAddress"
                                                        class="form-control"
                                                        value="{{ auth()->user()->dealer?->address }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postalAddress">Postal Address *</label>
                                                    <input type="text" name="postal_address" id="postalAddress"
                                                        class="form-control"
                                                        value="{{ auth()->user()->dealer?->postal_address }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dealerEmail">Email </label>
                                                    <input type="email" name="email" id="dealerEmail"
                                                        class="form-control" value="{{ auth()->user()->dealer?->email }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dealerPhone">Phone </label>
                                                    <input type="text" name="phone" id="dealerPhone"
                                                        class="form-control"
                                                        value="{{ auth()->user()->dealer?->phone }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dealerAltPhone">Alt Phone </label>
                                                    <input type="text" name="alt_phone" id="dealerAltPhone"
                                                        class="form-control"
                                                        value="{{ auth()->user()->dealer?->alt_phone }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="dealerCity">City</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="city"
                                                        id="dealerCity" placeholder="City" aria-label="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Logo</label>
                                                    <div class="input-group">
                                                        <input type="file" name="logo" id="dealerLogo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-success"
                                                    id="updateDealerButton"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer_scripts')
    <script>
        (function() {
            function showSuccess(message, target) {
                iziToast.success({
                    title: "OK",
                    message: message,
                    position: "center",
                    timeout: 10000,
                    target: target,
                });
            }

            function showError(message, target) {
                iziToast.error({
                    title: "Error",
                    message: message,
                    position: "center",
                    timeout: 10000,
                    target: target,
                });
            }

            $('#userupdateForm').on('submit', function(event) {
                event.preventDefault();
                let name = $('#username').val(),
                    phone = $('#userphone').val(),
                    email = $('#useremail').val(),
                    alt_phone = $('#useralt_phone').val(),
                    user_id = $('#userId').val(),
                    data = {
                        name: name,
                        phone: phone,
                        email: email,
                        alt_phone: alt_phone
                    };
                $.post('/users/update/' + user_id, data).done(function(params) {
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#profilefeedback");
                    } else {
                        showError(result.error, "#profilefeedback");
                    }
                }).fail(function(error) {
                    console.error(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function(key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#profilefeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#profilefeedback"
                        );
                    }
                });
            });
        })()
    </script>
@endsection
