<!DOCTYPE html>
<html lang="en">
<!------------------------------------------------DISPLAYING SIGNUP ERRORS-------------------------->
@if(request()->has('message'))
    <div class="alert alert-danger">
        {{ request()->get('message') }}
    </div>
@endif


@if ($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif
@if ($errors->has('password'))
    <div class="alert alert-danger">
        {{ $errors->first('password') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
       {{ session('success') }}</script>
    </div>
@endif

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Library</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .book-list, .login-section {
      display: none;
    }
  </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">E-Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link browse-books" href="#">Browse Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link login-link" href="#">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container mt-4">
  <div class="jumbotron">
    <h1 class="display-4">Welcome to E-Library</h1>
    <p class="lead">Browse our collection of books and discover new titles.</p>
    <hr class="my-4">
    <p>Start exploring now!</p>
    <a class="btn btn-primary btn-lg browse-books" href="#" role="button">Browse Books</a>
  </div>
  
  <!-- Book List -->
  <div class="book-list">
    <h2>Book List</h2>
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search books..." aria-label="Search books" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">Search</button>
      </div>
    </div>
    <!-- Dummy Book List -->
    <div class="row">
      @foreach($books as $book)
      <div class="col-md-4">
        <div class="card w-50">
          <img src="{{$book->cover_image}}" class="card-img-top h-75" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">{{$book->author}}</p>
            <a href="{{ route('index', ['book' => $book]) }}" class="btn btn-primary">Read More</a>

          </div>
        </div>
      </div>
      @endforeach
      <!--<div class="col-md-4">
        <div class="card">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Book 2</h5>
            <p class="card-text">Description of Book 2.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Book 3</h5>
            <p class="card-text">Description of Book 3.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>-->
      <!-- Add more books here -->
    </div>
  </div>

  <!-- Login Section -->
  <div class="login-section mt-4">
    <h2>Login</h2>
    <form method="POST" action="{{route('user.login')}}"id="loginForm">
      @csrf 
      @method('post')
      <div class="form-group">
        <label for="email">Email address</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <small id="emailHelp" class="form-text text-muted">Don't have an account? <a href="#" class="switch-form">Sign Up</a></small>
    </form>

    <!-- Signup Form (Initially Hidden) -->
    <form method="POST" action="{{route('user.store')}}" id="signupForm" style="display:none;">
    @csrf
    @method('post')
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input name="firstName" type="text" class="form-control" id="firstName" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input name="lastName" type="text" class="form-control" id="lastName" placeholder="Enter last name">
      </div>
      <div class="form-group">
        <label for="emailSignup">Email address</label>
        <input name="email" type="email" class="form-control" id="emailSignup" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="passwordSignup">Password</label>
        <input name="password" type="password" class="form-control" id="passwordSignup" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
      </div>
      <button type="submit" class="btn btn-primary">Sign Up</button>
      <small id="emailHelp" class="form-text text-muted">Already have an account? <a href="#" class="switch-form">Login</a></small>
    </form>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    // Switch between login and signup forms
    $(".switch-form").click(function(e) {
      e.preventDefault();
      $("#loginForm, #signupForm").toggle();
    });
    // Toggle book list visibility
    $(".browse-books").click(function(e) {
      e.preventDefault();
      $(".login-section").hide();
      $(".jumbotron").remove();
      $(".book-list").toggle();
    });

    // Toggle login section visibility
    $(".login-link").click(function(e) {
      e.preventDefault();
      $(".book-list").hide();
      $(".jumbotron").hide();
      $(".login-section").toggle();
    });
  });
</script>
</body>
</html>
