<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaryawanRequest;
use App\Http\Requests\KaryawanUpdateRequest;
use App\Models\Absens;
use App\Models\Accounts;
use App\Models\Position;
use App\Repositories\KaryawanRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;


class KaryawanController extends Controller
{
    //
    protected $karyawanRep;
    public function __construct(KaryawanRepository $karyawanRep)
    {
        $this->karyawanRep = $karyawanRep;
    }

    public function datatable(Request $request)  {

        if ($request->ajax()) {
            $data = Accounts::with('personal', 'identity')->orderBy('status', 'desc');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('personal.fullname', function ($data) {
                    return $data->personal->fullname;
                })

                ->editColumn('phone', function ($data) {
                    return $data->phone ?? '-';
                })
                ->editColumn('status', function ($data) {
                    return $data->status == 1 ? 'AKTIF' : 'TIDAK AKTIF';
                })
                ->editColumn('role', function ($data) {
                    return $data->role == 99 ? 'Admin' :  'Karyawan' ;
                })
                ->addColumn('action', function ($data) {
                    return view('pages.karyawan.modal.b_edit', compact('data'));
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function datatableAbsen(Request $request, $id) {

        if ($request->ajax()) {
            $data = Absens::with('account');
            return Datatables::of($data)
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function index() : View {
        $religions = collect(['ISLAM','KRISTEN','KATHOLIK','HINDU','BUDHA','KONGHUCU','OTHER']);
        $positions = Position::get()->except(1);
        return view('pages.karyawan.index', compact('religions', 'positions'));
    }

    public function store(KaryawanRequest $request) : RedirectResponse {
        list($code, $response) = $this->karyawanRep->saveKaryawan($request);
        if ($code == 200 ) {
            return redirect()->back()->with('success-message', $response);
        }
        return redirect()->back()->with('error-message', $response);
    }

    public function detail($id) {
        list($code, $data) = $this->karyawanRep->KaryawanById($id);
        return view('pages.karyawan.detail', compact('data'));
    }

    public function edit($id) : Accounts {
        list($code, $data) = $this->karyawanRep->KaryawanById($id);
        return $data;
    }

    public function update(KaryawanUpdateRequest $request, $id) : RedirectResponse {
        list($code, $response) = $this->karyawanRep->updateKaryawan($request, $id);
        if ($code == 200 ) {
            return redirect()->back()->with('success-message', $response);
        }
        return redirect()->back()->with('error-message', $response);
    }
}
