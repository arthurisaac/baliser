<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Phone;
use App\Models\Location;
use App\Models\Sms;
use App\Models\Notification;
use App\Models\CallLog;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();

        $locations = null;
        $sms = null;
        $position = null;
        $notification = null;
        $callLog = null;
        $phone = null;

        if ($request->get("id")) {
            $id = $request->get("id");
            $locations = Location::query()->where("phone", $id)->orderByDesc("id")->limit(10)->get();
            $sms = Sms::query()->where("phone", $id)->orderByDesc("id")->first();
            $position = Location::query()->where("phone", $id)->orderByDesc("id")->first();
            $notification = Notification::query()->where("phone", $id)->get();
            $callLog = CallLog::query()->where("phone", $id)->orderByDesc("id")->first();
            $phone = Phone::query()->find($id);
        }


        return view("dashboard", compact("phones", "locations", "sms", "position", "notification", "callLog", "phone"));
    }

}
