<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use App\Models\BookRent;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class BookController extends Controller
{
    public function show(Book $book, $id){
        if(Auth::check()){
            $checks = BookRent::where('book_id')->where('rent_id', Auth()->id())->first();
            $book = Book::findOrFail($id);

            $related_books = Book::whereHas('Category', function ($query) use ($book) {
                $query->whereId($book->category_id);
            })
                ->where('id', '<>', $book->id)
                ->inRandomOrder()
                ->take(3)
                ->get(['id', 'authors', 'name', 'price']);

            return view('landing-page.landing-detail', compact('book',  'related_books', 'checks'));

        } else {
            return redirect()->Route('login');
        }

    }

    public function store(Request $request)
    {

        $book_id = $request->book_id;
        $book = Book::findOrFail($book_id);
        $data = $request->all();
        $check = $this->rent($data);
        $stock = $book->stock;
        $stock= $stock-1 ;

        if ($check) {
            $book->rent()->attach($check->id);
            $book->update([
                'stock'=>$stock
            ]);

        };

        return redirect()->route('success-rent', $book->id)->with([
            'message' => 'Success Rent Book !',
            'type' => 'info'
        ]);
    }

    public function rent(array $data)
    {


        return Rent::create([


            'quantity' => '1',
            'user_id' => Auth::id(),
          ]);
    }






}
