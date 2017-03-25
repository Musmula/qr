<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/generate/web');
    }

    public function web() {
        return view("web", ['active' => 'web']);
    }

    public function text() {
        return view("text", ['active' => 'text']);
    }

    public function vcard() {
        return view("vcard", ['active' => 'vcard']);
    }

    public function location() {
        return view("location", ['active' => 'location']);
    }

    public function email() {
        return view("email", ['active' => 'email']);
    }

    public function wifi() {
        return view("wifi", ['active' => 'wifi']);
    }
}
