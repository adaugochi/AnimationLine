<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class AdminForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function broker()
    {
        return Password::broker('admins');
    }

    public function showLinkRequestForm()
    {
        $loginRoute = route('admin.login');
        $pwdResetEmail = route('admin.password.email');
        return view('auth.passwords.email', compact('loginRoute', 'pwdResetEmail'));
    }
}
