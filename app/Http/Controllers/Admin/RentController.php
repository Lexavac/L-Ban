<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentController extends Controller
{
    public function index()
    {
        $rent = Rent::all();
        $user = User::all();
        

        return view('dashboard.rent.index', compact('rent', 'user'));
    }
}
