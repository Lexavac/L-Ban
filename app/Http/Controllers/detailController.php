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

class detailController extends Controller
{
    public function show(Book $book, $id){
        if(Auth::check()){

            $book = Book::findOrFail($id);

            $related_books = Book::whereHas('Category', function ($query) use ($book) {
                $query->whereId($book->category_id);
            })
                ->where('id', '<>', $book->id)
                ->inRandomOrder()
                ->take(3)
                ->get(['id', 'slug', 'name', 'price']);

            return view('landing-page.landing-detail', compact('book',  'related_books'));

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
            $book->rents()->attach($check->id);
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
