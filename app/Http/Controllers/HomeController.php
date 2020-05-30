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
        $billings = Billing::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(15);
        $reviewStatus = Billing::where('status', Billing::COMPLETED)->get();

        return view('home', compact('billings', 'reviewStatus'));
    }

    public function viewOrder($id)
    {
        return view('order');
    }
}
