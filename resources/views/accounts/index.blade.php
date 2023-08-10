@extends('layouts.admin')

@section('title')
    Accounts @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <style>
        .Paypal {
            display: none;
        }

        .mpesa {
            display: none;
        }
    </style>
@endsection

@section('page')
    Accounts
@endsection

@section('main')
    <main id="vehicleship">
        <div class="card" id="main-content-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="nav-justified ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#chartsTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Chart of accounts</a>
                                <a class="nav-item nav-link" id="pop1-tab" data-toggle="tab" href="#subscriptionsTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Subscriptions</a>
                                <a class="nav-item nav-link" id="makes-tab" data-toggle="tab" href="#transactionsTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Transactions</a>
                            </div>
                        </nav>

                        <div class="tab-content text-left" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="chartsTab" role="tabpanel">
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8 mt-2" id="subscriptionsTableSection">
                                                    <table class="table table-bordered table-responsive table-md">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Provider</th>
                                                            <th>Transaction</th>
                                                            <th>Business Code</th>
                                                            <th>Secret</th>
                                                            <th>Key</th>
                                                            <th>Passkey</th>
                                                            <th>Balance</th>
                                                            <th>Currency</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody id="accountsTable">

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-4 user-create-section">
                                                    <h4 class="text text-center mb-2">Accounts Form</h4>
                                                    <div id="accountsfeedback"></div>

                                                    <form action="" method="post" id="createAccountForm">
                                                        @csrf
                                                        <input type="hidden" name="account_id" id="accountID">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label>Service Provider</label>
                                                                <select name="provider" id="providerID"
                                                                    class="form-control">
                                                                    <Option value="">Select One</Option>
                                                                    <option value="Mpesa">Mpesa</option>
                                                                    <option value="Paypal">Paypal</option>
                                                                    <option value="Bank">Bank</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 form-group Paypal">
                                                                <label>Client ID</label>
                                                                <input type="text" name="client_id" id="clientID"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Paypal">
                                                                <label>Client Secret</label>
                                                                <input type="text" name="client_secrest"
                                                                    id="clientSecrest" class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Paypal">
                                                                <label>Business Name</label>
                                                                <input type="text" name="name" id="paypalBusinessName"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Paypal">
                                                                <label>Card Number</label>
                                                                <input type="text" name="cardnumber"
                                                                    id="paypalCardNumber" class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Paypal">
                                                                <label>Expiration</label>
                                                                <input type="text" name="expiration" id="expirationDate"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Paypal">
                                                                <label>CW</label>
                                                                <input type="text" name="cw" id="paypalCW"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Mpesa">
                                                                <label>Customer secret</label>
                                                                <input type="text" name="customer_secret"
                                                                    id="mpesaSecret" class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Mpesa">
                                                                <label>Customer Key</label>
                                                                <input type="text" name="customer_key"
                                                                    id="mpesaCustomerKey" class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Mpesa">
                                                                <label>Passkey</label>
                                                                <input type="text" name="passkey" id="mpesaPassKey"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Mpesa">
                                                                <label>Business short code</label>
                                                                <input type="text" name="businessshortcode"
                                                                    id="businessShortCode" class="form-control">
                                                            </div>

                                                            <div class="col-md-12 form-group Mpesa">
                                                                <label>Transaction Type</label>
                                                                <select name="transaction_type" id="transactionType"
                                                                    class="form-control">
                                                                    <option value="CustomerPayBillOnline">Customer PayBill
                                                                        Online</option>
                                                                    <option value="CustomerBuyGoodsOnline">Customer Buy
                                                                        Goods Online</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label>Currency</label>
                                                                <input type="text" name="currency" id="accurrency"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12 mt-3">
                                                                <button class='btn btn-success btn-md' id='saveuser'><i
                                                                        class="fal fa-save fa-lg fa-fw"></i> Save
                                                                </button>
                                                                <button class='btn btn-outline-warning btn-md'
                                                                    id='clearuser'><i
                                                                        class="fal fa-broom fa-lg fa-fw"></i>
                                                                    Clear
                                                                    Fields</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="subscriptionsTab" role="tabpanel"
                                aria-labelledby="pop2-tab">
                                <div class="alert-success pb-3 pt-3 pl-2 pr-1 border-rounded filterSection"
                                    style="border-radius: 6px;">
                                    <form id="filterSubscriptionForm" class="form-row">
                                        @csrf
                                        <div class="col-md-5">
                                            <label>Plan</label>
                                            <select name="filtersubscription_id" class="form-control  chzn-select"
                                                id="filterSubscriptionID" style="width: 100%;">
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Start</label>
                                            <input type="date" name="start_date" id="filterStartDate"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-3">
                                            <label>End</label>
                                            <input type="date" name="end_date" id="filterEndDate"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                    class="fas fa-search"></i>&nbsp;Find</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="subscriptionsTable" class="mt-2"></div>
                            </div>

                            <div class="tab-pane fade mb-3" id="transactionsTab" role="tabpanel"
                                aria-labelledby="pop2-tab">

                                <div class="alert-success pb-3 pt-3 pl-2 pr-1 border-rounded filterSection"
                                    style="border-radius: 6px;">
                                    <form id="filterTransactionsForm" class="form-row">
                                        @csrf

                                        <div class="col-md-3">
                                            <label>Account</label>
                                            <select name="account_id" id="accountFilterID"
                                                class="form-control chzn-select" style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Dealer</label>
                                            <select name="account_id" id="dealerPaymentFilterID"
                                                class="form-control chzn-select" style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Start</label>
                                            <input type="date" name="start_date" id="startDate"
                                                class="form-control form-control-sm date">
                                        </div>

                                        <div class="col-md-2">
                                            <label>End</label>
                                            <input type="date" name="end_date" id="endDate"
                                                class="form-control form-control-sm date">
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-success btn-md mt-4"><i
                                                    class="fas fa-search"></i>&nbsp; sort</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="card mt-2">
                                    <div class="card-body" id="transactionSection">

                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade mb-3" id="emailsTab" role="tabpanel" aria-labelledby="pop2-tab">

                            </div>

                            <div class="tab-pane fade mb-3" id="servicesTab" role="tabpanel" aria-labelledby="pop2-tab">
                            </div>
                        </div>
                    </div>
                </div>
    </main>
@endsection

<div class="modal fade" id="assignToSubscriptionModal" tabindex="-1" role="dialog"
    aria-labelledby="financeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-black">Assign account to subscription
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('accounts.subscribe') }}" method="POST" id="accountAssignForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="account_id" id="assignAccountID" value="">

                        <div class="col-md-12 form-group mb-2">
                            <label for="subject">Subscription</label>
                            <div class="form-group">
                                <select name="subscrin_id" id="subscriptionAssignID" class="form-control" required>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div id="assignfeeback"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-warning">Submi</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/accounts.js') }}"></script>
    <script>
        (function() {
            $('.chzn-select').select2();
        })()
    </script>
@endsection
