<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClockRequest;
use App\Models\Absens;
use App\Models\Accounts;
use App\Repositories\AbsensiRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class AbsensiController extends Controller
{
    protected $absensiRepo;
    public function __construct(AbsensiRepository $absensiRepo)
    {
        $this->absensiRepo = $absensiRepo;
    }

    public function datatable(Request $request) {
        if ($request->ajax()) {
            $data = Absens::with('account.personal');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('account.personal.fullname', function ($data) {
                    return $data->account->personal->fullname;
                })
                ->toJson();
        }
    }

    public function index() : View {
        return view('pages.absensi.index');
    }

    public function absensi() : View {
        return view('pages.absensi');
    }

    public function store(ClockRequest $request) {
        list($code, $response) = $this->absensiRepo->saveAbsensi($request);
        if ($code == 200) {
            return redirect()->back()->with('success-message', $response);
        }
        return redirect()->back()->with('error-message', $response);
    }
}
