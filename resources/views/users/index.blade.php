<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>All Users</h1>
   @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table border="1">
<th>ID_USER</th>
<th>FIRST_NAME</th>
<th>LAST_NAME</th>
<th>EMAIL</th>
<th>PASSWORD</th>
<th>CREATE_DATE</th>
<th>UPDATE_DATE</th>
<th>EDIT</th>
<th>DELETE</th>
@foreach($users as $user) 
<tr>
<td>{{$user->id}}</td>
<td>{{$user->firstName}}</td>
<td>{{$user->lastName}}</td>
<td>{{$user->email}}</td>
<td>{{$user->password}}</td>
<td>{{$user->created_at}}</td>
<td>{{$user->updated_at}}</td>
<td><a href="{{route('user.update',['user'=>$user])}}">EDIT</a></td>
<td><form action="{{route('user.delete',['user'=>$user])}}" method="POST">@csrf @method('delete')<input type="submit" value="DELETE"></form></td>

</tr>
@endforeach



</table>
</body>
</html>