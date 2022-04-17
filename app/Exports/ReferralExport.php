<?php

namespace App\Exports;

use App\Models\Referral;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReferralExport implements FromArray, WithHeadings

{
    private $dates;

    public function __construct( $dates )
    {
        $this->dates = $dates;
    }

    public function array() :array
    {
        $dates = explode('to', $this->dates);

        $referrals = Referral::query()->latest();

        if (count($dates) > 1) {
            $referrals = $referrals->whereDate('created_at', '>=', $dates[0])->whereDate('created_at', '<=', $dates[1]);
        }

        $referrals = $referrals->get();

        return $referrals->map(function($referral) {
            return [
                'referee_name' => $referral['referred']['name'],
                'referee_email' => $referral['referred']['email'],
                'date_joined' => $referral['created_at']->format('M d, Y')
            ];
        })->toArray();
    }

    public function headings(): array
    {
        return [
            'Referee Name',
            'Referee Email',
            'Date Joined',
        ];
    }
}
