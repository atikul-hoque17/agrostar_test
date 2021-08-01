@extends('layout')
  
@section('content')


<div class="login">
  <h1>Sign Up to Agrostar </h1>
<form action="{{ route('register.post') }}" method="POST">
                          @csrf
    <p>
       <input type="text" id="name" class="form-control" name="name" required autofocus placeholder="Enter Name">
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
    </p>

    <p>
      <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Enter Email">
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
    </p>
      

      <input type="password" id="password" class="form-control" name="password" required placeholder="Enter Password">
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
    </p>
    
    <p class="submit"><input type="submit" name="commit" value="Sign Up"></p>
  </form>
</div>


@endsection