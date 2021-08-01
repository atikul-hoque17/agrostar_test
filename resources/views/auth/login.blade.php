@extends('layout')
  
@section('content')

<div class="login">
  <h1>Welcome to Agrostar Farm Limited</h1>
  <form action="{{ route('login.post') }}" method="POST">
                          @csrf
    <p>
       <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Enter Email">
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
    </p>
    <p>
      

      <input type="password" id="password" class="form-control" name="password" required placeholder="Enter Password">
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
    </p>
    <p class="remember_me">
      
    </p>
    <p class="submit"><input type="submit" name="commit" value="Login"></p>
  </form>
</div>

@endsection