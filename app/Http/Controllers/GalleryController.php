<?php

namespace App\Http\Controllers;

use App\Models\CaptureAudio;
use App\Models\Gallery;
use App\Models\Phone;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);

            $captures = Gallery::query()->where("phone", $id)->orderByDesc("id")->get();

            if ($request->get("filter")) {
                switch ($request->get("filter")) {
                    case "videos" :
                        $captures = Gallery::query()
                            ->where("phone", $id)
                            ->where("mime", "video/mp4")
                            ->orderByDesc("id")->get();
                        break;
                    case "photos" :
                        $captures = Gallery::query()
                            ->where("phone", $id)
                            ->where("mime", "!=", "video/mp4")
                            ->orderByDesc("id")->get();
                        break;
                    case "none" :
                        $captures = Gallery::query()
                            ->where("phone", $id)
                            ->orderByDesc("id")->get();
                        break;

                }
            }
        }
        return view('gallery', compact('phones', 'phone', 'captures'));
    }
}
