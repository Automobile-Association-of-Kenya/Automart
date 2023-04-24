@extends('layouts.main')
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

  <br/>
  <div class="container">
  <div class="row">
    <div class="col-md">
      <!-- left part -->
    </div>
    <div class="col-md" style="background-color: rgba(255, 255, 255, 0.7); padding-top: 30px; padding-bottom: 60px; border-radius:10px; color:#000">
    <div class="container-fluid" style="padding-top: 0px; padding-bottom: 20px;">
    <span class="badge bg-info" style="width: 100%; padding-top:10px;padding-bottom:10px; background-color: rgba(0, 0, 0, 0.9) !Important;">LOGIN TO ACCESS YOUR DASHBOARD.</span>
    </div>
    <form action="{{ route('alogin') }}" method="POST" style="padding: top 10px;">
    {{ csrf_field() }}
  <!-- Email input -->
  <div class="mb-4">
  <input type="email" name="email" class="form-outline form-control" id="email" placeholder="Email Address" required>
  </div>

  <!-- Password input -->
  <div class="mb-4" style="padding-top: 20px;">
  <input id="password" class="form-control" type="Password" name="password" placeholder="Password" required>

  </div> 

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4" style="padding-top: 20px;">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember" checked />
        <label class="form-check-label" for="remember"> Remember me </label>
      </div>
    </div>

    {{-- <div class="col">
      <!-- Simple link -->
      <a href="{{ route('forget.admin') }}">Forgot password?</a>
    </div> --}}
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
</form>
    </div>
    <div class="col-md">
      <!-- right part -->
    </div>
  </div>
</div>
<br/>
<br/>
@endsection