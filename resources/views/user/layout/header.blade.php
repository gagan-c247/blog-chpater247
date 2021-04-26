<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
{{-- fontAwesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css ">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
     <div class="container">
      <a class="navbar-brand" href="{{route('welcome')}}">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
   
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          @if (Auth::check())
               <li class="nav-item">
            <a class="nav-link" href="{{route('blog.create')}}">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog.index')}}"> My Blog</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <strong class="text-capitalize">{{Auth::user()->name}}</strong>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Create Blog</a>
              <a class="dropdown-item" href="#">All Blog</a>
              <a class="dropdown-item" href="{{route('logout')}}" 
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">logOut</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li> 
         @else
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}"> login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}"> Register</a>
          </li>

          @endif
           
        </ul>
      </div>
     </div>
      </nav>

