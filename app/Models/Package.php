<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['start_date'];

    // Package relationship with investments.
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function isSoldOut()
    {
        return !($this->type == 'plant' || $this->slots > 0);
    }

    public function hasStarted()
    {
        return Carbon::parse($this->start_date)->gt(Carbon::now());
    }

    public function canRunInvestment()
    {
        return $this->status == 'open' || ($this->type == 'farms' && !$this->hasStarted());
    }

    public function getPlantTotalROI($amount)
    {
        $sum = 0;
        $roi = $amount * ($this->roi / 100);
        for ($i=1; $i <= $this->milestones; $i++) {
            $sum += $i == $this->milestones ? ($amount + $roi)  : $roi;
        }
        return $sum;
    }
}
