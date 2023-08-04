<?php

namespace App\Http\Controllers;

use App\Models\Absens;
use App\Repositories\DashboardRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct(protected DashboardRepository $repository) {

    }
    public function dashboard(){
        return view('pages.dashboard.index');
    }

    public function dashboardChart(Request $request)
    {
        $result = $this->repository->getAbsensi($request);

        return response()->json($result);
    }
}
