<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;
    protected $table = 'identity';
    protected $fillable = [
        'account_id',
        'ktp_number',
        'npwp_number'
    ];

    public function account() {
        return $this->belongsTo(Accounts::class,'account_id');
    }
}
