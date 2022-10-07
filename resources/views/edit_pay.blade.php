@extends('layouts.admin')
@section('content')
  <!-- show success message -->
  @if (session('successMsg'))
      <div class="alert alert-success" role="alert">
          {{ session('successMsg') }}
      </div>
        @endif
<!-- show error messages -->
  @if ($errors->any())
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
         @endforeach
  @endif

  <div class="container" style="padding-left: 20px;padding-right: 20px;background-color: rgba(0,0,0, 0.6); border-radius:8px; padding-top: 10px; padding-bottom: 0px; color: #fff; ">
  <div id="0" class="show-when-target:target">
<div class="row">
  <div class="col-md-12">
  <div class="row" style="padding-top: 20px; border-radius:10px; padding-right: 10px; padding-left:10px;">
  <div class="col-3" style="text-align: right;">
    #
  </div>
  <div class="col-6">
  <div class="col-md" style="background-color: rgba(255, 255, 255, 0.7); padding-top: 20px; border-radius:10px; padding-right: 10px; padding-left:10px;">
    <span class="badge bg-info" style="width: 100%; padding-top:10px;padding-bottom:10px; background-color: rgba(0, 0, 0, 0.9) !Important;">ADD NEW PAYMENT PACKAGE</span>
    <form action="{{ route('update_pay',[$pay->id, $admin->id]) }}" method="POST">
    {{ csrf_field() }}

  <div class="row" style="padding-bottom:15px; padding-top:px; padding-right: 10px; padding-left:10px">
  <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
    <input id="name" class="form-control" type="text" name="name" value="{{ $pay->name }}" placeholder="Package Name" required>
  </div>  
  <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
    <input id="amount" class="form-control" type="number" name="amount" value="{{ $pay->amount }}" placeholder="Package Amount" required>
  </div>  
  <div class="form-outline" style="padding-top:10px; padding-bottom:15px;">
  <textarea class="form-control" placeholder="Package Description." id="description" name="description" rows="3" style="background: #fff;" required>{{ $pay->description }}</textarea>
  <label class="form-label" for="description">Package Description</label>
</div>
  <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
    <input id="duration" class="form-control" type="text" name="duration" value="{{ $pay->duration }}" placeholder="Package Duration e.g 3 Months" required>
  </div> 
  <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
  <input
    class="form-control"
    id="formControlDisabled"
    type="text"
    name="posted_by"
    value="{{ $admin->uName }}"
    placeholder="Disabled input"
    aria-label="disabled input example"
    disabled
  />
  <!-- <label class="form-label" for="formControlDisabled">{{ $admin->uName }}</label> -->
</div>
</div>
  <!-- Submit button -->
  <div style="padding-right: 10px; padding-left:10px; padding-bottom: 10px;">
  <button type="submit" class="btn btn-primary btn-block mb-4"><h6>Add Package</h6></button>
  </div>
  
  </form>
    </div>
  </div>
  <div class="col-3">
    #
  </div>
</div>
<br>
</div>
<div>
<footer class="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0,0,0, 0.5); border-radius: 10px;">
    © 2022 Copyright:
    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
<!-- end dash -->
@endsection