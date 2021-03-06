<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Bank accounts relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
