<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo"><a href="{{ url('/') }}">Hotel Balige Beach</a></div>
            <div class="col-6 col-lg-8">
                <nav class="site-navbar js-site-navbar">
                    <ul class="list-unstyled menu">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/rooms">Rooms</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/events">Events</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/reservation">Reservation</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>                    
                </nav>
            </div>
        </div>
    </div>
</header>
