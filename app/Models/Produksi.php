<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'user_id',
        'tanggal_produksi',
        'jumlah_produksi',
        'total_berat',
=======
        'pesanan_id',
        'user_id',
        'tanggal_produksi',
        'jumlah_produksi',
>>>>>>> c46f660 (initial commit project SIBAKSO)
        'keterangan',
    ];

    protected $casts = [
        'tanggal_produksi' => 'date',
    ];

<<<<<<< HEAD
    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class, 'produksi_pesanan');
=======
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function pesanans()
    {
        return $this->belongsToMany(
            Pesanan::class,
            'produksi_pesanan'
        );
>>>>>>> c46f660 (initial commit project SIBAKSO)
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produksiDetails()
    {
        return $this->hasMany(ProduksiDetail::class);
    }

    protected static function booted()
    {
        static::created(function ($produksi) {
<<<<<<< HEAD
            if ($produksi->pesanans()->exists()) {
                $produksi->pesanans()->each(function ($pesanan) {
                    if ($pesanan->status_produksi === 'menunggu') {
                        $pesanan->update(['status_produksi' => 'diproduksi']);
                    }
                });
            }
        });
    }
}
=======

            if ($produksi->pesanan) {
                $produksi->pesanan->update([
                    'status_produksi' => 'diproduksi'
                ]);
            }

        });
    }
}
>>>>>>> c46f660 (initial commit project SIBAKSO)
