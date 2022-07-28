@extends('layouts.admin')
@section('content')
  <!-- show success message -->
  @if (session('successMsg')) 
      <div class="alert alert-success" role="alert">
          {{ session('successMsg') }}
      </div>
        @endif
        @if (session('errorMsg'))
      <div class="alert alert-danger" role="alert">
          {{ session('errorMsg') }}
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
  <div class="row">
  <div class="col-md-12" style="color:#000;">
<div class="container" style="padding-bottom:20px;padding-top:10px;">
  <div class="row" style="padding-bottom:10px;padding-top:10px;">
  @if(!empty($packs) && $packs->count())
    @foreach($packs as $pack)
    <div class="col-md">
    <div class="card text-center">
  <div class="card-header">{{ $pack->name }}</div>
  <div class="card-body">
    <h5 class="card-title">Price: <b>Ksh. {{ number_format("$pack->amount",2)}}</b></h5>
    <p class="card-text">{{ $pack->description }}</p>
    <a href="{{ route('edit_pay', [$pack->id, $admin->id]) }}" class="btn btn-primary">Edit Plan</a>
    <a href="#" class="btn btn-danger" onclick="myFunction()" >Delete Plan</a>
  </div>
  <script>
    function myFunction() {
      var txt;
      var r = confirm("Are You Sure You Want To Delete This Plan?");
      if (r == true) {
        location.href = "{{ route('del_pay', [$pack->id, $admin->id]) }}";
        txt = "You pressed OK!";
      } else {
        txt = "You pressed Cancel!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
</script>
  <div class="card-footer text-muted">Post Duration: {{ $pack->duration }}</div>
</div>
    </div>
    @endforeach
    @else
  <div class="alert alert-success" role="alert">
         Sorry. No Records Found.
  </div>
@endif
</div>
  <br>
  <a href="{{ route('add_pay',$admin->id) }}" class="btn btn-primary">New Plan</a>
</div>
  </div>
</div>
  </div>
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