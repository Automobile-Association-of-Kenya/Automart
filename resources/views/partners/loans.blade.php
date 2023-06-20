@extends('layouts.partner')

@section('title')
    @parent Loans
@endsection
@section('page')
    Loans
@endsection
@section('main')
    <main style="padding:">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <nav class="nav-justified col-md-12">
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#loanApplications"
                                role="tab" aria-controls="pop1" aria-selected="true">Loan Applications</a>

                            <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#loanProducts"
                                role="tab" aria-controls="pop1" aria-selected="true">Loan Products</a>
                        </div>
                    </nav>
                </div>

                <div class="card-body tab-content">
                    <div class="tab-pane fade show active" id="loanApplications" role="tabpanel">

                    </div>

                    <div class="tab-pane fade" id="loanProducts" role="tabpanel">
                        {{-- <button class="btn btn-success btn-sm" data-toggle="model" data-target="#newLoanProductModal"><i
                                class="fa fa-plus"></i>&nbsp;Add new</button> --}}
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Method</th>
                                        <th>Period</th>
                                        <th>Deposit</th>
                                        <th>Interest</th>
                                        <th>Limit</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="productsTableData">

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 card">
                                <div class="card-header bg-white text-center">
                                    <h4><strong>Loan Product Form</strong></h4>
                                </div>
                                <div class="card-body">
                                    <div id="lpcreatefeedback"></div>
                                    <form action="{{ route('partner.saveloanproduct') }}" method="POST"
                                        enctype="multipart/form-data" id="loanProductForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="name">Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name"
                                                        id="lproductName" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="period">Repayment Period in months</label>
                                                <div class="form-group email">
                                                    <input type="number" class="form-control" name="period"
                                                        id="lproductPeriod" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="deposit">Deposit in %</label>
                                                <div class="form-group number">
                                                    <input type="number" class="form-control" name="deposit"
                                                        id="lproductDeposit" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="interest_rate">Interest Rate in %</label>
                                                <div class="form-group subject">
                                                    <input type="number" name="interest_rate" id="lproductInterestRate"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="method">Interest Method</label>
                                                <div class="form-group subject">
                                                    <select name="method" id="interestMethod" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="Simple">Simple</option>
                                                        <option value="Compound">Compound</option>
                                                        <option value="Armotization">Armotization</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="limit">Limit</label>
                                                <div class="form-group subject">
                                                    <input type="number" name="limit" id="lproductLimit"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="fal fa-save fa-lg fa-fw"></i>save</button>
                                                <button class='btn btn-outline-warning btn-sm' id='clearYard'><i
                                                        class="fal fa-broom fa-lg fa-fw"></i> Reset</button>
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

@section('footer_scripts')
    <script src="{{ asset('js/main/partner/loan.js') }}"></script>
@endsection
