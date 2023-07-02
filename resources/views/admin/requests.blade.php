@extends('layouts.admin')

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
        <div class="card pr-0 pl-0">
            <div class="col-md-12">
                <nav class="nav-justified bg-white">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#purchasesTab"
                            role="tab" aria-controls="pop1" aria-selected="true">Sale Requests</a>
                        <a class="nav-item nav-link" id="pop1-tab" data-toggle="tab" href="#quotesTab" role="tab"
                            aria-controls="pop1" aria-selected="true">Quotations</a>
                        <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab" href="#finacesTab"
                            role="tab" aria-controls="pop1" aria-selected="true">Loan Applications</a>
                        <a class="nav-item nav-link" id="yards-tab" data-toggle="tab" href="#tradeinsTab" role="tab"
                            aria-controls="pop2" aria-selected="false">Trade ins</a>
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
                                    <p  class="mt-2"><span><b>Dealer: </b>&nbsp; {{ $dealer }} </span>&nbsp;<span><b>Email:</b>&nbsp;{{ $dealeremail }}</span><br><span><b>Phone: </b>&nbsp;{{ $dealerphone }}</span></p>
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
                        {{ $purchases->links() }}
                    </div>
                </div>

                <div class="tab-pane fade" id="quotesTab" role="tabpanel">
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
                                    <p  class="mt-2"><span><b>Dealer: </b>&nbsp; {{ $dealer }} </span>&nbsp;<span><b>Email:</b>&nbsp;{{ $dealeremail }}</span><br><span><b>Phone: </b>&nbsp;{{ $dealerphone }}</span></p>
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
                                    <p  class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                </td>
                            </tr>
                        </table>
                    @endforeach



                </div>

                <div class="tab-pane fade" id="finacesTab" role="tabpanel">
                    <table class="table">
                        <td>Vehicle</td>
                        <td>Customer</td>
                        <td>Employement</td>
                        <td>Banking</td>
                    </table>


                    @foreach ($loans as $item)
                        @php
                            $dealer = $item->vehicle?->dealer?->name ?? $item->vehicle?->user?->name;
                            $dealerphone = $item->vehicle?->dealer?->phone ?? $item->vehicle?->user?->phone;
                            $dealeremail = $item->vehilce?->dealer?->email ?? $item->vehicle?->user?->email;
                        @endphp
                        <table class="table table-hover">
                            <tr>
                                <td>
                                    <span>{{ $item->vehicle?->year . ' ' . $item->vehicle?->make?->make . ' ' . $item->vehicle?->model?->model }}</span><br>
                                    <span><b>Ref NO: </b>{!! $item->vehicle?->vehicle_no . ' <b>Price: </b> ' . number_format($item->vehicle?->price, 2) !!}</span><br>
                                    <span><b>Mile age: </b>{!! $item->vehicle?->mileage . ' <b>CC: </b> ' . $item->vehicle?->enginecc !!}</span>
                                    <p  class="mt-2"><span><b>Dealer: </b>&nbsp; {{ $dealer }} </span>&nbsp;<span><b>Email:</b>&nbsp;{{ $dealeremail }}</span><br><span><b>Phone: </b>&nbsp;{{ $dealerphone }}</span></p>
                                </td>

                                <td>
                                    <span><b>Name: </b>{{ $item->title.'. '.$item->firstname.' '.$item->lastname }}</span><br>
                                    <span><b>ID: </b>{!! $item->id_no .'&nbsp;&nbsp;<b>Age</b>&nbsp;'.date('Y',strtotime(date('Y-m-d')) - strtotime($item->date_of_birth)).'&nbsp;<b>Tax Pin: </b> '.$item->kra_pin !!}</span><br>
                                    <span><b>Email: </b>{{ $item->email }} &nbsp;&nbsp; <b>Phone: </b>{{ $item->phone }}</span><br>
                                    <p class="mt-2"><b>Address</b>&nbsp;{{ $item->country->name.' '.$item->city.' '.$item->estate.' '.$item->house_no }}</p>
                                </td>
                                
                                <td>
                                    <span><b>Industry: </b> {{ $item->industry->name }}</span>
                                    @if ($item->occupation === "employment")
                                        <span><b>Occupation: </b>{!! $item->proffession.'  <b>Type</b>  '.$item->employement_type.' <b>Years</b>  '.$item->years_of_employment !!}</span><br>
                                        <span><b>Employer: </b>{!! $item->employer .'&nbsp;&nbsp;<b>Address</b>&nbsp;'.$item->employer_address !!}</span><br>
                                        <span><b>Email: </b>{{ $item->email }} &nbsp;&nbsp; <b>Phone: </b>{{ $item->phone }}</span><br>
                                    @endif
                                    @if ($item->business === "yes")
                                        <span><b>Business: </b>{{ $item->business_name.'. '.$item->businesstype }}</span><br>
                                    <span><b>Reg NO: </b>{!! $item->business_reg_no .' &nbsp;&nbsp;<b>Address</b>&nbsp;'.$item->businessaddress !!}</span><br>
                                    <span><b>Owner: </b> {!! ($item->businessowner === "Owner") ? "<i class='fas fa-check-circle text-success'></i>" : "<b class='text-danger'>X</b>"  !!}</span>
                                    @endif
                                </td>

                                <td>
                                    <span><b>Account Type: </b>{{$item->type_of_bank_account}}</span>
                                    <span><b>Bank: </b>{{ $item->bank }}</span><br>
                                    <span><b>Account Holder: </b>{{ $item->accountholdername }}</span><br>
                                    <span><b>Account NO: </b>{{ $item->account_number }}</span><br>
                                    <span><b>Account Type: </b>{{ $item->bank_account_type }}</span><br>
                                    <span><b>Monthly Turnover: </b>{{ $item->monthly_turnover }}</span><br>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="dropdown"><a href="#" data-toggle="dropdown"
                                                    class="btn btn-success btn-round btn-sm btn-floated"><b>...</b></a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><a
                                                            href=""><i class="fa fa-envelope text-success"></i>&nbsp;Send Message</a></li>
                                                </ul>
                                            </li>
                                        </div>
                                    </div>
                                    <p  class="mt-4">{{ date('H:i d M Y', strtotime($item->created_at)) }}</p>
                                </td>
                            </tr>
                        </table>
                    @endforeach

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
                            <th>Requested at</th>
                        </thead>

                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($tradeins as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><span><strong>{{ $item->vehicle->dealer->name }}</strong></span><br><span>{{ $item->vehicle->dealer->email }}</span><br><span>{{ $item->vehicle->dealer->phone }}</span>
                                    </td>
                                    <td><span><strong>{{ $item->name }}</strong></span><br><span>{{ $item->email }}</span><br><span>{{ $item->phone }}</span>
                                    </td>
                                    <td><span>{{ $item->make->make }}</span><br><span>{{ $item->model->model }}</span><br><span>{{ $item->year . ' - ' . $item->reg_no }}</span>
                                    </td>
                                    <td><span>{{ $item->vehicle->make->make }}</span><br><span>{{ $item->vehicle->model->model }}</span><br><span>{{ $item->vehicle->year . ' - ' . $item->vehicle->price }}</span>
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
