<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Phone;
use App\Models\Sms;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $smses = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $smses = Sms::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('smses', compact('phones', 'phone', 'smses'));
    }
}
