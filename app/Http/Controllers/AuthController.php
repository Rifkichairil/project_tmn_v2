<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    protected $authRep;
    public function __construct(AuthRepository $authRep)
    {
        $this->authRep = $authRep;
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }

    public function store(RegisterRequest $request) {
        list($code, $response) = $this->authRep->saveRegister($request);
        if ($code == 200 ) {
            return redirect()->back()->with('success_message', 'Berhasil mendaftar sebagai admin, silahkan cek password diemail anda.');
        }
        return redirect()->back()->with('error_message', 'Periksa kembali email dan password admin anda.');
    }

    public function auth(AuthRequest $request) {
        list($code, $response) = $this->authRep->saveLogin($request);
        if ($code == 200 ) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->with('error_message', 'Periksa kembali email dan password admin anda.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
