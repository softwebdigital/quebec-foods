<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    // Transaction relationship with Online payments.
    public function onlinePayments()
    {
        return $this->hasOne(OnlinePayment::class);
    }
    // Transaction relationship with Investments.
    public function investments()
    {
        return $this->belongsTo(Investment::class);
    }
    // Transaction relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
