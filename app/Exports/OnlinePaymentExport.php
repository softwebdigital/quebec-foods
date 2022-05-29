<?php

namespace App\Exports;

use App\Models\OnlinePayment;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OnlinePaymentExport implements FromArray, WithHeadings
{
    private $category;
    private $dates;

    public function __construct($category, $dates)
    {
        $this->category = $category;
        $this->dates = $dates;
    }

    public function array() :array
    {
        $dates = explode('to', $this->dates);

        if ($this->category != 'all') {
            $onlinePayments = OnlinePayment::query()->latest()->where('type', $this->category);
        } else {
            $onlinePayments = OnlinePayment::query()->latest();
        }

        if (count($dates) > 1) {
            $onlinePayments = $onlinePayments->whereDate('created_at', '>=', $dates[0])->whereDate('created_at', '<=', $dates[1]);
        }

        $onlinePayments = $onlinePayments->get();

        return $onlinePayments->map(function($onlinePayment){
            return [
                'user_name' => ucwords($onlinePayment['user']['name']),
                'amount' => getCurrency().number_format($onlinePayment['amount']),
                'reference' => $onlinePayment['reference'],
                'payment_type' => ucfirst($onlinePayment['type']),
                'date' => $onlinePayment['created_at']->format('M d, Y \a\t h:i A'),
                'status' => ucfirst($onlinePayment['status']),
            ];
        })->toArray();
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Amount',
            'Reference',
            'Payment Type',
            'Date',
            'Status',
        ];
    }
}
