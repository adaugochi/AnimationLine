<?php

namespace App\Http\Controllers;

use App\Billing;

class PricingController extends Controller
{
    const BRONZE = 'bronze';
    const SILVER = 'silver';
    const GOLD = 'gold';

    const VIDEO = Billing::VIDEO;
    const LOGO = Billing::LOGO;
    const TEXT = Billing::TEXT;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function videoBronze()
    {
        $amount = 4.99;
        $package = self::BRONZE;
        $service = self::VIDEO;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function videoSilver()
    {
        $amount = 199.99;
        $package = self::SILVER;
        $service = self::VIDEO;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function videoGold()
    {
        $amount = 299.99;
        $package = self::GOLD;
        $service = self::VIDEO;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function logoBronze()
    {
        $amount = 79.99;
        $package = self::BRONZE;
        $service = self::LOGO;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function logoSilver()
    {
        $amount = 149.99;
        $package = self::SILVER;
        $service = self::LOGO;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function logoGold()
    {
        $amount = 229.99;
        $package = self::GOLD;
        $service = self::LOGO;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function textBronze()
    {
        $amount = 94.99;
        $package = self::BRONZE;
        $service = self::TEXT;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function textSilver()
    {
        $amount = 129.99;
        $package = self::SILVER;
        $service = self::TEXT;
        return view('checkout', compact('amount', 'package', 'service'));
    }

    public function textGold()
    {
        $amount = 239.99;
        $package = self::GOLD;
        $service = self::TEXT;
        return view('checkout', compact('amount', 'package', 'service'));
    }
}
