@extends('layouts.dashboard')
@section('content')
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    <!-- show error messages -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @php
        $user = session('user');
    @endphp

    <style>
        .show-when-target {
            visibility: hidden;
        }

        .show-when-target:target {
            visibility: visible;
        }

        .show-when-target:target {
            position: absolute;
            max-width: 94%;
            line-height: 2em;
            font-size: 1em;
            font-weight: bold;
            color: #FFF;
            border-radius: .4em;
            background: rgba(0, 0, 0, .5);
        }

        .show-when-target {
            cursor: pointer
        }

        .show-when-target {
            display: inline-block;
            max-width: 94%;
            line-height: 2em;
            font-size: 1em;
            font-weight: bold;

            margin: auto;
            color: #FFF;
            border-radius: .4em;
            -webkit-box-shadow: hsl(75, 80%, 15%) 0 .38em .08em;
            box-shadow: hsl(75, 80%, 15%) 0 .38em .08em;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
            background: #749A02;
        }

        .images-preview-div img {
            padding: 0px;
            max-width: 200px;
            padding: 1% !important;
        }

        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
    </style>
    @if (session('loader'))
        <div id="loading">
            <img id="loading-image" src="{{ asset('loader.gif') }}" alt="Loading..." />
        </div>
    @endif
    <div class="row" style="padding-right:10px; background: #FFFFFF;">

        <!-- user profile start -->
        <div id="5" class="show-when-target:target">
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Welcome to Your Profile: {{ $user->name }},
                </div>
                @include('layouts.sidebar')

                <div class="col-md-10  mt-5 pt-5">
                    @include('partials.alert')
                    <div class="row">
                        <div class="col-md-4" style="padding-bottom:20px; color:#000;">
                            <div class="card">
                                <img src="{{ url('/images/bg/user.jpg') }}" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title"><b>User Details</b></h5>
                                    <p class="card-text"><b>Dealer Name:</b> {{ $user->dName }}</p>
                                    <p class="card-text"><b>Email:</b> {{ $user->email }}</p>
                                    <p class="card-text"><b>Phone:</b> {{ $user->number }}</p>
                                    <p class="card-text"><b>Sec Phone:</b> {{ $user->number2 }}</p>
                                    <a href="#!" class="btn btn-primary">Update</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="color:#000;">
                            <div class="card text-center">
                                <div class="card-header">Tips to Sell Quicker On Automart</div>
                                <div class="card-body">
                                    <h5 class="card-title"> Invest in Quality Product Images</h5>
                                    <p class="card-text">Given how important appearance is in relation to how we perceive
                                        things
                                        (including other people), it stands to reason that investing in quality product
                                        photography
                                        will have a similar effect on visitors to your posts.</p>
                                    <h5 class="card-title">Be Honest in Your Sales Post</h5>
                                    <p class="card-text">Not only is honesty in your post crucial to your business&apos;
                                        reputation, it also fosters and encourages trust in your brand. Don&apos;t make
                                        claims
                                        you can&apos;t substantiate, and don&apos;t use hyperbole lightly today&apos;s
                                        consumers are
                                        hypersensitive to marketing BS, so be honest, straightforward, and approachable in
                                        all your sales copy,
                                        from your homepage to your email campaigns.</p>
                                </div>
                            </div>
                            <div class="container" style="padding-bottom:20px;padding-top:30px;">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-body">Number of Cars</div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-body">Sales</div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-body">Recently added</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="mt-5 w-100 ">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>

        <!-- user profile end -->



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#car_make').on('change', function() {
                var carmake_id = this.value;

                $("#car_model").html('');
                $.ajax({
                    url: "{{ url('fetch/car-models') }}",
                    type: "POST",
                    data: {
                        car_make_id: carmake_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#car_model').html(
                            '<option value="">Select Car Model</option>');
                        result.data.forEach(model => {
                            document.querySelector('#car_model').innerHTML +=
                                '<option value="' + model
                                .id + '">' + model.name +
                                '</option>';

                        });
                    }
                });
            })
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#fileupload').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
    <script>
        // @if (session('loader'))
        //     $(window).on('load', function() {

        //         const myTimeout = setTimeout(myGreeting, 5000);

        //         function myGreeting() {
        //             $('#loading').hide();
        //         }

        //         function myStopFunction() {
        //             clearTimeout(myTimeout);
        //         }
        //     })
        // @endif
    </script>
@endsection
