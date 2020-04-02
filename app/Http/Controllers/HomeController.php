<?php

namespace App\Http\Controllers;

use App\Billing;

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
        $billings = Billing::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(20);
        return view('home', compact('billings'));
    }
}
