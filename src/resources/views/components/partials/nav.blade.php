<main>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-3 px-lg-4">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-2"></i>eLEARNING</h2>
        </a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-0">
                <!-- Always visible links -->
                <a href="{{ route('home') }}" class="nav-item nav-link active px-2 py-1">Home</a>
                <a href="{{ route('course') }}" class="nav-item nav-link px-2 py-1">Courses</a>

                <!-- Show About and Pages only if user is a guest -->
                @guest
                    <a href="#" class="nav-item nav-link px-2 py-1">About Us</a>
                    <a href="#" class="nav-item nav-link px-2 py-1">Blog</a>
                    <a href="#" class="nav-item nav-link px-2 py-1">Contact</a>
                @endguest
            </div>
        </div>

        <!-- Authentication Links -->
        <div class="navbar-nav ms-auto">
            @guest
                <!-- Show Login and Register -->
                <li class="nav-item">
                    <a class="nav-link px-2 py-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <!-- Authenticated User Dropdown -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle px-2 py-1" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('myLearning') }}">My Learning</a>

                        @if (auth()->user()->hasRole('super_admin'))
                            <a class="dropdown-item" href="{{ url('/admin') }}">Admin Panel</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            @endguest
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</main>
