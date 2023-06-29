<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use App\Models\Phone;
use Illuminate\Http\Request;

class CallLogController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $callLogs = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $callLogs = CallLog::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('call-log', compact('phones', 'phone', 'callLogs'));
    }
}
