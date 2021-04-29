<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Billing;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function getClients()
    {
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('portal.user.client', compact('users'));
    }

    public function getAdmin()
    {
        $users = Admin::orderBy('id', 'DESC')->paginate(15);
        return view('portal.user.admin', compact('users'));
    }

    public function showClientTransactions($userId = null)
    {
        $billings = Billing::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(15);
        return view('portal.user.transaction', compact('billings'));
    }
}
