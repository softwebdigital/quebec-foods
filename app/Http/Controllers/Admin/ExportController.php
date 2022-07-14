<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvestmentExport;
use App\Exports\OnlinePaymentExport;
use App\Exports\ReferralExport;
use App\Exports\TransactionExport;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUsers(Request $request)
    {
        return Excel::download(new UserExport(request('category'), request('date'), request('status')), 'users.xlsx');
    }
    public function exportInvestments(Request $request)
    {
        return Excel::download(new InvestmentExport(request('category'), request('date'), request('status')), 'investments.xlsx');
    }
    public function exportTransactions(Request $request)
    {
        return Excel::download(new TransactionExport(request('category'), request('date'), request('status')), 'transactions.xlsx');
    }
    public function exportReferrals(Request $request)
    {
        return Excel::download(new ReferralExport(request('date')), 'referrals.xlsx');
    }
    public function exportOnlinePayments(Request $request)
    {
        return Excel::download(new OnlinePaymentExport(request('category'), request('date')), 'onlinepayments.xlsx');
    }
}
