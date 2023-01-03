<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        $products = Product::with('galleries', 'category')->get();
        return view('dashboard', compact('transactions', 'products'));
    }
}
