<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['investment_date', 'return_date', 'start_date'];

    // Investments relationships with package.
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    // Investments relationships with transactions.
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    // Investments relationships with online payments.
    public function onlinePayment()
    {
        return $this->hasOne(OnlinePayment::class);
    }
    // Investments relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function canSettle(): bool
    {
        return Carbon::make($this['return_date'])->lte(now());
    }

    public function getPlantDurationIncreaseByMonth($milestone)
    {
        $months = 0;
        $package = $this->currentPackage;
        if ($package['payout_mode'] == 'monthly') {
            $months = 1;
        } else if ($package['payout_mode'] == 'quarterly') {
            $months = 3;
        } else if ($package['payout_mode'] == 'semi-annually') {
            $months = 6;
        } else if ($package['payout_mode'] == 'annually') {
            $months = 12;
        } else if ($package['payout_mode'] == 'biannually') {
            $months = 24;
        } else if ($package['payout_mode'] == 'custom') {
            $months = $package['months'];
        }
        return $months * $milestone;
    }

    public function getCurrentPackageAttribute()
    {
        return json_decode($this->package_data, TRUE);
    }

    public function getInitialTransactionAttribute()
    {
        return $this->transactions()->where('type', 'investment')->first();
    }

    public function getReturnDateAttribute()
    {
        $package = $this->currentPackage;
        if ($package['type'] == 'farm') {
            if ($package['duration_mode'] == 'day') {
                $returnDate = Carbon::make($this->start_date)->addDays($package['duration']);
            } elseif ($package['duration_mode'] == 'month') {
                $returnDate = Carbon::make($this->start_date)->addMonths($package['duration']);
            } else {
                $returnDate = Carbon::make($this->start_date)->addYears($package['duration']);
            }
            return $returnDate;
        } else {
            $months = $this->getPlantDurationIncreaseByMonth($package['milestones']);
            return Carbon::make($this->start_date)->addMonths($months);
        }
    }
}
