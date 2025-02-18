<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>@yield('title')</title>
</head>
<style>
    html, body {
      height: 100%;
      font-family: 'Times New Roman', Times, serif;
    }

    .fill-right {
      height: 100%;
    }
    body {
      background-image: url('./backgroundImages/login page background.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      
    }
    .center-vertically {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }
  </style>
<body>
  
    <div class="container-fluid h-100">
        <div class="row h-100">
          <div class="col-sm-7">
          
          </div>
          <div class="col-sm-5 fill-right  center-vertically" style ="background-color: rgb(22, 22, 22)">
            @yield('content')
          </div>
        </div>
      </div>
      
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  @yield('error')
  @yield('banner')
  @yield('footer')
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>