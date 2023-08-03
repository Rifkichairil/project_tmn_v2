<?php

namespace App\Http\Controllers;

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
        return [200, $response];
    }

    public function auth(Request $request) {
        list($code, $response) = $this->authRep->saveLogin($request);
        if ($code == 200 ) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back();
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
