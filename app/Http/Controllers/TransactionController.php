<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\payment\TripayController;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index($reference)
    {


        $tripay = new TripayController();
        $detail =  $tripay->detailTransaction($reference);

        return view('dashboard.transaction.detail', compact('detail'));
    }

    public function store(Request $request)
    {
        $book = Book::find($request->book_id);
        $method = $request -> method;

        $tripay = new TripayController();
        $transaction = $tripay->ReqPayment($method, $book); //Very Important !

        // Create a new data
        Transaction::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'total_amount' => $transaction->amount,
            'status' => $transaction->status,
        ]);

        return redirect()->route('transaction.detail', [
            'reference' => $transaction->reference,
        ]);


    }
}
