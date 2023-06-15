@extends('layouts.dealerlayout')

@section('title')
    Requests @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .filterSection,
        #additionInfo {
            display: none;
        }

        .btn-floated {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
@endsection

@section('page')
    Requests
@endsection

@section('main')
    <main style="padding: 1em;">
        <div class="card">
            <div class="card-header bg-white">
                <div class="col-md-12">
                    <nav class="nav-justified bg-white">
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#quotesTab"
                                role="tab" aria-controls="pop1" aria-selected="true">Quotation</a>
                            <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#finacesTab"
                                role="tab" aria-controls="pop1" aria-selected="true">Finance</a>
                            <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#tradeinsTab" role="tab"
                                aria-controls="pop2" aria-selected="false">Trade ins</a>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="card-body tab-content">
                <div class="tab-pane fade show active" id="quotesTab" role="tabpanel">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Vehicle</th>
                            <th>Requested at</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($quotes as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name . ' - ' . $item->email . ' - ' . $item->phone }}</td>
                                    <td>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . '|' . $item->vehicle->model->model . '  ' . number_format($item->vehicle->price, 2) }}
                                    </td>
                                    <td>{{ date('H:i j M Y ', strtotime($item->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="finacesTab" role="tabpanel">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Request On</th>
                            <th>Request Amount</th>
                            <th>Requested at</th>
                        </thead>

                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($finances as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name . ' - ' . $item->email . ' - ' . $item->phone }}</td>
                                    <td>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' - ' . $item->vehicle->model->model }}
                                    </td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ date('H:i j M Y ', strtotime($item->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="tradeinsTab" role="tabpanel">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Customer Vehicle</th>
                            <th>Request On</th>
                            <th>Requested at</th>
                        </thead>

                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($tradeins as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name . ' - ' . $item->email . ' - ' . $item->phone }}</td>
                                    <td>{{ $item->make->make . ' - ' . $item->model->model . ' - ' . $item->year . ' - ' . $item->reg_no }}
                                    </td>
                                    <td>{{ $item->vehicle->make->make . ' - ' . $item->vehicle->model->model . ' - ' . $item->vehicle->year . ' - ' . $item->vehicle->price }}
                                    </td>
                                    <td>{{ date('H:i j M Y ', strtotime($item->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>

    {{-- <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/main/vehicle.js') }}"></script> --}}
@endsection
