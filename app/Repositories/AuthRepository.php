<?php

namespace App\Repositories;

use App\Http\Requests\RegisterRequest;
use App\Models\Accounts;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;


class AuthRepository
{
    public function saveLogin(Request $request){
        $credentials = [
            'email'      => $request->email,
            'password'   => $request->password,
            'role'       => 99
        ];

        if (auth()->attempt($credentials)) {
            return [200, 'ok'];
        }
        return [400, 'gagal'];
    }

    public function saveRegister(RegisterRequest $request){
        DB::beginTransaction();
        try {
            $password = Str::random(8);
            $account = Accounts::create([
                'position_id'   => 1,
                'uuid'          => Uuid::uuid4(),
                'email'         => $request->email,
                'password'      => $password,
                'role'          => 99,
                'status'        => 1,
            ]);

            Personal::create([
                'account_id' => $account->id,
                'fullname'   => $request->fullname,
            ]);

            Identity::create([
                'account_id' => $account->id,
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return [200, 'success'];
    }
}
