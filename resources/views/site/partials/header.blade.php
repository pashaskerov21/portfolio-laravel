<header>
    <nav class="general-navbar">
        <div class="container">
            <div class="general-navbar-inner">
                <div class="logo">
                    <span>{{ $settings->logo_text }}</span>
                </div>
                <div class="nav-links d-none d-xl-flex">
                    @foreach ($menuLinks as $link)
                        <a href="#{{$link->name}}"><span>{{ $link->name }}</span></a>
                    @endforeach
                </div>
                <div class="right">
                    <button class="theme-button m-xl-0" type="">
                        <i class="fa-solid fa-moon"></i>
                        <i class="fa-solid fa-sun"></i>
                    </button>
                    <button class="menu-button d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#mobile-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start" id="mobile-menu">
        <div class="offcanvas-header">
            <div class="logo d-none">
                <span>{{ $settings->logo_text }}</span>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="menu-links mt-5">
                @foreach ($menuLinks as $link)
                    <a href="#{{$link->name}}" data-bs-dismiss="offcanvas"><span>{{ $link->name }}</span></a>
                @endforeach
            </div>
            <div class="sosial-icons">
                <a target="_blank" href="mailto:{{$settings->mail}}"><i class="fa-solid fa-envelope"></i></a>
                <a target="_blank" href="https://wa.me/{{$settings->phone}}"><i class="fa-brands fa-whatsapp"></i></a>
                <a target="_blank" href="{{$settings->github}}"><i class="fa-brands fa-github"></i></a>
                <a target="_blank" href="{{$settings->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</header>
