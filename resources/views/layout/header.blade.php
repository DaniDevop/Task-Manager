 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
    <img src="/img/calendar.png" alt="">
    <span class="d-none d-lg-block">Gestions-des-taches</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button  title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
      

        

       

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">


      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
          
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
         
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

      
      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">
    @auth

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        @if(Illuminate\Support\Facades\Auth::user()->profile !=null)
        @else
        @endif
        <span class="d-none d-md-block dropdown-toggle ps-2">{{Illuminate\Support\Facades\Auth::user()->nom}}</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{Illuminate\Support\Facades\Auth::user()->email}}</h6>
          <span>{{Illuminate\Support\Facades\Auth::user()->user_role}}</span>

        </li>
        <li>
          <hr class="dropdown-divider">
          <span>Modifier mes informations</span>
          <a href="{{route('update.view.user')}}"><span class="btn btn-primary"><i class="bi bi-person-lines-fill"></i></span></a>
          <p>
          Modifier le mot de passe
          <a href="{{route('update.view.password')}}"><span class="btn btn-primary"><i class="bi bi-database-fill-check"></i></span></a>

          </p>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <form action="{{route('logout.users')}}"  method="post">
              @method('delete')
              @csrf
              <button class="btn btn-success">Deconnexion</button>
            </form>
           
          </a>
        </li>
        @endauth

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->