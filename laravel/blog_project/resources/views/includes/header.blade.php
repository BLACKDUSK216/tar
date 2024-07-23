<header>
    <nav class="nav-container navbar navbar-expand-lg navbar-light navbar-transparent text-white fixed-top">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo-black.png')}}"
                alt="My Logo"></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->routeIs('blogs') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blogs') }}"> My Blogs</a>
                </li>
                <li class="nav-item {{ request()->routeIs('gallery') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                </li>
                <li class="nav-item {{ request()->routeIs('travel') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('travel') }}">Travel</a>
                </li>
                <li class="nav-item {{ request()->routeIs('restaurants') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('restaurants') }}">Restaurants</a>
                </li>
                <li class="nav-item {{ request()->routeIs('aboutme') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('aboutme') }}">About Me</a>
                </li>
                <li class="nav-item {{ request()->routeIs('blogvault') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blogvault') }}">Blog Vault</a>
                </li>
                <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('login') }}">Travel With Me</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-facebook"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-brands fa-pinterest"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
    $(document).ready(function () {
        var url = window.location.href;
        $('ul.navbar-nav a[href="' + url + '"]').addClass('active');
        $('ul.navbar-nav a').on('click', function () {
            $('ul.navbar-nav').find('a.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>