<?php

namespace App\Http\Controllers;

use App\Models\CaptureAudio;
use App\Models\Phone;
use Illuminate\Http\Request;

class CaptureAudioController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $captures = CaptureAudio::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('capture-audio', compact('phones', 'phone', 'captures'));
    }

    public function takeCapture(Request $request) {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);

            if($request->get("captureAudio") && $request->get("captureAudioDuration")) {
                $phone->captureAudio = $request->get("captureAudio");
                $phone->captureAudioDuration = $request->get("captureAudioDuration");
                $phone->save();
            }

            $captures = CaptureAudio::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return redirect()->back()->with("success", "Commande envoyée avec succès");
    }
}
