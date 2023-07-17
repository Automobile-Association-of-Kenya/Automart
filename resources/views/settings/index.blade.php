@extends('layouts.admin')

@section('title')
    Settings @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}">

    <style>
        #mailingSections {
            max-height: 300px;
            overflow-y: auto;
        }

        table {
            width: 100%;
        }

        .phone,
        .mail {
            display: none;
        }
    </style>
@endsection

@section('header_styles')
    <style>
        .onetime {
            display: none;
        }

        .repetetive {
            display: none;
        }
    </style>
@endsection

@section('page')
    System settings
@endsection

@section('main')
    <main id="vehicleship">
        <div class="card" id="main-content-card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <nav class="nav-justified ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#subscriptionTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Subscription Packages</a>
                                <a class="nav-item nav-link" id="emails-tab" data-toggle="tab" href="#emailsTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Email Lists</a>

                                <a class="nav-item nav-link" id="mails-tab" data-toggle="tab" href="#mailingsTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Mailings</a>

                                <a class="nav-item nav-link" id="makes-tab" data-toggle="tab" href="#servicesTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Services</a>

                                <a class="nav-item nav-link" id="social-tab" data-toggle="tab" href="#socialTabs"
                                    role="tab" aria-controls="pop2" aria-selected="false">Socials</a>
                            </div>
                        </nav>

                        <div class="tab-content text-left" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="subscriptionTab" role="tabpanel">
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8 mt-2" id="subscriptionsTableSection">
                                                    <table class="table table-bordered table-sm">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Type</th>
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
                                                                <label>Type</label>
                                                                <select name="type" id="subscriptionType"
                                                                    class="form-control">
                                                                    <option value="">Select One</option>
                                                                    <option value="onetime">One time</option>
                                                                    <option value="repetetive">Repetetive</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label>Priority</label>
                                                                <select name="priority" id="subPriority"
                                                                    class="form-control form-control-md" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="1">1 <sup>st</sup></option>
                                                                    <option value="2">2 <sup>nd</sup></option>
                                                                    <option value="3">3 <sup>rd</sup></option>
                                                                    <option value="4">4 <sup>th</sup></option>
                                                                    <option value="5">5 <sup>th</sup></option>
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
                                                                    <ul class="list-group"
                                                                        id="subscriptionPropertiesList">

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

                                                            <div class="col-md-12 form-group">
                                                                <label>Description</label>
                                                                <textarea name="description" id="subsDescription" class="form-control"></textarea>
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

                            <div class="tab-pane fade mb-3" id="accountsTab" role="tabpanel" aria-labelledby="pop2-tab">
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

                            <div class="tab-pane fade mb-3" id="mailingsTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mt-2" id="mailingSections">
                                                </div>

                                                <div class="col-md-6 mail-create-section">
                                                    <h4 class="text text-center mb-2">Notification Form</h4>
                                                    <div id="mailsfeedback"></div>

                                                    <form action="#" method="post" id="sendMailForm">
                                                        @csrf
                                                        <div class="row">

                                                            <div class="col-md-12 form-group">
                                                                <label for="usage">Notification Type</label>
                                                                <select name="usage" id="sendMailUsage"
                                                                    class="form-control form-control-md" required>
                                                                    <option value="">Select one</option>
                                                                    <option value="mail">Mail</option>
                                                                    <option value="sms">SMS</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 mail">
                                                                <label for="name">Email Type</label>
                                                                <select name="account_type" id="accountType"
                                                                    class="form-control form-control-sm" required>
                                                                    <option value="">Select one</option>
                                                                    <option value="Authentication">Authentication / User
                                                                        accounts
                                                                    </option>
                                                                    <option value="Marketing">Marketing</option>
                                                                    <option value="Subscription">Subscription Reminders
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="name">Recepients Type</label>
                                                                <select name="recepient_type" id="recepientType"
                                                                    class="form-control form-control-sm" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="customers">Customers</option>
                                                                    <option value="partners">Partners</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="email">Range</label>
                                                                <select name="sendrange" id="sendRange"
                                                                    class="form-control" required>
                                                                    <option value="">All</option>
                                                                    <option value="manual">Manually Select</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="phone">Message</label>
                                                                {{-- <div class="float-right box-tools"></div> --}}
                                                                <textarea class="textarea form_editors_textarea_wysihtml form-control" name="mailMessage" id="mailMessage"
                                                                    placeholder="Type your message here" required></textarea>
                                                            </div>

                                                            <div class="col-md-12 mt-3">
                                                                <button class='btn btn-success btn-md' id='sendmail'><i
                                                                        class="fal fa-save fa-lg fa-fw"></i> Send
                                                                </button>
                                                                <button class='btn btn-outline-warning btn-md'
                                                                    id='clearm'><i
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

                                            <form action="{{ route('services.store') }}" method="post"
                                                id="createServiceForm">
                                                @csrf
                                                <input type="hidden" name="service_id" id="serviceCreateID">

                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="service">Service</label>
                                                        <input type="text" class="form-control form-control-md"
                                                            id="serviceName" name="service" required>
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

                            <div class="tab-pane fade mb-3" id="socialTabs" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <table class="table table-bordered table-sm table-striped">
                                            <thead>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Link</th>
                                            </thead>
                                            <tbody id="socialTable">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2"><b>Socials Form</b></h4>
                                            <div id="socialfeedback"></div>

                                            <form action="{{ route('social.store') }}" method="post"
                                                id="createSocialForm">
                                                @csrf
                                                <input type="hidden" name="social_id" id="socialCreateID">

                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <label for="type">Type</label>
                                                        <select id="socialType" name="type" class="form-control">
                                                            <option value="">Select One</option>
                                                            <option value="social">Social</option>
                                                            <option value="address">Adrress</option>
                                                            <option value="contact">Contact</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 form-group social">
                                                        <label for="socialname">Name</label>
                                                        <input type="text" class="form-control form-control-md"
                                                            id="socialName" name="name" required>
                                                    </div>

                                                    <div class="col-md-12 form-group social">
                                                        <label for="social Link">Link</label>
                                                        <input type="text" class="form-control" name="link"
                                                            id="socialLink">
                                                    </div>
{{--
                                                    <div class="col-md-12 form-group phone">
                                                        <label for="contactPhone">Phone</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            id="contactPhone">
                                                    </div>

                                                    <div class="col-md-12 form-group mail">
                                                        <label for="contactMail">Email</label>
                                                        <input type="mail" class="form-control" name="mail"
                                                            id="contactMail">
                                                    </div> --}}

                                                    <div class="col-md-12 form-group">
                                                        <button class='btn btn-success btn-sm' id='savesocial'><i
                                                                class="fal fa-save fa-lg fa-fw"></i> Save
                                                        </button>
                                                        <button class='btn btn-outline-warning btn-sm' id='clearsocial'><i
                                                                class="fal fa-broom fa-lg fa-fw"></i>
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
    <script>
        (function() {
            $('#subscriptionType').on('change', function() {
                let value = $(this).val();
                if (value === "onetime") {
                    $('.onetime').show();
                    $('.repetetive').hide();
                }
                if (value === "repetetive") {
                    $('.repetetive').show();
                    $('.onetime').hide();
                }
            });
            // let socialType = $('#socialType');
            // socialType.on('change', function(event) {
            //     let type = $(this).val();
            //     if (type === "social") {
            //         $('.social').show();
            //         $('.address').hide();
            //         $('.phone').hide();
            //         $('.email').hide();
            //     }
            //     if (type === "address") {
            //         $('.social').hide();
            //         $('.address').show();
            //         $('.phone').hide();
            //         $('.email').hide();
            //     }
            //     if (type === "phone") {
            //         $('.social').hide();
            //         $('.address').hide();
            //         $('.phone').show();
            //         $('.email').hide();
            //     }
            //     if (type === "email") {
            //         $('.social').hide();
            //         $('.address').hide();
            //         $('.phone').hide();
            //         $('.email').show();
            //     }
            // });
        })()
    </script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/main/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/main/jszip.min.js') }}"></script>
    <script src="{{ asset('js/main/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/main/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/main/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/main/settings.js') }}"></script>
    <script src="{{ asset('bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap3_wysihtml5.js') }}"></script>
    <script>
        (function() {
            $(".textarea").wysihtml5();

            // $('#bootstrap-editor').wysihtml5({
            //     stylesheets: [
            //         '/bootstrap-wysihtml5/stylesheets/bootstrap-wysihtml5wysiwyg-color.css'
            //     ]
            // });
            $(".wysihtml5-toolbar li:nth-child(3) a").addClass("btn-outline-primary");
            $(".wysihtml5-toolbar li:nth-child(4) a").addClass("btn-outline-primary");
            $(".wysihtml5-toolbar li:nth-child(5) a").addClass("btn-outline-primary");
            $(".wysihtml5-toolbar li:nth-child(6) a").addClass("btn-outline-primary");
            $(".wysihtml5-toolbar .btn-group:eq(1) a:first-child").addClass("fas fa-list");
            $(".wysihtml5-toolbar .btn-group:eq(1) a:nth-child(2)").addClass("fas fa-th-list");
            $(".wysihtml5-toolbar .btn-group:eq(1) a:nth-child(3)").addClass("fas fa-align-left");
            $(".wysihtml5-toolbar .btn-group:eq(1) a:nth-child(4)").addClass("fas fa-align-right");
            $(".wysihtml5-toolbar .btn-group:eq(3) a:first-child").addClass("fas fa-list");
            $(".wysihtml5-toolbar .btn-group:eq(3) a:nth-child(2)").addClass("fas fa-th-list");
            $(".wysihtml5-toolbar .btn-group:eq(3) a:nth-child(3)").addClass("fas fa-align-left");
            $(".wysihtml5-toolbar .btn-group:eq(3) a:nth-child(4)").addClass("fas fa-align-right");
            $(".wysihtml5-toolbar li:nth-child(5) span").addClass("fas fa-share");
            $(".wysihtml5-toolbar li:nth-child(6) span").addClass("fas fa-picture-o");
            $("[data-wysihtml5-command='formatBlock'] span").css("position", "relative").css("top", "-5px").css("left",
                "-5px");
            $(".note-toolbar button").removeClass('btn-default').addClass('btn-light');
            $(".wysihtml5-toolbar li:nth-child(2) a").removeClass('btn-default').addClass('btn-light');
            $(".note-editor .note-editing-area").addClass('note-editing-area1');
            $(".note-btn .note-icon-arrows-alt").click(function() {
                $(".note-editing-area").removeClass('note-editing-area1');
            })
        })()
    </script>
@endsection
