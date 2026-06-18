<?php

namespace App\Filament\Resources\Pesanans\Pages;

use App\Filament\Resources\Pesanans\PesananResource;
<<<<<<< HEAD
=======
use App\Models\Pelanggan;
>>>>>>> c46f660 (initial commit project SIBAKSO)
use Filament\Resources\Pages\CreateRecord;

class CreatePesanan extends CreateRecord
{
    protected static string $resource = PesananResource::class;
<<<<<<< HEAD
=======

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $pelanggan = Pelanggan::find($data['pelanggan_id']);
        $data['nama_pelanggan'] = $pelanggan->nama;

        return $data;
    }
>>>>>>> c46f660 (initial commit project SIBAKSO)
}
