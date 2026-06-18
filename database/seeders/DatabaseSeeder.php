<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BahanBaku;
use App\Models\Pesanan;
use App\Models\Produksi;
use App\Models\ProduksiDetail;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\Pelanggan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
=======
        // =============================
        // 1️⃣ USER
        // =============================

>>>>>>> c46f660 (initial commit project SIBAKSO)
        $admin = User::create([
            'name' => 'Admin Bakso',
            'email' => 'admin234@bakso.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $karyawan = User::create([
            'name' => 'Budi Produksi',
            'email' => 'karyawan@bakso.com',
            'password' => Hash::make('password'),
            'role' => 'karyawan',
        ]);

<<<<<<< HEAD
        Auth::login($karyawan);

        $tepung = BahanBaku::create([
            'nama_bahan' => 'Tepung Terigu',
            'stok' => 50000,
            'satuan' => 'gram',
            'jenis' => 'bahan_utama',
            'minimum_stok' => 10000,
=======
        // 🔥 SIMULASI LOGIN KARYAWAN
        Auth::login($karyawan);

        // =============================
        // 2️⃣ BAHAN BAKU
        // =============================

        $tepung = BahanBaku::create([
            'nama_bahan' => 'Tepung',
            'stok' => 50,
            'satuan' => 'kg',
            'minimum_stok' => 10,
>>>>>>> c46f660 (initial commit project SIBAKSO)
        ]);

        $daging = BahanBaku::create([
            'nama_bahan' => 'Daging Ayam',
<<<<<<< HEAD
            'stok' => 40000,
            'satuan' => 'gram',
            'jenis' => 'bahan_utama',
            'minimum_stok' => 8000,
        ]);

        $bumbu = BahanBaku::create([
            'nama_bahan' => 'Bumbu Halus',
            'stok' => 20000,
            'satuan' => 'gram',
            'jenis' => 'bumbu',
            'minimum_stok' => 5000,
        ]);

        $telur = BahanBaku::create([
            'nama_bahan' => 'Telur',
            'stok' => 50,
            'satuan' => 'butir',
            'jenis' => 'bahan_utama',
            'minimum_stok' => 10,
        ]);
=======
            'stok' => 40,
            'satuan' => 'kg',
            'minimum_stok' => 8,
        ]);

        $bumbu = BahanBaku::create([
            'nama_bahan' => 'Bumbu',
            'stok' => 20,
            'satuan' => 'kg',
            'minimum_stok' => 5,
        ]);

        // =============================
        // 3️⃣ PEMASOK
        // =============================
>>>>>>> c46f660 (initial commit project SIBAKSO)

        $pemasok1 = Pemasok::create([
            'nama_toko' => 'Toko Tepung Sejahtera',
            'alamat' => 'Jl. Industri No. 10, Bangkinang',
            'nohp' => '081276543210',
        ]);

        $pemasok2 = Pemasok::create([
            'nama_toko' => 'Supplier Daging Ayam',
            'alamat' => 'Jl. Peternakan No. 5, Bangkinang',
            'nohp' => '081298765432',
        ]);

<<<<<<< HEAD
        Pembelian::create([
            'pemasok_id' => $pemasok1->id,
            'bahan_baku_id' => $tepung->id,
            'jumlah' => 10000,
=======
        // =============================
        // 4️⃣ PEMBELIAN (otomatis nambah stok)
        // =============================

        Pembelian::create([
            'pemasok_id' => $pemasok1->id,
            'bahan_baku_id' => $tepung->id,
            'jumlah' => 10,
>>>>>>> c46f660 (initial commit project SIBAKSO)
            'tgl_beli' => now(),
            'harga' => 150000,
        ]);

        Pembelian::create([
            'pemasok_id' => $pemasok2->id,
            'bahan_baku_id' => $daging->id,
<<<<<<< HEAD
            'jumlah' => 8000,
=======
            'jumlah' => 8,
>>>>>>> c46f660 (initial commit project SIBAKSO)
            'tgl_beli' => now(),
            'harga' => 320000,
        ]);

<<<<<<< HEAD
        $pelanggan1 = Pelanggan::create([
=======
        // =============================
        // 5️⃣ PELANGGAN
        // =============================

        $pelanggan = Pelanggan::create([
>>>>>>> c46f660 (initial commit project SIBAKSO)
            'nama' => 'Andi',
            'alamat' => 'Bangkinang',
            'nohp' => '081234567890',
        ]);

<<<<<<< HEAD
        $pelanggan2 = Pelanggan::create([
            'nama' => 'Siti',
            'alamat' => 'Bangkinang Kota',
            'nohp' => '081234567891',
        ]);

        $pesanan1 = Pesanan::create([
            'pelanggan_id' => $pelanggan1->id,
            'jumlah' => 100,
            'satuan' => 'pcs',
=======
        // =============================
        // 6️⃣ PESANAN
        // =============================

        $pesanan = Pesanan::create([
            'pelanggan_id' => $pelanggan->id,
            'jumlah' => 10,
>>>>>>> c46f660 (initial commit project SIBAKSO)
            'alamat' => 'Bangkinang',
            'no_hp' => '081234567890',
            'tanggal_ambil' => now()->addDay(),
            'status_pembayaran' => 'lunas',
<<<<<<< HEAD
            'status_produksi' => 'menunggu',
        ]);

        $pesanan2 = Pesanan::create([
            'pelanggan_id' => $pelanggan2->id,
            'jumlah' => 5,
            'satuan' => 'kg',
            'alamat' => 'Bangkinang Kota',
            'no_hp' => '081234567891',
            'tanggal_ambil' => now()->addDay(),
            'status_pembayaran' => 'belum_lunas',
            'status_produksi' => 'menunggu',
        ]);

        $produksi = Produksi::create([
            'user_id' => $karyawan->id,
            'tanggal_produksi' => now(),
            'jumlah_produksi' => 125,
            'total_berat' => 25000,
            'keterangan' => 'Produksi pagi hari',
        ]);

        $produksi->pesanans()->attach($pesanan1->id);
        $produksi->pesanans()->attach($pesanan2->id);

        $pesanan1->update(['status_produksi' => 'diproduksi']);
        $pesanan2->update(['status_produksi' => 'diproduksi']);
=======
            'status_produksi' => 'diproduksi',
        ]);

        // =============================
        // 7️⃣ PRODUKSI
        // =============================

        $produksi = Produksi::create([
            'pesanan_id' => $pesanan->id,
            'user_id' => $karyawan->id,
            'tanggal_produksi' => now(),
            'jumlah_produksi' => 10,
            'keterangan' => 'Produksi pagi hari',
        ]);

        // =============================
        // 8️⃣ PRODUKSI DETAIL
        // =============================
>>>>>>> c46f660 (initial commit project SIBAKSO)

        ProduksiDetail::create([
            'produksi_id' => $produksi->id,
            'bahan_baku_id' => $tepung->id,
<<<<<<< HEAD
            'jumlah_digunakan' => 5000,
=======
            'jumlah_digunakan' => 5,
>>>>>>> c46f660 (initial commit project SIBAKSO)
        ]);

        ProduksiDetail::create([
            'produksi_id' => $produksi->id,
            'bahan_baku_id' => $daging->id,
<<<<<<< HEAD
            'jumlah_digunakan' => 7000,
=======
            'jumlah_digunakan' => 7,
>>>>>>> c46f660 (initial commit project SIBAKSO)
        ]);

        ProduksiDetail::create([
            'produksi_id' => $produksi->id,
            'bahan_baku_id' => $bumbu->id,
<<<<<<< HEAD
            'jumlah_digunakan' => 2000,
        ]);

=======
            'jumlah_digunakan' => 2,
        ]);

        // Logout setelah selesai
>>>>>>> c46f660 (initial commit project SIBAKSO)
        Auth::logout();
    }
}
