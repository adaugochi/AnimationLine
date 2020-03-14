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
        $package = 'Basic';
        return view('checkout', compact('amount', 'package'));
    }

    public function checkoutStandard()
    {
        $amount = 199.00;
        $package = 'Standard';
        return view('checkout', compact('amount', 'package'));
    }

    public function checkoutPro()
    {
        $amount = 299.00;
        $package = 'Pro';
        return view('checkout', compact('amount', 'package'));
    }
}