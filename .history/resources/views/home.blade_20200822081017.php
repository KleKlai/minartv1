@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">My Artworks</span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('artwork.create') }}">Upload work</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Notifications</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Username
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
          </div>
        </li>
    </ul>
  </div>
</nav>

<!-- Images -->
<div class="container">
    <img src="images/TBH_RWSX-53.jpg" class="artContainer">
    <img src="images/TBH_RWSX-54.jpg" class="artContainer">
    <img src="images/TBH_RWSX-55.jpg" class="artContainer">
    <img src="images/TBH_RWSX-56.jpg" class="artContainer">
    <img src="images/TBH_RWSX-57.jpg" class="artContainer">
    <img src="images/TBH_RWSX-58.jpg" class="artContainer">
    <img src="images/TBH_RWSX-59.jpg" class="artContainer">
</div>

@endsection
