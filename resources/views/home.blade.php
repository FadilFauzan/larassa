@extends('layouts.main')

@section('container')
    @if (session('login'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('login') }}",
                icon: 'success',
                confirmButtonText: "Oke",
            });
        </script>
    @endif

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <div class="mask-container">
            <main class="content">
                <h1>Habis Lara <span>Terbitlah Rassa</span></h1>
                <p>Lebih dari sekadar kopi, ini adalah perjalanan rasa yang menyatu dalam setiap sajian, menghidupkan
                    momen di tiap tegukan dan suapan.</p>
            </main>
        </div>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about">
        <h2 class="mb-5"><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="/img/larassa.jpg" alt="Tentang Kami" class="rounded">
            </div>
            <div class="content text-justify">
                <p>Selamat datang di <strong>Larassa Coffee & Eat</strong>, ruang hangat untuk menikmati kopi terbaik
                    dan sajian lezat dalam suasana yang nyaman. Kami percaya bahwa kopi dan makanan bukan hanya soal
                    rasa, tapi tentang momen-momen kebersamaan, istirahat, dan inspirasi.</p>

                <p>Di Larassa, kami menggunakan biji kopi pilihan dari petani lokal Indonesia dan mengolahnya dengan
                    penuh dedikasi. Tak hanya kopi, kami juga menyajikan berbagai hidangan favorit yang siap memanjakan
                    lidah Anda, Mulai dari camilan ringan hingga menu makanan utama.</p>

                <p>Temukan kenikmatan dalam setiap tegukan dan suapan, di tempat yang membuat Anda merasa seperti di
                    rumah sendiri. <strong>Larassa Coffee & Eat</strong>, karena cerita terbaik selalu dimulai dari meja
                    yang sederhana.</p>
            </div>
        </div>
    </section>
    <!-- About Section end -->

    <!-- Gallery Section start -->
    <section id="gallery" class="gallery text-center">
        <h2><span>Galeri</span> Larassa</h2>
        <p class="mb-4">Intip suasana hangat dan cita rasa yang kami sajikan melalui galeri foto kami. Setiap sudut
            coffee shop dan setiap menu kami dihadirkan dengan sepenuh hati, menciptakan pengalaman yang tak hanya
            memanjakan lidah, tetapi juga indah untuk dikenang.
        </p>

        <div class="container-lg">
            <div id="carouselExampleFade" class="carousel slide carousel-fade rounded" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/galeri/galeri1.jpg" class="d-block w-100 rounded img-fluid" alt="Suasana Coffee Shop"
                            style="object-fit: cover; height: 100%; max-height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/galeri/galeri2.jpg" class="d-block w-100 rounded img-fluid"
                            alt="Latte Art Kopi Spesial" style="object-fit: cover; height: 100%; max-height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/galeri/galeri3.jpg" class="d-block w-100 rounded img-fluid"
                            alt="Menu Makanan Favorit" style="object-fit: cover; height: 100%; max-height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/galeri/galeri4.jpg" class="d-block w-100 rounded img-fluid"
                            alt="Menu Makanan Favorit" style="object-fit: cover; height: 100%; max-height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/galeri/galeri5.jpg" class="d-block w-100 rounded img-fluid"
                            alt="Menu Makanan Favorit" style="object-fit: cover; height: 100%; max-height: 500px;">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </section>
    <!-- Gallery Section end -->

    <!-- Event Section start -->
    <section id="event" class="event text-center mb-4">
        <h2>Lara<span>Fest</span></h2>

        <div class="container" style="max-width: 720px;">
            <p style="font-size: 1.1rem; line-height: 1.7; text-align: center;">
                LaraFest adalah signature event dari Larassa yang nggabungin musik live, ambience cozy, dan suasana
                penuh cerita. Dirancang buat lo yang pengin healing sambil nikmatin alunan musik keren di tempat yang
                penuh rasa. Ini bukan sekadar event, ini cara baru nikmatin akhir pekan!
            </p>

            <p
                style="font-size: 1rem; font-weight: 600; color: #ff914d; letter-spacing: 1px; text-transform: uppercase; padding-top: 15px">
                — Event Spesial Akan Datang —
            </p>

            <h1 class="mb-4">{{ $event->title }}</h1>

            @if ($event->image && file_exists(public_path('storage/' . $event->image)))
                <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid rounded"
                    style="box-shadow: 0 4px 20px rgba(192, 190, 190, 0.44);" alt="event Image">
            @else
                <img src="{{ asset($event->image) }}" alt="Default Image" class="img-fluid">
            @endif

            <p style="font-size: 1.1rem; line-height: 1.7; text-align: justify; padding-top:15px;">
                {{ $event->description }}
            </p>

            <p>
                Waktu Event: {{ \Carbon\Carbon::parse($event->date)->locale('id')->translatedFormat('l, d F Y') }}
            </p>

            <p class="text-muted" style="font-style: italic;">
                #habislaraterbitlahrassa #singgahdilarassa
            </p>
        </div>
    </section>
    <!-- Event Section end -->


    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Punya pertanyaan, ingin melakukan reservasi, atau sekadar ingin menyapa kami? Jangan ragu untuk menghubungi
            kami melalui kontak berikut. Kami selalu senang mendengar dari Anda dan siap membantu kapan saja
        </p>

        <div class="row">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5097720917183!2d106.79597370073212!3d-6.327925077031916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef5ef6a1075b%3A0x76020e03b8afef51!2sLarassa%20Coffee%20%26%20Eat!5e0!3m2!1sid!2sid!4v1746617730712!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <form action="{{ route('send.to.whatsapp') }}" method="POST" class="dark-form">
                @csrf
                <div class="form-group my-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Pesan</label>
                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirim ke WhatsApp</button>
                <div class="text-center mt-3">
                    <small class="text-muted">
                        Jika ini pertama kali Anda menghubungi kami dan pesan tidak muncul otomatis di WhatsApp,<br>
                        silakan <a href="https://wa.me/6281230797357">klik untuk membuka chat langsung</a>.
                    </small><br>
                </div>
            </form>

        </div>
    </section>
    <!-- Contact Section end -->

    <script>
        // scroll handling
        document.addEventListener("DOMContentLoaded", function() {
            const hash = window.location.hash;

            if (hash) {
                const target = document.querySelector(hash);
                if (target) {
                    // Delay supaya semua layout siap (termasuk gambar/font/navbar)
                    setTimeout(() => {
                        const y = target.getBoundingClientRect().top + window.pageYOffset;

                        window.scrollTo({
                            top: y,
                            behavior: 'auto'
                        });
                    }, 600);
                }
            }
        });
    </script>
@endsection
