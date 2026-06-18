<?php

namespace App\Filament\Karyawan\Pages;

use Filament\Pages\Page;
use App\Models\Pesanan;
use App\Models\Produksi;
use Filament\Notifications\Notification;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> c46f660 (initial commit project SIBAKSO)

class AmbilPesanan extends Page
{
    protected string $view = 'filament.karyawan.pages.ambil-pesanan';

<<<<<<< HEAD
    public $selectedPesanan = [];

    public function ambil()
    {
        $selectedIds = array_keys(array_filter($this->selectedPesanan ?? []));

        if (empty($selectedIds)) {
            Notification::make()
                ->title('Pilih minimal satu pesanan')
                ->danger()
                ->send();
            return;
        }

        $pesanans = Pesanan::whereIn('id', $selectedIds)
=======
    public $tanggal;
    public $pesanans = [];

    public function mount()
    {
        // tampil semua pesanan menunggu saat pertama buka halaman
        $this->pesanans = Pesanan::with('pelanggan')
            ->where('status_produksi', 'menunggu')
            ->get();
    }

    public function updatedTanggal()
    {
        $this->pesanans = Pesanan::with('pelanggan')
            ->when($this->tanggal, function ($query) {
                $query->whereDate('tanggal_ambil', $this->tanggal);
            })
            ->where('status_produksi', 'menunggu')
            ->get();
    }

    public function ambilTanggal()
    {
        if (!$this->tanggal) {
            Notification::make()
                ->title('Pilih tanggal terlebih dahulu')
                ->danger()
                ->send();

            return;
        }

        $pesanans = Pesanan::whereDate('tanggal_ambil', $this->tanggal)
>>>>>>> c46f660 (initial commit project SIBAKSO)
            ->where('status_produksi', 'menunggu')
            ->get();

        if ($pesanans->isEmpty()) {
            Notification::make()
<<<<<<< HEAD
                ->title('Pesanan sudah tidak tersedia')
                ->danger()
                ->send();
            return;
        }

        $totalBerat = $pesanans->sum(fn ($p) => $p->berat_total_gram);
        $totalPcs = (int) ceil($totalBerat / 200);

        $produksi = Produksi::create([
            'user_id' => Auth::id(),
            'tanggal_produksi' => now(),
            'jumlah_produksi' => $totalPcs,
            'total_berat' => $totalBerat,
            'keterangan' => 'Diambil oleh karyawan',
=======
                ->title('Tidak ada pesanan pada tanggal tersebut')
                ->danger()
                ->send();

            return;
        }

        $totalJumlah = $pesanans->sum('jumlah');

        $produksi = Produksi::create([
            'pesanan_id' => $pesanans->first()->id,
            'user_id' => auth()->id(),
            'tanggal_produksi' => now(),
            'jumlah_produksi' => $totalJumlah,
            'keterangan' => 'Produksi gabungan tanggal ' . $this->tanggal,
>>>>>>> c46f660 (initial commit project SIBAKSO)
        ]);

        foreach ($pesanans as $pesanan) {
            $produksi->pesanans()->attach($pesanan->id);
<<<<<<< HEAD
        }

        Notification::make()
            ->title(count($pesanans) . ' pesanan berhasil diambil untuk produksi')
            ->success()
            ->send();

        $this->selectedPesanan = [];
    }
}
=======

            $pesanan->update([
                'status_produksi' => 'diproduksi',
            ]);
        }

        $this->pesanans = [];

        Notification::make()
            ->title('Pesanan berhasil diambil')
            ->success()
            ->send();

        // reload data setelah ambil
        $this->mount();
    }
}
>>>>>>> c46f660 (initial commit project SIBAKSO)
