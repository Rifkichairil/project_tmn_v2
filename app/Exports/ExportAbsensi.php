<?php

namespace App\Exports;

use App\Models\Absens;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class ExportAbsensi implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absens::all();
    }

    public function map($data): array
    {
        return [
            $data->account->personal->fullname,
            $data->absen_of_date,
            $data->type,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Karyawan',
            'Waktu Absen',
            'Tipe',
        ];
    }
}
