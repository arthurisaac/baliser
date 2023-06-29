<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $phones = Phone::all();
        $phone = null;
        $contacts = null;
        if ($request->get("id")) {
            $id = $request->get("id");
            $phone = Phone::query()->find($id);
            $contacts = Contact::query()->where("phone", $id)->orderByDesc("id")->get();
        }
        return view('contacts', compact('phones', 'phone', 'contacts'));
    }
}
