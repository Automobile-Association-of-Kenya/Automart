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
    <main>
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
                    <div class="col-md-12">
                        <table class="table">
                            <td><b>Customer</b></td>
                            <td><b>Residence</b></td>
                            <td><b>Vehicle</b></td>
                            <td><b>Action</b></td>
                        </table>

                        @foreach ($purchases as $item)
                            @php
                                $dealer = $item->vehicle->dealer->name ?? $item->vehicle->user->name;
                                $dealerphone = $item->vehicle->dealer->phone ?? $item->vehicle->user->phone;
                                $dealeremail = $item->vehilce->dealer->email ?? $item->vehicle->user->email;
                            @endphp
                            <table class="table table-hover">
                                <tr>
                                    <td>
                                        <span><b>Name: </b>{{ $item->name }}</span><br>
                                        <span><b>ID: </b>{{ $item->id_no }}</span><br>
                                        <span><b>Email: </b>{{ $item->email }}</span><br>
                                        <span><b>Phone: </b>{{ $item->phone }}</span>
                                    </td>
                                    <td>
                                        <span><b>Pickup: </b>{{ $item->pickup }}</span><br>
                                        <span><b>Estate: </b>{{ $item->estate }}</span><br>
                                        <span><b>Hs NO: </b>{{ $item->housenumber }}</span>
                                    </td>

                                    <td>
                                        <span>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' ' . $item->vehicle->model->model }}</span><br>
                                        <span><b>Ref NO: </b>{!! $item->vehicle->vehicle_no . ' <b>Price: </b> ' . number_format($item->vehicle->price, 2) !!}</span><br>
                                        <span><b>Mile age: </b>{!! $item->vehicle->mileage . ' <b>CC: </b> ' . $item->vehicle->enginecc !!}</span>
                                        <p class="mt-2"><span><b>Dealer: </b>&nbsp; {{ $dealer }}
                                            </span>&nbsp;<span><b>Email:</b>&nbsp;{{ $dealeremail }}</span><br><span><b>Phone:
                                                </b>&nbsp;{{ $dealerphone }}</span></p>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-6"><a href="#"
                                                    class="btn btn-success btn-sm btn-round">Send Message</a></div>
                                            <div class="col-md-6">
                                                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                        class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a
                                                                href="{{ route('dealer.puchase.approve', $item->id) }}"><i
                                                                    class="fa fa-check text-success"></i>&nbsp;Approve</a>
                                                        </li>
                                                        <li class="dropdown-item"><a href="#" id="desclinePurchase"
                                                                data-toggle="modal" data-target="#declinePurchaseModal"
                                                                data-id="{{ $item->id }}"><i
                                                                    class="fa fa-edit text-warning"></i>&nbsp;Decline</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </div>
                                        </div>
                                        <p class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                    </td>

                                </tr>
                            </table>
                        @endforeach
                        <div class="text-center">
                            {{ $purchases->links() }}
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="quotesTab" role="tabpanel">
                    <div class="col-md-12">
                        <table class="table">
                        <td><b>Customer</b></td>
                        <td><b>Vehicle</b></td>
                        <td><b>Message</b></td>
                        <td><b>Action</b></td>
                    </table>
                    @foreach ($quotes as $item)
                        @php
                            $dealer = $item->vehicle->dealer->name ?? $item->vehicle->user->name;
                            $dealerphone = $item->vehicle->dealer->phone ?? $item->vehicle->user->phone;
                            $dealeremail = $item->vehilce->dealer->email ?? $item->vehicle->user->email;
                        @endphp
                        <table class="table">
                            <tr>
                                <td>
                                    <span><b>Name: </b>{{ $item->name }}</span><br>
                                    <span><b>ID: </b>{{ $item->id_no }}</span><br>
                                    <span><b>Email: </b>{{ $item->email }}</span><br>
                                    <span><b>Phone: </b>{{ $item->phone }}</span>
                                </td>

                                <td>
                                    <span>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' ' . $item->vehicle->model->model }}</span><br>
                                    <span><b>Ref NO: </b>{!! $item->vehicle->vehicle_no . ' <b>Price: </b> ' . number_format($item->vehicle->price, 2) !!}</span><br>
                                    <span><b>Mile age: </b>{!! $item->vehicle->mileage . ' <b>CC: </b> ' . $item->vehicle->enginecc !!}</span>
                                    <p class="mt-2"><span><b>Dealer: </b>&nbsp; {{ $dealer }}
                                        </span>&nbsp;<span><b>Email:</b>&nbsp;{{ $dealeremail }}</span><br><span><b>Phone:
                                            </b>&nbsp;{{ $dealerphone }}</span></p>
                                </td>

                                <td>
                                    <span><b>Subject: </b>{{ $item->subject }}</span><br>
                                    <p class="mt-2">{{ $item->message }}</p>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-md-6"><a href="#"
                                                class="btn btn-success btn-sm btn-round">Send Message</a></div>
                                        <div class="col-md-6">
                                            <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                    class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
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
                                        </div>
                                    </div>
                                    <p class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                    <div class="text-center">
                        {{ $quotes->links() }}
                    </div>
                    </div>
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
