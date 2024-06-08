<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CREATE A USER</h1>
<form method="POST"action="{{route('user.updated',['user'=>$user])}}" style="flex-direction:colmun">
@csrf
@method('put')
<label for="">First Name:</label>
<input name="firstName" type="text" value="{{$user->firstName}}">
<label  for="">Last Name:</label>
<input name="lastName" type="text" value="{{$user->lastName}}">
<label for="">Email:</label>
<input name="email" type="email" value="{{$user->email}}">
<label for="">Password:</label>
<input name="password" type="text" value="{{$user->password}}">
<input type="submit" value="Update">
</form>
<div><a href="{{route('user.index')}}">index</a></div>
</body>
</html>