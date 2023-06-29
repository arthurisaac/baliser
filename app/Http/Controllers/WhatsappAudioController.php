<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\WhatsappAudio;
use Illuminate\Http\Request;

class WhatsappAudioController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $captures = WhatsappAudio::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('whatsapp-audio', compact('phones', 'phone', 'captures'));
    }
}
