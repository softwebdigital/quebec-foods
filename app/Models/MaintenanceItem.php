<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAmountAttribute()
    {
        return ($this->percentage / 100) * $this->active_investments;
    }
}
