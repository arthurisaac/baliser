<?php

namespace App\Http\Controllers;

use App\Models\CapturePhoto;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\Location;

class CapturePhotoController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $captures = CapturePhoto::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('capture-photo', compact('phones', 'phone', 'captures'));
    }

    public function takeCapture(Request $request) {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);

            if($request->get("capturePhoto") && $request->get("capturePhotoPos")) {
                $phone->capturePhoto = $request->get("capturePhoto");
                $phone->capturePhotoPos = $request->get("capturePhotoPos");
                $phone->save();
            }

            $captures = CapturePhoto::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return redirect()->back()->with("success", "Commande envoyée avec succès");
    }

public function place(Request $request) {
	$location = Location::query()->where("phone", 6)->orderByDesc("id")->first();
echo $location->latitude;
echo $location->longitude;
        return dd($location);
    }
}
