<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Wallets relationships with transactions.
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    // Wallets relationships with Bank Accounts.
    public function bankAccount()
    {
        return $this->hasMany(BankAccounts::class);
    }
    // Wallets relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
