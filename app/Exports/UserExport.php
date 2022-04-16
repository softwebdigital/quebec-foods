<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromArray, WithHeadings
{
    private $type;
    private $dates;
    private $status;

    public function __construct($type, $dates, $status)
    {
        $this->type = $type;
        $this->dates = $dates;
        $this->status = $status;
    }

    public function array(): array
    {
        $dates = explode(' to ', $this->dates);
        switch ($this->type){
            case 'verified':
                $users = User::query()->latest()->whereNotNull('email_verified_at');
                break;
            case 'unverified':
                $users = User::query()->latest()->whereNull('email_verified_at');
                break;
            default:
                $users = User::query()->latest();
        }
        if ($this->status == 'active') {
            $users = $users->where('active', 1);
        } else if ($this->status == 'blocked') {
            $users = $users->where('active', 0);

        }
        if (count($dates) > 1) {
            $users = $users->whereDate('created_at', '>=', $dates[0])
                        ->whereDate('created_at', '<=', $dates[1]);
        }
        $users = $users->get();

        return $users->map(function($user){
            return [
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'phone' => $user['phone_code'] ? "+(".$user['phone_code'].')'.$user['phone'] : 'Not set',
                'state' => $user['state'] ?? 'Not set',
                'country' => $user['country'] ?? 'Not set',
                'city' => $user['city'] ?? 'Not set',
                'address' => $user['address'] ?? 'Not set',
                'next_of_kin_name' => $user['nk_name'] ?? 'Not set',
                'next_of_kin_phone' => $user['nk_phone'] ?? 'Not set',
                'next_of_kin_address' => $user['nk_address'] ?? 'Not set',
                'date_joined' => $user->created_at->format('M d, Y'),
                'email_verification' => $user['email_verified_at'] ? 'Verified' : 'Unverified',
                'status' => $user['active'] == 1 ? 'Active' : 'Blocked'
            ];
        })->toArray();
    }

    public function headings(): array
    {
        return [
            'first_name',
            'last_name',
            'email',
            'phone',
            'state',
            'country',
            'city',
            'address',
            'next of kin name',
            'next of kin phone',
            'next of kin address',
            'date joined',
            'email verification',
            'status',
        ];
    }
}
