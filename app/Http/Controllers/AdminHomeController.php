<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Blog;
use App\Contact;
use App\Revision;
use App\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function index()
    {
        $billings = Billing::all()->count();
        $users = User::all()->count();
        $reviews = Revision::where('is_satisfied', Revision::YES)->count();
        $blogPosts = Blog::all()->count();

        return view('portal.home', compact('billings', 'users', 'reviews', 'blogPosts'));
    }

    public function getContacts()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(15);
        return view('portal.contact.index', compact('contacts'));
    }

    public function showContact($id = null)
    {
        $contact = Contact::find($id);
        return view('portal.contact.view', compact('contact'));
    }

    public function getReviews()
    {
        $reviews = Revision::where('is_satisfied', 1)->orderBy('id', 'DESC')->paginate(10);
        return view('portal.reviews', compact('reviews'));
    }
}
