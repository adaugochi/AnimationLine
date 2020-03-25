<?php

namespace App\Http\Controllers;

use App\Billing;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutBasic()
    {
        $hasDiscount = Billing::hasDiscount();
        $amount = 79.00;
        $package = 'basic';
        return view('checkout', compact('amount', 'package', 'hasDiscount'));
    }

    public function checkoutStandard()
    {
        $hasDiscount = Billing::hasDiscount();
        $amount = 199.00;
        $package = 'standard';
        return view('checkout', compact('amount', 'package', 'hasDiscount'));
    }

    public function checkoutPro()
    {
        $hasDiscount = Billing::hasDiscount();
        $amount = 299.00;
        $package = 'pro';
        return view('checkout', compact('amount', 'package', 'hasDiscount'));
    }
}