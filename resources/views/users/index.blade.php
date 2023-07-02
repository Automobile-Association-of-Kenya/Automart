@extends('layouts.admin')

@section('title')
    Users @parent
@endsection


@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
@endsection


@section('page')
    Users
@endsection

@section('main')
    <main id="vehicleship">
        <div class="card" id="main-content-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <nav class="nav-justified ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#usersTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Users</a>

                                <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#dealersTab"
                                    role="tab" aria-controls="pop1" aria-selected="true">Dealers</a>

                                <a class="nav-item nav-link" id="makes-tab" data-toggle="tab" href="#partnersTab"
                                    role="tab" aria-controls="pop2" aria-selected="false">Partners</a>
                            </div>
                        </nav>

                        <div class="tab-content text-left" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="usersTab" role="tabpanel">
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9 mt-2" id="usersTableSection">

                                                </div>

                                                <div class="col-md-3 user-create-section">
                                                    <h4 class="text text-center mb-2">Users Form</h4>
                                                    <div id="usersfeedback"></div>

                                                    <form action="" method="post" id="createUserForm">
                                                        @csrf
                                                        <input type="hidden" name="user_id" id="userCreateID">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Full Name</label>
                                                                <input type="text" name="name" id="userName"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>Email</label>
                                                                <input type="email" name="email" id="userEmail"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>Phone</label>
                                                                <input type="text" name="phone" id="userPhone"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>Alt Phone</label>
                                                                <input type="text" name="alt_phone" id="altUserPhone"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>Role</label>
                                                                <select name="role" id="userRole"
                                                                    class="form-control form-control-md" required>
                                                                    <option value="buyer">Buyer</option>
                                                                    <option value="dealer">Dealer</option>
                                                                    <option value="partner">Partner</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 text-center mt-3">
                                                                <button class='btn btn-success btn-sm' id='saveuser'><i
                                                                        class="fal fa-save fa-lg fa-fw"></i> Save
                                                                    </button>
                                                                <button class='btn btn-outline-warning btn-sm'
                                                                    id='clearuser'><i
                                                                        class="fal fa-broom fa-lg fa-fw"></i> Clear
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

                            <div class="tab-pane fade mb-3" id="dealersTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div id="userdetails" class="mt-2">
                                    <div class="card containergroup">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9 mt-2" id="dealersTableSection">
                                                </div>

                                                <div class="col-md-3 dealer-create-section">
                                                    <h4 class="text text-center mb-2">Dealers Form</h4>
                                                    <div id="dealersfeedback"></div>

                                                    <form action="#" method="post" id="createDealerForm">
                                                        @csrf
                                                        <input type="hidden" name="user_id" id="dealerCreateID">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="name">Dealer Name</label>
                                                                <input type="text" name="name" id="dealerName"
                                                                    class="form-control" required>
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
                                                                <select name="dealer_user_id" id="dealerUserID" class="form-control"></select>
                                                            </div>

                                                            <div class="col-md-12 mt-3">
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


                            <div class="tab-pane fade mb-3" id="partnersTab" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="row">
                                    <div class="col-md-9 mt-2" id="partnerTableSection">

                                    </div>

                                    <div class="col-md-3">
                                        <div class="make-create-section mt-2">
                                            <h4 class="text text-center mb-2">Partners Form</h4>
                                                    <div id="partnersfeedback"></div>

                                            <form action="#" method="post" id="createPartnerForm">
                                                        @csrf
                                                        <input type="hidden" name="user_id" id="partnerCreateID">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="name">Name</label>
                                                                <input type="text" name="name" id="partnerName"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" id="partnerEmail"
                                                                    class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" name="phone" id="partnerPhone"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="alt_phone">Alt Phone</label>
                                                                <input type="text" name="alt_phone"
                                                                    id="altPartnerPhone" class="form-control">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="address">Address</label>
                                                                <textarea name="address" id="partnerAddress" class="form-control"></textarea>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="address">Contact person</label>
                                                                <select name="partner_user_id" id="partnerUserID" class="form-control"></select>
                                                            </div>

                                                            <div class="col-md-12 mt-3">
                                                                <button class='btn btn-success btn-sm' id='savepartner'><i
                                                                        class="fal fa-save fa-lg fa-fw"></i> Save
                                                                </button>
                                                                <button class='btn btn-outline-warning btn-sm'
                                                                    id='clearpartner'><i
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
    <script src="{{ asset('js/main/users.js') }}"></script>
@endsection
