<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'count',
    ];

    public function user(){
        return $this->hasOne(User::class, 'wallet_id');
    }
}
