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
    //
    public function __construct(protected AbsensiRepository $absensiRepo){}

    public function datatable(Request $request) {
        if ($request->ajax()) {
            $data = Absens::with('account');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('account.personal.fullname', function ($data) {
                    return $data->account->personal->fullname;
                })
                // ->editColumn('phone', function ($data) {
                //     return $data->phone ?? '-';
                // })
                // ->editColumn('status', function ($data) {
                //     return $data->status == 1 ? 'Active' : 'Non Active';
                // })
                // ->addColumn('action', function ($data) {
                //     return view('pages.karyawan.modal.b_edit', compact('data'));
                // })
                // ->rawColumns(['action'])
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
