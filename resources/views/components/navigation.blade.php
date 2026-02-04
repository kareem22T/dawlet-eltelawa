<nav class="nav">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="nav-logo-image">
        </div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ route('home') }}"
                    class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">الرئيسية</a></li>
            <li><a href="#about" class="nav-link">عن المسابقة</a></li>
            <li><a href="#contestants" class="nav-link">المتسابقون</a></li>
            <li><a href="{{ route('results') }}"
                    class="nav-link {{ request()->routeIs('results') ? 'nav-link-active' : '' }}">النتائج المباشرة</a>
            </li>
        </ul>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>
</nav>
