<?php

namespace App\Repositories;

use App\Models\BankAccounts;

class BankRepository extends AbstractRepository
{
    public function __construct(BankAccounts $bank)
    {
        parent::__construct($bank);
    }

    public function model()
    {
        return app(BankAccounts::class);
    }

    public function getUserBanks()
    {
        return request()->user()->bankAccounts()->orderBy('bank_name')->get();
    }
}
