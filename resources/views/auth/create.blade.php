@extends('auth.home')
  
@section('content')


<div class="login">
  <h1>Add User Image</h1>

<form action="{{ route('userinfo.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>
       <input type="text" id="name" class="form-control" name="name" required autofocus placeholder="Enter Name">
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
    </p>
    <p>
      

        <input type="file" class="form-control"  name="picture" required=""/>
                           
    </p>
    <p class="remember_me">
      
    </p>
    <p class="submit"><input type="submit" name="commit" value="Save"></p>
  </form>
</div>







@endsection