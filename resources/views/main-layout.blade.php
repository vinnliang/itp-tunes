<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <ul class = "nav">
          @if(Auth::check())
              <li class = "nav-item">
                  <a href = "/profile" class="nav-link">My Profile</a>
              </li>
              <li class = "nav-item">
                  <a href = "/invoices" class="nav-link">Invoices</a>
              </li>
              <li class = "nav-item">
                  <a href = "/settings" class="nav-link">Settings</a>
              </li>
              <li class = "nav-item">
                  <a href = "/logout" class="nav-link">Logout</a>
              </li>
          @else
              <li class = "nav-item">
                  <a href = "/login" class="nav-link">Login</a>
              </li>
              <li class = "nav-item">
                  <a href = "/Signup" class="nav-link">Signup</a>
              </li>
          @endif
      </ul>
      @yield('content')
    </div>
  </body>
</html>
