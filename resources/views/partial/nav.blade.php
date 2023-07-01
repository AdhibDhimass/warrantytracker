<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>

      <ul class="navbar-nav ml-auto">
      @auth
      <li class="nav-item ml-auto">

        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
           <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out
        </a>
      </li>

       <form id="logout-form" action="{{ route('logout') }}" method="POST">
           @csrf
      </form>
      @endauth
    </ul>


     @guest
     <ul class="navbar-nav ">
         <li class="nav-item d-none d-sm-inline-block">
             <a href="/login" class="nav-link" >
                <p>
                 <i class="fa-solid fa-right-to-bracket"></i> Log in
                </p>
            </a>
        </li>
    </ul>
     @endguest

  </nav>
  <!-- /.navbar -->
