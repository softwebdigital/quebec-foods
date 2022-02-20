<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['investment_date', 'return_date'];

    // Investments relationships with package.
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    // Investments relationships with transactions.
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
    // Investments relationships with online payments.
    public function onlinePayment()
    {
        return $this->hasOne(OnlinePayment::class);
    }
    // Investments relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
