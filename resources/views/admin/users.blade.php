@extends('layouts.dashboard')

@section('title')
    Users @parent
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
                    <h4 class="text text-black">Users</h4>
                    <table class="table table-bordered table-striped table-sm dataTable">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Join On</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ date('j M Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown"
                                                class="btn btn-success btn-sm">Action</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#"><i
                                                            class="fa fa-check text-warning"></i>&nbsp;Approve</a></li>
                                                <li class="dropdown-item"><a href="#"><i
                                                            class="fa fa-trash text-warning"></i>&nbsp;Suspend</a></li>
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
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>

        <!-- user profile end -->



    </div>
@section('footer_scripts')
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        (function() {
            $('.dataTable').DataTable();
        })()
    </script>
@endsection

@endsection
