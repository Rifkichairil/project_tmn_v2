<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absens extends Model
{
    use HasFactory;
    protected $table = 'absen';
    protected $fillable = [
        'account_id',
        'absen_of_date',
        'type',
    ];

    public function account() {
        return $this->belongsTo(Accounts::class, 'account_id');
    }
}
