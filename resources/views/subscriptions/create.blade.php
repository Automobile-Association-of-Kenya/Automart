@extends('layouts.app')

@section('title')
    {{ $plan->name }} @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

@endsection

@section('main')
    <div class="contact-section">
        <div class="container"><br>
            <br>
            <br>
            <br>
            <br>
            <div class="card">
                <div class="row">
                    <div class="col-lg-5 col-md-12 authsection" style="margin: auto;padding:2em 4em;">
                        <div>
                            <div class="">
                                <h1 style="color:black;">{{ $plan->name }}</h1>
                            </div>
                            <p>{{ $plan->description }}</p>
                            <p><strong>When you subscribe to this service, you get:- </strong></p>
                            @foreach ($plan->properties as $item)
                                <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;{{ $item->name }}</p>
                            @endforeach
                            {{-- <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p> --}}
                            <div class="social-list text-center">
                                <h3>Kes: <span
                                        class="text-success">{{ $plan->cost !== 'free' ? number_format($plan->cost, 2) : $plan->price }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="text-left mt-2" style="padding: 2em 0;">
                            <h4>Payment options</h4>
                            <p>You can make your payment through any of the following options </p>
                        </div>

                        <div id="accordion">
                            
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Mpesa
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="" method="post" id="">
                                            <div class="form-group mb-2">
                                                <label for="">Enter the phone number you would like to ppay with for this plan in the format indicated in the textbox below and click process. A popup will be sent to your phone. Accept and key in you mpesa pin to complete.   </label>
                                                <input type="text" class="form-control form-control-lg mb-2" name="phone" id="phoneNumber" placeholder="2547xxxxxxxx" value="{{ auth()->user()->phone }}">
                                            </div>
                                            <button type="submit" class="btn btn-success">Process</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Paypal
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                            <div id="paypal-button-container"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
@section('footer_scripts')
        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
        <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder() {
          return fetch("/my-server/create-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            // use the "body" param to optionally pass additional order information
            // like product skus and quantities
            body: JSON.stringify({
              cart: [
                {
                  sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                  quantity: "YOUR_PRODUCT_QUANTITY",
                },
              ],
            }),
          })
          .then((response) => response.json())
          .then((order) => order.id);
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data) {
          return fetch("/my-server/capture-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              orderID: data.orderID
            })
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection
