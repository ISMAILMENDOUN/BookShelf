<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CREATE A USER</h1>
<form method="POST"action="{{route('user.store')}}" style="flex-direction:colmun">
@csrf
@method('post')
<label for="test">First Name:</label>
<input name="firstName" type="text">
<label  for="">Last Name:</label>
<input name="lastName" type="text">
<label for="">Email:</label>
<input name="email" type="email">
<label for="">Password:</label>
<input name="password" type="text">
<label for="">Password:</label>
<input  type="text">
<input type="submit" value="Create">
</form>
<div><a href="{{route('user.index')}}">index</a></div>
</body>
</html>