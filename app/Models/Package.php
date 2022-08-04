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
