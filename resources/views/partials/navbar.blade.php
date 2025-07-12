<!-- Navbar start -->
<nav class="custom-navbar">
    <a href="#home">
        <img src="/img/logo.png" alt="Larassa Logo" style="width: 100px;">
    </a>

    <div class="custom-navbar-nav">
        <a href="{{ url('/#home') }}" class="nav-link scroll-link" data-target="home">Home</a>
        <a href="{{ url('/#about') }}" class="nav-link scroll-link" data-target="about">Tentang Kami</a>
        <a href="{{ url('/#gallery') }}" class="nav-link scroll-link" data-target="gallery">Galeri</a>
        <a href="{{ url('/#event') }}" class="nav-link scroll-link" data-target="event">Event</a>
        <a href="{{ url('/#contact') }}" class="nav-link scroll-link" data-target="contact">Kontak</a>
        <a href="/menus" class="{{ request()->is('menus') ? 'active' : '' }}">Menu</a>
    </div>

    <div class="custom-navbar-extra d-flex align-items-center">
        {{-- <a href="#" id="search-button"><i data-feather="search"></i></a> --}}

        @auth
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ ucwords(auth()->user()->name) }}
                    <img id="profileImage"class="mx-2"
                        src="{{ auth()->user()->profile_image
                            ? asset('storage/' . auth()->user()->profile_image)
                            : asset(
                                'https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg',
                            ) }}"
                        alt="Profile Image" class="img-fluid rounded-circle ms-2" style="height: 20px; width: 20px;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @can('admin')
                        <li><a class="dropdown-item text-dark" href="/dashboard">Dashboard</a></li>
                    @endcan
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button class="dropdown-item text-dark" type="submit"
                                onclick="return confirm('Want to log out? Don’t forget to come back!')">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            @else
                <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'active' : '' }}">
                    <i data-feather="log-in"></i>
                </a>
            @endauth
        </div>

        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->
</nav>
<!-- Navbar end -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll('.scroll-link');
        const sections = document.querySelectorAll("section[id]");
        const offset = 100; // tinggi offset untuk header jika fixed

        function setActiveLink(id) {
            links.forEach(link => {
                link.classList.remove("active");
                if (link.dataset.target === id) {
                    link.classList.add("active");
                }
            });
        }

        function onScroll() {
            let scrollPos = window.scrollY + offset;

            sections.forEach(section => {
                if (
                    scrollPos >= section.offsetTop &&
                    scrollPos < section.offsetTop + section.offsetHeight
                ) {
                    setActiveLink(section.id);
                }
            });
        }

        window.addEventListener("scroll", onScroll);
        onScroll(); // jalankan saat pertama dimuat

        // Klik manual tetap aktif
        links.forEach(link => {
            link.addEventListener("click", () => {
                setTimeout(() => {
                    setActiveLink(link.dataset.target);
                }, 300);
            });
        });
    });
</script>
