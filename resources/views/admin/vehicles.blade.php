@extends('layouts.dashboard')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')

    @php
        $user = session('user');
    @endphp

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

        .images-preview-div img {
            padding: 0px;
            max-width: 200px;
            padding: 1% !important;
        }

        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
    </style>
    @if (session('loader'))
        <div id="loading">
            <img id="loading-image" src="{{ asset('loader.gif') }}" alt="Loading..." />
        </div>
    @endif
    <div class="row" style="padding-right:10px; background: #FFFFFF;">

        <!-- user profile start -->
        <div id="5" class="show-when-target:target">
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Welcome to Your Profile: {{ $user->name }},
                </div>

                @include('layouts.sidebar')

                <div class="col-md-10">

                    <h4 class="text text-black">Vehicles</h4>

                    @include('partials.alert')
                    <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModelModal"><i class="fa fa-plus"></i>&nbsp;Add Model</a>
                    <table class="table table-bordered table-striped table-sm dataTable">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Owner</th>
                            <th>Added at</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($vehicles as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ @$item->carmake->car_make_name }}</td>
                                    <td>{{ @$item->carmodel->car_model_name }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->approved ? 'Approved' : false }}</td>
                                    <td>{{ $item->firstname . ' ' . $item->lastname }}</td>
                                    <td>{{ date('j M Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown"
                                                class="btn btn-success btn-sm">Action</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item">
                                                    <a href="{{ route('vehicle.approve', $item->id) }}"><i
                                                            class="fa fa-check text-warning"></i>&nbsp;Approve</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="{{ route('dealer.editcar', $item->id) }}"><i
                                                            class="fa fa-edit text-warning"></i>&nbsp;Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="mt-5 w-100 ">
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
            </footer>
        </div>
    </div>



<div class="modal fade" id="addModelModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue" style="display: inline-block;">
                <h4 class="modal-title float-left text-white" id="modalLabel"><strong class="text-black">Create Model</strong></h4>
                <button type="button" class="close float-right text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('model.create') }}" method="post" id="customerCreateForm">
                    @csrf
                    <div class="feedback"></div>
                    <div class="row">

                        <div class="col-lg-6">
                            <label class="text-black">Make <sup style="color:red">*</sup></label>
                            <div class="input-group input-group-prepend">
                                <select name="car_make_id" id="carMakeID" class="form-control form-control-sm @error('car_make_id') is-invalid @enderror" value="{{old('car_make_id')}}">
                                <option value="">Select One</option>
                                @foreach ($makes as $item)
                                    <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label class="text-black">Name <sup style="color:red">*</sup></label>
                            <div class="input-group input-group-prepend">
                                <input type="text" name="name" id="name" maxlength="100" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col-lg-12 text-center">
                        <button class="btn btn-success btn-sm" type="submit" id="createNewCustomer">
                            <i class="fa fa-plus"></i>
                            Submit
                        </button>
                        <button class="btn btn-warning btn-sm" type="reset">
                            <i class="fa fa-refresh"></i>
                            reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('footer_scripts')
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        (function() {
            $('.dataTable').DataTable({
                 dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'print'
                ]
            });
        })()
    </script>
@endsection

@endsection
