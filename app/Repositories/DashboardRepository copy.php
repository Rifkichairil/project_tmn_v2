<?php

namespace App\Repositories;

use App\Models\Absens;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    public function getAbsensi($request)
    {
        $in     = null;
        $labels = [];
        $data   = [];
        $active = [];
        $year   = now()->year;
        $month  = now()->month;

        $in = Absens::select(DB::raw("DATE_FORMAT(created_at, '%d') AS date, COUNT(*) AS total"))
            ->where('type', 'IN')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $out = Absens::select(DB::raw("DATE_FORMAT(created_at, '%d') AS date, COUNT(*) AS total"))
            ->where('type', 'OUT')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $month = "{$year}-{$month}";
        // $dt = Carbon::createFromDate(2023, 02);dd($dt->daysInMonth);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        while ($start->lte($end)) {
            $labels[]   = $start->format("d-M");
            $dataIn  = $in->where("date", $start->format("d"))->first();
            $dataOut  = $out->where("date", $start->format("d"))->first();

            $ins[]      = ($dataIn) == null ? 0 : $dataIn->total;
            $outs[]      = ($dataOut) == null ? 0 : $dataOut->total;

            $start->addDay();
        }
        $data[] = [
            array('key' => 'in','value'    => $ins),
            array('key' => 'outt','value'  => $outs),
        ];
        // $data[] = $absen;

        return compact('labels', 'data');
    }
}
