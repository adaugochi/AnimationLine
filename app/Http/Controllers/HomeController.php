<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Order;
use App\Revision;
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
        $billings = Billing::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(15);
        $reviewStatus = Billing::where('status', Billing::COMPLETED)->get();

        return view('home', compact('billings', 'reviewStatus'));
    }

    public function viewOrder($id)
    {
        $order = Order::where('billing_id', $id)->first();
        if (!$order) {
            return redirect(route('home'))->with(['error' => 'Could not find order']);
        }

        if ($order->billing->status !== Billing::COMPLETED) {
            return redirect()->back()->with(['info' => 'You can not access this page as your order is not in review']);
        }
        return view('order', compact('order'));
    }

    public function sendPositiveReview(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'comment' => 'required'
        ]);

        $revision = (new Revision)->create($request->all(), Revision::YES);
        if ($revision) {
            return redirect(route('home'))->with(['success' => 'Your response was sent successfully']);
        }
        return redirect()->back()->with(['error' => 'Your response was not sent successfully']);
    }

    public function sendNegativeReview(Request $request)
    {

    }
}
