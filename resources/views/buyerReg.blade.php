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
  <div class="container">
  <div class="row">
    <div class="col-md">
      <!-- left part -->
    </div>
    <div class="col-md" style="background-color: rgba(255, 255, 255, 0.7); padding-top: 20px; padding-bottom: 60px; border-radius:10px; color:#000">
    <span class="badge bg-info" style="width: 100%; padding-top:10px;padding-bottom:10px; background-color: rgba(0, 0, 0, 0.9) !Important;">WANT TO SEE SELLER DETAILS? REGISTER HERE.</span>
    <form action="{{ route('user') }}" method="POST">
    {{ csrf_field() }}
  <!-- Name Input -->
  <div class="mb-4"  style="padding-top: 15px;">
  <input type="text" name="name" class="form-outline form-control" id="name" placeholder="Preffered Username" required>
  </div>
<!-- Email input -->
  <div class="mb-4"  style="padding-top: 0px;">
  <input type="email" name="email" class="form-outline form-control" id="email" placeholder="Email Address" required>
  </div>
  <!-- Password input -->
  <div class="mb-4" style="padding-top: 0px;">
  <input id="password" class="form-control" type="Password" name="password" placeholder="Password" required>
  </div> 
    <!-- Password input -->
  <div class="mb-4" style="padding-top: 0px;">
  <input id="password" class="form-control" type="Password" name="password" placeholder="Confirm Password" required>
  </div> 
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block">Register</button>
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