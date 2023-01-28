<?php

namespace App\Exports;

use App\Models\Investment;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvestmentExport implements FromArray, WithHeadings
{
    private $category;
    private $dates;
    private $status;

    public function __construct($category, $dates, $status)
    {
        $this->category = $category;
        $this->dates = $dates;
        $this->status = $status;
    }

    public function array() : array
    {
        $dates = explode('to', $this->dates);

        if ($this->category != 'all') {
            $investments = Investment::query()->latest()->whereHas('package', function ($query) {
                $query->where('type', $this->category);
            });
        } else {
            $investments = Investment::query()->latest();
        }

        if ($this->status != 'all') {
            $investments = $investments->where('status', $this->status);
        }

        if (count($dates) > 1) {
            $investments = $investments->whereDate('created_at', '>=', $dates[0])->whereDate('created_at', '<=', $dates[1]);
        }

        $investments = $investments->get();

        return $investments->map(function($investment) {
            return [
                'full_name' => ucwords($investment->user['name']),
                'package' => ucwords($investment->package['name']),
                'package_type' => ucfirst($investment->package['type']),
                'package_start_date' => $investment->package['start_date']->format('M d, Y'),
                'package_roi' => $investment->package['roi'].'%',
                'price_per_slot' => getCurrency().number_format($investment->package['price'], 2),
                'slots' => $investment['slots'],
                'total_invested' => getCurrency().number_format($investment['amount'], 2),
                'returns' => getCurrency().number_format($investment['total_return'], 2),
                'investment_date' => $investment['investment_date']->format('M d, Y'),
                'payment' => ucfirst($investment['payment']),
                'status' => ucfirst($investment['status'])
            ];
        })->toArray();
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Package',
            'Package Category',
            'Package Start Date',
            'Package ROI',
            'Package Price',
            'Slots',
            'Total Invested',
            'Expected Returns',
            'Investment Date',
            'Payment',
            'Status',
        ];
    }
}
