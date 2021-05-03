<!DOCTYPE html>
<html lang="en">
@include('user.layout.style')
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
            <a class="nav-link" href="{{route('blogs.create')}}">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blogs.index')}}"> My Blog</a>
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

