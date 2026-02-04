<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'المتأهلون الـ 32')</title>

    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    @stack('styles')
</head>

<body>
    <!-- Navigation -->
    @include('components.navigation')

    <!-- Mobile Navigation Overlay -->
    <div class="nav-overlay" id="navOverlay"></div>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('components.footer')

    <!-- Voting Modal -->
    @include('components.voting-modal')

    <!-- Thank You Modal -->
    @include('components.thanks-modal')

    <script>
        // Mobile Navigation Toggle
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        const navOverlay = document.getElementById('navOverlay');
        const body = document.body;

        function toggleMenu() {
            navMenu.classList.toggle('nav-menu-open');
            navOverlay.classList.toggle('nav-overlay-active');
            navToggle.classList.toggle('nav-toggle-active');
            body.classList.toggle('overflow-hidden');
        }

        navToggle.addEventListener('click', toggleMenu);
        navOverlay.addEventListener('click', toggleMenu);

        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navMenu.classList.contains('nav-menu-open')) {
                    toggleMenu();
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
