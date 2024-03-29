<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $amount = 99.99;
        $package = self::BRONZE;
        $service = self::VIDEO;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function videoSilver()
    {
        $amount = 199.99;
        $package = self::SILVER;
        $service = self::VIDEO;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function videoGold()
    {
        $amount = 299.99;
        $package = self::GOLD;
        $service = self::VIDEO;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function logoBronze()
    {
        $amount = 79.99;
        $package = self::BRONZE;
        $service = self::LOGO;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function logoSilver()
    {
        $amount = 149.99;
        $package = self::SILVER;
        $service = self::LOGO;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function logoGold()
    {
        $amount = 229.99;
        $package = self::GOLD;
        $service = self::LOGO;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function textBronze()
    {
        $amount = 94.99;
        $package = self::BRONZE;
        $service = self::TEXT;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function textSilver()
    {
        $amount = 129.99;
        $package = self::SILVER;
        $service = self::TEXT;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    public function textGold()
    {
        $amount = 239.99;
        $package = self::GOLD;
        $service = self::TEXT;
        return view('payment.checkout', compact('amount', 'package', 'service'));
    }

    /**
     * @param Request $request
     * @param Billing $billing
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function saveBilling(Request $request, Billing $billing)
    {
        $this->validate(request(), [
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'amount' => 'required',
            'package' => 'required',
            'service' => 'required'
        ]);

        try {
            $id = $billing->create($request->all());
            return redirect(route('proceed-payment', $id))->with('success', 'Billing saved successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function proceedToPayment($id)
    {
        $billing = Billing::find($id);
        if (!$billing) {
            return redirect(route('home'))->with(['error' => 'Page not found for that billing payment']);
        }
        return view('payment.pay', compact('billing'));
    }
}
