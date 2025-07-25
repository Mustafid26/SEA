@extends('layouts.main')


@push('styles')
    <style>
        /* === Styling untuk Konten Artikel === */
        .article-body {
            font-size: 1.1rem;
            /* Ukuran font yang nyaman dibaca */
            line-height: 1.8;
            /* Jarak antar baris yang lega */
            color: #343a40;
        }

        .article-body h1,
        .article-body h2,
        .article-body h3,
        .article-body h4,
        .article-body h5 {
            margin-top: 2.5rem;
            margin-bottom: 1.2rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .article-body p {
            margin-bottom: 1.5rem;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .article-body blockquote {
            border-left: 4px solid #0d6efd;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #6c757d;
        }

        .article-body ul,
        .article-body ol {
            padding-left: 2rem;
            margin-bottom: 1.5rem;
        }

        /* === Styling untuk Breadcrumb === */
        .breadcrumb-item a {
            color: #212529;
            /* Warna hitam untuk visibilitas */
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-item a:hover {
            color: #0d6efd;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }


        /* === Styling untuk Tombol Aksi Mengambang (FAB) === */
        .fab {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background-color: #0d6efd;
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            font-size: 1.5rem;
            display: none;
            /* Sembunyi secara default */
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1050;
        }

        .fab:hover {
            background-color: #0b5ed7;
            transform: scale(1.05);
        }

        /* === Styling untuk Tombol Berbagi Sosial === */
        .share-buttons .btn {
            transition: all 0.2s ease-in-out;
            color: #212529;
            /* Mengubah warna ikon menjadi hitam */
        }

        .share-buttons .btn:hover {
            transform: translateY(-3px);
            background-color: #e9ecef;
        }
    </style>
@endpush

@section('konten')
    <div class="container py-5">
        <div class="row justify-content-center">
            {{-- Kolom utama konten, dibuat lebih sempit (col-lg-8) untuk kenyamanan membaca --}}
            <div class="col-lg-8">

                <!-- Breadcrumbs untuk Navigasi -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/artikel">Artikel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($artikel->title, 30) }}</li>
                    </ol>
                </nav>

                <!-- Judul Artikel -->
                <h1 class="display-4 fw-bold mb-3">{{ $artikel->title }}</h1>

                <!-- Meta Info Artikel -->
                <div class="d-flex align-items-center text-muted mb-4 flex-wrap">
                    <span class="me-3 mb-2"><i class="bi bi-person-fill me-2"></i>{{ $artikel->author->name }}</span>
                    <span class="me-3 mb-2"><i
                            class="bi bi-calendar3 me-2"></i>{{ $artikel->created_at->format('d F Y') }}</span>
                    {{-- Estimasi Waktu Baca (rata-rata 200 kata per menit) --}}
                    @php
                        $wordCount = str_word_count(strip_tags($artikel->body));
                        $readTime = ceil($wordCount / 200);
                    @endphp
                    <span class="mb-2"><i class="bi bi-clock-history me-2"></i>{{ $readTime }} menit baca</span>
                </div>

                <!-- Gambar Utama Artikel -->
                <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->title }}"
                    class="img-fluid rounded-3 shadow-lg mb-5">

                <!-- Isi Artikel -->
                <article class="article-body">
                    {!! $artikel->body !!}
                </article>

            </div>
        </div>
    </div>

    <!-- Tombol FAB untuk Scroll ke Atas -->
    <button class="fab" id="scrollToTopBtn" onclick="scrollToTop()">
        <i class="bi bi-arrow-up"></i>
    </button>
@endsection

@push('scripts')
    <script>
        // --- Logika untuk Tombol Scroll to Top ---
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

        // Tampilkan tombol jika pengguna scroll lebih dari 200px
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                scrollToTopBtn.style.display = "flex";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        };

        // Fungsi untuk scroll ke atas dengan smooth
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // --- Logika untuk Tombol Salin Tautan ---
        function copyLink(buttonElement) {
            // Buat elemen textarea sementara untuk menyalin teks
            const tempTextArea = document.createElement('textarea');
            tempTextArea.value = window.location.href;
            document.body.appendChild(tempTextArea);
            tempTextArea.select();
            document.execCommand('copy');
            document.body.removeChild(tempTextArea);

            // Beri feedback visual kepada pengguna
            const originalIcon = buttonElement.innerHTML;
            buttonElement.innerHTML = '<i class="bi bi-check-lg"></i> Disalin!';
            buttonElement.classList.add('btn-success', 'text-white');

            setTimeout(() => {
                buttonElement.innerHTML = originalIcon;
                buttonElement.classList.remove('btn-success', 'text-white');
            }, 2000); // Kembalikan ke semula setelah 2 detik
        }
    </script>
@endpush
