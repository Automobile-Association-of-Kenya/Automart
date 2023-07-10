@extends('layouts.admin')

@section('title')
    Requests @parent
@endsection

@section('header_styles')
    <style>
        p {
            padding: 0 5px;
            margin: 0;
        }
    </style>
@endsection

@section('page')
    Requests
@endsection

@section('main')
    <main style="padding: 1em;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="nav-justified bg-white">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#purchasesTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Sale Requests</a>
                                <a class="nav-item nav-link" id="pop1-tab" data-toggle="tab" href="#quotesTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Quotations</a>
                                <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#tradeinsTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Trade ins</a>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body tab-content">
                        @include('layouts.alert')
                        <div class="tab-pane fade show active" id="purchasesTab" role="tabpanel">

                            <table class="table table-hover table-sm">
                                <thead>
                                    <td><b>Customer</b></td>
                                    <td><b>Residence</b></td>
                                    <td><b>Vehicle</b></td>
                                    <td><b>Action</b></td>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $item)
                                        @php
                                            $dealer = $item->vehicle->dealer?->name ?? $item->vehicle->user->name;
                                            $dealerphone = $item->vehicle->dealer?->phone ?? $item->vehicle->user->phone;
                                            $dealeremail = $item->vehilce->dealer?->email ?? $item->vehicle->user->email;
                                        @endphp
                                        <tr>
                                            <td>
                                                <p><b>Name: </b>{{ $item->name }}</p>
                                                <p><b>ID: </b>{{ $item->id_no }}</p>
                                                <p><b>Email: </b>{{ $item->email }}</p>
                                                <p><b>Phone: </b>{{ $item->phone }}</p>
                                            </td>
                                            <td>
                                                <p><b>Pickup: </b>{{ $item->pickup }}</p>
                                                <p><b>Estate: </b>{{ $item->estate }}</p>
                                                <p><b>Hs NO: </b>{{ $item->housenumber }}</p>
                                            </td>

                                            <td>
                                                <p>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' ' . $item->vehicle->model->model }}
                                                </p>
                                                <p><b>Ref NO: </b>{!! $item->vehicle->vehicle_no . ' <b>Price: </b> ' . number_format($item->vehicle->price, 2) !!}</p>
                                                <p><b>Mile age: </b>{!! $item->vehicle->mileage . ' <b>CC: </b> ' . $item->vehicle->enginecc !!}</p>
                                                <p class="mt-2">
                                                <p><b>Dealer: </b>&nbsp; {{ $dealer }}</p>
                                                <p><b>Email:</b>&nbsp;{{ $dealeremail }}</p>
                                                <p><b>Phone: </b>&nbsp;{{ $dealerphone }}</p>
                                            </td>

                                            <td>
                                                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                        class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a href="#"
                                                                data-target="#saleMessageModal" data-toggle="modal"
                                                                data-id="{{ $item->id }}">Send Message</a>
                                                        </li>
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
                                                <p class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            <div class="text-center">
                                {{ $purchases->links() }}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="quotesTab" role="tabpanel">

                            <table class="table table-hover">
                                <thead>
                                    <td><b>Customer</b></td>
                                    <td><b>Vehicle</b></td>
                                    <td><b>Message</b></td>
                                    <td><b>Action</b></td>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $item)
                                        @php
                                            $dealer = $item->vehicle->dealer->name ?? $item->vehicle->user->name;
                                            $dealerphone = $item->vehicle->dealer->phone ?? $item->vehicle->user->phone;
                                            $dealeremail = $item->vehilce->dealer->email ?? $item->vehicle->user->email;
                                        @endphp
                                        <tr>
                                            <td>
                                                <p><b>Name: </b>{{ $item->name }}</p>
                                                <p><b>ID: </b>{{ $item->id_no }}</p>
                                                <p><b>Email: </b>{{ $item->email }}</p>
                                                <p><b>Phone: </b>{{ $item->phone }}</p>
                                            </td>

                                            <td>
                                                <p>{{ $item->vehicle->year . ' ' . $item->vehicle->make->make . ' ' . $item->vehicle->model->model }}
                                                </p>
                                                <p><b>Ref NO: </b>{!! $item->vehicle->vehicle_no !!}</p>
                                                <p><b>Price:
                                                    </b>{{ number_format($item->vehicle->price, 2) }}</p>
                                                <p><b>Mile age: </b>{!! $item->vehicle->mileage !!}</p>
                                                <p><b>CC: </b> {{ $item->vehicle->enginecc }}</p>
                                                <p class="mt-2">
                                                <p><b>Dealer: </b>&nbsp; {{ $dealer }}
                                                </p>
                                                <p><b>Email:</b>&nbsp;{{ $dealeremail }}</p>
                                                <p><b>Phone: </b>&nbsp;{{ $dealerphone }}</p>
                                                </p>
                                            </td>

                                            <td>
                                                <p><b>Subject: </b>{{ $item->subject }}</p>
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
                                                                            class="fa fa-check text-success"></i>&nbsp;Approve</a>
                                                                </li>
                                                                <li class="dropdown-item"><a href="#"
                                                                        id="desclinePurchase" data-toggle="modal"
                                                                        data-target="#declinePurchaseModal"
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade show" id="tradeinsTab" role="tabpanel">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Dealer</th>
                                    <th>Customer</th>
                                    <th>Customer Vehicle</th>
                                    <th>Request On</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tradeins as $item)
                                        @php
                                            $dealer = $item->vehicle->dealer ?? $item->vehicle->user;
                                        @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <p><strong>{{ $dealer->name }}</strong></p>
                                                <p>{{ $dealer->email }}</p>
                                                <p>{{ $dealer->phone }}</p>
                                            </td>
                                            <td>
                                                <p><strong>{{ $item->name }}</strong></p>
                                                <p>{{ $item->email }}</p>
                                                <p>{{ $item->phone }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $item->make->make }}</p>
                                                <p>{{ $item->model->model }}</p>
                                                <p>{{ $item->year . ' - ' . $item->reg_no }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $item->vehicle->make->make }}</p>
                                                <p>{{ $item->vehicle->model->model }}</p>
                                                <p>{{ $item->vehicle->year . ' - ' . $item->vehicle->price }}</p>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                                class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-item"><a href="#"
                                                                        data-toggle="modal"
                                                                        data-target="#tradeInMessageModal"
                                                                        data-id="{{ $item->id }}"><i
                                                                            class="fa fa-envelope text-success"></i>&nbsp;Send
                                                                        Message</a></li>
                                                            </ul>
                                                        </li>
                                                    </div>
                                                </div>

                                                <p class="mt-4">{{ date('H:i j M Y ', strtotime($item->created_at)) }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<div class="modal fade" id="saleMessageModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    Sale Request Reply
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('loan.message') }}" method="POST" enctype="multipart/form-data"
                    id="loanMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="loan_request_id" id="loanRequestID" value="">


                        <div class="form-group mb-2">
                            <label for="loanMessage">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms" class="saleMessageType" name="mmessagetype">SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail" class="saleMessageType" name="mmessagetype">Mail</label>
                        </div>

                        <div class="form-group mb-2">
                            <label for="loanMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="loanMessage" class="form-control form-control-md"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loanMessageModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    Loan Request Reply
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('loan.message') }}" method="POST" enctype="multipart/form-data"
                    id="loanMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="loan_request_id" id="loanRequestID" value="">

                        <div class="form-group mb-2">
                            <label for="loanMessage">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms" class="saleMessageType" name="mmessagetype">SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail" class="saleMessageType" name="mmessagetype">Mail</label>
                        </div>
                        
                        <div class="col-md-6 form-group mb-2">
                            <label for="loanMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="loanMessage" class="form-control form-control-md"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="quoteMessageModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    Quote Request Reply
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('quote.message') }}" method="POST" enctype="multipart/form-data"
                    id="quoteMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="quote_request_id" id="quoteRequestID" value="">

                        <div class="col-md-6 form-group mb-2">
                            <label for="loanMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="loanMessage" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tradeInMessageModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    Tradein Request Reply
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('tradein.message') }}" method="POST" enctype="multipart/form-data"
                    id="loanMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="loan_request_id" id="loanRequestID" value="">

                        <div class="col-md-6 form-group mb-2">
                            <label for="loanMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="loanMessage" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('footer_scrips')
    <script>
        (function() {
            $('body').on('click', '#loanReplyBtn', function(event) {
                let loan_id = $(this).data('id');
                $('#loanRequestID').val(loan_id);
            });
        })()
    </script>
@endsection
