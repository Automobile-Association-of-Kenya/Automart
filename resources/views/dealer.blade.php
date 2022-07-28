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
<div class="row" style="padding-right:10px">

<!-- user profile start -->
<div id="5" class="show-when-target:target">
<div class="row">
<div class="alert alert-success" role="alert">
  Welcome to Your Profile:  {{ $user->name }},
</div>
<div class="col-md-2"> 
<div class="col-md-12">
<a href="#5"><button type="submit" class="btn btn-primary btn-block">Home</button></a>
</div>
</br>  
<div class="col-md-12">
<a href="#0"><button type="submit" class="btn btn-primary btn-block">My Cars</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#1"><button type="submit" class="btn btn-primary btn-block">Subscriptions</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#2"><button type="submit" class="btn btn-primary btn-block">My Sells</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#3"><button type="submit" class="btn btn-primary btn-block">Add Car</button></a>
</div>
</br>
<div class="col-md-12">
<a href="{{ route('logout')}}"><button type="submit" class="btn btn-danger btn-block">Logout</button></a>
</div>
</br>
  </div>
  <div class="col-md-10">
  <div class="row">
  <div class="col-md-4" style="padding-bottom:20px; color:#000;">
  <div class="card">
  <img src="{{ url('public/images/bg/user.jpg') }}" class="card-img-top" alt="Fissure in Sandstone"/>
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
  <div class="card-header">Tips to Sell Quicker On Gariweza</div>
  <div class="card-body">
  <h5 class="card-title"> Invest in Quality Product Images</h5>
  <p class="card-text">Given how important appearance is in relation to how we perceive things 
    (including other people), it stands to reason that investing in quality product photography 
    will have a similar effect on visitors to your posts.</p>
    <h5 class="card-title">Be Honest in Your Sales Post</h5>
    <p class="card-text">Not only is honesty in your post crucial to your business&apos; 
      reputation, it also fosters and encourages trust in your brand. Don&apos;t make claims 
      you can&apos;t substantiate, and don&apos;t use hyperbole lightly today&apos;s consumers are
       hypersensitive to marketing BS, so be honest, straightforward, and approachable in all your sales copy, 
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
  <div class="card-body">Sells</div>
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
<footer class="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0,0,0, 0.5); border-radius: 10px;">
    © 2021 Copyright:
    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
  </div>
  <!-- Copyright -->
</footer>
</div>

<!-- user profile end -->

<!-- all cars tab start -->
<div id="0" class="show-when-target" style="background-color : rgba(0,0,0, 1) !Important;">
<div class="row" style="padding-bottom: 0px;">
<div class="alert alert-success" role="alert">
All cars under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone: {{ $user->number }}
</div>
<div class="col-md-2">
<div class="col-md-12">
<a href="#5"><button type="submit" class="btn btn-primary btn-block">Home</button></a>
</div>
</br> 
<div class="col-md-12">
<a href="#0"><button type="submit" class="btn btn-primary btn-block">My Cars</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#1"><button type="submit" class="btn btn-primary btn-block">Subscriptions</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#2"><button type="submit" class="btn btn-primary btn-block">My Sells</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#3"><button type="submit" class="btn btn-primary btn-block">Add Car</button></a>
</div>
</br>
<div class="col-md-12">
<a href="{{ route('logout')}}"><button type="submit" class="btn btn-danger btn-block">Logout</button></a>
</div>
</br>
</div>
<div class="col-md-10">
Hello
</br>
</br>
</br>
</br> 
We'll show your cars here updated.
</div>
</div>
<footer class="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(255,255,255, 0.8); border-radius: 10px; color:#000;">
    © 2021 Copyright:
    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
<!-- all cars tab end -->

<!-- Subscriptions tab start -->
  <div id="1" class="show-when-target" style="background-color : rgba(0,0,0, 1) !Important;">
  <div class="row" style="padding-bottom: 0px;">
<div class="alert alert-success" role="alert">
All Subscriptions made under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone: {{ $user->number }}
</div>
<div class="col-md-2">
  <!-- sidebar -->
  <div class="col-md-12">
<a href="#5"><button type="submit" class="btn btn-primary btn-block">Home</button></a>
</div>
</br> 
<div class="col-md-12">
<a href="#0"><button type="submit" class="btn btn-primary btn-block">My Cars</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#1"><button type="submit" class="btn btn-primary btn-block">Subscriptions</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#2"><button type="submit" class="btn btn-primary btn-block">My Sells</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#3"><button type="submit" class="btn btn-primary btn-block">Add Car</button></a>
</div>
</br>
<div class="col-md-12">
<a href="{{ route('logout')}}"><button type="submit" class="btn btn-danger btn-block">Logout</button></a>
</div>
</br>
</div>
<div class="col-md-10">
Hello
</br>
</br>
</br>
</br>
We'll keep this payments updated.
</div>
</div>
<footer class="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(255,255,255, 0.8); border-radius: 10px; color:#000;">
    © 2022 Copyright:
    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
<!-- Subscriptions tab end -->

<!-- sold vehicles start -->
<div id="2" class="show-when-target" style="background-color : rgba(0,0,0, 1) !Important;">
<div class="row" style="padding-bottom: 0px;">
<div class="alert alert-success" role="alert">
All sold vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone: {{ $user->number }}
</div>
<div class="col-md-2">
  <!-- sidebar -->
  <div class="col-md-12">
<a href="#5"><button type="submit" class="btn btn-primary btn-block">Home</button></a>
</div>
</br> 
<div class="col-md-12">
<a href="#0"><button type="submit" class="btn btn-primary btn-block">My Cars</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#1"><button type="submit" class="btn btn-primary btn-block">Subscriptions</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#2"><button type="submit" class="btn btn-primary btn-block">My Sells</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#3"><button type="submit" class="btn btn-primary btn-block">Add Car</button></a>
</div>
</br>
<div class="col-md-12">
<a href="{{ route('logout')}}"><button type="submit" class="btn btn-danger btn-block">Logout</button></a>
</div>
</br>
</div>
<div class="col-md-10">
Hello
</br>
</br>
</br>
</br>
We'll keep this updated.
</div>
</div>
<footer class="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(255,255,255, 0.8); border-radius: 10px; color:#000;">
    © 2021 Copyright:
    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
<!-- sold vehicles end -->
 
<!-- add car start -->
<div id="3" class="show-when-target" style="background-color : rgba(0,100,0, 1) !Important;">
<div class="row" style="padding-bottom: 0px;">
<div class="alert alert-success" role="alert">
  All your vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone: {{ $user->number }}
</div>
<div class="col-md-2">
  <!-- sidebar -->
  <div class="col-md-12">
<a href="#5"><button type="submit" class="btn btn-primary btn-block">Home</button></a>
</div>
</br> 
<div class="col-md-12">
<a href="#0"><button type="submit" class="btn btn-primary btn-block">My Cars</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#1"><button type="submit" class="btn btn-primary btn-block">Subscriptions</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#2"><button type="submit" class="btn btn-primary btn-block">My Sells</button></a>
</div>
</br>
<div class="col-md-12">
<a href="#3"><button type="submit" class="btn btn-primary btn-block">Add Car</button></a>
</div>
</br>
<div class="col-md-12">
<a href="{{ route('logout')}}"><button type="submit" class="btn btn-danger btn-block">Logout</button></a>
</div>
</br>
</div>
<div class="col-md-10">
<div class="col-md-12" style="padding-left : 20px; padding-right : 20px;">
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
<!--upload form here -->
<form action="{{ route('savecar') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<h3 class="form-title">Enter Vehicle Information » </h3>
<label class="gt-title" for="gt-title">Your listing title</label>
<input class="form-control" type="text" id="gt-title" tabindex="2" name="title" placeholder="Enter listing title" required style="text-transform:uppercase">
<div class="row" style="padding-top: 10px; padding-bottom: 10px;">
  <div class="col-6">
    <select name="country" id="country" class="gt-select" tabindex="3" required 
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
    <option value="-1" selected="selected">Select Your Country</option>
    <option class="level-0" value="Kenya" data-value="41">Kenya</option>
    <option class="level-0" value="Tanzania" data-value="48">Tanzania</option>
    <option class="level-0" value="Uganda" data-value="48">Uganda</option>
    <option class="level-0" value="Rwanda" data-value="48">Rwanda</option>
    <option class="level-0" value="Burundi" data-value="48">Burundi</option>
    <option class="level-0" value="Other" data-value="48">Other</option></select>
  </div>
  <div class="col-6">
    <select name="county" id="county" tabindex="4" data-value="" required
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
        <option value="" data-value="-1" selected="selected">Select Your County</option>
        <option class="level-0" value="Other" data-value="48">Other</option>
        <option class="level-0" value="Nairobi" data-value="48">Nairobi</option>
        <option class="level-0" value="Mombasa" data-value="48">Mombasa</option>
        <option class="level-0" value="Kwale" data-value="48">Kwale</option>
        <option class="level-0" value="Kilifi" data-value="48">Kilifi</option>
        <option class="level-0" value="Tana River" data-value="48">Tana River</option>
        <option class="level-0" value="Lamu" data-value="48">Lamu</option>
        <option class="level-0" value="Taita–Taveta " data-value="48">Taita–Taveta </option>
        <option class="level-0" value="Garissa" data-value="48">Garissa </option>
        <option class="level-0" value="Wajir" data-value="48">Wajir </option>
        <option class="level-0" value="Mandera" data-value="48">Mandera </option>
        <option class="level-0" value="Marsabit" data-value="48">Marsabit</option>
        <option class="level-0" value="Isiolo" data-value="48">Isiolo</option>
        <option class="level-0" value="Meru" data-value="48">Meru</option>
        <option class="level-0" value="Tharaka-Nithi" data-value="48">Tharaka-Nithi</option>
        <option class="level-0" value="Embu" data-value="48">Embu</option>
        <option class="level-0" value="Kitui" data-value="48">Kitui</option>
        <option class="level-0" value="Machakos" data-value="48">Machakos </option>
        <option class="level-0" value="Makueni" data-value="48">Makueni</option>
        <option class="level-0" value="Nyandarua" data-value="48">Nyandarua</option>
        <option class="level-0" value="Nyeri" data-value="48">Nyeri</option>
        <option class="level-0" value="Kirinyaga" data-value="48">Kirinyaga</option>
        <option class="level-0" value="Murang'a" data-value="48">Murang’a </option>
        <option class="level-0" value="Kiambu" data-value="48">Kiambu</option>
        <option class="level-0" value="Turkana " data-value="48">Turkana </option>
        <option class="level-0" value="West Pokot" data-value="48">West Pokot</option>
        <option class="level-0" value="Samburu" data-value="48">Samburu</option>
        <option class="level-0" value="Trans-Nzoia" data-value="48">Trans-Nzoia </option>
        <option class="level-0" value="Uasin Gishu" data-value="48">Uasin Gishu</option>
        <option class="level-0" value="Elgeyo-Marakwet" data-value="48">Elgeyo-Marakwet</option>
        <option class="level-0" value="Nandi" data-value="48">Nandi</option>
        <option class="level-0" value="Baringo" data-value="48">Baringo </option>
        <option class="level-0" value="Laikipia" data-value="48">Laikipia </option>
        <option class="level-0" value="Nakuru" data-value="48">Nakuru </option>
        <option class="level-0" value="Narok" data-value="48">Narok </option>
        <option class="level-0" value="Kajiado" data-value="48">Kajiado </option>
        <option class="level-0" value="Kericho" data-value="48">Kericho</option>
        <option class="level-0" value="Bomet" data-value="48">Bomet</option>
        <option class="level-0" value="Kakamega" data-value="48">Kakamega </option>
        <option class="level-0" value="Vihiga" data-value="48">Vihiga </option>
        <option class="level-0" value="Bungoma" data-value="48">Bungoma</option>
        <option class="level-0" value="Busia " data-value="48">Busia</option>
        <option class="level-0" value="Siaya " data-value="48">Siaya</option>
        <option class="level-0" value="Kisumu" data-value="48">Kisumu</option>
        <option class="level-0" value="Homa Bay" data-value="48">Homa Bay</option>
        <option class="level-0" value="Migori" data-value="48">Migori</option>
        <option class="level-0" value="Kisii" data-value="48">Kisii</option>
        <option class="level-0" value="Nyamira" data-value="48">Nyamira</option>
    </select>
  </div>
</div>
<div class="row" style="padding-bottom: 10px;">
  <div class="col-6">
    <label>Make</label>
    <!-- <input class="form-control" type="text" name="make" placeholder="Enter Vehicle Make" style="text-transform:uppercase" required> -->
    <select class="" id="make_search" name="make" aria-hidden="true" style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;" required>
<option value="Any Make" selected>Select Make</option>
<option value="TOYOTA">TOYOTA</option>
<option value="NISSAN">NISSAN</option>
<option value="HONDA">HONDA</option>
<option value="MITSUBISHI">MITSUBISHI</option>
<option value="MERCEDES BENZ">MERCEDES BENZ</option>
<option value="BMW">BMW</option>
<option value="MAZDA">MAZDA</option>
<option value="SUBARU">SUBARU</option>
<option value="VOLKSWAGEN">VOLKSWAGEN</option>
<option value="SUZUKI">SUZUKI</option>
<option value="LAND ROVER">LAND ROVER</option>
<option value="AUDI">AUDI</option>
<option value="LEXUS">LEXUS</option>
<option value="CHEVROLET">CHEVROLET</option>
<option value="FERRARI">FERRARI</option>
<option value="FIAT">FIAT</option>
<option value="FORD">FORD</option>
<option value="GM">GM</option>
<option value="GMC">GMC</option>
<option value="HANIX">HANIX</option>
<option value="HINO">HINO</option>
<option value="HITACHI">HITACHI</option>
<option value="HUMMER">HUMMER</option>
<option value="HYUNDAI">HYUNDAI</option>
<option value="INFINITI">INFINITI</option>
<option value="ISEKI">ISEKI</option>
<option value="ISUZU">ISUZU</option>
<option value="JAGUAR">JAGUAR</option>
<option value="JEEP">JEEP</option>
<option value="KAWASAKI">KAWASAKI</option>
<option value="KOBELCO">KOBELCO</option>
<option value="KOMATSU">KOMATSU</option>
<option value="KUBOTA">KUBOTA</option>
<option value="LAMBORGHINI">LAMBORGHINI</option>
<option value="LANCIA">LANCIA</option>
<option value="LINCOLN">LINCOLN</option>
<option value="LOTUS">LOTUS</option>
<option value="MASERATI">MASERATI</option>
<option value="MAYBACH">MAYBACH</option>
<option value="MG">MG</option>
<option value="MINI">MINI</option>
<option value="MITSUOKA">MITSUOKA</option>
<option value="OPEL">OPEL</option>
<option value="OTHERS">OTHERS</option>
<option value="PEUGEOT">PEUGEOT</option>
<option value="PORSCHE">PORSCHE</option>
<option value="RENAULT">RENAULT</option>
<option value="ROLLS ROYCE">ROLLS ROYCE</option>
<option value="ROVER">ROVER</option>
<option value="SAAB">SAAB</option>
<option value="SMART">SMART</option>
<option value="SUMITOMO">SUMITOMO</option>
<option value="TADANO">TADANO</option>
<option value="TCM">TCM</option>
<option value="TESLA">TESLA</option>
<option value="TRIUMPH">TRIUMPH</option>
<option value="VOLVO">VOLVO</option>
<option value="WINNEBAGO">WINNEBAGO</option>
<option value="YAMAHA">YAMAHA</option>
<option value="YANMAR">YANMAR</option>
<option value="ACURA">ACURA</option>
<option value="ALFAROMEO">ALFAROMEO</option>
<option value="ASTON MARTIN">ASTON MARTIN</option>
<option value="BENTLEY">BENTLEY</option>
<option value="BMW ALPINA">BMW ALPINA</option>
<option value="CADILLAC">CADILLAC</option>
<option value="CHRYSLER">CHRYSLER</option>
<option value="CITROEN">CITROEN</option>
<option value="DAIHATSU">DAIHATSU</option>
<option value="DAIMLER">DAIMLER</option>
<option value="DODGE">DODGE</option>
</select>
  </div>
  <div class="col-6">
    <label>Model</label>
  <select class="" name="model" id="model" required aria-hidden="true"
style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;" required>
<option value="Select model" selected>Select Model</option>
<option value="147">147</option>
<option value="155">155</option>
<option value="159">159</option>
<option value="GIULIA">GIULIA</option>
<option value="GIULIETTA">GIULIETTA</option>
<option value="MITO">MITO</option>
<option value="A1">A1</option>
<option value="A3">A3</option>
<option value="A4">A4</option>
<option value="A5">A5</option>
<option value="A6">A6</option>
<option value="A7">A7</option>
<option value="A8">A8</option>
<option value="ALLROAD">ALLROAD</option>
<option value="OTHER">OTHER</option>
<option value="Q2">Q2</option>
<option value="Q3">Q3</option>
<option value="Q5">Q5</option>
<option value="Q7">Q7</option>
<option value="RS6">RS6</option>
<option value="RS7">RS7</option>
<option value="S1">S1</option>
<option value="S3">S3</option>
<option value="S4">S4</option>
<option value="S5">S5</option>
<option value="S7">S7</option>
<option value="SQ5">SQ5</option>
 <option value="TT">TT</option>
<option value="1 SERIES">1 SERIES</option>
<option value="2 SERIES">2 SERIES</option>
<option value="3 SERIES">3 SERIES</option>
<option value="4 SERIES">4 SERIES</option>
<option value="5 SERIES">5 SERIES</option>
<option value="6 SERIES">6 SERIES</option>
<option value="7 SERIES">7 SERIES</option>
<option value="8 SERIES">8 SERIES</option>
<option value="i3">i3</option>
<option value="M3">M3</option>
<option value="M4">M4</option>
<option value="M5">M5</option>
<option value="MINI">MINI</option>
<option value="OTHER">OTHER</option>
<option value="X1">X1</option>
<option value="X2">X2</option>
<option value="X3">X3</option>
<option value="X4">X4</option>
<option value="X5 SERIES">X5 SERIES</option>
<option value="X6">X6</option>
<option value="Z3 SERIES">Z3 SERIES</option>
<option value="Z4">Z4</option>
<option value="300">300</option>
<option value="300C">300C</option>
<option value="GRAND VOYAGE">GRAND VOYAGE</option>
<option value="JEEP CHEROKEE">JEEP CHEROKEE</option>
<option value="JEEP COMPASS">JEEP COMPASS</option>
<option value="JEEP GRAND CHEROKEE">JEEP GRAND CHEROKEE</option>
<option value="JEEP RENEGADE">JEEP RENEGADE</option>
<option value="JEEP WRANGLER">JEEP WRANGLER</option>
<option value="OTHER">OTHER</option>
<option value="PT CRUISER">PT CRUISER</option>
<option value="YPSILON">YPSILON</option>
<option value="C3">C3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="DS5">DS5</option>
<option value="GRAND C4">GRAND C4</option>
<option value="ATRAI SEVEN">ATRAI SEVEN</option>
<option value="ATRAI VAN">ATRAI VAN</option>
<option value="ATRAI WAGON">ATRAI WAGON</option>
<option value="BEGO">BEGO</option>
<option value="BOON">BOON</option>
<option value="CAST">CAST</option>
<option value="COO">COO</option>
<option value="COPEN">COPEN</option>
<option value="DELTA TRUCK">DELTA TRUCK</option>
<option value="ESSE">ESSE</option>
<option value="HIJET CADDIE">HIJET CADDIE</option>
<option value="HIJET TRUCK">HIJET TRUCK</option>
<option value="HIJET VAN">HIJET VAN</option>
 <option value="MAX">MAX</option>
<option value="MEBIUS">MEBIUS</option>
<option value="MIDJET II">MIDJET II</option>
<option value="MIRA">MIRA</option>
<option value="MIRA E S">MIRA E S</option>
<option value="MIRA TOCOT">MIRA TOCOT</option>
<option value="MOVE">MOVE</option>
<option value="MOVE CANBUS">MOVE CANBUS</option>
<option value="MOVE CONTE">MOVE CONTE</option>
<option value="MOVE LATTE">MOVE LATTE</option>
<option value="NAKED">NAKED</option>
<option value="OPTI">OPTI</option>
<option value="OTHER">OTHER</option>
<option value="ROCKY">ROCKY</option>
<option value="RUGGER">RUGGER</option>
<option value="SONICA">SONICA</option>
<option value="TANTO">TANTO</option>
<option value="TANTO EXE">TANTO EXE</option>
<option value="TERIOS">TERIOS</option>
<option value="TERIOS KID">TERIOS KID</option>
<option value="THOR">THOR</option>
<option value="WAKE">WAKE</option>
<option value="YRV">YRV</option>
<option value="OTHER">OTHER</option>
<option value="CHARGER">CHARGER</option>
<option value="DURANGO">DURANGO</option>
<option value="NITRO">NITRO</option>
 <option value="500">500</option>
<option value="500C">500C</option>
<option value="BARCHETTA">BARCHETTA</option>
<option value="MULTIPLA">MULTIPLA</option>
<option value="OTHER">OTHER</option>
<option value="PANDA">PANDA</option>
<option value="BRONCO">BRONCO</option>
<option value="ESCAPE">ESCAPE</option>
<option value="EXPLORER">EXPLORER</option>
<option value="FIESTA">FIESTA</option>
<option value="LINCOLN">LINCOLN</option>
<option value="LINCOLN NAVIGATOR">LINCOLN NAVIGATOR</option>
<option value="MUSTANG">MUSTANG</option>
<option value="OTHER">OTHER</option>
<option value="BUICK REGAL">BUICK REGAL</option>
<option value="CADILLAC CTS">CADILLAC CTS</option>
<option value="CADILLAC ESCALADE">CADILLAC ESCALADE</option>
<option value="CADILLAC SRX">CADILLAC SRX</option>
<option value="CHEVROLET CAMARO">CHEVROLET CAMARO</option>
<option value="CHEVROLET SUBURBAN">CHEVROLET SUBURBAN</option>
<option value="GMC YUKON">GMC YUKON</option>
<option value="OTHER">OTHER</option>
<option value="DUTORO">DUTORO</option>
<option value="LIESSE">LIESSE</option>
<option value="OTHER">OTHER</option>
 <option value="PROFIA">PROFIA</option>
<option value="RAINBOW">RAINBOW</option>
<option value="RANGER">RANGER</option>
<option value="SEREGA">SEREGA</option>
<option value="TRUCK">TRUCK</option>
<option value="OTHER">OTHER</option>
<option value="ACCORD">ACCORD</option>
<option value="ACCORD WAGON">ACCORD WAGON</option>
<option value="ACTY TRUCK">ACTY TRUCK</option>
<option value="ACTY VAN">ACTY VAN</option>
<option value="AIRWAVE">AIRWAVE</option>
<option value="AVANCIER">AVANCIER</option>
<option value="CITY">CITY</option>
<option value="CIVIC">CIVIC</option>
<option value="CIVIC COUPE">CIVIC COUPE</option>
<option value="CIVIC HYBRID">CIVIC HYBRID</option>
<option value="CR-V">CR-V</option>
<option value="CR-Z">CR-Z</option>
<option value="CROSSROAD">CROSSROAD</option>
<option value="EDIX">EDIX</option>
<option value="ELEMENT">ELEMENT</option>
<option value="ELYSION">ELYSION</option>
<option value="FIT">FIT</option>
<option value="FIT SHUTTLE">FIT SHUTTLE</option>
<option value="FREED">FREED</option>
<option value="FREED SPIKE">FREED SPIKE</option>
 <option value="GRACE">GRACE</option>
<option value="HR-V">HR-V</option>
<option value="INSIGHT">INSIGHT</option>
<option value="INSPIRE">INSPIRE</option>
<option value="INTEGRA">INTEGRA</option>
<option value="JADE">JADE</option>
<option value="LEGEND">LEGEND</option>
<option value="LIFE">LIFE</option>
<option value="LIFE DUNK">LIFE DUNK</option>
<option value="MOBILIO">MOBILIO</option>
<option value="N BOX">N BOX</option>
<option value="N BOX PLUS">N BOX PLUS</option>
<option value="N BOX SLASH">N BOX SLASH</option>
<option value="N BOX+">N BOX+</option>
<option value="N ONE">N ONE</option>
<option value="N VAN">N VAN</option>
<option value="N WGN">N WGN</option>
<option value="NSX">NSX</option>
<option value="ODYSSEY">ODYSSEY</option>
<option value="ORTHIA">ORTHIA</option>
<option value="OTHER">OTHER</option>
<option value="PARTNER">PARTNER</option>
<option value="PRELUDE">PRELUDE</option>
<option value="S-MX">S-MX</option>
<option value="S2000">S2000</option>
<option value="S660">S660</option>
<option value="SHUTTLE">SHUTTLE</option>
 <option value="SPIKE">SPIKE</option>
<option value="STEP WAGON">STEP WAGON</option>
<option value="STREAM">STREAM</option>
<option value="STREET">STREET</option>
<option value="THATS">THATS</option>
<option value="TODAY">TODAY</option>
<option value="TODAY VAN">TODAY VAN</option>
<option value="TORNEO">TORNEO</option>
<option value="VAMOS">VAMOS</option>
<option value="VEZEL">VEZEL</option>
<option value="Z">Z</option>
<option value="ZEST">ZEST</option>
<option value="OTHER">OTHER</option>
<option value="BIGHORN">BIGHORN</option>
<option value="COMO">COMO</option>
<option value="ELF">ELF</option>
<option value="FARGO VAN">FARGO VAN</option>
<option value="FORWARD">FORWARD</option>
<option value="GALA">GALA</option>
<option value="GIGA">GIGA</option>
<option value="JUSTON">JUSTON</option>
<option value="MU">MU</option>
<option value="OTHER">OTHER</option>
<option value="PIAZZA">PIAZZA</option>
<option value="TRUCK">TRUCK</option>
<option value="WIZARD">WIZARD</option>
<option value="F-PACE">F-PACE</option>
<option value="X TYPE">X TYPE</option>
<option value="XF SERIES">XF SERIES</option>
<option value="XJ SERIES">XJ SERIES</option>
<option value="BAYOU">BAYOU</option>
<option value="WHEELLOADER">WHEELLOADER</option>
<option value="OTHER">OTHER</option>
<option value="FORKLIFT">FORKLIFT</option>
<option value="OTHER">OTHER</option>
<option value="WHEELLOADER">WHEELLOADER</option>
<option value="OTHER">OTHER</option>
<option value="HURACAN">HURACAN</option>
<option value="OTHER">OTHER</option>
<option value="DEFENDER">DEFENDER</option>
<option value="CT">CT</option>
<option value="ES250">ES250</option>
<option value="GS">GS</option>
<option value="HS">HS</option>
<option value="IS">IS</option>
<option value="LC">LC</option>
<option value="LEXUA UX">LEXUA UX</option>
<option value="LS">LS</option>
<option value="LX">LX</option>
<option value="NX">NX</option>
<option value="RC">RC</option>
<option value="RC F">RC F</option>
<option value="RX">RX</option>
 <option value="SC">SC</option>
<option value="GHIBLI">GHIBLI</option>
<option value="LEVANTE">LEVANTE</option>
<option value="QUATTROPORTE">QUATTROPORTE</option>
<option value="6">6</option>
<option value="ATENZA SEDAN">ATENZA SEDAN</option>
<option value="ATENZA SPORT">ATENZA SPORT</option>
<option value="ATENZA WAGON">ATENZA WAGON</option>
<option value="AXELA">AXELA</option>
<option value="AZ WAGON">AZ WAGON</option>
<option value="AZ-OFFROAD">AZ-OFFROAD</option>
<option value="BIANTE">BIANTE</option>
<option value="BONGO">BONGO</option>
<option value="BONGO BRAWNY AFT">BONGO BRAWNY AFT</option>
<option value="BONGO BRAWNY TRUCK">BONGO BRAWNY TRUCK</option>
<option value="BONGO BRAWNY VAN">BONGO BRAWNY VAN</option>
<option value="BONGO FRIENDEE">BONGO FRIENDEE</option>
<option value="BONGO VAN">BONGO VAN</option>
<option value="BONGO WAGON">BONGO WAGON</option>
<option value="CAROL">CAROL</option>
<option value="CX-3">CX-3</option>
<option value="CX-5">CX-5</option>
<option value="CX-7">CX-7</option>
<option value="CX-8">CX-8</option>
<option value="DEMIO">DEMIO</option>
<option value="FAMILIA">FAMILIA</option>
 <option value="FAMILIA S WAGON">FAMILIA S WAGON</option>
<option value="FAMILIA VAN">FAMILIA VAN</option>
<option value="FLAIR">FLAIR</option>
<option value="FLAIR WAGON">FLAIR WAGON</option>
<option value="LAPUTA">LAPUTA</option>
<option value="MAZDA3">MAZDA3</option>
<option value="MPV">MPV</option>
<option value="PORTER-CAB">PORTER-CAB</option>
<option value="PREMACY">PREMACY</option>
<option value="ROADSTER">ROADSTER</option>
<option value="RX-7">RX-7</option>
<option value="RX-8">RX-8</option>
<option value="SCRUM">SCRUM</option>
<option value="SCRUM TRUCK">SCRUM TRUCK</option>
<option value="SPIANO">SPIANO</option>
<option value="TITAN">TITAN</option>
<option value="TRIBUTE">TRIBUTE</option>
<option value="VERISA">VERISA</option>
<option value="A CLASS">A CLASS</option>
<option value="AMG">AMG</option>
<option value="B CLASS">B CLASS</option>
<option value="C CLASS">C CLASS</option>
<option value="C CLASS WAGON">C CLASS WAGON</option>
<option value="CL CLASS">CL CLASS</option>
<option value="CLA CLASS">CLA CLASS</option>
<option value="CLK CLASS">CLK CLASS</option>
 <option value="CLS">CLS</option>
<option value="E CLASS">E CLASS</option>
<option value="E CLASS WAGON">E CLASS WAGON</option>
<option value="G CLASS">G CLASS</option>
<option value="GLA CLASS">GLA CLASS</option>
<option value="GLC CLASS">GLC CLASS</option>
<option value="GLS">GLS</option>
<option value="ML CLASS">ML CLASS</option>
<option value="OTHER">OTHER</option>
<option value="S CLASS">S CLASS</option>
<option value="SL SERIES">SL SERIES</option>
<option value="SLC">SLC</option>
<option value="SLK CLASS">SLK CLASS</option>
<option value="V CLASS">V CLASS</option>
<option value="VANEO">VANEO</option>
<option value="VIANO">VIANO</option>
<option value="AERO QUENN">AERO QUENN</option>
<option value="AIRTREK">AIRTREK</option>
<option value="CANTER">CANTER</option>
<option value="CHARIOT">CHARIOT</option>
<option value="CHARIOT GRANDIS">CHARIOT GRANDIS</option>
<option value="COLT">COLT</option>
<option value="COLT PLUS">COLT PLUS</option>
<option value="DELICA">DELICA</option>
<option value="DELICA D2">DELICA D2</option>
<option value="DELICA D5">DELICA D5</option>
 <option value="DELICA TRUCK">DELICA TRUCK</option>
<option value="DINGO">DINGO</option>
<option value="DION">DION</option>
<option value="ECLIPSE">ECLIPSE</option>
<option value="ECLIPSE CROSS">ECLIPSE CROSS</option>
<option value="EK ACTIVE">EK ACTIVE</option>
<option value="EK CUSTOM">EK CUSTOM</option>
<option value="EK SPACE">EK SPACE</option>
<option value="EK SPORTS">EK SPORTS</option>
<option value="EK WAGON">EK WAGON</option>
<option value="EK X">EK X</option>
<option value="FORKLIFT">FORKLIFT</option>
<option value="FUSO FIGHTER">FUSO FIGHTER</option>
<option value="FUSO TRUCK">FUSO TRUCK</option>
<option value="GALANT">GALANT</option>
<option value="GALANT FORTIS">GALANT FORTIS</option>
<option value="GRANDIS">GRANDIS</option>
<option value="GREAT">GREAT</option>
<option value="GTO">GTO</option>
<option value="I">I</option>
<option value="I-MIEV">I-MIEV</option>
<option value="JEEP">JEEP</option>
<option value="LANCER">LANCER</option>
<option value="LANCER VAN">LANCER VAN</option>
<option value="LEGNUM">LEGNUM</option>
<option value="MINICA">MINICA</option>
 <option value="MINICAB TRUCK">MINICAB TRUCK</option>
<option value="MINICAB VAN">MINICAB VAN</option>
<option value="MINIKA TOPPO">MINIKA TOPPO</option>
<option value="MIRAGE">MIRAGE</option>
<option value="MITUBISHI">MITUBISHI</option>
<option value="OTHER">OTHER</option>
<option value="OUTLANDER">OUTLANDER</option>
<option value="OUTLANDER PHEV">OUTLANDER PHEV</option>
<option value="PAJERO">PAJERO</option>
<option value="PAJERO IO">PAJERO IO</option>
<option value="PAJERO JR">PAJERO JR</option>
<option value="PAJERO MINI">PAJERO MINI</option>
<option value="ROSA">ROSA</option>
<option value="RVR">RVR</option>
<option value="SUPER GREAT">SUPER GREAT</option>
<option value="TOPPO">TOPPO</option>
<option value="TOPPO BJ">TOPPO BJ</option>
<option value="TOPPO BJ VAN">TOPPO BJ VAN</option>
<option value="TOWNBOX">TOWNBOX</option>
<option value="WHEELLOADER">WHEELLOADER</option>
<option value="NOUERA">NOUERA</option>
<option value="VIEWT">VIEWT</option>
<option value="180 SX">180 SX</option>
<option value="AD">AD</option>
<option value="ATLAS">ATLAS</option>
<option value="AVENIR WAGON">AVENIR WAGON</option>
<option value="BASSARA">BASSARA</option>
<option value="BIGTHUMB">BIGTHUMB</option>
<option value="BLUEBIRD">BLUEBIRD</option>
<option value="BLUEBIRD SYLPHY">BLUEBIRD SYLPHY</option>
<option value="BUS">BUS</option>
<option value="CARAVAN">CARAVAN</option>
<option value="CARAVAN BUS">CARAVAN BUS</option>
<option value="CARAVAN VAN">CARAVAN VAN</option>
<option value="CEDRIC">CEDRIC</option>
<option value="CEDRIC WAGON">CEDRIC WAGON</option>
<option value="CEFIRO">CEFIRO</option>
<option value="CIMA">CIMA</option>
<option value="CIVILIAN">CIVILIAN</option>
<option value="CLIPPER RIO">CLIPPER RIO</option>
<option value="CLIPPER TRUCK">CLIPPER TRUCK</option>
<option value="CLIPPER VAN">CLIPPER VAN</option>
<option value="CONDOR">CONDOR</option>
<option value="CUBE">CUBE</option>
<option value="CUBECUBIC">CUBECUBIC</option>
<option value="DATSUN PICKUP">DATSUN PICKUP</option>
<option value="DAYZ">DAYZ</option>
<option value="DAYZ ROOX">DAYZ ROOX</option>
<option value="DUALIS">DUALIS</option>
<option value="ELGRAND">ELGRAND</option>
<option value="EXPERT">EXPERT</option>
 <option value="FAIRLADYZ">FAIRLADYZ</option>
<option value="FORKLIFT">FORKLIFT</option>
<option value="FUGA">FUGA</option>
<option value="GLORIA">GLORIA</option>
<option value="GT-R">GT-R</option>
<option value="HOMY CORCH">HOMY CORCH</option>
<option value="INFINITI Q45">INFINITI Q45</option>
<option value="JUKE">JUKE</option>
<option value="KIX">KIX</option>
<option value="LAFESTA">LAFESTA</option>
<option value="LARGO">LARGO</option>
<option value="LATIO">LATIO</option>
<option value="LAUREL">LAUREL</option>
<option value="LEAF">LEAF</option>
<option value="LEOPARD">LEOPARD</option>
<option value="LIBERTY">LIBERTY</option>
<option value="MARCH">MARCH</option>
<option value="MICRA">MICRA</option>
<option value="MOCO">MOCO</option>
<option value="MURANO">MURANO</option>
<option value="NOTE">NOTE</option>
<option value="NV200">NV200</option>
<option value="OTHER">OTHER</option>
<option value="OTTI">OTTI</option>
<option value="PAO">PAO</option>
<option value="PINO">PINO</option>
<option value="PRESAGE">PRESAGE</option>
 <option value="PRESEA">PRESEA</option>
<option value="PRESIDENT">PRESIDENT</option>
<option value="PRIMERA">PRIMERA</option>
<option value="PRIMERA WAGON">PRIMERA WAGON</option>
<option value="PULSAR">PULSAR</option>
<option value="PULSAR SERIES">PULSAR SERIES</option>
<option value="RASHEEN">RASHEEN</option>
<option value="ROOX">ROOX</option>
<option value="SAFARI">SAFARI</option>
<option value="SERENA">SERENA</option>
<option value="SILVIA">SILVIA</option>
<option value="SKYLINE">SKYLINE</option>
<option value="SKYLINE CROSSOVER">SKYLINE CROSSOVER</option>
<option value="STAGEA">STAGEA</option>
<option value="SUNNY">SUNNY</option>
<option value="SUNNY TRUCK">SUNNY TRUCK</option>
<option value="TEANA">TEANA</option>
<option value="TERRANO">TERRANO</option>
<option value="TERRANO REGULUS">TERRANO REGULUS</option>
<option value="TIIDA">TIIDA</option>
<option value="TIIDA LATIO">TIIDA LATIO</option>
<option value="TRUCK">TRUCK</option>
<option value="UD SERIES">UD SERIES</option>
<option value="VANETTE TRUCK">VANETTE TRUCK</option>
<option value="VANETTE VAN">VANETTE VAN</option>
 <option value="WINGROAD">WINGROAD</option>
<option value="X-TRAIL">X-TRAIL</option>
<option value="VECTRA WAGON">VECTRA WAGON</option>
<option value="AICHI">AICHI</option>
<option value="BOMAG">BOMAG</option>
<option value="CAT">CAT</option>
<option value="CAT WHEELLOADER">CAT WHEELLOADER</option>
<option value="DENYO">DENYO</option>
<option value="FJ CURISER">FJ CURISER</option>
<option value="FORWARD">FORWARD</option>
<option value="FUJI">FUJI</option>
<option value="FURUKAWA">FURUKAWA</option>
<option value="FURUKAWA WHEELLOADER">FURUKAWA WHEELLOADER</option>
<option value="GIGA">GIGA</option>
<option value="HANTA">HANTA</option>
<option value="HOKUETSU">HOKUETSU</option>
<option value="IHI">IHI</option>
<option value="IWAFUJI">IWAFUJI</option>
<option value="IWATA">IWATA</option>
<option value="JOURNEY">JOURNEY</option>
<option value="KATO">KATO</option>
<option value="MAEDA">MAEDA</option>
<option value="MEIWA">MEIWA</option>
<option value="MIKASA">MIKASA</option>
<option value="MIRA E:S">MIRA E:S</option>
<option value="MOROOKA">MOROOKA</option>
<option value="NICHIYU FORKLIFT">NICHIYU FORKLIFT</option>
<option value="NIPPON SHARYO">NIPPON SHARYO</option>
<option value="NPK">NPK</option>
<option value="OTHER">OTHER</option>
<option value="OTHER JAPAN">OTHER JAPAN</option>
<option value="RX">RX</option>
<option value="SAKAI">SAKAI</option>
<option value="SIENNA">SIENNA</option>
<option value="TAIKYOKU">TAIKYOKU</option>
<option value="US PRIUS">US PRIUS</option>
<option value="1007">1007</option>
<option value="2008">2008</option>
<option value="206">206</option>
<option value="207">207</option>
<option value="208">208</option>
<option value="3008">3008</option>
<option value="306">306</option>
<option value="307">307</option>
<option value="308">308</option>
<option value="407">407</option>
<option value="5008">5008</option>
<option value="508">508</option>
<option value="OTHER">OTHER</option>
<option value="RCZ">RCZ</option>
<option value="911">911</option>
<option value="CAYENNE">CAYENNE</option>
 <option value="CAYMAN">CAYMAN</option>
<option value="MACAN">MACAN</option>
<option value="PANAMERA">PANAMERA</option>
<option value="OTHER">OTHER</option>
<option value="CAPTUR">CAPTUR</option>
<option value="KANGOO">KANGOO</option>
<option value="LUTECIA">LUTECIA</option>
<option value="MEGANE">MEGANE</option>
<option value="TWINGO">TWINGO</option>
<option value="DEFENDER">DEFENDER</option>
<option value="DISCOVERY">DISCOVERY</option>
<option value="FREELANDER">FREELANDER</option>
<option value="MINI">MINI</option>
<option value="RANGE ROVER">RANGE ROVER</option>
<option value="9-3 SERIES">9-3 SERIES</option>
<option value="9-5 SERIES">9-5 SERIES</option>
<option value="FORFOUR">FORFOUR</option>
<option value="FORTWO">FORTWO</option>
<option value="SMART">SMART</option>
<option value="ALCYONE SVX">ALCYONE SVX</option>
<option value="BRZ">BRZ</option>
<option value="DEX">DEX</option>
<option value="EXIGA">EXIGA</option>
<option value="FORESTER">FORESTER</option>
<option value="GOLF ALLTRACK">GOLF ALLTRACK</option>
<option value="IMPREZA">IMPREZA</option>
 <option value="IMPREZA G4">IMPREZA G4</option>
<option value="JUSTY">JUSTY</option>
<option value="LEGACY">LEGACY</option>
<option value="LEGACY B4">LEGACY B4</option>
<option value="LEVORG">LEVORG</option>
<option value="LUCRA">LUCRA</option>
<option value="OUTBACK">OUTBACK</option>
<option value="PLEO">PLEO</option>
<option value="PLEO PLUS">PLEO PLUS</option>
<option value="R1">R1</option>
<option value="R2">R2</option>
<option value="SAMBAR">SAMBAR</option>
<option value="STELLA">STELLA</option>
<option value="TRAVIQ">TRAVIQ</option>
<option value="TREZIA">TREZIA</option>
<option value="VIVIO">VIVIO</option>
<option value="WRX">WRX</option>
<option value="XV">XV</option>
<option value="FORKLIFT">FORKLIFT</option>
<option value="OTHER">OTHER</option>
<option value="AERIO">AERIO</option>
<option value="ALTO">ALTO</option>
<option value="ALTO ECO">ALTO ECO</option>
<option value="ALTO LAPIN">ALTO LAPIN</option>
<option value="ALTO VAN">ALTO VAN</option>
<option value="BALENO">BALENO</option>
<option value="CAPTINO">CAPTINO</option>
 <option value="CARRY TRUCK">CARRY TRUCK</option>
<option value="CERVO">CERVO</option>
<option value="CERVO CLASSIC">CERVO CLASSIC</option>
<option value="CHEVROLET CRUZE">CHEVROLET CRUZE</option>
<option value="CHEVROLET MW">CHEVROLET MW</option>
<option value="ESCUDO">ESCUDO</option>
<option value="EVERY">EVERY</option>
<option value="EVERY LANDY">EVERY LANDY</option>
<option value="EVERY WAGON">EVERY WAGON</option>
<option value="HUSTLER">HUSTLER</option>
<option value="IGNIS">IGNIS</option>
<option value="JIMNY">JIMNY</option>
<option value="JIMNY SIERRA">JIMNY SIERRA</option>
<option value="JIMNY WIDE">JIMNY WIDE</option>
<option value="KEI">KEI</option>
<option value="LANDY">LANDY</option>
<option value="MIGHTY BOY">MIGHTY BOY</option>
<option value="MRWAGON">MRWAGON</option>
<option value="OTHER">OTHER</option>
<option value="PALETTE">PALETTE</option>
<option value="SOLIO">SOLIO</option>
<option value="SPACIA">SPACIA</option>
<option value="SPACIA GEAR">SPACIA GEAR</option>
<option value="SPLASH">SPLASH</option>
<option value="SWIFT">SWIFT</option>
<option value="SX-4">SX-4</option>
<option value="TWIN">TWIN</option>
<option value="WAGON R">WAGON R</option>
<option value="XBEE">XBEE</option>
<option value="OTHER">OTHER</option>
<option value="BOBCAT">BOBCAT</option>
<option value="FORKLIFT">FORKLIFT</option>
<option value="WHEELLOADER">WHEELLOADER</option>
<option value="86">86</option>
<option value="ALLEX">ALLEX</option>
<option value="ALLION">ALLION</option>
<option value="ALPHARD">ALPHARD</option>
<option value="ALTEZZA">ALTEZZA</option>
<option value="ALTEZZA WAGON">ALTEZZA WAGON</option>
<option value="AQUA">AQUA</option>
<option value="ARISTO">ARISTO</option>
<option value="AURIS">AURIS</option>
<option value="AVENSIS SEDAN">AVENSIS SEDAN</option>
<option value="AVENSIS WAGON">AVENSIS WAGON</option>
<option value="BB">BB</option>
<option value="BELTA">BELTA</option>
<option value="BLADE">BLADE</option>
<option value="BREVIS">BREVIS</option>
<option value="C-HR">C-HR</option>
<option value="CALDINA">CALDINA</option>
<option value="CAMI">CAMI</option>
<option value="CAMRY">CAMRY</option>
 <option value="CARINA">CARINA</option>
<option value="CELICA">CELICA</option>
<option value="CELSIOR">CELSIOR</option>
<option value="CENTURY">CENTURY</option>
<option value="CHASER">CHASER</option>
<option value="COASTER">COASTER</option>
<option value="COMS">COMS</option>
<option value="COPEN">COPEN</option>
<option value="COROLLA">COROLLA</option>
<option value="COROLLA AXIO">COROLLA AXIO</option>
<option value="COROLLA FIELDER">COROLLA FIELDER</option>
<option value="COROLLA LEVIN">COROLLA LEVIN</option>
<option value="COROLLA RUMION">COROLLA RUMION</option>
<option value="COROLLA RUNX">COROLLA RUNX</option>
<option value="COROLLA SPACIO">COROLLA SPACIO</option>
<option value="COROLLA SPORT">COROLLA SPORT</option>
<option value="COROLLA TOURING WAGON">COROLLA TOURING WAGON</option>
<option value="COROLLA VAN">COROLLA VAN</option>
<option value="CORONA PREMIO">CORONA PREMIO</option>
<option value="CORSA">CORSA</option>
<option value="CRESTA">CRESTA</option>
<option value="CROWN">CROWN</option>
<option value="CROWN COMFORT">CROWN COMFORT</option>
<option value="CROWN ESTATE">CROWN ESTATE</option>
<option value="CROWN WAGON">CROWN WAGON</option>
 <option value="DUET">DUET</option>
<option value="DYNA">DYNA</option>
<option value="ESQUIRE">ESQUIRE</option>
<option value="ESTIMA">ESTIMA</option>
<option value="ESTIMA HYBRID">ESTIMA HYBRID</option>
<option value="FJ CRUISER">FJ CRUISER</option>
<option value="FORKLIFT">FORKLIFT</option>
<option value="FUNCARGO">FUNCARGO</option>
<option value="GAIA">GAIA</option>
<option value="GRANVIA">GRANVIA</option>
<option value="HARRIER">HARRIER</option>
<option value="HIACE">HIACE</option>
<option value="HIACE REGIUS">HIACE REGIUS</option>
<option value="HIACE TRUCK">HIACE TRUCK</option>
<option value="HIACE VAN">HIACE VAN</option>
<option value="HILUX">HILUX</option>
<option value="HILUX SURF">HILUX SURF</option>
<option value="IPSUM">IPSUM</option>
<option value="IQ">IQ</option>
<option value="ISIS">ISIS</option>
<option value="IST">IST</option>
<option value="KLUGER">KLUGER</option>
<option value="LAND CRUISER">LAND CRUISER</option>
<option value="LAND CRUISER PRADO">LAND CRUISER PRADO</option>
<option value="LITE ACE NOAH">LITE ACE NOAH</option>
<option value="LITE ACE TRUCK">LITE ACE TRUCK</option>
 <option value="LITE ACE VAN">LITE ACE VAN</option>
<option value="LS">LS</option>
<option value="MARK II">MARK II</option>
<option value="MARK II WAGON">MARK II WAGON</option>
<option value="MARK X">MARK X</option>
<option value="MARK X ZIO">MARK X ZIO</option>
<option value="MARK2 BLIT">MARK2 BLIT</option>
<option value="MARK2 QUALIS">MARK2 QUALIS</option>
<option value="MINIACE">MINIACE</option>
<option value="MR-S">MR-S</option>
<option value="MR2">MR2</option>
<option value="NOAH">NOAH</option>
<option value="NX">NX</option>
<option value="OPA">OPA</option>
<option value="PASSO">PASSO</option>
<option value="PASSO SETTE">PASSO SETTE</option>
<option value="PIXIS EPOCH">PIXIS EPOCH</option>
<option value="PIXIS JOY">PIXIS JOY</option>
<option value="PIXIS MEGA">PIXIS MEGA</option>
<option value="PIXIS SPACE">PIXIS SPACE</option>
<option value="PIXIS TRUCK">PIXIS TRUCK</option>
<option value="PIXIS VAN">PIXIS VAN</option>
<option value="PLATZ">PLATZ</option>
<option value="PORTE">PORTE</option>
<option value="PREMIO">PREMIO</option>
<option value="PRIUS">PRIUS</option>
 <option value="PRIUS ALPHA">PRIUS ALPHA</option>
<option value="PRIUS PHV">PRIUS PHV</option>
<option value="PROBOX">PROBOX</option>
<option value="PROBOX VAN">PROBOX VAN</option>
<option value="PROGRES">PROGRES</option>
<option value="QUICKDELIVERY VAN">QUICKDELIVERY VAN</option>
<option value="RACTIS">RACTIS</option>
<option value="RAIZE">RAIZE</option>
<option value="RAUM">RAUM</option>
<option value="RAV4">RAV4</option>
<option value="REGIUS ACE VAN">REGIUS ACE VAN</option>
<option value="ROOMY">ROOMY</option>
<option value="RUSH">RUSH</option>
<option value="SAI">SAI</option>
<option value="SIENTA">SIENTA</option>
<option value="SOARER">SOARER</option>
<option value="SPADE">SPADE</option>
<option value="SPRINTER">SPRINTER</option>
<option value="SPRINTER CARIB">SPRINTER CARIB</option>
<option value="SPRINTER MARINO">SPRINTER MARINO</option>
<option value="SUCCEED">SUCCEED</option>
<option value="SUCCEED VAN">SUCCEED VAN</option>
<option value="SUPRA">SUPRA</option>
<option value="TANK">TANK</option>
<option value="TERCEL">TERCEL</option>
<option value="TOWN ACE">TOWN ACE</option>
<option value="TOWN ACE NOAH">TOWN ACE NOAH</option>
<option value="TOWN ACE TRUCK">TOWN ACE TRUCK</option>
<option value="TOWN ACE VAN">TOWN ACE VAN</option>
<option value="TOYOACE">TOYOACE</option>
<option value="VANGUARD">VANGUARD</option>
<option value="VELLFIRE">VELLFIRE</option>
<option value="VEROSSA">VEROSSA</option>
<option value="VISTA ARDEO">VISTA ARDEO</option>
<option value="VITZ">VITZ</option>
<option value="VOLTZ">VOLTZ</option>
<option value="VOXY">VOXY</option>
<option value="WHEELLOADER">WHEELLOADER</option>
<option value="WILL">WILL</option>
<option value="WILL VI">WILL VI</option>
<option value="WINDOM">WINDOM</option>
<option value="WISH">WISH</option>
<option value="BORA">BORA</option>
<option value="CROSS GOLF">CROSS GOLF</option>
<option value="CROSS POLO">CROSS POLO</option>
<option value="EOS">EOS</option>
<option value="GOLF">GOLF</option>
<option value="GOLF ALLTRACK">GOLF ALLTRACK</option>
<option value="GOLF TOURAN">GOLF TOURAN</option>
<option value="GOLF VARIANT">GOLF VARIANT</option>
<option value="GOLF WAGON">GOLF WAGON</option>
<option value="JETTA">JETTA</option>
<option value="NEW BEETLE">NEW BEETLE</option>
<option value="OTHER">OTHER</option>
<option value="PASSAT">PASSAT</option>
<option value="PASSAT VARIANT">PASSAT VARIANT</option>
<option value="PASSAT WAGON">PASSAT WAGON</option>
<option value="POLO">POLO</option>
<option value="RUPO">RUPO</option>
<option value="SCIROCCO">SCIROCCO</option>
<option value="SHARAN">SHARAN</option>
<option value="THE BEETLE">THE BEETLE</option>
<option value="TIGUAN">TIGUAN</option>
<option value="TOUAREG">TOUAREG</option>
<option value="UP">UP</option>
<option value="240 SERIES">240 SERIES</option>
<option value="850 SERIES">850 SERIES</option>
<option value="C30">C30</option>
<option value="C70 SERIES">C70 SERIES</option>
<option value="OTHER">OTHER</option>
<option value="S40">S40</option>
<option value="S60">S60</option>
<option value="V40">V40</option>
<option value="V50">V50</option>
<option value="V60">V60</option>
<option value="V70">V70</option>
<option value="XC60">XC60</option>
<option value="XC90">XC90</option>
<option value="OTHER">OTHER</option>
</select>
    <!-- <input class="form-control" type="text" name="model" placeholder="Enter Vehicle Model" style="text-transform:uppercase" required> -->
  </div>
</div>
<label>Year of Manufacture</label>
<select name="year" id="year" tabindex="4" data-value="" required
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
<option value="-1" selected="selected">Select Year of Manufacture</option>
<option value="2021">2021</option><option value="2020">2020</option>
<option value="2019">2019</option><option value="2018">2018</option>
<option value="2017">2017</option><option value="2016">2016</option>
<option value="2015">2015</option><option value="2014">2014</option>
<option value="2013">2013</option><option value="2012">2012</option>
<option value="2011">2011</option><option value="2010">2010</option>
<option value="2009">2009</option><option value="2008">2008</option>
<option value="2007">2007</option><option value="2006">2006</option>
<option value="2005">2005</option><option value="2004">2004</option>
<option value="2003">2003</option><option value="2002">2002</option>
<option value="2001">2001</option><option value="2000">2000</option>
</select>
<div class="row"  style="padding-top:10px;">
  <div class="col-6 col-md-4">
    <input class="form-control" type="number" id="price" name="price" placeholder="Enter vehicle selling Price (Ksh)" required>
  </div>
  <div class="col-6 col-md-4">
    <input class="form-control" type="number" id="miles" name="miles" placeholder="Enter mileage (Kms)" required>
  </div>
  <div class="col-6 col-md-4">
    <input class="form-control" type="text" id="gt-vin" tabindex="11" name="vin" placeholder="Enter Plate number" required style="text-transform:uppercase">
  </div>
</div>

<div class="row" style="padding-top:10px; padding-bottom:10px;">
  <div class="col-6 col-md-4">
    <select id="exterior" tabindex="8" name="exterior" required
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
        <option value="-1" selected="selected">Select Color</option>
        <option value="White">White</option><option value="Black">Black</option>
        <option value="Silver">Silver</option><option value="Green">Green</option>
        <option value="Dark Green">Dark Green</option><option value="Blue">Blue</option>
        <option value="Dark Blue">Dark Blue</option><option value="Brown">Brown</option>
        <option value="Yellow">Yellow</option><option value="Other">Other</option>
    </select>
  </div>
  <div class="col-6 col-md-4">
    <select id="interior" value="" tabindex="4" name="interior" required
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
        <option value="-1" selected="selected">Select Interior Type</option>
        <option value="Brown">Leather</option>
        <option value="Yellow">Cloth</option>
        <option value="Other">Other</option>
    </select>
  </div>
  <div class="col-6 col-md-4">
    <select id="fuel_type" tabindex="5" name="fuel_type" required
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
        <option value="-1" selected="selected">Select Fuel Type</option>
        <option value="Petrol">Petrol</option>
        <option value="Diesel">Diesel</option>
        <option value="Hybrid">Hybrid</option>
        <option value="Diesel-Hybrid">Diesel-Hybrid</option>
        <option value="Electic">Electic</option>
        <option value="Other">Other</option>
    </select>
  </div>
</div>
<h3 class="form-title">Select Vehicle Features » </h3>
<div class="row">
  <div class="col-md-3">
    <input type="checkbox" value="4WD/AWD" id="4WD/AWD" name="features[]">&nbsp;&nbsp;&nbsp;4WD/AWD
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="ABS Brakes" id="ABS Brakes" name="features[]">&nbsp;&nbsp;&nbsp;ABS Brakes
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Air Conditioning" id="Air Conditioning" name="features[]">&nbsp;&nbsp;&nbsp;Air Conditioning
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Alloy Wheels" id="Alloy Wheels" name="features[]">&nbsp;&nbsp;&nbsp;Alloy Wheels
  </div>
</div>
<div class="row">
  <div class="col-md-3">
  <input type="checkbox" value="AM/FM Stereo" id="AM/FM Stereo" name="features[]">&nbsp;&nbsp;&nbsp;AM/FM Stereo
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Automatic Transmission" id="Automatic Transmission" name="features[]">&nbsp;&nbsp;&nbsp;Auto Transmission
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Auxiliary Audio Input" id="Auxiliary Audio Input" name="features[]">&nbsp;&nbsp;&nbsp;Auxiliary Audio Input
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="CD Audio" id="CD Audio" name="features[]">&nbsp;&nbsp;&nbsp;CD Audio
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <input type="checkbox" value="Cruise Control" id="Cruise Control" name="features[]">&nbsp;&nbsp;&nbsp;Cruise Control
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Front Seat Heaters" id="Front Seat Heaters" name="features[]">&nbsp;&nbsp;&nbsp;Front Seat Heaters
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Leather Seats" id="Leather Seats" name="features[]">&nbsp;&nbsp;&nbsp;Leather Seats
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Memory Seat(s)" id="Memory Seat(s)" name="features[]">&nbsp;&nbsp;&nbsp;Memory Seat(s)
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <input type="checkbox" value=" Navigation System" id=" Navigation System" name="features[]">&nbsp;&nbsp;&nbsp;Navigation System
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Overhead Airbags" id="Overhead Airbags" name="features[]">&nbsp;&nbsp;&nbsp;Overhead Airbags
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Panoramic Sunroof" id="Panoramic Sunroof" name="features[]">&nbsp;&nbsp;&nbsp;Panoramic Sunroof
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Parking Sensors" id="Parking Sensors" name="features[]">&nbsp;&nbsp;&nbsp;Parking Sensors
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <input type="checkbox" value="Power Locks" id="Power Locks" name="features[]">&nbsp;&nbsp;&nbsp;Power Locks
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Power Mirrors" id="Power Mirrors" name="features[]">&nbsp;&nbsp;&nbsp;Power Mirrors
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Power Seat(s)" id="Power Seat(s)" name="features[]">&nbsp;&nbsp;&nbsp;Power Seat(s)
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Power Windows" id="Power Windows" name="features[]">&nbsp;&nbsp;&nbsp;Power Windows
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <input type="checkbox" value="Premium Package" id="Premium Package" name="features[]">&nbsp;&nbsp;&nbsp;Premium Package
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Rear Defroster" id="Rear Defroster" name="features[]">&nbsp;&nbsp;&nbsp;Rear Defroster
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Rear View Camera" id="Rear View Camera" name="features[]">&nbsp;&nbsp;&nbsp;Rear View Camera
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Satellite Radio Ready" id="Satellite Radio Ready" name="features[]">&nbsp;&nbsp;&nbsp;Satellite Radio Ready
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <input type="checkbox" value="Side Airbags" id="Side Airbags" name="features[]">&nbsp;&nbsp;&nbsp;Side Airbags
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="SiriusXM Trial Avail" id="SiriusXM Trial Avail" name="features[]">&nbsp;&nbsp;&nbsp;SiriusXM Trial Avail
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Technology Package" id="Technology Package" name="features[]">&nbsp;&nbsp;&nbsp;Technology Package
  </div>
  <div class="col-md-3">
    <input type="checkbox" value="Traction Control" id="Traction Control" name="features[]">&nbsp;&nbsp;&nbsp;Traction Control
  </div>
</div>
<div class="row" style="padding-top:10px; padding-bottom:15px;">
  <div class="col-6">
        <label>Transmission</label>
        <select id="transmission" name="transmission" tabindex="13" required
        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
            <option value="-1" selected="selected">Select Transmission Type</option>
            <option value="Automatic">Automatic</option>
            <option value="Manual">Manual</option>
            <option value="Semi-Auto">Semi-Auto</option>
            <option value="None">None</option>
        </select>
    </div>
  <div class="col-6">
    <label>Vehicle Type</label>
    <select id="vehicle_type" name="vehicle_type" tabindex="14" required
    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
        <option value="-1" selected="selected">Vehicle Type</option>
        <option value="Convertibles">Convertibles</option>
        <option value="Hatchbacks">Hatchbacks</option>
        <option value="SUVs">SUVs</option>
        <option value="Saloon Car">Saloon Car</option>
        <option value="Station Wagons">Station Wagons</option>
        <option value="Pickup Trucks">Pickup Trucks</option>
        <option value="Buses, Taxis and Vans">Buses, Taxis and Vans</option>
        <option value="Motorbikes">Motorbikes</option>
        <option value="Trucks">Trucks</option>
        <option value="Machinery and Tractors">Machinery and Tractors</option>
        <option value="Trailers">Trailers</option>
        <option value="Minis">Minis</option>
        <option value="Coupes">Coupes</option>
        <option value="Quad Bikes">Quad Bikes</option>
        <option value="Other">Other</option>
    </select>
  </div>
</div>
<div class="form-outline" style="padding-top:10px; padding-bottom:15px;">
  <textarea class="form-control" required placeholder="Enter vehicle listing description." id="description" name="description" rows="4"  style="background: #fff;" required></textarea>
  <label class="form-label" for="description">Vehicle Description</label>
</div>
<div class="row">
<div class="col-6 col-lg-4">
    <label class="btn btn-success btn-file"><br>
    Upload Photos<input class="form-control" id="fileupload" type="file" name="images[]" tabindex="21" style="display:none" value="Upload Photos" multiple=""><br>
    </label></p>
</div>
  <div class="col-sm-6 col-lg-8">
  <span class="instructions">Images will be automatically resized to fit 
        the listing layout. We recommend that you upload photos in full 
        resolution for better results.</span>
        <span class="instructions-cont">You may upload up to 12 images and each image may be no larger than 5MB</span>
  </div>
  <div id="upload-result">
<table id="uploaded-files" style="display: table;">
<!--<thead>-->
<!--<tr>-->
<!--<th>Preview</th>-->
<!--<th>Name</th>-->
<!--<th>Size</th>-->
<!--<th>Status</th>-->
<!--<th></th>-->
<!--</tr>-->
<!--</thead>-->
<!--<tbody><tr><td class="thumb"><img class="gt-thumb" src="Sell%20your%20Car%20%E2%80%93%20Gariweza_files/WIN_20210504_10_14_51_Pro-Copy.jpg"></td><td class="name">WIN_20210504_10_14_51_Pro - Copy.jpg</td><td class="size">103.73 KB</td><td class="status"><span class="gt-success">Complete</span></td><td class="operations"><a class="gt-remove btn-default button tiny round alert" href="javascript:;">Remove</a></td></tr></tbody>-->
<!--</table>-->
</div>
</div>
<h3 class="form-title">Personal Information</h3>
<div class="row">
  <div class="col-6">
    <input class="form-control" type="text" id="firstname" tabindex="22" name="firstname" placeholder="Enter first name" value="{{ $user->name }}" required style="text-transform:uppercase">
  </div>
  <div class="col-6">
    <input class="form-control" type="text" id="gt-lastname" tabindex="23" name="lastname" placeholder="Enter last name"  value="{{ $user->name }}"  required style="text-transform:uppercase">
  </div>
</div>
<div class="row" style="padding-top: 10px; padding-bottom: 10px;">
  <div class="col-6">
    <input class="form-control" type="email" id="email" tabindex="24" name="email"  value="{{ $user->email }}"  placeholder="Enter your e-mail address " required>
  </div>
  <div class="col-6">
    <input class="form-control" type="number" id="phone" tabindex="25" name="phone"  value="{{ $user->number }}"  placeholder="Enter phone number" required>
  </div>
  <div class="col-md-8">
    <input type="checkbox" value="Rear View Camera" id="Rear View Camera" name="features[]" required>&nbsp;&nbsp;&nbsp;
    <a class="text-center p-3" href="https://automart.aakenya.co.ke/resources/Terms and conditions to seller.pdf" target="blank">Terms And Conditions<br></a>
    By clicking this, you have agreed to terms and conditions
  </div>
</div>
<button type="submit" class="btn btn-primary btn-block mb-4">Submit &amp; pay for your listing</button>
</form>
</div> 
</div>
<footer class="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(255,255,255, 0.8); border-radius: 10px; color:#000;">
    © 2022 Copyright:
    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
<!-- add car end -->

</div>
</div>
@endsection