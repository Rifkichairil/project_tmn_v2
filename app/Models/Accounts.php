<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = 'account';
    protected $fillable = [
        'position_id',
        'uuid',
        'email',
        'phone',
        'role',
        'password',
        'profile_picture',
        'status'
    ];

    public function position() {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function identity() {
        return $this->hasOne(Identity::class, 'account_id');
    }

    public function personal() {
        return $this->hasOne(Personal::class, 'account_id');
    }

    public function absen() {
        return $this->hasMany(Absens::class, 'account_id');
    }
}
