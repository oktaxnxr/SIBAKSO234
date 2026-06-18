<?php

namespace App\Filament\Karyawan\Pages;

use Filament\Pages\Page;
use App\Models\BahanBaku;
use App\Models\ProduksiDetail;
use App\Models\Produksi;
use Filament\Notifications\Notification;

class ProduksiSaya extends Page
{
<<<<<<< HEAD
    protected string $view = 'filament.karyawan.pages.produksi-saya';
=======
    protected  string $view = 'filament.karyawan.pages.produksi-saya';
>>>>>>> c46f660 (initial commit project SIBAKSO)

    protected static ?string $navigationLabel = 'Produksi Saya';

    public $bahan_id = null;
    public $jumlah = null;

<<<<<<< HEAD
=======
    /*
    |--------------------------------------------------------------------------
    | SELESAIKAN PRODUKSI
    |--------------------------------------------------------------------------
    */
>>>>>>> c46f660 (initial commit project SIBAKSO)
    public function selesaikan($id)
    {
        $produksi = Produksi::where('user_id', auth()->id())
            ->findOrFail($id);

<<<<<<< HEAD
        $selesai = true;
        foreach ($produksi->pesanans as $pesanan) {
            if ($pesanan->status_produksi !== 'diproduksi') {
                $selesai = false;
                break;
            }
        }

        if (!$selesai) {
            return;
        }

        foreach ($produksi->pesanans as $pesanan) {
            $pesanan->update(['status_produksi' => 'selesai']);
        }
=======
        if ($produksi->pesanan->status_produksi !== 'diproduksi') {
            return;
        }

        $produksi->pesanan->update([
            'status_produksi' => 'selesai'
        ]);
>>>>>>> c46f660 (initial commit project SIBAKSO)

        Notification::make()
            ->title('Produksi berhasil diselesaikan')
            ->success()
            ->send();
    }

<<<<<<< HEAD
    public function tambahBahan($produksiId)
    {
=======
    /*
    |--------------------------------------------------------------------------
    | TAMBAH BAHAN
    |--------------------------------------------------------------------------
    */
    public function tambahBahan($produksiId)
    {
        // Validasi input kosong
>>>>>>> c46f660 (initial commit project SIBAKSO)
        if (!$this->bahan_id || !$this->jumlah) {
            Notification::make()
                ->title('Bahan dan jumlah wajib diisi')
                ->danger()
                ->send();
            return;
        }

        if ($this->jumlah <= 0) {
            Notification::make()
                ->title('Jumlah harus lebih dari 0')
                ->danger()
                ->send();
            return;
        }

        $produksi = Produksi::where('user_id', auth()->id())
            ->findOrFail($produksiId);

        $bahan = BahanBaku::findOrFail($this->bahan_id);

<<<<<<< HEAD
=======
        // Validasi stok
>>>>>>> c46f660 (initial commit project SIBAKSO)
        if ($this->jumlah > $bahan->stok) {
            Notification::make()
                ->title('Stok tidak mencukupi')
                ->body('Sisa stok: ' . $bahan->stok . ' ' . $bahan->satuan)
                ->danger()
                ->send();
            return;
        }

        ProduksiDetail::create([
            'produksi_id' => $produksi->id,
            'bahan_baku_id' => $bahan->id,
            'jumlah_digunakan' => $this->jumlah,
        ]);

        Notification::make()
            ->title('Bahan berhasil ditambahkan')
            ->success()
            ->send();

        $this->reset(['bahan_id', 'jumlah']);
    }

<<<<<<< HEAD
=======
    /*
    |--------------------------------------------------------------------------
    | GETTER UNTUK STOK REACTIVE
    |--------------------------------------------------------------------------
    */
>>>>>>> c46f660 (initial commit project SIBAKSO)
    public function getStokBahanProperty()
    {
        if (!$this->bahan_id) {
            return null;
        }

        return BahanBaku::find($this->bahan_id);
    }
}
