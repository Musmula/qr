<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use App\QrCode;
use QrGenerator;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function __construct()
    {
        // Policies?
        $this->middleware('auth')->except(['redirect', 'download']);
    }

    // Generate a new dynamic Qr Code
    public function generate(Request $request)
    {
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
        return redirect('/web');
    }

    public function redirect($QrCodeLink)
    {
        $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
        return redirect($qrcode->dynamic_link);
    }

    public function update($QrCodeLink, Request $request)
    {
        // Check if this user is connected to the link
        $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
        if (Auth::user()->hasPermission($qrcode)) {
            $qrcode->update($request->all());
            alert()->success('Qr Code updated');
        }

        return redirect()->back();
    }

    public function drop($QrCodeLink)
    {
        $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
        if (Auth::user()->hasPermission($qrcode)) {
            $qrcode->delete();
            alert()->success('Qr Code Deleted');
        }

        return redirect()->back();
    }

    public function download(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'size' => 'required|max:5000',
        ]);
        if ($request->codeData === null) {
            alert()->error('No data provided');
            return redirect()->back();
        }
        $response = Response::make(QrGenerator::format('png')->size($request->size)->generate($request->codeData), 200, ['Content-Type' => 'image/png']);
        return $response;
    }

    //
    // Helpers
    //
    protected function getNewStaticLink($count = 10)
    {
        $link = str_random($count);
        if (QrCode::where('static_link', $link)->first()) {
            $this->getNewStaticLink($count++);
        }
        return $link;
    }

    protected function formatDynamicLink($link)
    {
        $link = strtolower($link);
        $url = parse_url($link);
        if (array_key_exists('scheme', $url) && ($url['scheme'] == 'https' || $url['scheme'] == 'http')) {
            return $link;
        }
        return 'http://' . $link;
    }
}
