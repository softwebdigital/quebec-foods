<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    use HasFactory;

    protected $guarded = [];
    // Online Payments relationship with transactions.
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    // Online Payments relationship with investments.
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
