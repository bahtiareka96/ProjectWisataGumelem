  <!-- Navbar -->
  <div class="container">
    <nav class="navbar trans navbar-inverse navbar-expand-sm navbar-dark fixed-top px-lg-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('frontend/images/Logo.png') }}" alt="logo">
          </a>

          <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!--Menu-->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item mx-md-2">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item mx-md-2">
                <a class="nav-link" href="{{ url('/#wisata') }}">Objek Wisata</a>
              </li>
              <li class="nav-item mx-md-2">
                {{-- {{ dd($dataMerchandises) }} --}}
                <a class="nav-link" href="{{ url('/#merchandise') }}">Merchandise</a>
              </li>
              <li class="nav-item mx-md-2">
                {{-- <a class="nav-link" href="{{ url('about/'.$dataAbout->slug) }}">About</a> --}}
              </li>
            </ul>

            @guest
                <!--Mobile Button-->
              <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                  Masuk
                </button>
              </form>

              <!--Dekstop Button-->
              <form class="form-inline mx-my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                  Masuk
                </button>
              </form>
            @endguest

            @auth
            <!-- Mobile Button -->
            <div class="form-inline d-sm-block d-md-none">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
              </a>
              <ul class="dropdown-menu mx-2">
                <li><a class="dropdown-item" href="{{ url('/users/'.  Auth::id()) }}">User Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('history', Auth::user()->id) }}">History</a></li>
                <li>
                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="button" onclick="confirmLogout()">
                        Keluar
                    </button>
                </form>
                </li>
              </ul>
            </div>

            <!-- Desktop Button -->
            <div class="dropdown mx-my-2 my-lg-0 d-none d-md-block">
              <a class="btn btn-drop bi-list" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
              <ul class="dropdown-menu dropdown-menu-end" style="margin-right: 10px">
                <li><a class="dropdown-item" href="{{ url('/users/'.  Auth::id()) }}">User Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('history', Auth::user()->id) }}">History</a></li>
                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="button" onclick="confirmLogout()">
                        Keluar
                    </button>
                </form>
                </li>
              </ul>
            </div>
            @endauth
          </div>
        </div>
      </nav>
</div>

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the logout form
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
@endpush
