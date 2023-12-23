<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="{{ route('objek-wisata.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Objek Wisata
            </a>
            <a class="nav-link collapsed" href="{{ route('wisata-gallery.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Gallery Wisata
            </a>
            <hr class="hr" />
            <a class="nav-link" href="{{ route('merchandise-order.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Merchandise
            </a>
            <a class="nav-link" href="{{ route('merchandise-gallery.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Gallery Merchandise
            </a>
            <hr class="hr" />
            <a class="nav-link" href="{{ route('about-gumelem.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                About
            </a>
            <a class="nav-link collapsed" href="{{ route('about-gallery.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Gallery About
            </a>
            <hr class="hr" />
            <a class="nav-link" href="{{ route('merchandise-transaction.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Transaksi
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div>
</nav>
