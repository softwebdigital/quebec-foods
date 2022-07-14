<?php

namespace App\Exports;

use App\Models\User;
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

        $users = User::whereHas('referrals')
            ->with('referrals')
            ->withCount('referrals')
            ->orderBy('referrals_count', 'desc');

        if (count($dates) > 1) {
            $users = $users->whereDate('created_at', '>=', $dates[0])->whereDate('created_at', '<=', $dates[1]);
        }

        $users = $users->get();

        return $users->map(function($user) {
            return [
                'referee_name' => $user['name'],
                'referee_email' => $user['email'],
                'referrals' => count($user['referrals']),
                'date_joined' => $user['created_at']->format('M d, Y')
            ];
        })->toArray();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Total Referred',
            'Date Joined',
        ];
    }
}
