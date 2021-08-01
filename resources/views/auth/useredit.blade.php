@extends('auth.home')
  
@section('content')


<div class="login">
  <h1>Add User Image</h1>

<form action="{{ route('userinfo.update', $userinfo->id) }}" method="POST" name="update_user" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')

    <p>
       <input type="text" id="name" class="form-control" name="name" value="{{ $userinfo->name }}">
                               
    </p>
    <p>
    	<strong>Old Image:</strong>
         <img style="width: 100px;" src="{{ asset($userinfo->image) }}" >
                    
    </p>
    <p>
    	  <strong>New Image:</strong>
          <input type="file" name="newimage">
                          
    </p>
    <p class="remember_me">
      
    </p>
    <p class="submit"><input type="submit" name="commit" value="Update"></p>
  </form>
</div>







@endsection