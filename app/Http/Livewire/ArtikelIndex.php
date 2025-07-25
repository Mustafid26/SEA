<?php

namespace App\Http\Livewire;

use App\Models\Artikel;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ArtikelIndex extends Component
{
    // Menggunakan trait untuk paginasi Livewire yang mulus
    use WithPagination;

    // --- Properti untuk State Komponen ---
    public string $search = '';
    public string $sortDirection = 'desc';
    public string $startDate = '';
    public string $endDate = '';
    public int $perPage = 6;

    /**
     * Lifecycle hook yang berjalan setiap kali ada perubahan pada properti
     * yang diikat dengan wire:model.live.
     */
    public function updated(): void
    {
        $this->resetPage();
    }

    /**
     * Aksi untuk mereset filter tanggal.
     */
    public function resetFilters(): void
    {
        $this->startDate = '';
        $this->endDate = '';
        $this->resetPage();
    }

    /**
     * Merender komponen dan mengirimkan data ke view.
     */
    public function render()
    {
        // 1. Buat kunci cache yang unik berdasarkan semua filter dan halaman saat ini.
        $page = $this->page;
        // Ambil versi cache terbaru, default ke 1 jika belum ada.
        $cacheVersion = Cache::get('artikel_version', 1);
        $cacheKey = "artikels.v{$cacheVersion}.page{$page}.search.{$this->search}.sort.{$this->sortDirection}.start.{$this->startDate}.end.{$this->endDate}";

        // 2. Gunakan Cache::rememberForever untuk mengambil data.
        $articles = Cache::rememberForever($cacheKey, function () {
            $query = Artikel::query()
                // [OPTIMASI] Hanya pilih kolom yang dibutuhkan.
                ->select(['id', 'title', 'slug', 'image', 'created_at'])
                // Terapkan pencarian jika $search tidak kosong
                ->when($this->search, function ($query) {
                    // Hanya cari di 'title' karena 'body' tidak diambil.
                    $query->where('title', 'like', '%' . $this->search . '%');
                })
                // Terapkan filter tanggal mulai jika $startDate diisi
                ->when($this->startDate, function ($query) {
                    $query->where('created_at', '>=', $this->startDate);
                })
                // Terapkan filter tanggal akhir jika $endDate diisi
                ->when($this->endDate, function ($query) {
                    $endDate = date('Y-m-d', strtotime($this->endDate . ' +1 day'));
                    $query->where('created_at', '<', $endDate);
                });

            // Terapkan pengurutan dan paginasi
            return $query->orderBy('created_at', $this->sortDirection)
                ->paginate($this->perPage);
        });

        return view('livewire.artikel-index', [
            'articles' => $articles,
            'active' => 'informasi'
        ]);
    }
}