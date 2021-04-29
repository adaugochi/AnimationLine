<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Contants\Message;
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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId =  auth()->user()->id;
        $billings = Billing::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(15);
        $reviewStatus = Billing::where(['status' => Billing::COMPLETED, 'user_id' => $userId])->get();

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

    protected function validateRevision($request)
    {
        $request->validate([
            'order_id' => 'required',
            'comment' => 'required'
        ]);
    }

    public function sendPositiveReview(Request $request)
    {
        $this->validateRevision($request);
        $revision = (new Revision)->create($request->all(), Revision::YES, Billing::CONFIRM);
        if ($revision) {
            return redirect(route('home'))->with(['success' => Message::REVISION_SENT]);
        }
        return redirect()->back()->with(['error' => Message::REVISION_NOT_SENT]);
    }

    public function sendNegativeReview(Request $request)
    {
        $this->validateRevision($request);
        $revision = (new Revision)->create($request->all(), Revision::NO, Billing::PENDING);
        if ($revision) {
            return redirect(route('home'))->with(['success' => Message::REVISION_SENT]);
        }
        return redirect()->back()->with(['error' => Message::REVISION_NOT_SENT]);
    }
}
