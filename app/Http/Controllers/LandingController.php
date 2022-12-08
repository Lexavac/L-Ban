<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Hero;
use App\Models\About;
use App\Models\Publisher;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        $heros = Hero::all();
        $books = Book::all();
        $publishers = Publisher::pluck('name', 'id');
        return view('landing-page.landing', compact('books', 'publishers', 'heros', 'abouts'));
    }

    public function detail()
    {
        $books = Book::all();
        $publishers = Publisher::pluck('name', 'id');
        return view('landing-page.landing-detail', compact('books', 'publishers'));
    }

    public function success($id)
    {
        $book = Book::findOrFail($id);
        return view('landing-page.landing-sucess', compact('book'));
    }
}
