<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Brief;
use Illuminate\Http\Request;

class BriefController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $brief = Brief::where('billing_id', $id)->get();
        $email = auth()->user()->email;
        $fullName = auth()->user()->getFullName();
        $isEdit = false;
        if (count($brief)) {
            $isEdit = true;
        }
        return view('brief', compact('id', 'isEdit', 'brief', 'email', 'fullName'));
    }

    public function createBrief(Request $request)
    {
        dd($request);
    }
}
