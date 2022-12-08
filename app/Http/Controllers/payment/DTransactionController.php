<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return view('listransaction', compact('transactions'));
    }
}
