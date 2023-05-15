@extends('layouts.admin')
@section('content')
    @php
        $admin = auth()->user();
    @endphp
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    @if (session('errorMsg'))
        <div class="alert alert-danger" role="alert">
            {{ session('errorMsg') }}
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
    <style>
        .show-when-target {
            visibility: hidden;
        }

        .show-when-target:target {
            visibility: visible;
        }

        .show-when-target:target {

            position: absolute;
            max-width: 94%;
            line-height: 2em;
            font-size: 1em;
            font-weight: bold;

            color: #FFF;
            border-radius: .4em;
            background: rgba(0, 0, 0, .5);
            ;
        }

        .show-when-target {
            cursor: pointer
        }

        .show-when-target {
            display: inline-block;
            max-width: 94%;
            line-height: 2em;
            font-size: 1em;
            font-weight: bold;

            margin: auto;
            color: #FFF;
            border-radius: .4em;
            -webkit-box-shadow: hsl(75, 80%, 15%) 0 .38em .08em;
            box-shadow: hsl(75, 80%, 15%) 0 .38em .08em;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
            background: #749A02;
        }
    </style>
    <div class="container"
        style="padding-left: 20px;padding-right: 20px;background-color: rgba(0,0,0, 0.6); border-radius:8px; padding-top: 10px; padding-bottom: 0px; color: #fff; ">
        <div id="0" class="show-when-target:target">
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Welcome: {{ $admin->uName }}
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4" style="padding-bottom:20px; color:#000;">
                            <div class="card">
                                <img src="{{ url('public/images/bg/user.jpg') }}" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title"><b>User Details</b></h5>
                                    <p class="card-text"><b>Admin Name:</b> {{ $admin->uName }}</p>
                                    <p class="card-text"><b>Email:</b> {{ $admin->email }}</p>
                                    <button class="btn btn-primary btn-md" data-toggle="modal"
                                        data-target="#updateUserDetailsModal">Update</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="color:#000;">
                            <div class="container" style="padding-bottom:20px;padding-top:10px;">

                                <div class="row">
                                    <div class="col-md">
                                        <a href="{{ route('users.index') }}">
                                            <div class="card">
                                                <div class="card-body">Dealers</div>
                                                <div class="card-body"><b>
                                                        <h4>{{ $dealercount }}</h4>
                                                    </b></div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md">
                                        <a href="{{ route('users.index') }}">
                                            <div class="card">
                                                <div class="card-body">Users</div>
                                                <div class="card-body"><b>
                                                        <h4>{{ $buyercount }}</h4>
                                                    </b></div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md">
                                        <a href="{{ route('vehicles') }}">
                                            <div class="card">
                                                <div class="card-body">Approved Vehicles</div>
                                                <div class="card-body"><b>
                                                        <h4>{{ $uvehiclecount }}</h4>
                                                    </b></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col-md">
                                        <a href="{{ route('vehicles') }}">
                                            <div class="card">
                                                <div class="card-body">Pending Vehicles</div>
                                                <div class="card-body"><b>
                                                        <h4>{{ $uvehiclecount }}</h4>
                                                    </b></div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="updateUserDetailsModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.update', auth()->id()) }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name" style="color: #333">Name</label>
                                    <input type="text" class="form-control"name="name"
                                        value="{{ auth()->user()->name }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="email" style="color: #333">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ auth()->user()->email }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="phone" style="color: #333">Phone Number</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ auth()->user()->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="alt_phone" style="color: #333;">Alternative Phone</label>
                                    <input type="text" class="form-control" name="alt_phone"
                                        value="{{ auth()->user()->alt_phone }}">
                                    @if ($errors->has('alt_phone'))
                                        <span class="text-danger">{{ $errors->first('alt_phone') }}</span>
                                    @endif
                                </div>
                            </div>

                                <button type="submit" class="btn btn-success btn-sm"> Save</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"
                                    id="updateUserDetailsModal">Close</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>


    </div>

    <footer class="col-md-12" style="margin:4em 0 0 0">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0,0,0, 0.5); border-radius: 10px;">
            © 2022 Copyright:
            <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end dash -->

@endsection
