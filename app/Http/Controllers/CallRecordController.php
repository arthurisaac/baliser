<?php

namespace App\Http\Controllers;

use App\Models\CallRecord;
use App\Models\Phone;
use Illuminate\Http\Request;

class CallRecordController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $captures = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $captures = CallRecord::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('record-call', compact('phones', 'phone', 'captures'));
    }
}
