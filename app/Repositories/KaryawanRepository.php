<?php

namespace App\Repositories;

use App\Http\Requests\KaryawanRequest;
use App\Http\Requests\KaryawanUpdateRequest;
use App\Mail\LoginMailer;
use App\Mail\TestingMail;
use App\Models\Accounts;
use App\Models\Identity;
use App\Models\Personal;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class KaryawanRepository
{
    public function KaryawanById($id) : array{
        $data = Accounts::with('personal', 'identity', 'position')->whereId($id)->first();
        if (!$data) {
            return [400, 'Data tidak ditemukan'];

        }
        return [200 ,$data];
    }

    public function saveKaryawan(KaryawanRequest $request) : array {
        DB::beginTransaction();
        try {
            $password = Str::random(10);
            $position = Position::where('name', $request->position_id)->first();
            $account = Accounts::create([
                'position_id'       => $position->id,
                'uuid'              => Uuid::uuid4(),
                'email'             => $request->email,
                'phone'             => $request->phone,
                'role'              => $request->position_id == 'Admin' ? 99 : 1,
                'password'          => Hash::make($password),
                'status'            => 1,
            ]);

            Personal::create([
                'account_id'        => $account->id,
                'fullname'          => strtoupper($request->fullname),
                'place_of_birth'    => $request->place_of_birth,
                'date_of_birth'     => $request->date_of_birth,
                'gender'            => $request->gender,
                'religion'          => $request->religion,
                'address'           => $request->address,
                'zipcode'           => $request->zipcode,
            ]);

            Identity::create([
                'account_id'  => $account->id,
                'ktp_number'  => $request->ktp_number,
                'npwp_number' => $request->npwp_number,
            ]);

            Mail::to($account->email)->send(new TestingMail($password));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return [200, 'Berhasil menambahkan data karyawan'];
    }

    public function updateKaryawan(KaryawanUpdateRequest $request, $id) : array {
        DB::beginTransaction();
        try {
            list($code, $data) = $this->KaryawanById($id);
            $password = Str::random(10);

            $position = Position::where('name', $request->position_id)->first();
            $data->update([
                'position_id'       => $position->id,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'role'              => $request->position_id == 'Admin' ? 99 : 1,
            ]);

            $data->personal->update([
                'fullname'          => $request->fullname,
                'place_of_birth'    => $request->place_of_birth,
                'date_of_birth'     => $request->date_of_birth,
                'gender'            => $request->gender,
                'religion'          => $request->religion,
                'address'           => $request->address,
                'zipcode'           => $request->zipcode,
            ]);

            $data->identity->update([
                'ktp_number'  => $request->ktp_number,
                'npwp_number' => $request->npwp_number,
            ]);
            Mail::to($data->email)->send(new TestingMail($password));

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return [200, 'Berhasil mengubah data karyawan'];
    }

}
