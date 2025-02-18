<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<style>
    body {
      background-image: url('{{ asset('backgroundImages/mainbg.jpg') }}'); 
      background-size: cover;
      background-position: center;
      background-attachment: fixed; 
      
    }
  </style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:rgb(22, 22, 22)">
        <a class="navbar-brand text-warning" href="#">Xiao Ding Dong</a>
        
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/addFood">Add New Food</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/manageFood">Manage Food</a>
            </li>
            
      
          </ul>
      
          
          @if (Auth::check())
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{asset('Images/' .Auth::user()->profile_image)}}" alt="User Image" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                  Welcome, {{ Auth::user()->name }}
                </a>
              
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/editProfile/{{Auth::user()->id}}/edit">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          </ul>
          @endif
        </div>
      </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>