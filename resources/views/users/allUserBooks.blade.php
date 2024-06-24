<!DOCTYPE html>
<html lang="en">
@if(session('success'))
    <div class="alert alert-success">
       {{ session('success') }}</script>
    </div>
@endif
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>All UserBooks</h1>


<table border="1">
<th>ID</th>
<th>USER_ID</th>
<th>BOOK_ID</th>
<th>DATE_LOANED</th>
<th>STATUT</th>
<th>CREATE_DATE</th>
<th>UPDATE_DATE</th>
<th>ACCEPT</th>
@foreach($userBooks as $userBook) 
<tr>
<td>{{$userBook->id}}</td>
<td>{{$userBook->user_id}}</td>
<td>{{$userBook->book_id}}</td>
<td>{{$userBook->date_loaned}}</td>
<td>{{$userBook->statut}}</td>
<td>{{$userBook->created_at}}</td>
<td>{{$userBook->updated_at}}</td>
<td><form action="{{route('userBook.accept',['userBook'=>$userBook])}}" method="POST">@csrf @method('put')<input type="submit" value="accept"></form></td>
</tr>
@endforeach



</table>
</body>
</html>