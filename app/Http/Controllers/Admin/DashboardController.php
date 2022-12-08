<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $books = Book::all();
            return view('dashboard.dashboard', compact('books'));
        } else {
            return redirect()->Route('login');
        }


    }
}
