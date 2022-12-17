<?php

namespace App\Repositories;

use App\Models\Bank;

class BankRepository extends AbstractRepository
{
    public function __construct(Bank $bank)
    {
        parent::__construct($bank);
    }

    public function model()
    {
        return app(Bank::class);
    }

    public function getUserBanks()
    {
        return request()->user()->banks;
    }
}
