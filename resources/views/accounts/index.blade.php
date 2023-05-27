@extends('layouts.dashboardlayout')

@section('title')
    Accounts @parent
@endsection


@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
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
                                                    <table class="table table-bordered table-sm">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Priority</th>
                                                            <th>Cost</th>
                                                            <th>Billing Cycle</th>
                                                            <th>Properties</th>
                                                            <th>Action</th>
                                                        </thead>

                                                        <tbody id="subscriptionTable">

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-4 user-create-section">
                                                    <h4 class="text text-center mb-2">Subscription Form</h4>
                                                    <div id="subscriptionfeedback"></div>

                                                    <form action="" method="post" id="createSubscriptionForm">
                                                        @csrf
                                                        <input type="hidden" name="subscription_id" id="subscriptionID">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="name" id="subscriptionName"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label>Priority</label>
                                                                <select name="priority" id="subPriority"
                                                                    class="form-control form-control-md" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="High">High</option>
                                                                    <option value="Moderate">Moderate</option>
                                                                    <option value="Low">Low</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label>Cost</label>
                                                                <input type="number" name="cost" id="subCost"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label>Billing Cycle</label>
                                                                <select name="billingcycle" id="billingCycle"
                                                                    class="form-control form-control-md" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="Quarterly">Quarterly</option>
                                                                    <option value="Annually">Annually</option>
                                                                    <option value="onetime">one Time</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="subscriptionprops">Subscription
                                                                        Properties</label>
                                                                    <ul class="list-group" id="subscriptionPropertiesList">

                                                                    </ul>
                                                                </div>

                                                                <div class="col-md-11">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="subscriptionname" id="subsPropInput">
                                                                </div>



                                                                <div class="col-md-1">
                                                                    <button class="btn btn-sm btn-success" type="button"
                                                                        id="subsPropsAdd"><i
                                                                            class="fal fa-plus"></i></button>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 text-center mt-3">
                                                                <button class='btn btn-success btn-sm' id='saveuser'><i
                                                                        class="fal fa-save fa-lg fa-fw"></i> Save
                                                                </button>
                                                                <button class='btn btn-outline-warning btn-sm'
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

                            <div class="tab-pane fade mb-3" id="transactionsTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9 mt-2" id="accountsTableSection">
                                                </div>

                                                <div class="col-md-3 dealer-create-section">
                                                    <h4 class="text text-center mb-2">Account Form</h4>
                                                    <div id="accountsfeedback"></div>

                                                    <form action="#" method="post" id="createAccountForm">
                                                        @csrf
                                                        <input type="hidden" name="user_id" id="dealerCreateID">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="name">Account Type</label>
                                                                <select name="account_type" id="accountType"
                                                                    class="form-control form-control-sm">
                                                                    <option value="">Select One</option>
                                                                    <option value="Mpesa">Mpesa</option>
                                                                    <option value="Bank">Bank</option>
                                                                    <option value="Paypal">Paypal</option>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" id="dealerEmail"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" name="phone" id="dealerPhone"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="alt_phone">Alt Phone</label>
                                                                <input type="text" name="alt_phone"
                                                                    id="altDealerPhone" class="form-control">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="address">Address</label>
                                                                <textarea name="address" id="dealerAddress" class="form-control"></textarea>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="address">Contact person</label>
                                                                <select name="dealer_user_id" id="dealerUserID"
                                                                    class="form-control"></select>
                                                            </div>

                                                            <div class="col-md-12 text-center mt-3">
                                                                <button class='btn btn-success btn-sm' id='savedealer'><i
                                                                        class="fal fa-save fa-lg fa-fw"></i> Save
                                                                </button>
                                                                <button class='btn btn-outline-warning btn-sm'
                                                                    id='cleardealer'><i
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


                            <div class="tab-pane fade mb-3" id="emailsTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-9 mt-2" id="emailsTableSection">
                                        <table class="table table-bordered table-sm table-striped">
                                            <thead>
                                                <th>#</th>
                                                <th>Usage</th>
                                                <th>Host</th>
                                                <th>Address</th>
                                                <th>Password</th>
                                                <th>Protocol</th>
                                                <th>Port</th>
                                                <th>Status</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="mailsTable">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Emails Form</h4>
                                            <div id="mailsfeedback"></div>

                                            <form action="#" method="post" id="createMailForm">
                                                @csrf
                                                <input type="hidden" name="mail_id" id="mailCreateID">
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="usage">Email use</label>
                                                        <select name="usage" id="mailUsage"
                                                            class="form-control form-control-md" required>
                                                            <option value="">Select one</option>
                                                            <option value="Authentication">Authentication / User accounts
                                                            </option>
                                                            <option value="Marketing">Marketing</option>
                                                            <option value="Subscription">Subscription Reminders</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="mailhost">Host</label>
                                                        <input type="text" name="host" id="mailHost"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="email">Username/Email</label>
                                                        <input type="email" name="email" id="mailEmail"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="password">Password</label>
                                                        <input type="text" name="password" id="mailPassword"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="secureprotocol">Secure protocol</label>
                                                        <input type="text" name="secureprotocol" id="secureProtocol"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="port">Port</label>
                                                        <input type="text" name="port" id="mailPort"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button class='btn btn-success btn-sm' id='savemail'><i
                                                                class="fal fa-save fa-lg fa-fw"></i> Save
                                                        </button>
                                                        <button class='btn btn-outline-warning btn-sm'
                                                            id='clearmailform'><i class="fal fa-broom fa-lg fa-fw"></i>
                                                            Reset</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mb-3" id="servicesTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-9 mt-2" id="servicesTableSection">
                                        <table class="table table-bordered table-sm table-striped">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Dscription</th>
                                                <th>Carret</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="servicesTable">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Services Form</h4>
                                            <div id="servicesfeedback"></div>

                                            <form action="{{ route('services.store') }}" method="post" id="createServiceForm">
                                                @csrf
                                                <input type="hidden" name="service_id" id="serviceCreateID">

                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="service">Service</label>
                                                        <input type="text" class="form-control form-control-md" id="serviceName" name="service" required>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="mailhost">Description</label>
                                                        <textarea name="description" id="serviceDescription" class="form-control form-control-md" required></textarea>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label for="caret">Caret</label>
                                                        <input type="html" name="caret" id="serviceCaret"
                                                            class="form-control">
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <button class='btn btn-success btn-sm' id='saveservice'><i
                                                                class="fal fa-save fa-lg fa-fw"></i> Save
                                                        </button>
                                                        <button class='btn btn-outline-warning btn-sm'
                                                            id='clearserviceform'><i class="fal fa-broom fa-lg fa-fw"></i>
                                                            Reset</button>
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



@section('footer_scrips')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/moment.js') }}"></script>
    <script src="{{ asset('js/main/accounts.js') }}"></script>
@endsection
