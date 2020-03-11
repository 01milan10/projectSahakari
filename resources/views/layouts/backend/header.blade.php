<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('landingPage')}}" class="nav-link">Frontend</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
        <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{Auth:: user()->name}}</span>
            <div class="dropdown-divider"></div>
            <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
             <p>
             <i class="fas fa-sign-out-alt mr-2"></i>Logout</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
        </div>
      </li>
    </ul>
  </nav>
