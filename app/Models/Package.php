<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['start_date'];

    public function totalInvestments(): Attribute
    {
        return Attribute::get(function () {
            if ($this->attributes['name'] == 'CASSAVA FARM ESTATE - FIVE (5) YEARS PLAN') {
                return $this->investments()->count() + 28;
            }
            elseif ($this->attributes['name'] == 'CASSAVA FARM ESTATE - FIVE (5) YEARS PLAN') {
                return $this->investments()->count() + 31;
            }
            elseif ($this->attributes['name'] == 'AGRO-HAULAGE VANS') {
                return $this->investments()->count() + 9;
            }
            elseif ($this->attributes['name'] == 'CASTOR OIL SEED FARM ESTATE') {
                return $this->investments()->count() + 46;
            }
            elseif ($this->attributes['name'] == 'HIGH QUALITY CASSAVA FLOUR (HQCF) - TEN (10) YEARS PLAN') {
                return $this->investments()->count() + 17;
            }
            elseif ($this->attributes['name'] == 'HIGH QUALITY CASSAVA STARCH (HQCS) - TEN (10)YEARS PLAN') {
                return $this->investments()->count() + 13;
            }
            elseif ($this->attributes['name'] == 'HIGH QUALITY CASSAVA STARCH (HQCS) - FIVE (5)YEARS PLAN') {
                return $this->investments()->count() + 19;
            }
            elseif ($this->attributes['name'] == 'HIGH QUALITY CASSAVA STARCH (HQCS) - THREE (3) YEARS PLAN') {
                return $this->investments()->count() + 39;
            }
            elseif ($this->attributes['name'] == 'HIGH QUALITY CASSAVA FLOUR (HQCF) - FIVE (5) YEARS PLAN') {
                return $this->investments()->count() + 13;
            }
            elseif ($this->attributes['name'] == 'PLANTERS & PLANTING EQUIPMENT') {
                return $this->investments()->count() + 4;
            }
            elseif ($this->attributes['name'] == 'HIGH QUALITY CASSAVA FLOUR (HQCF) - THREE (3) YEARS PLAN') {
                return $this->investments()->count() + 23;
            }
            else {
                return $this->investments()->count() + 10;
            }
        });
    }

    // Package relationship with investments.
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function isSoldOut()
    {
        return !($this->type == 'plant' || $this->available_slots > 0);
    }

    public function hasStarted()
    {
        return Carbon::parse($this->start_date)->gt(Carbon::now());
    }

    public function canRunInvestment()
    {
        return $this->status == 'open' || ($this->type == 'farms' && !$this->hasStarted());
    }

    public function getRawNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getFormattedNameAttribute()
    {
        return strlen($this->attributes['name']) > 15 ? substr($this->attributes['name'], 0, 15).'...' : $this->attributes['name'];
    }

    public function getSoldSlotsAttribute()
    {
        return $this->investments()->where('payment', 'approved')->sum('slots');
    }

    public function getAvailableSlotsAttribute()
    {
        return $this->slots - $this->sold_slots;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
