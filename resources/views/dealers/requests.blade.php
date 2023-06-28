@extends('layouts.dealer')

@section('title')
    Requests @parent
@endsection

@section('header_styles')
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
                            <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#purchasesTab"
                                role="tab" aria-controls="pop1" aria-selected="true">Sale Requests</a>
                            <a class="nav-item nav-link" id="pop1-tab" data-toggle="tab" href="#quotesTab" role="tab"
                                aria-controls="pop1" aria-selected="true">Quote Requests</a>
                            <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#finacesTab"
                                role="tab" aria-controls="pop1" aria-selected="true">Finance Requests</a>
                            <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#tradeinsTab" role="tab"
                                aria-controls="pop2" aria-selected="false">Trade ins Requests</a>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="card-body tab-content">
                @if (Session::has('success'))
                    <div class="col-lg">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            <strong>Success!</strong>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="col-lg">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            @foreach ($errors->all() as $item)
                                <strong>Error!</strong>
                                {{ $item }}
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="tab-pane fade show active" id="purchasesTab" role="tabpanel">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Pickup</th>
                            <th>Residence</th>
                            <th>Vehicle</th>
                            <th>Requested at</th>
                            <td>Added By</td>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($purchases as $item)
                                @if ($item->status === 'approved')
                                    <tr>
                                        <td class="bg-success">{{ $i++ }}</td>
                                        <td><span>{{ $item->name }}</span><br><span>{!! '<strong>Email:</strong>' . $item->email !!}</span><br><span>{!! '<strong>Phone:</strong>' . $item->phone !!}</span><br>
                                        </td>
                                        <td>{{ $item->pickup }}</td>
                                        <td><span>{!! '<strong>Estate:</strong> ' . $item->estate !!}</span><br> <span>{!! '<strong>Hs NO:</strong> ' . $item->housenumber !!}</span>
                                        </td>
                                        <td><span>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' ' . $item->vehicle->model->model }}</span><br><span>{{ number_format($item->vehicle->price, 2) }}</span>
                                        </td>
                                        <td>{{ date('H:i j M Y ', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->user->name ?? 'Anonymous' }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                    class="btn btn-success btn-sm">Action</a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><a
                                                            href="{{ route('dealer.puchase.approve', $item->id) }}"><i
                                                                class="fa fa-check text-success"></i>&nbsp;Approve</a></li>
                                                    <li class="dropdown-item"><a href="#" id="desclinePurchase"
                                                            data-toggle="modal" data-target="#declinePurchaseModal"
                                                            data-id="{{ $item->id }}"><i
                                                                class="fa fa-edit text-warning"></i>&nbsp;Decline</a></li>
                                                </ul>
                                            </li>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="bg-warning">{{ $i++ }}</td>
                                        <td><span>{{ $item->name }}</span><br><span>{!! '<strong>Email:</strong>' . $item->email !!}</span><br><span>{!! '<strong>Phone:</strong>' . $item->phone !!}</span><br>
                                        </td>
                                        <td>{{ $item->pickup }}</td>
                                        <td><span>{!! '<strong>Estate:</strong> ' . $item->estate !!}</span><br> <span>{!! '<strong>Hs NO:</strong> ' . $item->housenumber !!}</span>
                                        </td>
                                        <td><span>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' ' . $item->vehicle->model->model }}</span><br><span>{{ number_format($item->vehicle->price, 2) }}</span>
                                        </td>
                                        <td>{{ date('H:i j M Y ', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->user->name ?? 'Anonymous' }}</td>
                                        <td>{{ $item->status }}</td>

                                        <td>
                                            <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                    class="btn btn-success btn-sm">Action</a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><a
                                                            href="{{ route('dealer.puchase.approve', $item->id) }}"><i
                                                                class="fa fa-check text-success"></i>&nbsp;Approve</a></li>
                                                    <li class="dropdown-item"><a href="#" id="desclinePurchase"
                                                            data-toggle="modal" data-target="#declinePurchaseModal"
                                                            data-id="{{ $item->id }}"><i
                                                                class="fa fa-edit text-warning"></i>&nbsp;Decline</a></li>
                                                </ul>
                                            </li>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade show" id="quotesTab" role="tabpanel">
                    <table class="table table-bordered table-hover table-sm">
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
                    <table class="table table-bordered table-hover table-sm">
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
                    <table class="table table-bordered table-hover table-sm">
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
@endsection
