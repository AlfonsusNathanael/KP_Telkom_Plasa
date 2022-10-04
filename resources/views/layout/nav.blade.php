
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky ">
            <div class="list-group list-group-flush mx-1 mt-3">
                <a href="{{route('home')}}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Home</span>
                </a>
                <a href="{{route('canvasser.index')}}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Canvasser</span>
                </a>
                <a href="{{route('teknisi.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                class="fas fa-lock fa-fw me-3"></i><span>Admin Teknisi</span>
                </a>
                <a href="{{route('inputer.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-lock fa-fw me-3"></i><span>Admin Inputer</span>
                </a>
                <a href="{{route('helpdesk.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                class="fas fa-lock fa-fw me-3"></i><span>Admin Helpdesk</span>
                </a>
                {{-- <a href="{{route('history.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                class="fas fa-lock fa-fw me-3"></i><span>History</span>
                </a> --}}
            </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <a href="#" class="navbar-brand h1 mx-4 mt-2"><i class=" me-2"></i> COSTELA </a>
        </a>

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">

          <!-- Avatar -->
          <div class="dropdown my-2 ms-md-auto" style="margin-right: 20px">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuProfile" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi-person-circle me-1"></i>{{Session::get('nama_user')}}
            </button>
            <ul class="dropdown-menu dropdown-menu-md-end" aria-labelledby="dropdownMenuProfile">
                <li>
                    <a href="#" class="dropdown-item"><i class="bi-person-fill me-2"></i> Profile</a>
                </li>
                <li><hr class="dropdown-divider bg-dark"></li>
                <li>
                    <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
