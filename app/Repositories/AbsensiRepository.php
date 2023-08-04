<?php

namespace App\Repositories;

use App\Http\Requests\ClockRequest;
use App\Models\Absens;
use App\Models\Accounts;
use Illuminate\Support\Facades\DB;

class AbsensiRepository
{
    public function saveAbsensi(ClockRequest $request) : array {
        $account = Accounts::where('email', $request->email)->first();
        if ($account->status != 1) {
            return [404, 'Maaf status akun anda belum aktif, silahkan hubungi admin.'];
        }
        if ($account->role != 1) {
            return [404, 'Maaf role anda tidak bisa mengakses fungsi tersebut.'];
        }
        DB::beginTransaction();
        try {
            Absens::create([
                'account_id'    => $account->id,
                'absen_of_date' => now(),
                'type'          => $request->type,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return [200, 'Berhasil melakukan absen.'];
    }
}
