{{--
    File: resources/views/livewire/article-list.blade.php

    Komponen ini menampilkan daftar artikel dengan fungsionalitas pencarian,
    filter berdasarkan rentang tanggal, dan pengurutan (terbaru/terlama).
--}}
<div>
    {{-- Bagian Header dan Kontrol Interaktif --}}
    <div class="mb-5">
        <h1 class="display-5 fw-bold">Artikel Terkini</h1>
        <p class="text-muted">Temukan wawasan dan informasi terbaru dari kami.</p>

        {{-- Kontrol Pencarian dan Pengurutan --}}
        <div class="row g-3 align-items-center mt-4">
            {{-- Input Pencarian --}}
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input wire:model.live.debounce.300ms="search" type="text" class="form-control form-control-lg"
                        placeholder="Cari artikel berdasarkan judul...">
                </div>
            </div>

            {{-- [DIUBAH] Kontrol Pengurutan (Sort) --}}
            <div class="col-md-4 d-flex justify-content-md-end">
                <select wire:model.live="sortDirection" class="form-select form-select-lg" aria-label="Urutkan artikel">
                    <option value="desc">Urutkan: Terbaru</option>
                    <option value="asc">Urutkan: Terlama</option>
                </select>
            </div>
        </div>

        {{-- [BARU] Kontrol Filter Tanggal --}}
        <div class="row g-3 align-items-end mt-3">
            <div class="col-md-4">
                <label for="startDate" class="form-label">Tanggal Mulai</label>
                <input wire:model.live="startDate" id="startDate" type="date" class="form-control form-control-lg">
            </div>
            <div class="col-md-4">
                <label for="endDate" class="form-label">Tanggal Akhir</label>
                <input wire:model.live="endDate" id="endDate" type="date" class="form-control form-control-lg">
            </div>
            <div class="col-md-4">
                {{-- Tombol untuk mereset filter tanggal --}}
                <button wire:click="resetFilters" class="btn btn-lg btn-secondary w-100">
                    <i class="fa fa-sync-alt me-2"></i> Reset Filter
                </button>
            </div>
        </div>
    </div>

    {{-- Indikator Loading --}}
    <div wire:loading.delay.long class="text-center my-4 w-100">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Memuat artikel...</span>
        </div>
        <p class="mt-2 text-muted">Memuat artikel...</p>
    </div>

    {{-- Grid Artikel --}}
    <div wire:loading.remove>
        @if ($articles->isNotEmpty())
            <div class="row g-4">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="card w-100 shadow-sm border-0" style="border-radius: 20px;"
                            wire:key="{{ $article->id }}">
                            <a href="{{ route('artikel.show', $article->slug) }}">
                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 200px; object-fit: cover;"
                                    loading="lazy" alt="{{ $article->title }}">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    <a href="{{ route('artikel.show', $article->slug) }}"
                                        class="text-decoration-none text-dark">
                                        {{ Str::limit($article->title, 50) }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted small mb-3">
                                    <i class="fa fa-calendar-alt me-1"></i>
                                    {{ $article->created_at->diffForHumans() }}
                                </p>
                                <div class="mt-auto pt-3">
                                    <a href="{{ route('artikel.show', $article->slug) }}"
                                        class="btn btn-primary w-100 stretched-link">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-12 text-center py-5">
                <i class="fa fa-newspaper fa-3x text-muted mb-3"></i>
                <h4>Oops! Artikel tidak ditemukan.</h4>
                <p class="text-muted">Coba gunakan kata kunci lain atau ubah filter Anda.</p>
            </div>
        @endif

        {{-- Paginasi --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
</div>
