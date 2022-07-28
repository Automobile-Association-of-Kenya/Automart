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
   
    color:#FFF;
    border-radius: .4em;
    background:rgba(0,0,0,.5);;
}
.show-when-target {cursor: pointer}
.show-when-target {
    display: inline-block;
    max-width: 94%;
    line-height: 2em;
    font-size: 1em;
    font-weight: bold;
    
    margin: auto;
    color:#FFF;
    border-radius: .4em;
    -webkit-box-shadow:hsl(75, 80%, 15%) 0 .38em .08em;
    box-shadow:hsl(75, 80%, 15%) 0 .38em .08em;
    text-shadow: 0 -1px 0 rgba(0,0,0,.3);
    background:#749A02;
}
</style>
  <div class="container" style="padding-left: 20px;padding-right: 20px;background-color: rgba(0,0,0, 0.6); border-radius:8px; padding-top: 10px; padding-bottom: 0px; color: #fff; ">
  <div id="0" class="show-when-target:target">
<div class="row">
<div class="alert alert-success" role="alert">
  Welcome:  {{ $admin->uName }}
</div>

  <div class="col-md-12">
  <div class="row">
  <div class="col-md-4" style="padding-bottom:20px; color:#000;">
  <div class="card">
  <img src="{{ url('public/images/bg/user.jpg') }}" class="card-img-top" alt="Fissure in Sandstone"/>
  <div class="card-body">
    <h5 class="card-title"><b>User Details</b></h5>
    <p class="card-text"><b>Admin Name:</b> {{ $admin->uName }}</p>
    <p class="card-text"><b>Email:</b> {{ $admin->email }}</p>
    <a href="#!" class="btn btn-primary">Update</a>
  </div>
</div>
  </div>
  <div class="col-md-8" style="color:#000;">
<div class="container" style="padding-bottom:20px;padding-top:10px;">

<div class="row">
    <div class="col-md">
    <div class="card">
  <div class="card-body">Dealers</div>
  <div class="card-body"><b><h4>0</h4></b></div>
</div>
    </div>
    <div class="col-md">
    <div class="card">
  <div class="card-body">Users</div>
  <div class="card-body"><b><h4>0</h4></b></div>
</div>
    </div>
    <div class="col-md">
    <div class="card">
  <div class="card-body">Total Revenue</div>
  <div class="card-body"><b><h4>Ksh. 0</h4></b></div>
</div>
    </div>
  </div>
  <br>


  <div class="row">
    <div class="col-md">
    <div class="card">
  <div class="card-body">Number of Cars</div>
  <div class="card-body"><b><h4>0</h4></b></div>
</div>
    </div>
    <div class="col-md">
    <div class="card">
  <div class="card-body">Revenue Today</div>
  <div class="card-body"><b><h4>Ksh. 0</h4></b></div>
</div>
    </div>
    <div class="col-md">
    <div class="card">
  <div class="card-body">ff</div>
</div>
    </div>
  </div>
</div>
</div>

  </div>
</div>
  </div>
</div>
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