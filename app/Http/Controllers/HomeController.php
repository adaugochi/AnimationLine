<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $billings = Billing::all()->where('user_id', auth()->user()->id);
        return view('home', compact('billings'));
    }
}
