<?php

namespace App\Exports;

use App\Models\KTP;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KTPExport implements FromCollection, WithHeadings, WithProperties, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KTP::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama',
            'Tmp Lahir',
            'Tgl Lahir',
            'Jns Kelamin',
            'Gol Darah',
            'Alamat',
            'Agama',
            'Status',
            'Pekerjaan',
            'Warga Negara',
            'Berlaku',
            'Foto',
            'Create',
            'Update',
        ];
    }

    public function registerEvents(): array
    {
        return [
       
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3)->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            
            },
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Bagas Aruna',
            'title'          => 'Data KTP',
        ];
    }

}
