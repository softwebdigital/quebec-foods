<?php

namespace App\Exports;

use App\Models\Investment;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromArray, WithHeadings
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
            $transactions = Transaction::query()->latest()->where('type', $this->category);
        } else {
            $transactions = Transaction::query()->latest();
        }

        if ($this->status != 'all') {
            $transactions = $transactions->where('status', $this->status);
        }

        if (count($dates) > 1) {
            $transactions = $transactions->whereDate('created_at', '>=', $dates[0])->whereDate('created_at', '<=', $dates[1]);
        }

        $transactions = $transactions->get();

        return $transactions->map(function($transaction) {
            return [
                'full_name' => ucwords($transaction->user['name']),
                'amount' => '₦'.number_format($transaction['amount']),
                'transaction_type' => ucfirst($transaction['type']),
                'description' => $transaction['description'],
                'channel' => ucfirst($transaction['channel']),
                'transaction_date' => $transaction['created_at']->format('M d, Y'),
                'method' => ucfirst($transaction['method']),
                'status' => ucfirst($transaction['status'])
            ];
        })->toArray();
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Amount',
            'Transaction Type',
            'Description',
            'Channel',
            'Transaction Date',
            'Method',
            'Status',
        ];
    }
}
