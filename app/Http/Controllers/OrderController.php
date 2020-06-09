<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Brief;
use App\Contants\Message;
use App\Country;
use App\Mail\SendReminderMail;
use App\Mail\SendReviewMail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $billings = Billing::orderBy('id', 'DESC')->paginate(15);;
        return view('portal.order.index', compact('billings'));
    }

    public function getOrders()
    {
        return view('portal.order.billing');
    }

    public function viewBrief($billingId = null)
    {
        $billing = Billing::find($billingId);
        $brief = Brief::where('billing_id', $billingId)->first();
        $countries = Country::getAllCountries()->pluck('name', 'code');

        if (is_null($brief)) {
            return redirect()->route('admin.order')
                ->with(['error' => 'Could not find a brief associated with this billing details']);
        }

        if (is_null($billing)) {
            return redirect()->route('admin.order')
                ->with(['error' => 'Could not find any billing details associated with this user']);
        }

        return view('portal.order.brief', compact('billing', 'brief', 'countries'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function complete(Request $request)
    {
        DB::beginTransaction();
        $validateData = $request->validate([
            'user_id' => 'required',
            'billing_id' => 'required',
            'order_url' => 'required'
        ]);
        $user = User::find($request->user_id);
        $billing = Billing::find($request->billing_id);
        $data = [
            'name' => $user->getFullName(),
            'service' => $billing->service . ', ' . $billing->package
        ];

        try {
            $orderExist = Order::where('billing_id', $request->billing_id)->first();
            if ($orderExist) {
                $orderExist->order_url = $request->order_url;
                $orderExist->save();
            } else {
                $order = (new Order())->create($validateData);
                $order->save();
            }
            Mail::to($user->email)->send(new SendReviewMail($data));

            $billing->status = Billing::COMPLETED;
            $billing->save();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Order not sent successfully']);
        }

        DB::commit();
        return redirect()->back()->with(['success' => 'Customer order was sent successfully']);
    }

    public function deliver(Request $request)
    {
        $billing = Billing::find($request->id)->update(['status' => Billing::DELIVERED]);
        if (!$billing) {
            return redirect()->back()->with(['error' => 'Sorry, could not update status']);
        }
        return redirect()->back()->with(['success' => 'Customer Job is Delivered']);
    }

    public function getComments($id)
    {
        $revisions = Billing::find($id)->order->revisions;
        return view('portal.order.comment', compact('revisions'));
    }

    public function showOrderDetails($id)
    {
        $billing = Billing::find($id);
        $brief = Brief::where('billing_id', $id)->first();
        $countries = Country::getAllCountries()->pluck('name', 'code');
        $review = $billing->order->revisions->all()[0]['comment'];

        return view('portal.order.detail', compact('billing', 'brief', 'countries', 'review'));
    }

    public function sendReminder($billingId)
    {
        $billing = Billing::find($billingId);
        $user = $billing->user;

        $data = [
            'name' => $user->getFullName(),
            'service' => $billing->service . ', ' . $billing->package
        ];

        try {
            Mail::to($user->email)->send(new SendReminderMail($data));
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'Could not send reminder email']);
        }
        return redirect()->back()->with(['success' => 'Send reminder email was sent successfully']);
    }
}
