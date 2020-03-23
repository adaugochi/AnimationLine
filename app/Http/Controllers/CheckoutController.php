<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutBasic()
    {
        $amount = 79.00;
        $package = 'basic';
        return view('checkout', compact('amount', 'package'));
    }

    public function checkoutStandard()
    {
        $amount = 199.00;
        $package = 'standard';
        return view('checkout', compact('amount', 'package'));
    }

    public function checkoutPro()
    {
        $amount = 299.00;
        $package = 'pro';
        return view('checkout', compact('amount', 'package'));
    }
}