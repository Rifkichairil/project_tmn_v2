<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    protected $repository;
    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
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
