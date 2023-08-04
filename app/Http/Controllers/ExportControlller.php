<?php

namespace App\Http\Controllers;

use App\Exports\ExportAbsensi;
use App\Models\Absens;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ExportControlller extends Controller
{
    //
    public function excel() {
        return Excel::download(new ExportAbsensi, 'export-absesi.xlsx');
        // return (new ExportAbsensi)->download('export-absesi.xlsx');

    }

    public function pdf() {
        $absen = Absens::all();

    	$pdf = PDF::loadview('pages.pdf',['absen'=>$absen]);
    	return $pdf->download('laporan-absensi-pdf.pdf');
    }
}
