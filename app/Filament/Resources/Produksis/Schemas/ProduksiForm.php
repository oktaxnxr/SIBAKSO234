<?php

namespace App\Filament\Resources\Produksis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use App\Models\Pesanan;
=======
>>>>>>> c46f660 (initial commit project SIBAKSO)

class ProduksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Produksi')
                    ->columns(2)
                    ->schema([

<<<<<<< HEAD
                        Select::make('pesanan_ids')
                            ->label('Pesanan')
                            ->options(
                                Pesanan::where('status_produksi', 'menunggu')
                                    ->get()
                                    ->mapWithKeys(fn ($p) => [
                                        $p->id => $p->pelanggan?->nama . ' (' . number_format($p->jumlah) . ' ' . $p->satuan . ' - ' . number_format($p->berat_total_gram) . 'gr)'
                                    ])
                            )
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->required()
                            ->helperText('Pilih satu atau lebih pesanan untuk diproduksi bersama.'),
=======
                        Select::make('pesanan_id')
                            ->label('Pesanan')
                            ->relationship(
                                name: 'pesanan',
                                titleAttribute: 'nama_pelanggan'
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->helperText('Pilih pesanan yang akan diproduksi.'),
>>>>>>> c46f660 (initial commit project SIBAKSO)

                        Select::make('user_id')
                            ->label('Diproduksi Oleh')
                            ->relationship(
                                name: 'user',
                                titleAttribute: 'name'
                            )
                            ->default(Auth::id())
                            ->disabled()
                            ->dehydrated()
                            ->required(),

                        DatePicker::make('tanggal_produksi')
                            ->label('Tanggal Produksi')
                            ->default(now())
                            ->required(),

                        TextInput::make('jumlah_produksi')
<<<<<<< HEAD
                            ->label('Jumlah Produksi (pcs)')
=======
                            ->label('Jumlah Produksi')
>>>>>>> c46f660 (initial commit project SIBAKSO)
                            ->numeric()
                            ->minValue(1)
                            ->required()
                            ->suffix('pcs'),
<<<<<<< HEAD

                        TextInput::make('total_berat')
                            ->label('Total Berat (gram)')
                            ->numeric()
                            ->minValue(1)
                            ->required()
                            ->suffix('gr'),
=======
>>>>>>> c46f660 (initial commit project SIBAKSO)
                    ]),

                Section::make('Penggunaan Bahan Baku')
                    ->description('Masukkan bahan baku yang digunakan untuk produksi.')
                    ->schema([

                        Repeater::make('produksiDetails')
                            ->relationship()
                            ->schema([

                                Select::make('bahan_baku_id')
                                    ->label('Bahan Baku')
                                    ->relationship(
                                        name: 'bahanBaku',
                                        titleAttribute: 'nama_bahan'
                                    )
                                    ->searchable()
                                    ->required(),

                                TextInput::make('jumlah_digunakan')
<<<<<<< HEAD
                                    ->label('Jumlah Digunakan (gram)')
                                    ->numeric()
                                    ->minValue(1)
                                    ->required()
                                    ->suffix('gr'),
=======
                                    ->label('Jumlah Digunakan')
                                    ->numeric()
                                    ->minValue(1)
                                    ->required(),
>>>>>>> c46f660 (initial commit project SIBAKSO)
                            ])
                            ->columns(2)
                            ->required(),
                    ]),

<<<<<<< HEAD
                Section::make('Keterangan')
                    ->columns(1)
=======
                Section::make('Keterangan & Alamat')
                    ->columns(2)
>>>>>>> c46f660 (initial commit project SIBAKSO)
                    ->schema([
                        Textarea::make('keterangan')
                            ->rows(3)
                            ->placeholder('Tambahkan catatan jika diperlukan...'),
<<<<<<< HEAD
=======

                        Textarea::make('pesanan.alamat')
                            ->label('Alamat Pelanggan')
                            ->rows(3)
                            ->placeholder('Alamat lengkap pelanggan...'),
>>>>>>> c46f660 (initial commit project SIBAKSO)
                    ]),
            ]);
    }
}
