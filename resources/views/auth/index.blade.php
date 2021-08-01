

@extends('auth.home')
  
@section('content')


   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
#userinfotable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#userinfotable td, #userinfotable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#userinfotable tr:nth-child(even){background-color: #f2f2f2;}

#userinfotable tr:hover {background-color: #ddd;}

#userinfotable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>


<div id="userinfo" style="margin: 0 auto;width: 80%">
    
    <table id="userinfotable">
  <tr>
    <th>Serial</th>
    <th>Name</th>
    <th>Image</th>
    <th>Action</th>
  </tr>
  <?php  $i=1; ?>
        @foreach ($userinfo as $users)

       
        <tr>
            <td>{{ $i ++ }}</td>
            <td>{{ $users->name }}</td>
            
            <td>

                 <img style="width: 100px;" src="{{ asset($users->image) }}" >
                
            </td>
            <td>
                <form action="{{ route('userinfo.destroy',$users->id) }}" method="POST">
   
                    <a  href="{{ route('userinfo.edit',$users->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
 
</table>

</div>








@endsection