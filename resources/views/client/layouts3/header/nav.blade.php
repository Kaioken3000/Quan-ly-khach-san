<!-- Nav START -->
<nav class="navbar navbar-expand-xl z-index-9 navbar-divider">
    <div class="container">
        <!-- Logo START -->
        <a class="navbar-brand" href="#">
            <img class="light-mode-item navbar-brand-item" src="/booking/assets/images/logo.svg" alt="logo">
            <img class="dark-mode-item navbar-brand-item" src="/booking/assets/images/logo-light.svg" alt="logo">
        </a>
        <!-- Logo END -->

        <!-- Responsive navbar toggler -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-search fs-4"> </i>
        </button>

        <!-- Responsive navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2"
            aria-controls="navbarCollapse2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-animation">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        @include('client.layouts3.header.mainNavBar')

        @auth
            @include('client.layouts3.header.profile')
        @endauth
        @guest
            @include('client.layouts3.header.loginRegister')
        @endguest


    </div>
</nav>
<!-- Nav END -->
