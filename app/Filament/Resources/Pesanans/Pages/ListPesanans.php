<?php

namespace App\Filament\Resources\Pesanans\Pages;

use App\Filament\Resources\Pesanans\PesananResource;
<<<<<<< HEAD
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
=======
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
>>>>>>> c46f660 (initial commit project SIBAKSO)

class ListPesanans extends ListRecords
{
    protected static string $resource = PesananResource::class;

<<<<<<< HEAD
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('exportPdf')
                ->label('Export PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('danger')
                ->action(function () {
                    $query = $this->getFilteredTableQuery();
                    $pesanans = $query->with('pelanggan')->get();

                    $filterInfo = $this->getFilterInfo();

                    $pdf = Pdf::loadView('pdf.pesanan', [
                        'pesanans' => $pesanans,
                        'filterInfo' => $filterInfo,
                    ]);

                    return response()->streamDownload(function () use ($pdf) {
                        echo $pdf->output();
                    }, 'laporan-pesanan-' . now()->format('Y-m-d') . '.pdf');
                }),
        ];
    }

    protected function getFilterInfo(): ?string
    {
        $parts = [];

        $filters = $this->tableFilters ?? [];

        if ($filters) {
            if ($value = $filters['status_pembayaran']['value'] ?? null) {
                $parts[] = 'Pembayaran: ' . ($value === 'lunas' ? 'Lunas' : 'Belum Lunas');
            }
            if ($value = $filters['status_produksi']['value'] ?? null) {
                $parts[] = 'Status: ' . $value;
            }
            if (isset($filters['tanggal_ambil'])) {
                if ($dari = $filters['tanggal_ambil']['dari'] ?? null) {
                    $parts[] = 'Dari: ' . $dari;
                }
                if ($sampai = $filters['tanggal_ambil']['sampai'] ?? null) {
                    $parts[] = 'Sampai: ' . $sampai;
                }
            }
        }

        return $parts ? implode(' | ', $parts) : null;
    }
}
=======
    /**
     * FILTER MANUAL (AMAN & STABIL)
     */
    public ?string $tanggal = null;

    /**
     * TABLE QUERY (WAJIB SESUAI FILAMENT v3)
     */
    protected function getTableQuery(): Builder|Relation|null
    {
        return Pesanan::query()
            ->with('pelanggan')
            ->when($this->tanggal, function ($query) {
                $query->whereDate('tanggal_ambil', $this->tanggal);
            });
    }

    /**
     * HEADER ACTION
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('New Pesanan'),

            Action::make('export_pdf')
                ->label('Export PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {

                    $pesanans = Pesanan::with('pelanggan')
                        ->when($this->tanggal, function ($query) {
                            $query->whereDate('tanggal_ambil', $this->tanggal);
                        })
                        ->get();

                    $pdf = Pdf::loadView('pdf.pesanan', [
                        'pesanans' => $pesanans
                    ]);

                    return response()->streamDownload(
                        fn () => print($pdf->output()),
                        'laporan-pesanan-' . now()->format('Y-m-d') . '.pdf'
                    );
                }),
        ];
    }
}
>>>>>>> c46f660 (initial commit project SIBAKSO)
