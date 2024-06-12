<!DOCTYPE html>
<html lang="en">
@if(session('purchased'))
    <div class="alert alert-success">
       {{ session('purchased') }}</script>
    </div>
@endif
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Details</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .product-details {
      margin-bottom: 20px;
    }
    .product-image {
      max-width: 200px;
      max-height: 200px;
    }
  </style>
</head>
<body>

<div class="container mt-4 h-25">
  <h2>Book Details</h2>
  <div class="product-details">
    <div class="row">
      <div class="col-md-4">
        <img src="{{$book->cover_image}}" alt="Book Cover" class="product-image">
      </div>
      <div class="col-md-8">
        <h3>{{$book->title}}</h3>
        <p><strong>Author: </strong>{{$book->author}}</p>
        <p><strong>ISBN: </strong> {{$book->isbn}}</p>
        <p><strong>Publication Date: </strong> {{$book->publication_date}}</p>
        <p><strong>Publisher: </strong>{{$book->publisher}}</p>
        <p><strong>Language: </strong>{{$book->language}}</p>
        <p><strong>Pages: </strong>{{$book->pages}}</p>
        <p><strong>Format: </strong>{{$book->format}}</p>
        <p><strong>Price: </strong>{{$book->price}}</p>
        <p><strong>Description: </strong> {{$book->description}}</p>
        <!--<button class="btn btn-primary" onclick="window.location='{{ route('book.purchase', ['book' => $book->id]) }}'">Purchase</button>
        <a href="{{route('book.index')}}">Go Back</a>-->
        @if ($book->bookAccess() === 'accepted')
        <a href="{{$book->pdf_link}}" target="_blank" class="btn btn-success">Read Book</a>
<!--<button  id="readBookBtn"class="btn btn-success">Read Book</button>//href="{{$book->pdf_link}}"-->
        @elseif ($book->bookAccess() === 'waiting')
            <button class="btn btn-primary" disabled>Purchased</button>
        @else
            <button class="btn btn-primary" onclick="window.location='{{ route('book.purchase', ['book' => $book->id]) }}'">Purchase</button>
        @endif
        <a href="{{route('book.index')}}">Go Back</a>
      </div>
    </div>
  </div>
  <!-- Add more product details sections for additional books -->
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#readBookBtn').click(function() {
      var pdfLink = '{{$book->pdf_link}}';
      if (pdfLink) {
        // If PDF link exists, set iframe src attribute to PDF link
        $('#pdfIframe').attr('src', pdfLink);
        $('#pdfIframe').style.display="block";
      }
    });
  });
</script>

<!-- iframe to display PDF -->
<iframe id="pdfIframe" width="100%" height="500px" style="display: none;"></iframe>
</body>
</html>
