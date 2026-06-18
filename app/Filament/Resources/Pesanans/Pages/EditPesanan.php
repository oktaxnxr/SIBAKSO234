<?php

namespace App\Filament\Resources\Pesanans\Pages;

use App\Filament\Resources\Pesanans\PesananResource;
<<<<<<< HEAD
=======
use App\Models\Pelanggan;
>>>>>>> c46f660 (initial commit project SIBAKSO)
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPesanan extends EditRecord
{
    protected static string $resource = PesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

<<<<<<< HEAD

=======
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $pelanggan = Pelanggan::find($data['pelanggan_id']);
        $data['nama_pelanggan'] = $pelanggan->nama;

        return $data;
    }
>>>>>>> c46f660 (initial commit project SIBAKSO)
}
