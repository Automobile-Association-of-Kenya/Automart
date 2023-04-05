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
  <div class="container" style="padding-left: 20px;padding-right: 20px;background-color: rgba(0,0,0, 0.6); border-radius:8px; padding-top: 10px; padding-bottom: 20px; color: #fff; ">
  <div class="container" style="background-image: url('./public/images/bg/Motor Website FHD-01.jp');
  background-repeat: no-repeat;background-position: center; background-size: cover; border-radius:10px;">
  <div class="row" style="padding-top: 15px; padding-bottom: 15px; padding-left: 15px;">
    <div class="col-md">
      <!-- left side -->
    </div>

    <div class="col-md" style="background-color: rgba(255, 255, 255, 0.7); padding-top: 10px; border-radius:10px;">
    <span class="badge bg-info" style="width: 100%; padding-top:10px;padding-bottom:10px; background-color: rgba(0, 0, 0, 0.9) !Important;">REGISTER ADMIN.</span>
    <form action="{{ route('admins', $admin->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="row" style="padding-bottom:15px; padding-top:15px;">
    <div class="col-6">
      <input type="text" class="form-control" name="uName" id="uName" placeholder="Preffered Admin Name" required>
  </div>
    <div class="col-6">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" required>
    </div>
  </div>

  <div class="row" style="padding-bottom:15px; padding-top:px;">
  <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
    <input id="pass" class="form-control" type="Password" name="pass" placeholder="Choose Password" required>
  </div>
  <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
    <input id="pass" class="form-control" type="Password" name="pass" placeholder="Confirm Password" required>
  </div>
</div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4"><h6>Register</h6></button>

  </form>
    </div>

    <div class="col-md">
      <!-- right side -->
    </div>
  </div>
</div>
<br>
<br>
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
</div>

<!-- end dash -->


@endsection
