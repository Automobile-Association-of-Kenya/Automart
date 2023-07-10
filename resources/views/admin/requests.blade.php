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
                                <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#finacesTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Loan Applications</a>
                                <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#tradeinsTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Trade ins</a>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body tab-content">
                        @include('layouts.alert')
                        <div class="tab-pane fade show active" id="purchasesTab" role="tabpanel">
                            <table class="table">
                                <td><b>Customer</b></td>
                                <td><b>Residence</b></td>
                                <td><b>Vehicle</b></td>
                                <td><b>Action</b></td>
                            </table>
                            @foreach ($purchases as $item)
                                @php
                                    $dealer = $item->vehicle->dealer?->name ?? $item->vehicle->user->name;
                                    $dealerphone = $item->vehicle->dealer?->phone ?? $item->vehicle->user->phone;
                                    $dealeremail = $item->vehilce->dealer?->email ?? $item->vehicle->user->email;
                                @endphp
                                <table class="table table-hover">
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
                                                        <li class="dropdown-item"><a href="#" id="saleMessageModalToggle"
                                                                data-target="#saleMessageModal" data-toggle="modal"
                                                                data-id="{{ $item->id }}"><i
                                                                    class="fa fa-envelope text-success"></i>&nbsp;Send
                                                                Message</a>
                                                        </li>
                                                        <li class="dropdown-item"><a
                                                                href="{{ route('dealer.puchase.approve', $item->id) }}"><i
                                                                    class="fa fa-check text-success"></i>&nbsp;Approve</a>
                                                        </li>
                                                        <li class="dropdown-item"><a href="#" id="desclinePurchaseToggle"
                                                                data-toggle="modal" data-target="#declinePurchaseModal"
                                                                data-id="{{ $item->id }}"><i
                                                                    class="fa fa-edit text-warning"></i>&nbsp;Decline</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            <p class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
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
                                                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                        class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a href="#" id="quoteMessageModalToggle" data-toggle="modal" 
                                                                data-target="#quoteMessageModal"><i
                                                                    class="fa fa-envelope text-success"></i>&nbsp;Send
                                                                Message</a></li>
                                                    </ul>
                                                </li>
                                                <p class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <div class="tab-pane fade" id="finacesTab" role="tabpanel">

                            <table class="table table-hover">
                                <thead class="table">
                                    <td>Vehicle</td>
                                    <td>Customer</td>
                                    <td>Employement</td>
                                    <td>Banking</td>
                                    <td>Action</td>
                                </thead>
                                <tbody>

                                    @foreach ($loans as $item)
                                        @php
                                            $dealer = $item->vehicle?->dealer?->name ?? $item->vehicle?->user?->name;
                                            $dealerphone = $item->vehicle?->dealer?->phone ?? $item->vehicle?->user?->phone;
                                            $dealeremail = $item->vehilce?->dealer?->email ?? $item->vehicle?->user?->email;
                                            $startDate = new DateTime($item->date_of_birth);
                                            $enddate = new DateTime(date('Y-m-d'));
                                            $interval = $startDate->diff($enddate);
                                            $age = $interval->y;
                                        @endphp
                                        <tr>
                                            <td>
                                                <p>{{ $item->vehicle?->year . ' ' . $item->vehicle?->make?->make . ' ' . $item->vehicle?->model?->model }}
                                                </p>
                                                <p><b>Ref NO: </b>{!! $item->vehicle?->vehicle_no !!}</p>
                                                <p><b>Price: </b> {{ number_format($item->vehicle?->price, 2) }}</p>
                                                <p><b>Mile age: </b>{!! $item->vehicle?->mileage !!}</p>
                                                <p><b>CC: </b>{{ $item->vehicle?->enginecc }}</p>
                                                <p class="mt-2">
                                                <p><b>Dealer: </b>&nbsp; {{ $dealer }}</p>
                                                <p><b>Email:</b>&nbsp;{{ $dealeremail }}</p>
                                                <p><b>Phone: </b>&nbsp;{{ $dealerphone }}</p>
                                            </td>

                                            <td>
                                                <p><b>Name:
                                                    </b>{{ $item->title . '. ' . $item->firstname . ' ' . $item->lastname }}
                                                </p>
                                                <p><b>ID: </b>{!! $item->id_no !!}</p>
                                                <p><b>Tax Pin: </b> {{ $item->kra_pin }}</p>
                                                <p><b>Age</b>&nbsp;{{ $age }}</p>
                                                <p><b>Email: </b>{{ $item->email }}</p>
                                                <p><b>Phone: </b>{{ $item->phone }}</p>
                                                <p class="mt-2">
                                                    <b>Address</b>&nbsp;{{ $item->country->name . ' ' . $item->city . ' ' . $item->estate . ' ' . $item->house_no }}
                                                </p>
                                            </td>

                                            <td>
                                                <p><b>Industry: </b> {{ $item->industry->name }}</p>
                                                @if ($item->occupation === 'employment')
                                                    <p><b>Occupation: </b>{!! $item->proffession !!}</p>
                                                    <p><b>Years</b> {{ $item->years_of_employment }}</p>
                                                    <p><b>Type</b> {{ $item->employement_type }}</p>
                                                    <p><b>Employer: </b>{!! $item->employer !!}</p>
                                                    <p><b>Address</b>&nbsp;{{ $item->employer_address }}</p>
                                                    <p><b>Email: </b>{{ $item->email }}</p>
                                                    <p><b>Phone: </b>{{ $item->phone }}</p>
                                                @endif
                                                @if ($item->business === 'yes')
                                                    <p><b>Business:
                                                        </b>{{ $item->business_name . '. ' . $item->businesstype }}</p>
                                                    <p><b>Reg NO: </b>{!! $item->business_reg_no !!}</p>
                                                    <p><b>Address: &nbsp;</b>{{ $item->businessaddress }}</p>
                                                    <p><b>Owner: </b> {!! $item->businessowner === 'Owner'
                                                        ? "<i class='fas fa-check-circle text-success'></i>"
                                                        : "<b class='text-danger'>X</b>" !!}</p>
                                                @endif
                                            </td>

                                            <td>
                                                <p><b>Account Type: </b>{{ $item->type_of_bank_account }}</p>
                                                <p><b>Bank: </b>{{ $item->bank }}</p>
                                                <p><b>Account Holder: </b>{{ $item->accountholdername }}</p>
                                                <p><b>Account NO: </b>{{ $item->account_number }}</p>
                                                <p><b>Account Type: </b>{{ $item->bank_account_type }}</p>
                                                <p><b>Monthly Turnover: </b>{{ $item->monthly_turnover }}</p>
                                            </td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                                class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown-item"><a href="#" id="loanRequestModalToggle"
                                                                        data-toggle="modal" 
                                                                        data-target="#loanMessageModal"><i
                                                                            class="fa fa-envelope text-success"
                                                                            data-id="{{ $item->id }}"
                                                                            id="loanReplyBtn"></i>&nbsp;Send
                                                                        Message</a></li>
                                                            </ul>
                                                        </li>
                                                    </div>
                                                </div>
                                                <p class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination text-center">
                                {{ $loans->links() }}
                            </div>
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
                                                                <li class="dropdown-item"><a href="#" id="tradeInMessageModalToggle"
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
            <div class="modal-header bg-success">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-white">Sale Request Reply</h4>
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('sale.message') }}" method="POST" enctype="multipart/form-data"
                    id="loanMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="sale_request_id" id="saleRequestID" value="">

                        <div class="col-md-2 form-group mb-2">
                            <label for="saleMessageType">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms"
                                    class="saleMessageType" name="messagetype[]">&nbsp;SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail"
                                    class="saleMessageType" name="messagetype[]">&nbsp;Mail</label>
                        </div>

                        <div class="col-md-10 form-group mb-2">
                            <label for="saleMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="saleMessage" class="form-control form-control-lg"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success"><i class="fa fa-paper-plane"></i>Send</button>
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
            <div class="modal-header bg-success">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-white">Loan Request Reply</h4>
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('loan.message') }}" method="POST" enctype="multipart/form-data"
                    id="quoteMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="loan_request_id" id="loanRequestID" value="">

                        <div class="col-md-2 form-group mb-2">
                            <label for="loanMessage">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms"
                                    class="loanMessageType" name="messagetype[]">&nbsp;SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail"
                                    class="loanMessageType" name="messagetype[]">&nbsp;Mail</label>
                        </div>

                        <div class="col-md-10 form-group mb-2">
                            <label for="loanMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="loanMessage" class="form-control form-control-lg"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success"><i class="fas fa-paper-plane"></i>&nbsp;Send</button>
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
            <div class="modal-header bg-success">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-white">Quote Request Reply</h4>
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

                        <div class="col-md-2 form-group mb-2">
                            <label for="quoteMessageType">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms"
                                    class="quoteMessageType" name="messagetype[]">&nbsp;SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail"
                                    class="quoteMessageType" name="messagetype[]">&nbsp;Mail</label>
                        </div>

                        <div class="col-md-10 form-group mb-2">
                            <label for="quoteMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="quoteMessage" class="form-control form-control-lg"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success"><i class="fas fa-paper-plane"></i>&nbsp;Send</button>
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
            <div class="modal-header bg-success">

                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-white">Tradein Request Reply</h4>
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
                        <input type="hidden" name="tradein_request_id" id="tradeinRequestID" value="">

                        <div class="col-md-2 form-group mb-2">
                            <label for="tradeInMessageType">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms"
                                    class="tradeInMessageType" name="messagetype[]">&nbsp;SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail"
                                    class="tradeInMessageType" name="messagetype[]">&nbsp;Mail</label>
                        </div>

                        <div class="col-md-10 form-group mb-2">
                            <label for="tradeInMessage">Message</label>
                            <div class="form-group subject">
                                <textarea name="message" id="tradeInMessage" class="form-control form-control-lg"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-success"><i class="fa fa-paper-plane"></i>&nbsp;Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="declinePurchaseModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header bg-warning">

                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-white">Are you sure you want to decline this purchase request?</h4>
                </div>

                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('purchase.decline') }}" method="POST" enctype="multipart/form-data"
                    id="loanMessageForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="purchase_decline_request_id" id="purchaseRequestDeclineID" value="">

                        {{-- <div class="col-md-2 form-group mb-2">
                            <label for="purchaseDeclineMessageType">Message Type</label>
                            <label for=""></label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="sms"
                                    class="purchaseDeclineMessageType" name="messagetype">&nbsp;SMS</label>
                            <label class="custom-control custom-radio"><input type="checkbox" value="mail"
                                    class="purchaseDeclineMessageType" name="messagetype">&nbsp;Mail</label>
                        </div> --}}

                        <div class="col-md-12 form-group mb-2">
                            <label for="purchaseDeclineMessage">Reason For Decline</label>
                            <div class="form-group subject">
                                <textarea name="message" id="purchaseDeclineMessage" class="form-control form-control-lg"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-stop"></i>&nbsp;Send</button>
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
            $('body').on('click', '#loanRequestModalToggle', function(event) {
                let loan_id = $(this).data('id');
                console.log(loan_id);
                $('#loanRequestID').val(loan_id);
            });

            $('body').on('click', '#saleMessageModalToggle', function(event) {
                let sale_id = $(this).data('id');
                $('#saleRequestID').val(sale_id);
            });

            $('body').on('click', '#desclinePurchaseToggle', function(event) {
                let purchase_id = $(this).data('id');
                $('#purchaseRequestDeclineID').val(purchase_id);
            });

            $('body').on('click', '#quoteMessageModalToggle', function(event) {
                let quote_id = $(this).data('id');
                $('#quoteRequestID').val(quote_id);
            });
            
            $('body').on('click', '#tradeInMessageModalToggle', function(event) {
                let tradein_id = $(this).data('id');
                $('#tradeinRequestID').val(quote_id);
            });
        })()
    </script>
@endsection
