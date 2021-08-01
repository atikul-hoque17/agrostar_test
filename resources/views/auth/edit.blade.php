@extends('auth.home')
 
@section('content')

<div class="login">
  <h1>Update Profile</h1>
  
  <form action="{{ route('updateprofile.update', $updateprofile->id) }}" method="POST" name="update_user" >
    {{ csrf_field() }}
    @method('PATCH')

        <p>
           <input type="text" id="name" class="form-control" name="name" value="{{ $updateprofile->name }}">
                              
        </p>

     <p class="submit"><input type="submit" value="Update"></p>
  </form>

</div>




    
      
@endsection