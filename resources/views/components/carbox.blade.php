<div class="col-lg-3 col-md-6">
    <div class="car-box-3">

        <div class="car-thumbnail">
            <a href="{{ url('/vehicle/' . $vehicle_no) }}" class="car-img">
                <div class="for">{{ $item->usage }}</div>
                <div class="price-box">
                    <span>Kes: {{ number_format($item->price, 2) }}</span>
                </div>
                <img class="d-block w-100"
                    src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}" alt="car">
            </a>
        </div>

        <div class="detail text-center">
            <h1 class="title">
                <a class="text-success"
                    href="{{ url('/vehicle/' . $vehicle_no) }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
            </h1>
            <ul class="custom-list">

                <li>
                    <a href="{{ url('/vehicle/' . $vehicle_no) }}">{{ $item->usage }}</a>
                    &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                </li>
                <li>
                    <a href="#">{{ $item->fuel_type }}</a>
                </li>

            </ul>

            <ul class="custom-list">
                <li>
                    <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km &nbsp;|&nbsp;
                </li>
                <li>
                    <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                </li>
            </ul>
        </div>

        <div class="footer">
            <div class="buttons mb-2 text-center">
                <a href="#" class="btn btn-success btn-sm mt-2" id="whatsappToggle"
                    data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp;
                    Enquire</a>
                <a href="{{ route('buy', $vehicle_no) }}"
                    class="btn btn-success btn-sm mt-2"><i class="fa fa-hand"></i> Buy</a>
                <a href="{{ route('loan', $vehicle_no) }}"
                    class="btn btn-success btn-sm mt-2"><i class="fa fa-"></i>
                    Apply
                    Loan</a>
            </div>
        </div>
    </div>
    </div>
