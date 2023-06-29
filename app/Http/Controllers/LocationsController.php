<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Phone;
use App\Models\Location;

class LocationsController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $location = null;
        $locations = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $location = Location::query()->where("phone", $id)->orderByDesc("id")->first();
            //$locations = DB::select( "SELECT dateTime, HOUR(created_at) as hour FROM `locations` GROUP BY hour");
            //$locations = Location::query()->where("phone", $id)->get();
            $locations = DB::table('locations')
                ->select(DB::raw('id, dateTime, latitude, longitude, HOUR(dateTime) as hour, DAY(dateTime) as day'))
                ->where("phone", $id)
                ->groupBy('hour', 'day')
                ->orderByDesc("id")
                ->get();
        }
        return view('locations', compact('phones', 'phone', 'location', 'locations'));
    }

    public function location(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $location = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $location = Location::query()->where("phone", $id)->orderByDesc("id")->first();
        }
        return view('location', compact('phones', 'phone', 'location'));
    }
}
