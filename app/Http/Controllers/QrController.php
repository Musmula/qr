<?php

namespace App\Http\Controllers;

use Auth;
use App\QrCode;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('redirect');
    }

    // Generate a new dynamic Qr Code
    public function generate(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required'
        ]); 

        QrCode::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'dynamic_link' => $this->formatDynamicLink($request->link),
            'static_link' => $this->getNewStaticLink()
        ]);

        alert()->success('Link generated');
        return redirect('/generate/web');
    }

    public function redirect($QrCodeLink) {
        $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
        return redirect($qrcode->dynamic_link);
    }

    // 
    // Helpers
    // 
    protected function getNewStaticLink($count = 10) {
        $link = str_random($count);
        if (QrCode::where('static_link', $link)->first()) {
            $this->getNewStaticLink($count++);
        }
        return $link;
    }

    protected function formatDynamicLink($link) {
        $link = strtolower($link);
        $url = parse_url($link);
        if ( array_key_exists('scheme', $url) && ($url['scheme'] == 'https' || $url['scheme'] == 'http')) {
            return $link;
        }
        return 'http://' . $link;
    }
}
