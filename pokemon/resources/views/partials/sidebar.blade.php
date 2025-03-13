<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Inicio
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href={{ route('pokemon') }}>
                    <div class="sb-nav-link-icon">
                        <img src="{{ asset('pokeball.png') }}" alt="Pokemon Icon" width="30" height="30">
                    </div>
                    Pokemon
                </a>
                <a class="nav-link" href={{ route('tipos') }}>
                    <div class="sb-nav-link-icon">
                        <img src="{{ asset('pokeball2.png') }}" alt="Tipos Icon" width="30" height="30">
                    </div>
                    Tipos
                </a>
                <a class="nav-link" href={{ route('debilidades') }}>
                    <div class="sb-nav-link-icon">
                        <img src="{{ asset('pokeball.png') }}" alt="Debilidades Icon" width="30" height="30">
                    </div>
                    Debilidades
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>