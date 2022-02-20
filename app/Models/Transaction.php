<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Transaction relationship with Online payments.
    public function onlinePayment()
    {
        return $this->hasOne(OnlinePayment::class);
    }
    // Transaction relationship with Investments.
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    // Transaction relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
