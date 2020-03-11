<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function checkoutBasic()
    {
        return view('checkout-basic');
    }

    public function checkoutStandard()
    {
        return view('checkout-standard');
    }

    public function checkoutPro()
    {
        return view('checkout-pro');
    }
}