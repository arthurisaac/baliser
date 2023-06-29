<?php

namespace App\Http\Controllers;

use App\DataTables\KeyLoggersDataTable;
use App\Models\KeyLogger;
use App\Models\Phone;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class KeyLoggerController extends Controller
{
    public function index(Request $request, KeyLoggersDataTable $keyLoggersDataTable)
    {
        $phones = Phone::all();
        $keyloggers = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);

            return $keyLoggersDataTable
                ->with('id', $id)
                ->render('key-logger', compact('phones', 'phone', 'keyloggers'));
        }
    }
}
