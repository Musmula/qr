<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('/generate/web');
    }

    public function web() {
        if (Auth::user()) {
            $links = Auth::user()->links;
        }

        return view('web', [
            'active' => 'web',
            'links' => isset($links) ? $links : null
        ]);
    }

    public function text() {
        return view('text', ['active' => 'text']);
    }

    public function vcard() {
        return view('vcard', ['active' => 'vcard']);
    }

    public function location() {
        return view('location', ['active' => 'location']);
    }

    public function email() {
        return view('email', ['active' => 'email']);
    }

    public function wifi() {
        return view('wifi', ['active' => 'wifi']);
    }

    public function about() {
        return view('about', ['active' => 'none']);
    }
}
