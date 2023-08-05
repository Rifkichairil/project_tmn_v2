<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'personal';
    protected $fillable = [
        'account_id',
        'fullname',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'address',
        'zipcode',
    ];

    public function account() {
        return $this->belongsTo(Accounts::class,'account_id');
    }
}
