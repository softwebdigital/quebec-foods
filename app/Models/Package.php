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

    public function expectedReturns(): Attribute
    {
        return Attribute::get(fn() => $this->investments()->where('payment', 'approved')->sum('total_return'));
    }

    public function newDuration(): Attribute
    {
        $duration = 0;
        if ($this['type'] == 'farm') {
            $duration = $this['duration'];
        }
        else {
            if ($this['payout_mode'] == 'monthly') {
                $duration = 1 * $this['milestones'];
            } else if ($this['payout_mode'] == 'quarterly') {
                $duration = 3 * $this['milestones'];
            } else if ($this['payout_mode'] == 'semi-annually') {
                $duration = 6 * $this['milestones'];
            } else if ($this['payout_mode'] == 'annually') {
                $duration = 12 * $this['milestones'];
            } else if ($this['payout_mode'] == 'biannually') {
                $duration = 24 * $this['milestones'];
            } else if ($this['payout_mode'] == 'custom') {
                $duration = $this['months'] * $this['milestones'];
            }
        }
        return Attribute::get(fn () => $duration);
    }

    public function newDurationMode(): Attribute
    {
        if ($this['type'] == 'farm') $mode = $this['duration_mode'];
        else {
            if ($this['payout_mode'] == 'monthly') {
                $mode = $this['new_duration'] > 1 ? 'months' : 'month';
            } else if ($this['payout_mode'] == 'quarterly') {
                $mode = 'months';
            } else if ($this['payout_mode'] == 'semi-annually') {
                $mode = 'months';
            } else if ($this['payout_mode'] == 'annually') {
                $mode = 'year';
            } else if ($this['payout_mode'] == 'biannually') {
                $mode = 'years';
            } else if ($this['payout_mode'] == 'custom') {
                $mode = $this['months'] * $this['milestones'] > 1 ? 'months' : 'month';
            } else {
                $mode = 'month';
            }
        }
        return Attribute::get(fn () => $mode);
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
